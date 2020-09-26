<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bookingrequest;
use App\Http\Requests\BookingUpdate;
use App\Booking;
use App\User;
use App\Client;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BookingCreateRequest;
use DB;
use App\PickupLocation;
use App\BookingDetails;
use PDF;
use Excel;
use App\InvoiceDetails;
use Carbon\Carbon;

class BookingController extends Controller {

    public function __construct() {
        $this->middleware('bookingAllow', ['only' => ['create', 'store']]);
    }

    public function index(Request $request) {

        $query = Booking::Franchisee()->where('booking_or_quotes', 1)->sortable();

        $sdate = $request->start_date;
        $edate = $request->end_date;

        if ($request->archive) {
            $query->onlyTrashed();
        }
        $query->has('franchisees');
        $query->with('franchisees');
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

        if ($sdate || $edate) {
            $query->whereBetween('booking_time', array($sdate, $edate));
        }

        if ($request->booking_no) {
            $query->where('order_id', $request->booking_no);
        }

        if ($request->payment_status) {
            $payment_status = $request->payment_status;
            if ($request->payment_status == 2) {
                $payment_status = 0;
            }
            $query->where('payment_status', $payment_status);
        }


        $query->with('pickupLocation', 'dropLocation', 'driver', 'Drivername');
        if (!getActiveFranchisee()) {
            $query->with('franchisees');
        }
        //$query->whereNull('trip_status');
        ///$query->where('trip_status', "!=", 2);
        $query->whereNotIn('trip_status',  [2,4]);
        $models = $query->latest();

//        ----------pdf start------
        if ($request->downloadpdf) {
            $models = $query->get();
            $pdf = PDF::loadView('admin.booking.pdf-booking', ['models' => $models], [], [
                        'margin_top' => 0,
                        'margin_left' => 0,
                        'margin_right' => 0,
                        'mirrorMargins' => true,
                        'format' => 'A4'
            ]);
            return $pdf->stream('document.pdf');
        }
//        ----------pdf end------
//        ---------csv start------
        if ($request->downloadcsv) {
            $model = $query->with('client', 'pickupLocation', 'franchisees', 'invoice')->get();

            $filename = "client.csv";
            $fp = fopen('php://output', 'w');
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename=' . $filename);
            $header[0] = "Order";
            $header[1] = "Name";
            $header[2] = "Phone";
            $header[3] = "Email";
            $header[4] = "Landline";
            $header[5] = "Address";
            $header[6] = "Notes";
            $header[7] = "Journey Date and Time";
            $header[8] = "Base Location";
            $header[9] = "Pickup 1";
            $header[10] = "Pickup 2";
            $header[11] = "Pickup 3";
            $header[12] = "Destination";

            fputcsv($fp, $header);

            $data = array();
            foreach ($model as $key => $val) {
                $data['order_id'] = $val->order_id;
                $data['name'] = $val->client->name;
                $data['phone'] = $val->client->phone;
                $data['email'] = $val->client->email;
                $data['home_number'] = $val->client->home_number;
                $data['address'] = $val->client->address;
                $data['note'] = $val->note;
                $data['booking_time'] = $val->booking_time;
                $data['base_location'] = $val->base_location;

                $pickuplocation = array();
                foreach ($val->pickupLocation as $pickupLocations) {
                    $pickuplocation[] = $pickupLocations->location_name;
                }


                $data['pickup_location_1'] = @$pickuplocation[0];
                $data['pickup_location_2'] = @$pickuplocation[1];
                $data['pickup_location_3'] = @$pickuplocation[2];


                $data['drop_location'] = $val->drop_location;
                fputcsv($fp, $data);
            }
            exit();
        }

//        ---------csv end------

        $models = $query->paginate(25);
        return view('admin.booking.index', compact('models'));
    }

