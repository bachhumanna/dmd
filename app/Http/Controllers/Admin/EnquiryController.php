<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bookingreqzuest;
use App\Http\Requests\BookingUpdate;
use App\Enquiry;
use App\User;
use App\Client;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EnquiryCreateRequest;
use DB;
use App\EnquiryPickupLocation;
use App\EnquiryDetails;
use App\PickupLocation;
use PDF;

class EnquiryController extends Controller {

    public function __construct() {
        $this->middleware('bookingAllow', ['only' => ['create', 'store']]);
    }

    public function index(Request $request) {
        $query = Enquiry::Franchisee();
        if ($request->status) {

            if ($request->status <= 3) {
                $query->where('trip_status', $request->status);
            } else {
                if ($request->status == 8) {
                    $query->whereDoesntHave('driver');
                } else {
                    $status = $request->status;
                    $query->whereHas("driver", function($q) use($status) {
                        if ($status == 9) {
                            $q->whereNull('status');
                        } else if ($status == 10) {
                            $q->where('status', 1);
                        } else if ($status == 11) {
                            $q->where('status', 2);
                        }
                    });
                }
            }
        }
        if ($request->phone || $request->name) {
            $query->whereHas("client", function($q) use($request) {
                if ($request->phone) {
                    $q->where('phone', 'LIKE', '%' . $request->phone . '%');
                }
                if ($request->name) {
                    $q->where('firstname', 'LIKE', '%' . $request->name . '%')
                            ->orWhere('surname', 'LIKE', '%' . $request->name . '%');
                }
            });
        }
        if ($request->booking_no) {
            $query->where('order_id', $request->booking_no);
        }
        $query->with('pickupLocation', 'dropLocation', 'driver');
        if (!getActiveFranchisee()) {
            $query->with('franchisees');
        }
        $models = $query->latest()->paginate(25);
        return view('admin.enquiry.index', compact('models'));
    }

    public function create(Request $request) {

        $franchiseeid = getActiveFranchisee();
        if (!$franchiseeid) {
            $franchiseeid = Auth::user()->franchisees_id;
        }

          $client = Client::franchisee()->get();
        $client = clientName($client);
        //$drivers = \App\User::franchisee()->where('user_type', 3)->pluck('name', 'id');
        $driversModel = \App\User::franchisee()->with('driverVehicles.vehicle')->where('user_type', 3)->get();

        $drivers = array();
        foreach ($driversModel as $dri) {
            if (isset($dri->driverVehicles->vehicle->wheelchair_access)) {
                $driverData = [
                    'driver' => $dri->id,
                    'id' => $dri->driverVehicles->vehicle->id,
                    'name' => $dri->name . "(" . $dri->driverVehicles->vehicle->vehicles_number . ")"
                ];
            } else {
                $driverData = [
                    'driver' => $dri->id,
                    'id' => 0,
                    'name' => $dri->name
                ];
            }
            $drivers[] = $driverData;
        }

        $vehicles = \App\Vehicles::franchisee()->pluck('vehicles_number', 'id');
        
        
        
        
        
        $franchiseeModel = \App\Franchisee::find($franchiseeid);

        return view('admin.enquiry.create', compact('franchiseeModel', 'client', 'vehicles', 'drivers'));
    }

