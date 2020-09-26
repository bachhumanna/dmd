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
use App\InvoiceDetails;

class QuotesController extends Controller {

    public function __construct() {
        $this->middleware('bookingAllow', ['only' => ['create', 'store']]);
    }

    public function index(Request $request) {
        $query = Booking::Franchisee()->where('booking_or_quotes', 2)->sortable();

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


        $query->with('pickupLocation', 'dropLocation', 'driver');
        if (!getActiveFranchisee()) {
            $query->with('franchisees');
        }
        //$query->whereNull('trip_status');
        $query->where('trip_status', "!=", 2);
        $models = $query->latest()->paginate(25);
        return view('admin.quotes.index', compact('models'));
    }

    public function show($id) {

        $model = Booking::with('driver.user', 'client')->findOrFail($id);

        if ($model->AllowDriverChage) {
            $drivers = getDriverForBooking($model);
        } else {
            $drivers = false;
        }



        $drivers = getDriverForBooking($model);
        $vehicles = \App\Vehicles::franchisee()->pluck('vehicles_number', 'id');
        return view('admin.quotes.show', ['model' => $model, 'drivers' => $drivers, 'vehicles' => $vehicles]);
    }

    function approveQuote($id) {

        /* $model = \App\Booking::findOrFail($id);
          $model->update(array('booking_or_quotes' => 1, 'quote_previous_status' => $model->booking_or_quotes));
          \session()->flash('success', 'Approved!');
          return redirect()->back();
         *
         */

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


        echo $data = view('admin.quotes.approve', ['vehicles' => $vehicles, 'drivers' => $drivers, 'booking_id' => $id])->render();


        //  $counter = $counter + 1;
        // return response()->json(['model' => $data, 'counter' => $counter]);


        /*
         *
         *
         *  $model->total_distance = $pricingDetails['total_distance'];
          $model->total_duration = $pricingDetails['total_duration'];
          $model->total_price = $pricingDetails['total_price'];
          $model->order_id = getOrderNo($model->id);
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

         */
    }

    function submitApproveQuote(Request $request) {





        $validator = Validator::make($request->all(), [
                    'driver_id' => 'required',
                    'vehicle_id' => 'required',
        ]);

        if ($validator->fails()) {

            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 0, 'errors' => $validationError, 'msg' => 'Validation Error']);
        }


        $id = $request->booking_id;

        \DB::beginTransaction();


        try {

            $model = \App\Booking::findOrFail($id);

            $model->update(['driver_id' => $request->driver_id, 'booking_or_quotes' => 1]);


            $bookingVehicle = new \App\BookingVehicle();
            $bookingVehicle->status = 1;
            $bookingVehicle->booking_id = $id;
            $bookingVehicle->vehicle_id = $request->vehicle_id;
            $bookingVehicle->user_id = $request->driver_id;
            $bookingVehicle->save();

            \DB::commit();
            \session()->flash('success', 'Approved!');
            return response()->json(['response' => 1, 'errors' => null, 'msg' => 'Approved']);


        } catch (\Exception $e) {

            \DB::rollback();
            \session()->flash('error', 'Unapproved!');
            return response()->json(['response' => 1, 'errors' => null, 'msg' => 'Unapproved']);
        }
    }

}