    public function completed(Request $request) {
        $query = $unpaidmodels = Booking::Franchisee()
                ->with('pickupLocation', 'dropLocation', 'client')
                ->where('payment_status', 1)
                ->sortable();
                //->where('trip_status', 2);



        $sdate = $request->start_date;
        $edate = $request->end_date;

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

        if ($request->payment_status) {
            $payment_status = $request->payment_status;
            if ($request->payment_status == 2) {
                $payment_status = 0;
            }
            $query->where('payment_status', $payment_status);
        }

        if ($sdate || $edate) {
            $query->whereBetween('booking_time', array($sdate, $edate));
        }

        $query->with('pickupLocation', 'dropLocation', 'driver');
        if (!getActiveFranchisee()) {
            $query->with('franchisees');
        }





        //        ----------pdf start------
        if ($request->downloadpdf) {
            $models = $query->get();
            $pdf = PDF::loadView('admin.booking.pdf-booking', ['models' => $models], [], [
                        'margin_top' => 0,
                        'margin_left' => 0,
                        'margin_right' => 0,
                        'mirrorMargins' => true,
                        'format' => 'A4'
            ]);
            return $pdf->stream('document.pdf');
        }
//        ----------pdf end------
//        ---------csv start------
        if ($request->downloadcsv) {
            $model = $query->get();

            $filename = "client.csv";
            $fp = fopen('php://output', 'w');
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename=' . $filename);
            $header[0] = "Order";
            $header[1] = "Name";
            $header[2] = "Phone";
            $header[3] = "Email";
            $header[4] = "Landline";
            $header[5] = "Address";
            $header[6] = "Notes";
            $header[7] = "Journey Date and Time";
            $header[8] = "Base Location";
            $header[9] = "Pickup 1";
            $header[10] = "Pickup 2";
            $header[11] = "Pickup 3";
            $header[12] = "Destination";

            fputcsv($fp, $header);

            $data = array();
            foreach ($model as $key => $val) {
                $data['order_id'] = $val->order_id;
                $data['name'] = $val->client->name;
                $data['phone'] = $val->client->phone;
                $data['email'] = $val->client->email;
                $data['home_number'] = $val->client->home_number;
                $data['address'] = $val->client->address;
                $data['note'] = $val->note;
                $data['booking_time'] = $val->booking_time;
                $data['base_location'] = $val->base_location;

                $pickuplocation = array();
                foreach ($val->pickupLocation as $pickupLocations) {
                    $pickuplocation[] = $pickupLocations->location_name;
                }


                $data['pickup_location_1'] = @$pickuplocation[0];
                $data['pickup_location_2'] = @$pickuplocation[1];
                $data['pickup_location_3'] = @$pickuplocation[2];


                $data['drop_location'] = $val->drop_location;
                fputcsv($fp, $data);
            }
            exit();
        }
//---------csv end------
        $models = $query->latest()->paginate(25);
        return view('admin.booking.completed', compact('models'));
    }

    public function cancelled(Request $request) {
        $query = $unpaidmodels = Booking::Franchisee()
                ->with('pickupLocation', 'dropLocation', 'client')
                ->where('trip_status', 4)
                ->sortable();
        //  ->where('payment_status', 0)
        



        $sdate = $request->start_date;
        $edate = $request->end_date;

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

        if ($request->payment_status) {
            $payment_status = $request->payment_status;
            if ($request->payment_status == 2) {
                $payment_status = 0;
            }
            $query->where('payment_status', $payment_status);
        }

        if ($sdate || $edate) {
            $query->whereBetween('booking_time', array($sdate, $edate));
        }

        $query->with('pickupLocation', 'dropLocation', 'driver');
        if (!getActiveFranchisee()) {
            $query->with('franchisees');
        }

        $models = $query->latest()->paginate(25);

        // pr($models->toarray());exit;
        return view('admin.booking.cancelled', compact('models'));
    }