    public function store_1(Request $request) {


        try {
            DB::beginTransaction();
            $data = $request->all();
            
            $pickupLocation = array_filter($request->pickup_location);
            $travelTime = $request->travel_time;
            $pickupDistance = $request->pickup_distance;
            $model = new Enquiry($data);
            $model->users_id = Auth::user()->id;
            if (isSuperAdmin()) {
                $model->franchisees_id = selectedFranchisees();
            } else {
                $model->franchisees_id = Auth::user()->franchisees_id;
            }


            $model->client_id = getClientId($request);
            $model->save();


            foreach ($pickupLocation as $key => $location) {
                $pickupData = [
                    "booking_id" => $model->id,
                    "pickup_position" => $key,
                    "location_name" => $location,
                    "distance" => isset($pickupDistance[$key]) ? $pickupDistance[$key] : 0,
                    "travel_time" => isset($travelTime[$key]) ? $travelTime[$key] : 0
                ];
                \App\PickupLocation::create($pickupData);
            }
            $pricingDetails = $this->getPriceDetails($request, $model->franchisees_id);
            if ($pricingDetails) {
                $dropLocation = [
                    "booking_id" => $model->id,
                    "pickup_position" => 99,
                    "location_name" => $request->drop_location,
                    "distance" => $request->drop_location_distance,
                    "travel_time" => $request->drop_location_travel_time
                ];
                \App\PickupLocation::create($dropLocation);

                $model->total_distance = $pricingDetails['total_distance'];
                $model->total_duration = $pricingDetails['total_duration'];
                $model->total_price = $pricingDetails['total_price'];
                $model->order_id = getOrderNo($model->id);
                $model->final_price = $request->custom_price ? $request->custom_price : $pricingDetails['total_price'];
                $model->save();

                $bookingDetails = new EnquiryDetails($pricingDetails);
                $bookingDetails->booking_id = $model->id;
                $bookingDetails->save();

                DB::commit();
                $request->session()->flash('success', 'Booking has been successfully added!');
                return redirect(route('enquiry.index'));
            } else {
                DB::rollBack();
                $request->session()->flash('error', 'Oops something went wrong try again !');
            }
        } catch (Exception $e) {
            DB::rollBack();

            $request->session()->flash('error', 'Oops something went wrong try again !');
            return redirect()->back()->withInput();
        }
    }

     public function store(Request $request) {


        try {
            DB::beginTransaction();
            $bookingDate = getRepedDate($request);
            foreach ($bookingDate as $date) {
                $data = $request->all();
                $data['booking_time'] = $date;
                $pickupLocation = array_filter($request->pickup_location);
                $travelTime = $request->travel_time;
                $pickupDistance = $request->pickup_distance;

                $model = new Enquiry($data);
                $model->users_id = Auth::user()->id;
                if (isSuperAdmin()) {
                    $model->franchisees_id = selectedFranchisees();
                } else {
                    $model->franchisees_id = Auth::user()->franchisees_id;
                }


                $model->client_id = getClientId($request);
                $model->save();


                foreach ($pickupLocation as $key => $location) {
                    $pickupData = [
                        "booking_id" => $model->id,
                        "pickup_position" => $key,
                        "location_name" => $location,
                        "distance" => isset($pickupDistance[$key]) ? $pickupDistance[$key] : 0,
                        "travel_time" => isset($travelTime[$key]) ? $travelTime[$key] : 0
                    ];
                    EnquiryPickupLocation::create($pickupData);
                }
                $pricingDetails = $this->getPriceDetails($request, $model->franchisees_id);
                if ($pricingDetails) {
                    $dropLocation = [
                        "booking_id" => $model->id,
                        "pickup_position" => 99,
                        "location_name" => $request->drop_location,
                        "distance" => $request->drop_location_distance,
                        "travel_time" => $request->drop_location_travel_time
                    ];
                    EnquiryPickupLocation::create($dropLocation);

                    $model->total_distance = $pricingDetails['total_distance'];
                    $model->total_duration = $pricingDetails['total_duration'];
                    $model->total_price = $pricingDetails['total_price'];
                    $model->order_id = getOrderNo($model->id, "E");
                    $model->final_price = $request->custom_price ? $request->custom_price : $pricingDetails['total_price'];
                    $model->invoice_price = $request->custom_price ? $request->custom_price : $pricingDetails['total_price'];
                    $model->driver_id = $request->driver_id;
                    $model->save();


                    $this->setBookingDetails($pricingDetails, $model);
                    $this->miscellaneousCharge($request, $model->id);

                    $bookingVehicle = new \App\BookingVehicle();
                    $bookingVehicle->status = 1;
                    $bookingVehicle->booking_id = $model->id;
                    $bookingVehicle->vehicle_id = $request->vehicle_id;
                    $bookingVehicle->user_id = $request->driver_id;
                    $bookingVehicle->save();
                } else {
                    DB::rollBack();
                    $request->session()->flash('error', 'Oops something went wrong try again !');
                }
            }
            DB::commit();
            $request->session()->flash('success', 'Booking has been successfully added!');
            return redirect(route('enquiry.index'));
        } catch (Exception $e) {
            DB::rollBack();

            $request->session()->flash('error', 'Oops something went wrong try again !');
            return redirect()->back()->withInput();
        }
    }

    
    
    
    
    
    
    
    
    
    
    
    
    public function show($id) {

        $model = Enquiry::with('driver.user', 'client')->findOrFail($id);
        if ($model->AllowDriverChage) {
            $drivers = getDriverForBooking($model);
        } else {
            $drivers = false;
        }
        $vehicles = \App\Vehicles::franchisee()->pluck('vehicles_number', 'id');
        return view('admin.enquiry.show', ['model' => $model, 'drivers' => $drivers, 'vehicles' => $vehicles]);
    }

    public function edit($id) {
        $model = Enquiry::with(['pickupLocation', 'dropLocation'])->findOrFail($id);
        //pr($model);

        return view('admin.enquiry.edit', compact('model', 'allprice', 'alluser'));
    }

    public function update(BookingUpdate $request, $id) {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $pickupLocation = array_filter($request->pickup_location);
            $travelTime = $request->travel_time;
            $pickupDistance = $request->pickup_distance;

            $model = Enquiry::find($id);
            $input = $request->all();

            //$model->client_id =  getClientId($request);

            $model->update($input);


            $totalDistance = 0;
            $totalTime = 0;
            PickupLocation::where('booking_id', $model->id)->delete();
            foreach ($pickupLocation as $key => $location) {
                $pickupData = [
                    "booking_id" => $model->id,
                    "pickup_position" => $key,
                    "location_name" => $location,
                    "distance" => isset($pickupDistance[$key]) ? $pickupDistance[$key] : 0,
                    "travel_time" => isset($travelTime[$key]) ? $travelTime[$key] : 0
                ];
                PickupLocation::create($pickupData);
                $totalDistance += isset($pickupDistance[$key]) ? $pickupDistance[$key] : 0;
                $totalTime += isset($travelTime[$key]) ? $travelTime[$key] : 0;
            }
            $dropLocation = [
                "booking_id" => $model->id,
                "pickup_position" => 99,
                "location_name" => $request->drop_location,
                "distance" => $request->drop_location_distance,
                "travel_time" => $request->drop_location_travel_time
            ];
            PickupLocation::create($dropLocation);


            $totalDistance += $request->drop_location_distance;
            $totalTime += $request->drop_location_travel_time;



            $waitingTime = $request->outward_waiting;
            $companionTime = $request->outward_companion;

            if ($request->journey_type == 2) {
                $waitingTime += $request->return_waiting;
                $companionTime += $request->return_companion;
                $totalDistance = $totalDistance * 2;
                $totalTime = $totalTime * 2;
            }
            if ($request->long_return == 1) {
                $totalDistance += ($request->drop_off_to_base * 2);
            }


            $pricingDetails = $this->getPriceDetails($request, $model->franchisees_id);
            if ($pricingDetails) {
                $totalDurations = $totalTime + $waitingTime + $companionTime;


                $model->total_distance = $totalDistance;
                $model->total_duration = $totalDurations;
                $model->total_price = $pricingDetails['total_price'];
                $model->final_price = $request->custom_price ? $request->custom_price : $pricingDetails['total_price'];
                $model->save();
                EnquiryDetails::where('booking_id', $model->id)->delete();

                $bookingDetails = new EnquiryDetails($pricingDetails);
                $bookingDetails->booking_id = $model->id;
                $bookingDetails->save();
                DB::commit();

                $request->session()->flash('success', 'Booking has been successfully added!');
                return redirect(route('enquiry.index'));
            } else {
                DB::rollBack();
                $request->session()->flash('error', 'Oops something went wrong try again !');
                return redirect()->back()->withInput();
            }
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
        try {
            $model = Enquiry::withTrashed()->findOrFail($id);

            if ($model->trashed()) {
                $model->restore();
                \session()->flash('success', 'Booking has been successfully Restore!');
            } else {
                $model->delete();
                \session()->flash('success', 'Booking has been successfully Deleted!');
            }
        } catch (Exception $e) {
            \session()->flash('error', 'Oops something went wrong try again !');
        }
        return redirect()->back();
    }