    public function create(Request $request) {

        $franchiseeid = getActiveFranchisee();
        if (!$franchiseeid) {
            $franchiseeid = Auth::user()->franchisees_id;
        }

        $franchiseeModel = \App\Franchisee::find($franchiseeid);
        $client = Client::franchisee()->get();
        $client = clientName($client);

        $companionsdrivers = \App\User::franchisee()->whereIn('user_type', [3, 5])->orderBy('name')->pluck('name', 'id')->toArray();



        $driversModel = \App\User::franchisee()->with('driverVehicles.vehicle')->orderBy('name')->where('user_type', 3)->get();

        $drivers = array();
        foreach ($driversModel as $dri) {
            if (isset($dri->driverVehicles->vehicle->wheelchair_access)) {
                $driverData = [
                    'address' => $dri->address,
                    'driver' => $dri->id,
                    'id' => $dri->driverVehicles->vehicle->id,
                    'name' => $dri->name . "(" . $dri->driverVehicles->vehicle->vehicles_number . ")"
                ];
            } else {
                $driverData = [
                    'address' => $dri->address,
                    'driver' => $dri->id,
                    'id' => 0,
                    'name' => $dri->name
                ];
            }
            $drivers[] = $driverData;
        }

        $vehicles = \App\Vehicles::franchisee()->pluck('vehicles_number', 'id');
        return view('admin.booking.create', compact('franchiseeModel', 'client', 'vehicles', 'drivers', 'companionsdrivers'));
    }
    public function quickCreate(Request $request) {

        $franchiseeid = getActiveFranchisee();
        if (!$franchiseeid) {
            $franchiseeid = Auth::user()->franchisees_id;
        }

        $franchiseeModel = \App\Franchisee::find($franchiseeid);
        $client = Client::franchisee()->get();
        $client = clientName($client);

        $companionsdrivers = \App\User::franchisee()->whereIn('user_type', [3, 5])->orderBy('name')->pluck('name', 'id')->toArray();



        $driversModel = \App\User::franchisee()->with('driverVehicles.vehicle')->orderBy('name')->where('user_type', 3)->get();

        $drivers = array();
        foreach ($driversModel as $dri) {
            if (isset($dri->driverVehicles->vehicle->wheelchair_access)) {
                $driverData = [
                    'address' => $dri->address,
                    'driver' => $dri->id,
                    'id' => $dri->driverVehicles->vehicle->id,
                    'name' => $dri->name . "(" . $dri->driverVehicles->vehicle->vehicles_number . ")"
                ];
            } else {
                $driverData = [
                    'address' => $dri->address,
                    'driver' => $dri->id,
                    'id' => 0,
                    'name' => $dri->name
                ];
            }
            $drivers[] = $driverData;
        }

        $vehicles = \App\Vehicles::franchisee()->pluck('vehicles_number', 'id');
        return view('admin.booking.create-quick', compact('franchiseeModel', 'client', 'vehicles', 'drivers', 'companionsdrivers'));
    }

    public function store(BookingCreateRequest $request) {
        
        //echo "pending"; die;

        //echo date("Y-m-d");
        //echo date("Y-m-d", strtotime($request->booking_time)) ; die;

        try {

            DB::beginTransaction();
            
            $bookingDate = getRepedDate($request);
            
            foreach ($bookingDate as $date) {
                $data = $request->all();
                $data['booking_time'] = $date;
                $data['vat_registered'] = vatRegistrationCheck($date);
                $pickupLocation = array_filter($request->pickup_location);
                $travelTime = $request->travel_time;
                $pickupDistance = $request->pickup_distance;
                
                if($data['booking_time']){
                    $data['booking_time'] = calculateMySqlDate($data['booking_time']);
                }
                
                if($data['created_at']){
                    $data['created_at'] = calculateMySqlDate($data['created_at']);
                }

                $model = new Booking($data);
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
                    $model->invoice_price = $request->custom_price ? $request->custom_price : $pricingDetails['total_price'];
                    $model->driver_id = $request->driver_id;
                    if ($request->created_at){
                        $model->created_at = new Carbon($request->created_at);
                        $model->late_booking_reason = $request->late_booking_reason;
                    }
//                    pr($model->created_at);
//                    pr($request->all());
//                    die();
                    $model->save();

                    $this->setBookingDetails($pricingDetails, $model);
                    //$this->miscellaneousCharge($request, $model->id);

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
            return redirect(route('booking.index'));
        } catch (Exception $e) {
            DB::rollBack();

            $request->session()->flash('error', 'Oops something went wrong try again !');
            return redirect()->back()->withInput();
        }
    }

    public function show($id) {

        $model = Booking::with('driver.user', 'client')->withTrashed()->findOrFail($id);

        if ($model->AllowDriverChage) {
            $drivers = getDriverForBooking($model);
        } else {
            $drivers = false;
        }



        $drivers = getDriverForBooking($model);
        $vehicles = \App\Vehicles::franchisee()->pluck('vehicles_number', 'id');
        return view('admin.booking.show', ['model' => $model, 'drivers' => $drivers, 'vehicles' => $vehicles]);
    }

    public function edit($id) {
        //$client = Client::franchisee()->get();
        //$client = clientName($client);
        $client = [];

        $model = Booking::with(['client.WhoPayBill', 'pickupLocation', 'dropLocation', 'invoice'])->findOrFail($id);


        $client[$model->client->WhoPayBill->id] = $model->client->WhoPayBill->name;

        if ($model->late_booking_reason != "") {
            $model->late_booking = 1;
        }

        $franchiseeid = $model->franchisees_id;

        $franchiseeModel = \App\Franchisee::find($franchiseeid);


        //$drivers = \App\User::franchisee()->where('user_type', 3)->pluck('name', 'id');
        //$allcompanions = \App\User::franchisee()->where('user_type', 5)->pluck('name', 'id');
        //$allcompanions = \App\User::franchisee()->where('user_type', 5)->pluck('name', 'id')->toArray();
        $companionsdrivers = \App\User::franchisee()->whereIn('user_type', [3, 5])->pluck('name', 'id')->toArray();

        //pr($allcompanions);
        //pr($alldrivers);
        //$companionsdrivers = array_merge($allcompanions, $alldrivers);
        //pr($companionsdrivers);
        //die();

        $driversModel = \App\User::franchisee()->with('driverVehicles.vehicle')->where('user_type', 3)->get();

        $drivers = array();
        foreach ($driversModel as $dri) {
            if (isset($dri->driverVehicles->vehicle->wheelchair_access)) {
                $driverData = [
                    'address' => $dri->address,
                    'driver' => $dri->id,
                    'id' => $dri->driverVehicles->vehicle->id,
                    'name' => $dri->name . "(" . $dri->driverVehicles->vehicle->vehicles_number . ")"
                ];
            } else {
                $driverData = [
                    'address' => $dri->address,
                    'driver' => $dri->id,
                    'id' => 0,
                    'name' => $dri->name
                ];
            }
            $drivers[] = $driverData;
        }

        $vehicles = \App\Vehicles::franchisee()->pluck('vehicles_number', 'id');




        //$vehicles = \App\Vehicles::franchisee()->pluck('vehicles_number', 'id');
        return view('admin.booking.edit', compact('model', 'allprice', 'alluser', 'client', 'drivers', 'vehicles', 'franchiseeModel', 'allcompanions', 'companionsdrivers'));
    }

    public function update(BookingUpdate $request, $id) {
        try {
            DB::beginTransaction();
            $data = $request->all();

            //pr($data);
            //die();
            $pickupLocation = array_filter($request->pickup_location);
            $travelTime = $request->travel_time;
            $pickupDistance = $request->pickup_distance;

            $model = Booking::find($id);
            $input = $request->all();
            $input['vat_registered'] = vatRegistrationCheck($request->booking_time);

            if($input['booking_time']){
                $input['booking_time'] = calculateMySqlDate($input['booking_time']);
            }
            
            if($input['created_at']){
                $input['created_at'] = calculateMySqlDate($input['created_at']);
            }

            $model->update($input);
            if ($request->late_booking) {
                $model->created_at = new Carbon($request->created_at);
                $model->late_booking_reason = $request->late_booking_reason;
            } else {
                $model->late_booking_reason = "";
            }
            $model->save();

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
                $model->invoice_price = $request->custom_price ? $request->custom_price : $pricingDetails['total_price'];





                \App\BookingVehicle::where('booking_id', $model->id)->delete();
                $bookingVehicle = new \App\BookingVehicle();
                $bookingVehicle->booking_id = $model->id;
                $bookingVehicle->status = 1;
                $bookingVehicle->vehicle_id = $request->vehicle_id;
                $bookingVehicle->user_id = $request->driver_id;
                $bookingVehicle->save();
                $model->driver_id = $request->driver_id;
                $model->save();

                $this->setBookingDetails($pricingDetails, $model);
                //$this->miscellaneousCharge($request, $model->id);
                DB::commit();
                $request->session()->flash('success', 'Booking has been successfully added!');
                return redirect(route('booking.index'));
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

    
    
    
    public function cancel($id) {
        try {
            $model = Booking::withTrashed()->findOrFail($id);
            $model->trip_status = 4;
            $model->save();
            \session()->flash('success', 'Booking has been successfully canceled!');
        } catch (Exception $e) {

            \session()->flash('error', 'Oops something went wrong try again !');
        }
        echo true;
    }
    public function destroy($id) {
        try {
            $model = Booking::withTrashed()->findOrFail($id);

            if ($model->trashed()) {
                $model->restore();
                \session()->flash('success', 'Booking has been successfully Restored!');
            } else {
                $model->delete();

                \session()->flash('success', 'Booking has been successfully Deleted!');
            }
        } catch (Exception $e) {

            \session()->flash('error', 'Oops something went wrong try again !');
        }
        // return redirect()->back();

        echo true;
    }

    public function autoComplete(Request $request) {
        $query = $request->get('term', '');
        $clients = Client::with('WhoPayBill')
                ->franchisee()
                ->Where(function($q) use($query){
                    $q->where('firstname', 'LIKE', '%' . $query . '%')->orWhere('surname', 'LIKE', '%' . $query . '%');
                })->get();

        //pr($clients->toarray());exit;

        $data = array();
        foreach ($clients as $client) {
            $payBill = false;
            if (isset($client->WhoPayBill->id)) {
                $payBill = [
                    'id' => $client->WhoPayBill->id,
                    'name' => $client->WhoPayBill->name . " - " . $client->WhoPayBill->phone,
                ];
            }
            $data[] = array(
                'id' => $client->id,
                'value' => $client->name . " - " . $client->phone,
                'firstname' => $client->firstname,
                'surname' => $client->surname,
                'email' => $client->email,
                'phone_number' => $client->phone,
                'house_number' => $client->house_number,
                'address' => $client->address,
                'home_number' => $client->home_number,
                'client_health_notes' => $client->client_health_notes,
                'pay_bill_by' => $payBill,
                "mobility"  =>mobilityLevel($client->mobility_level)
            );
        }
        if (count($data))
            return $data;
        else
            return ['value' => 'No Result Found', 'id' => ''];
    }

    public function bookinPriceDetails(Request $request) {
        $message = [
            'pickup_location.1.*' => 'The pickup 1 field is required',
            'pickup_location.2.*' => 'The pickup 2 field is required',
            'pickup_location.3.*' => 'The pickup 3 field is required',
            'pickup_distance.1.*' => 'This field is required',
            'pickup_distance.2.*' => 'This field is required',
            'pickup_distance.3.*' => 'This field is required',
            'companion_id.*' => 'This field is required',
            "created_at.*" => 'Please provide Booking Date',
            "late_booking_reason.*" => 'Reason for late booking',
        ];

        if ($request->franchisees_id) {
            $rule = [];
            $rule2 = [];

            $rule1 = [
                //"name" => 'required',
                //"email" => 'nullable|email',
                //"phone_number" => 'nullable|numeric',
                //"booking_time" => 'required|date_format:Y-m-d H:i|after_or_equal:today',
                //"booking_time" => 'required|date_format:Y-m-d H:i',
                "booking_time" => 'required|date_format:m/d/Y H:i',
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
                "driver_id" => 'required_if:booking_or_quotes,1',
                "vehicle_id" => 'required_if:booking_or_quotes,1',
                "companion_id" => 'required_if:companion_driver_companion,2',
                //"created_at" => 'required_if:late_booking,1',
                //"late_booking_reason" => 'required_if:late_booking,1',
            ];

            if($request->booking_time){
                if(date("Y-m-d") > date("Y-m-d", strtotime($request->booking_time)) ){
                    $rule2 = [
                        "created_at" => 'required',
                        "late_booking_reason" => 'required'
                    ];    
                }
            }

            $rule = array_merge($rule1,$rule2);
        } else {
            $rule = [];
            $rule2 = [];

            $rule1 = [
                "paying_bill" => 'required',
                //"name" => 'required',
                "email" => 'nullable|email',
                "phone_number" => 'nullable',
                // "address" => 'required',
                // "house_number" => 'required',
                //"booking_time" => 'required|date_format:Y-m-d H:i|after_or_equal:today',
                //"booking_time" => 'required|date_format:Y-m-d H:i',
                "booking_time" => 'required|date_format:m/d/Y H:i',
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
                "driver_id" => 'required_if:booking_or_quotes,1',
                "vehicle_id" => 'required_if:booking_or_quotes,1',
                "companion_id" => 'required_if:companion_driver_companion,2',
                //"created_at" => 'required_if:late_booking,1',                          
                //"late_booking_reason" => 'required_if:late_booking,1',
            ];

            if($request->booking_time){
                if(date("Y-m-d") > date("Y-m-d", strtotime($request->booking_time)) ){
                    $rule2 = [
                        "created_at" => 'required',
                        "late_booking_reason" => 'required'
                    ];    
                }
            }

            $rule = array_merge($rule1,$rule2);
        }

        //pr($rule); die;

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

        $vat = vatRegistrationCheck($request->booking_time);

        $journey_type = $request->journey_type;
        $pricingDetails = $this->getPriceDetails($request, $franchiseeid);

        if ($pricingDetails) {
            $html = view('admin.booking.pricedetails', compact('pricingDetails', 'journey_type', 'vat'))->render();
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
                'companion_cost' => 0
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
                'companion_cost' => 0
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

        $companionRequired = $request->companion_driver_companion;

        if ($companionRequired == 2) {
            $allData['outward']['companion_cost'] = $request->companion_time;
            if ($request->journey_type == 2) {
                $allData['return']['companion_cost'] = $request->companion_time;
            }
        }

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

            //if(vatRegistrationCheck($request->booking_time)){
            $paid_mileage_cost = $franchiseesPrice->paid_mileage;
            $base_driving_cost = $franchiseesPrice->base_driving_cost;
            $waiting_time_cost = $franchiseesPrice->waiting_time_cost;
            $companionship_cost = $franchiseesPrice->companionship_cost;
            $comfort_cost = $franchiseesPrice->comfort_cost;
//            }else{
//                $paid_mileage_cost  = vatCalculation($franchiseesPrice->paid_mileage, env('VAT_AMOUNT'),true);
//                $base_driving_cost  = vatCalculation($franchiseesPrice->base_driving_cost, env('VAT_AMOUNT'),true);
//                $waiting_time_cost  = vatCalculation($franchiseesPrice->waiting_time_cost, env('VAT_AMOUNT'),true);
//                $companionship_cost = vatCalculation($franchiseesPrice->companionship_cost, env('VAT_AMOUNT'),true);
//                $comfort_cost       = vatCalculation($franchiseesPrice->comfort_cost, env('VAT_AMOUNT'),true);
//            }

            $driver_cost = $franchiseesPrice->driver_cost;
            $vehicle_cost = $franchiseesPrice->vehicle_cost;
            $companion_cost = $franchiseesPrice->companion_cost;

            $pickupTimeCost = round(($pickupTime * $base_driving_cost), 2);

            $base_returnCost = round(($base_return * $paid_mileage_cost), 2);

            //
            $driverCharge = round(($totalTime * ($driver_cost / 60)), 2);
            $vehicleCharge = round(($vehicle_cost * $totalDistance), 2);

            $outward_driver += $allData['outward']['waiting'];
            $outward_driver += $allData['outward']['companion'];
            $outward_driver += $baseReturnTime;
            $outward_driver += ( 30 * $allData['outward']['comfort_break']);
            $outward_companion = $outward_driver;

            $return_driver += $allData['return']['waiting'];
            $return_driver += $allData['return']['companion'];
            $return_driver += $baseReturnRetuenTime;
            $return_driver += ( 30 * $allData['return']['comfort_break']);
            $return_companion = $return_driver;

            $outward_driverCost = round(($outward_driver * ($driver_cost / 60)), 2);
            $return_driverCost = round(($return_driver * ($driver_cost / 60)), 2);

            $outward_vehicleCost = round(($vehicle_cost * $outward_vehicle), 2);
            $return_vehicleCost = round(($vehicle_cost * $return_vehicle), 2);

            $outward_companionCost = round(($outward_companion * ($companion_cost / 60)), 2);
            $return_companionCost = round(($return_companion * ($companion_cost / 60)), 2);

            $expensesData = array(
                "outward" => array(
                    "outward_vehicle" => $outward_vehicleCost,
                    "driver_cost" => $outward_driverCost,
                    "companion_cost" => $companionRequired == 2 ? $outward_companionCost : 0
                ),
                'return' => array(
                    "outward_vehicle" => $return_vehicleCost,
                    "driver_cost" => $return_driverCost,
                    "companion_cost" => $companionRequired == 2 ? $return_companionCost : 0
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

            $companionshipCostPerHour = $companionship_cost * 4;

            $allData['outward']['waiting'] = waitingPrice($allData['outward']['waiting'], $waiting_time_cost);
            $allData['outward']['companion'] = companionPrice($allData['outward']['companion'], $companionship_cost);
            $allData['outward']['comfort_break'] = $comfort_cost * $allData['outward']['comfort_break'];
            $allData['outward']['destination'] = round(($allData['outward']['destination'] * $base_driving_cost), 2);
            $allData['outward']['pick_up'] = round(($allData['outward']['pick_up'] * $base_driving_cost), 2);
            $allData['outward']['paid_mileage'] = round(($allData['outward']['paid_mileage'] * $paid_mileage_cost), 2);
            $allData['outward']['pick_up_cost'] = $allData['outward']['pick_up'] + $allData['outward']['paid_mileage'];
            $allData['outward']['drop_off_to_base'] = round(($allData['outward']['drop_off_to_base'] * $paid_mileage_cost), 2);

            $allData['outward']['companion_cost'] = round(($allData['outward']['companion_cost'] * ($companionshipCostPerHour / 60)), 2);

            unset($allData['outward']['pick_up']);
            unset($allData['outward']['paid_mileage']);

            $allData['return']['waiting'] = waitingPrice($allData['return']['waiting'], $waiting_time_cost);
            $allData['return']['companion'] = companionPrice($allData['return']['companion'], $companionship_cost);
            $allData['return']['comfort_break'] = $comfort_cost * $allData['return']['comfort_break'];
            $allData['return']['destination'] = round(($allData['return']['destination'] * $base_driving_cost), 2);
            $allData['return']['pick_up'] = round(($allData['return']['pick_up'] * $base_driving_cost), 2);
            $allData['return']['paid_mileage'] = round(($allData['return']['paid_mileage'] * $paid_mileage_cost), 2);
            $allData['return']['pick_up_cost'] = $allData['return']['pick_up'] + $allData['return']['paid_mileage'];
            $allData['return']['drop_off_to_base'] = round(($allData['return']['drop_off_to_base'] * $paid_mileage_cost), 2);
            $allData['return']['companion_cost'] = round(($allData['return']['companion_cost'] * ($companionshipCostPerHour / 60)), 2);
            unset($allData['return']['pick_up']);
            unset($allData['return']['paid_mileage']);


            $quoteAmount = $misc_total + $paidMileageCost + $baseDrivingCost + $waitingCost + $waitingCostR + $companionCost + $companionCostR + $comfortCost + $pickupTimeCost + $base_returnCost;

            $customPrice = 0;
            if ($request->custom_price) {

                $customPrice = $request->custom_price;
            }

            $data = [
                'companionRequired' => $companionRequired,
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
                'custom_tripProfit' => tripProfit($customPrice, ($driverCharge + $vehicleCharge)),
                //'advance_payment_amount' => $request->advance_payment_amount,
            ];
            return $data;
        } else {
            return false;
        }
    }

    public function vehicleAllocation(Request $request, $id) {
        $validatedData = $request->validate([
            'vehicle_id' => 'required',
            'driver_id' => 'required',
        ]);

        $booking = Booking::findOrFail($id);
        DB::beginTransaction();
        try {
            \App\BookingVehicle::where('booking_id', $booking->id)->delete();
            //$driversVehicles = \App\DriversVehicles::Franchisee()->where('vehicle_id', $request->vehicle_id)->first();
            $bookingVehicle = new \App\BookingVehicle();
            $bookingVehicle->booking_id = $booking->id;
            $bookingVehicle->vehicle_id = $request->vehicle_id;
            $bookingVehicle->user_id = $request->driver_id;
            $bookingVehicle->save();
            $booking->driver_id = $request->driver_id;
            $booking->save();
            $request->session()->flash('success', 'Success !');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
        return redirect()->back()->withInput();
    }

    public function getRepet(Request $request, $id) {
        $model = Booking::findOrFail($id);
        return view('admin.booking.repet', ['model' => $model]);
    }

    public function postRepetBooking(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            //"booking_date" => 'required|date_format:Y-m-d H:i|after_or_equal:today',
            "booking_date" => 'required|date_format:m/d/Y H:i|after_or_equal:today',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 0, 'errors' => $validationError]);
        } else {
            DB::beginTransaction();
            try {
                $model = Booking::withTrashed()->findOrFail($id);

                $newModel = $model->replicate();
                $newModel->booking_time = $request->booking_date;
                $newModel->trip_status = 0;
                $newModel->payment_status = 0;
                //$newModel->repeat_type = $request->repeat_type;
                $newModel->save();
                $newModel->order_id = getOrderNo($newModel->id);
                $locationModels = PickupLocation::where('booking_id', $model->id)->get();
                
                foreach ($locationModels as $location) {
                    $pickup = new PickupLocation($location->toArray());
                    $pickup->booking_id = $newModel->id;
                    $pickup->save();
                }

                $newModel->save();

                $bookingDetails = BookingDetails::where('booking_id', $model->id)->first();
                $bookingDetails = $bookingDetails->replicate();
                $bookingDetails->booking_id = $newModel->id;
                $bookingDetails->save();

                DB::commit();

                return response()->json(['response' => 1, 'message' => "Success Order No : " . $newModel->order_id]);
            } catch (Exception $e) {
                
                DB::rollBack();

                return response()->json(['response' => 2, 'message' => "something went wrong "]);
            }
        }
    }

    public function changePaymentStatus(Request $request, $id) {
        
        DB::beginTransaction();
        
        try {

            \App\BookingInvoiceOverride::where('id', $id)
                    ->update(['payment_status' => 1, 'payment_date' => \Carbon\Carbon::now()]);

            Booking::where('group_invoice_id', $id)->update(['payment_status' => 1, 'payment_date' => \Carbon\Carbon::now()]);

            DB::commit();
            \Session::flash('success', 'Payment has been successfully Mark as paid!');

            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 2, 'message' => "Error"]);
        }
    }

    public function updateBooking(Request $request) {
        
        DB::beginTransaction();

        try {
            $model = Booking::has('driver')->find($request->bookingId);
            if ($model) {
                $driverModel = User::find($request->resourceId);
                if ($driverModel->franchisees_id == $model->franchisees_id) {
                    $model->driver_id = $request->resourceId;
                    if($request->type==2){
                        if(strtotime( $request->booking_time) > strtotime($model->booking_time)){
                            $model->journey_return_date = $request->booking_time;
                        }else{
                            return response()->json(['status' => 2, 'message' => "Return journey should be after journey date"]);
                        }
                    }else{
                        $model->booking_time = $request->booking_time;
                    }
                    $model->save();

                    $vehicleModel = \App\BookingVehicle::find($model->driver->id);

                    $newVehicleModel = $vehicleModel->replicate();

                    \App\BookingVehicle::where('booking_id', $model->id)->delete();

                    $newVehicleModel->user_id = $request->resourceId;
                    $newVehicleModel->save();

                    DB::commit();
                    return response()->json(['status' => 1, 'message' => "Success"]);
                } else {
                    DB::rollBack();
                    return response()->json(['status' => 2, 'message' => "Driver from different franchisees"]);
                }
            }else{
                    return response()->json(['status' => 2, 'message' => "Error"]);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 2, 'message' => "Error"]);
        }
    }