    public function autoComplete(Request $request) {
        $query = $request->get('term', '');
        $clients = Client::where('firstname', 'LIKE', '%' . $query . '%')->get();

        $data = array();
        foreach ($clients as $client) {
            $data[] = array(
                'id' => $client->id,
                'value' => $client->firstname . " - " . $client->phone,
                'firstname' => $client->firstname,
                'surname' => $client->surname,
                'email' => $client->email,
                'phone_number' => $client->phone,
                'house_number' => $client->house_number,
                'street' => $client->street,
                'city' => $client->city,
                'county' => $client->county,
                'postcode' => $client->postcode,
            );
        }
        if (count($data))
            return $data;
        else
            return ['value' => 'No Result Found', 'id' => ''];
    }

    public function enqueryPriceDetails(Request $request) {
        $message = [
            'pickup_location.1.*' => 'The pickup location A field is required',
            'pickup_location.2.*' => 'The pickup location B field is required',
            'pickup_location.3.*' => 'The pickup location C field is required',
            'pickup_distance.1.*' => 'This field is required',
            'pickup_distance.2.*' => 'This field is required',
            'pickup_distance.3.*' => 'This field is required',
        ];






        if ($request->franchisees_id) {
            $rule = [
//                    "name" => 'required',
//                    "email" => 'nullable|email',
//                    "phone_number" => 'nullable|numeric',
                "booking_time" => 'required|date_format:Y-m-d H:i|after_or_equal:today',
                "base_location" => 'required',
                "paying_bill" => 'required',
                "drop_location" => 'required',
                "outward_companion" => 'nullable|integer',
                "outward_waiting" => 'nullable|integer',
                "journey_type" => 'required',
                "return_companion" => 'nullable|integer',
                "return_waiting" => 'nullable|integer',
                "long_return" => 'nullable|integer',
                "drop_off_to_base" => 'nullable|numeric',
                "payment_mode" => 'required',
                "pickup_location.1" => 'required',
                "pickup_distance.1" => 'required',
                "pickup_distance.2" => "required_with:pickup_location.2",
                "pickup_distance.3" => "required_with:pickup_location.3",
                "drop_location" => 'required',
                "drop_location_distance" => 'required',
                "drop_location_travel_time" => 'required',
                "driver_id" => 'required',
                "vehicle_id" => 'required',
            ];
        } else {
            $rule = [
                "paying_bill" => 'required',
                "name" => 'required',
                "email" => 'nullable|email',
                "phone_number" => 'required|numeric',
                "address" => 'required',
                // "house_number" => 'required',
                "booking_time" => 'required|date_format:Y-m-d H:i|after_or_equal:today',
                "base_location" => 'required',
                "drop_location" => 'required',
                "outward_companion" => 'nullable|integer',
                "outward_waiting" => 'nullable|integer',
                "journey_type" => 'required',
                "return_companion" => 'nullable|integer',
                "return_waiting" => 'nullable|integer',
                "long_return" => 'nullable|integer',
                "drop_off_to_base" => 'nullable|numeric',
                "payment_mode" => 'required',
                "pickup_location.1" => 'required',
                "pickup_distance.1" => 'required',
                "pickup_distance.2" => "required_with:pickup_location.2",
                "pickup_distance.3" => "required_with:pickup_location.3",
                "drop_location" => 'required',
                "drop_location_distance" => 'required',
                "drop_location_travel_time" => 'required',
            ];
        }



        $validator = Validator::make($request->all(), $rule, $message);


        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 0, 'errors' => $validationError]);
        }


        if ($request->franchisees_id) {
            $franchiseeid = $request->franchisees_id;
        } else {
            $franchiseeid = getActiveFranchisee();
            if (!$franchiseeid) {
                $franchiseeid = Auth::user()->franchisees_id;
            }
        }


        $pricingDetails = $this->getPriceDetails($request, $franchiseeid);
        if ($pricingDetails) {
            $html = view('admin.booking.pricedetails', compact('pricingDetails'))->render();
            return response()->json([
                        'status' => true,
                        'totalPrice' => $pricingDetails['total_price'],
                        'tripProfit' => $pricingDetails['tripProfit'],
                        'html' => $html
            ]);
        } else {
            return response()->json([
                        'status' => false,
                        'totalPrice' => 0
            ]);
        }
    }

    private function getPriceDetails($request, $franchiseeid) {

        $allData = array("outward" =>
            array(
                "paid_mileage" => 0,
                "destination" => 0,
                "pick_up" => 0,
                "waiting" => 0,
                "companion" => 0,
                "comfort_break" => 0,
                "drop_off_to_base" => 0,
                "pick_up_cost" => 0,
            ),
            'return' => array(
                "paid_mileage" => 0,
                "destination" => 0,
                "pick_up" => 0,
                "waiting" => 0,
                "companion" => 0,
                "comfort_break" => 0,
                "drop_off_to_base" => 0,
                "pick_up_cost" => 0,
            )
        );
        $comfortBreakInterval = 30;
        $paidMileageDistance = 0;
        $baseDrivingTime = 0;
        $totalDistance = 0;
        $totalTime = 0;
        $comfort_break = 0;
        $return_comfort_break = 0;
        $pickupTime = 0;
        $pickupLocation = array_filter($request->pickup_location);
        $travelTime = $request->travel_time;
        $pickupDistance = $request->pickup_distance;
        $comfort_break = $request->comfort_break;
        $base_return = 0;
        $waitingTimeR = 0;
        $companionTimeR = 0;
        $outward_vehicle = 0;
        $return_vehicle = 0;
        $outward_driver = 0;
        $return_driver = 0;
        $baseReturnTime = 0;
        $baseReturnRetuenTime = 0;
        foreach ($pickupLocation as $key => $location) {
            if ($key == 1) {
                $paidMileageDistance = isset($pickupDistance[$key]) ? $pickupDistance[$key] : 0;
                $allData['outward']['paid_mileage'] = $paidMileageDistance;
            } else {
                //$baseDrivingTime += isset($travelTime[$key]) ? $travelTime[$key] : 0;
                $pickupTime += isset($travelTime[$key]) ? $travelTime[$key] : 0;
            }
            $totalDistance += isset($pickupDistance[$key]) ? $pickupDistance[$key] : 0;
            $totalTime += isset($travelTime[$key]) ? $travelTime[$key] : 0;
        }
        $totalDistance += $request->drop_location_distance;

        $outward_vehicle += $totalDistance;
        $totalTime += $request->drop_location_travel_time;
        $baseDrivingTime += $request->drop_location_travel_time;

        $allData['outward']['destination'] = $request->drop_location_travel_time;
        $allData['outward']['pick_up'] = $pickupTime;

        $waitingTime = $request->outward_waiting;
        $companionTime = $request->outward_companion;
        $allData['outward']['waiting'] = $waitingTime;
        $allData['outward']['companion'] = $companionTime;
        $allData['outward']['comfort_break'] = $comfort_break;
        $outward_driver = $totalTime;
        if ($request->journey_type == 1) {
            if ($request->base_return == 1) {

                $base_return = $request->drop_off_to_base;
                $totalDistance += $request->drop_off_to_base;
                $baseReturnTime = $request->drop_off_to_base_time;
                //$paidMileageDistance += $request->drop_off_to_base;
                $allData['outward']['drop_off_to_base'] = $base_return;
                $outward_vehicle = $totalDistance;
            }
        } else if ($request->journey_type == 2) {
            $return_driver = $totalTime;
            $allData['return']['pick_up'] = $pickupTime;
            $allData['return']['paid_mileage'] = $paidMileageDistance;
            $allData['return']['destination'] = $request->drop_location_travel_time;
            $pickupTime = $pickupTime * 2;

            $return_comfort_break = $request->return_comfort_break;
            $waitingTimeR = $request->return_waiting;
            $companionTimeR = $request->return_companion;

            $allData['return']['waiting'] = $request->return_waiting;
            $allData['return']['companion'] = $request->return_companion;
            $allData['return']['comfort_break'] = $request->return_comfort_break;
            $return_vehicle = $totalDistance;
            $totalDistance = $totalDistance * 2;
            $totalTime = $totalTime * 2;
            $paidMileageDistance = $paidMileageDistance * 2;
            $baseDrivingTime = $baseDrivingTime * 2;
            if ($request->long_return == 1) {
                if ($request->base_return == 1) {
                    $baseReturnRetuenTime = ($request->drop_off_to_base_time * 2);
                    $allData['return']['drop_off_to_base'] = $request->drop_off_to_base;
                    $allData['outward']['drop_off_to_base'] = $request->drop_off_to_base;
                    $base_return = $request->drop_off_to_base * 2;
                    $totalDistance += ($request->drop_off_to_base * 2);
                    $return_vehicle += $request->drop_off_to_base;
                    $outward_vehicle += $request->drop_off_to_base;
                    //$paidMileageDistance += ($request->drop_off_to_base * 2);
                }
            }
        }
        $totalConformTime = (($comfort_break + $return_comfort_break) * $comfortBreakInterval);
        $totalTime = $totalTime + $waitingTime + $waitingTimeR + $companionTime + $companionTimeR + $totalConformTime;



        $misc_total = 0;
        $misc_data = array();
        if ($request->misc_description) {
            $misc_description = array_filter($request->misc_description);
//            $misc_quantity = $request->misc_quantity;
//            $misc_price = $request->misc_price;
//            $misc_vat = $request->misc_vat;
            $misc_amount = $request->misc_amount;


            foreach ($misc_description as $key => $misc) {
                $misc_Amt = isset($misc_amount[$key]) ? $misc_amount[$key] : 0;
                if ($misc_Amt) {
                    $misc_data[] = array(
                        'misc' => $misc,
                        'amount' => $misc_Amt,
                    );
                    $misc_total += $misc_Amt;
                }
            }
        }

        $franchiseesPrice = \App\FranchiseesPrice::where('franchisees_id', $franchiseeid)->first();
        if ($franchiseesPrice) {
            $paid_mileage_cost = $franchiseesPrice->paid_mileage;
            $base_driving_cost = $franchiseesPrice->base_driving_cost;
            $waiting_time_cost = $franchiseesPrice->waiting_time_cost;
            $companionship_cost = $franchiseesPrice->companionship_cost;
            $comfort_cost = $franchiseesPrice->comfort_cost;

            $driver_cost = $franchiseesPrice->driver_cost;
            $vehicle_cost = $franchiseesPrice->vehicle_cost;


            $pickupTimeCost = round(($pickupTime * $base_driving_cost), 2);

            $base_returnCost = round(($base_return * $paid_mileage_cost), 2);

            //
            $driverCharge = round(($totalTime * ($driver_cost / 60)), 2);
            $vehicleCharge = round(($vehicle_cost * $totalDistance), 2);



            $outward_driver += $allData['outward']['waiting'];
            $outward_driver += $allData['outward']['companion'];
            $outward_driver += $baseReturnTime;
            $outward_driver += ( 30 * $allData['outward']['comfort_break']);

            $return_driver += $allData['return']['waiting'];
            $return_driver += $allData['return']['companion'];
            $return_driver += $baseReturnRetuenTime;
            $return_driver += ( 30 * $allData['return']['comfort_break']);

            $outward_driverCost = round(($outward_driver * ($driver_cost / 60)), 2);
            $return_driverCost = round(($return_driver * ($driver_cost / 60)), 2);

            $outward_vehicleCost = round(($vehicle_cost * $outward_vehicle), 2);
            $return_vehicleCost = round(($vehicle_cost * $return_vehicle), 2);

            $expensesData = array(
                "outward" => array(
                    "outward_vehicle" => $outward_vehicleCost,
                    "driver_cost" => $outward_driverCost,
                ),
                'return' => array(
                    "outward_vehicle" => $return_vehicleCost,
                    "driver_cost" => $return_driverCost
                )
            );


            //Calculation 
            $paidMileageCost = round(($paid_mileage_cost * $paidMileageDistance), 2);
            $baseDrivingCost = round(($base_driving_cost * $baseDrivingTime), 2);

            $waitingCost = waitingPrice($waitingTime, $waiting_time_cost);
            $waitingCostR = waitingPrice($waitingTimeR, $waiting_time_cost);
            $companionCost = companionPrice($companionTime, $companionship_cost);
            $companionCostR = companionPrice($companionTimeR, $companionship_cost);
            $comfortCost = $comfort_cost * ($comfort_break + $return_comfort_break);



            $allData['outward']['waiting'] = waitingPrice($allData['outward']['waiting'], $waiting_time_cost);
            $allData['outward']['companion'] = companionPrice($allData['outward']['companion'], $companionship_cost);
            $allData['outward']['comfort_break'] = $comfort_cost * $allData['outward']['comfort_break'];
            $allData['outward']['destination'] = round(($allData['outward']['destination'] * $base_driving_cost), 2);
            $allData['outward']['pick_up'] = round(($allData['outward']['pick_up'] * $base_driving_cost), 2);
            $allData['outward']['paid_mileage'] = round(($allData['outward']['paid_mileage'] * $paid_mileage_cost), 2);
            $allData['outward']['pick_up_cost'] = $allData['outward']['pick_up'] + $allData['outward']['paid_mileage'];
            $allData['outward']['drop_off_to_base'] = round(($allData['outward']['drop_off_to_base'] * $paid_mileage_cost), 2);
            unset($allData['outward']['pick_up']);
            unset($allData['outward']['paid_mileage']);

            $allData['return']['waiting'] = waitingPrice($allData['return']['waiting'], $waiting_time_cost);
            ;
            $allData['return']['companion'] = companionPrice($allData['return']['companion'], $companionship_cost);
            ;
            $allData['return']['comfort_break'] = $comfort_cost * $allData['return']['comfort_break'];
            $allData['return']['destination'] = round(($allData['return']['destination'] * $base_driving_cost), 2);
            $allData['return']['pick_up'] = round(($allData['return']['pick_up'] * $base_driving_cost), 2);
            $allData['return']['paid_mileage'] = round(($allData['return']['paid_mileage'] * $paid_mileage_cost), 2);
            $allData['return']['pick_up_cost'] = $allData['return']['pick_up'] + $allData['return']['paid_mileage'];
            $allData['return']['drop_off_to_base'] = round(($allData['return']['drop_off_to_base'] * $paid_mileage_cost), 2);
            unset($allData['return']['pick_up']);
            unset($allData['return']['paid_mileage']);


            $quoteAmount = $misc_total + $paidMileageCost + $baseDrivingCost + $waitingCost + $waitingCostR + $companionCost + $companionCostR + $comfortCost + $pickupTimeCost + $base_returnCost;

            $customPrice = 0;
            if ($request->custom_price) {

                $customPrice = $request->custom_price;
            }
            $data = [
                'expensesData' => $expensesData,
                'misc_total' => $misc_total,
                'misc' => $misc_data,
                'data' => $allData,
                'drop_off_to_base_cost' => $base_returnCost,
                'customPrice' => $customPrice,
                'total_distance' => $totalDistance,
                'total_duration' => $totalTime,
                'total_price' => $quoteAmount,
                'trip_expense' => $driverCharge + $vehicleCharge,
                'waitingCost' => $waitingCost + $waitingCostR,
                'companionCost' => $companionCost + $companionCostR,
                'comfortCost' => $comfortCost,
                'base_driving_cost' => $baseDrivingCost,
                'paid_mileage' => $paidMileageCost + $pickupTimeCost,
                'driver_charge' => $driverCharge,
                'vehicle_charge' => $vehicleCharge,
                'tripAmount' => $quoteAmount - ($driverCharge + $vehicleCharge),
                'tripProfit' => tripProfit($quoteAmount, ($driverCharge + $vehicleCharge)),
                'custom_tripAmount' => $customPrice ? $customPrice - ($driverCharge + $vehicleCharge) : 0,
                'custom_tripProfit' => tripProfit($customPrice, ($driverCharge + $vehicleCharge))
            ];
            return $data;
        } else {
            return false;
        }
    }
    
    
    public function setBookingDetails($data, $model) {

        EnquiryDetails::where('booking_id', $model->id)->delete();
        $bookingDetails = new EnquiryDetails($data);
        $bookingDetails->outward_destination = $data['data']['outward']['destination'];
        $bookingDetails->outward_waiting = $data['data']['outward']['waiting'];
        $bookingDetails->outward_companion = $data['data']['outward']['companion'];
        $bookingDetails->outward_comfort_break = $data['data']['outward']['comfort_break'];
        $bookingDetails->outward_drop_off_to_base = $data['data']['outward']['drop_off_to_base'];
        $bookingDetails->outward_pick_up_cost = $data['data']['outward']['pick_up_cost'];
        $bookingDetails->return_destination = $data['data']['return']['destination'];
        $bookingDetails->return_waiting = $data['data']['return']['waiting'];
        $bookingDetails->return_companion = $data['data']['return']['companion'];
        $bookingDetails->return_comfort_break = $data['data']['return']['comfort_break'];
        $bookingDetails->return_drop_off_to_base = $data['data']['return']['drop_off_to_base'];
        $bookingDetails->return_pick_up_cost = $data['data']['return']['pick_up_cost'];
        
        
        $bookingDetails->outward_vehicle_cost = $data['expensesData']['outward']['outward_vehicle'];
        $bookingDetails->outward_driver_cost = $data['expensesData']['outward']['driver_cost'];
        
        $bookingDetails->return_vehicle_cost = $data['expensesData']['return']['outward_vehicle'];
        $bookingDetails->return_driver_cost = $data['expensesData']['return']['driver_cost'];
        
        $bookingDetails->booking_id = $model->id;
        $bookingDetails->save();
    }

    public function miscellaneousCharge($request, $booking_id) {
        \App\EnquiryMiscellaneous::where('booking_id',$booking_id)->delete();
        if ($request->misc_description) {           
            $misc_description = array_filter($request->misc_description);
            $misc_amount = $request->misc_amount;
            foreach ($misc_description as $key => $description) {
                $feeModel = new \App\InvoiceDetails();
                $feeModel->booking_id = $booking_id;
                $feeModel->comment = $description;
                $feeModel->qnty = 1;
                $feeModel->price = 0;
                $feeModel->vat = 0;
                $feeModel->amount = $misc_amount[$key];
                $feeModel->save();
            }
        }
    }

}