    function markcomplete(Request $request) {
        $this->validate($request, [
            'booking_ids' => 'required',
        ]);
        $booking_ids = $request->booking_ids;
        $model = Booking::whereIn('id', $booking_ids)->max('booking_time');
        $booking_time = strtotime($model);
        $now = \Carbon\Carbon::now()->timestamp;

        if ($now > $booking_time) {

            if ($request->get('complete')) {

                Booking::whereIn('id', $booking_ids)->update(['trip_status' => 2]);
                $request->session()->flash('success', 'Booking has been successfully mark as complete!');
                return redirect(route('booking.index'));
            }
        } else {
            $request->session()->flash('error', 'Future Bookings cannot be marked as complete.');
            return redirect(route('booking.index'));
        }
    }

    public function setBookingDetails($data, $model) {
        BookingDetails::where('booking_id', $model->id)->delete();
        $bookingDetails = new BookingDetails($data);
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

        $bookingDetails->outward_companion_cost = $data['data']['outward']['companion_cost'];
        $bookingDetails->return_companion_cost = $data['data']['return']['companion_cost'];


        $bookingDetails->outward_vehicle_cost = $data['expensesData']['outward']['outward_vehicle'];
        $bookingDetails->outward_driver_cost = $data['expensesData']['outward']['driver_cost'];

        $bookingDetails->return_vehicle_cost = $data['expensesData']['return']['outward_vehicle'];
        $bookingDetails->return_driver_cost = $data['expensesData']['return']['driver_cost'];


        $bookingDetails->outward_expenses_companion_cost = $data['expensesData']['outward']['companion_cost'];
        $bookingDetails->return_expenses_companion_cost = $data['expensesData']['return']['companion_cost'];


        $bookingDetails->booking_id = $model->id;
        $bookingDetails->save();
    }

    public function miscellaneousCharge($request, $booking_id) {
        InvoiceDetails::where('booking_id', $booking_id)->delete();
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

    function getClient(Request $request) {

        $client_id = $request->client_id;

        if ($client_id) {

            $client = Client::franchisee()->find($client_id);
            $model = Client::where('payment_clientid', $client->id)->get();
            $model = clientName($model);


            $html = view('admin.booking.client_listing', ['model' => $model])->render();

            return response()->json([
                        'status' => 1,
                        "html" => $html
            ]);
        }
    }
}
