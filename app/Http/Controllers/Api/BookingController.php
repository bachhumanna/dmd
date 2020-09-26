<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use JWTAuth;
use App\BookingVehicle;

class BookingController extends Controller {

    public function bookingList(Request $request) {
        $user = JWTAuth::toUser($request->token);
        $models = Booking::with('pickupLocation')->with('client')->whereHas('driver', function($q) use ($user) {
                    $q->where('user_id', $user->id);
                    $q->whereNull('status');
                })->paginate(30);


        if ($models->count()) {
            $booking = array();
            foreach ($models as $model) {

                $location = array();
                foreach ($model->pickupLocation as $pickupLocation) {
                    $location[] = array(
                        'location' => $pickupLocation->location_name
                    );
                }


                $data = array(
                    'id' => $model->id,
                    'type' => $model->type,
                    'name' => $model->client->name,
                    'phone_number' => $model->client->phone,
                    'booking_date' => date('d M y', strtotime($model->booking_time)),
                    'booking_time' => date('g:i A', strtotime($model->booking_time)),
                    'base_location' => $model->base_location,
                    'drop_location' => $model->drop_location,
                    'outward_companion' => $model->outward_companion,
                    'outward_waiting' => $model->outward_waiting,
                    'return_companion' => $model->outward_companion,
                    'return_waiting' => $model->outward_companion,
                    'total_distance' => $model->total_distance,
                    'total_duration' => $model->total_duration,
                    'trip_cost' => $model->price,
                    'pickup_location' => $location
                );



                $booking[] = $data;
            }

            $finalData = array(
                'currency_symbols' => env('CURRENCY_SYMBOL', "fa-gbp"),
                'total' => $models->count(),
                'current_page' => $models->currentPage(),
                'has_more' => $models->hasMorePages(),
                'per_page' => $models->perPage(),
                'total' => $models->count(),
                'data' => $booking
            );
            return response()->json(['response' => 1, 'data' => $finalData, 'message' => '']);
        } else {
            return response()->json(['response' => 0, 'message' => 'No data Found!']);
        }
    }

    public function details(Request $request) {
        $validator = Validator::make($request->all(), ['booking_id' => 'required']);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 2, 'errors' => $validationError, 'message' => 'Validation Error']);
        } else {
            $user = JWTAuth::toUser($request->token);
            $bookingId = $request->booking_id;
            $model = Booking::with('pickupLocation')->whereHas('driver', function($q) use ($user) {
                        $q->where('user_id', $user->id);
                    })->find($bookingId);
            if ($model) {
                $location = array();
                foreach ($model->pickupLocation as $pickupLocation) {
                    $location[] = array(
                        'location' => $pickupLocation->location_name
                    );
                }


                $data = array(
                    'id' => $model->id,
                    'type' => $model->type,
                    'name' => $model->client->name,
                    'phone_number' => $model->client->phone,
                    'booking_date' => date('d M y', strtotime($model->booking_time)),
                    'booking_time' => date('g:i A', strtotime($model->booking_time)),
                    'base_location' => $model->base_location,
                    'drop_location' => $model->drop_location,
                    'outward_companion' => $model->outward_companion,
                    'outward_waiting' => $model->outward_waiting,
                    'return_companion' => $model->outward_companion,
                    'return_waiting' => $model->outward_companion,
                    'total_distance' => $model->total_distance,
                    'total_duration' => $model->total_duration,
                    'trip_cost' => $model->price,
                    'pickup_location' => $location
                );



                $booking[] = $data;
                return response()->json(['response' => 1, 'currency_symbols' => env('CURRENCY_SYMBOL', "fa-gbp"), 'data' => $data, 'message' => 'Success']);
            } else {
                return response()->json(['response' => 0, 'message' => 'Something went wrong please try again letter!']);
            }
        }
    }

    public function acceptOrReject(Request $request) {
        $validator = Validator::make($request->all(), ['booking_id' => 'required', 'status' => 'required|in:1,2']);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 2, 'errors' => $validationError, 'message' => 'Validation Error']);
        } else {
            $user = JWTAuth::toUser($request->token);
            $model = BookingVehicle::where('booking_id', $request->booking_id)->where('user_id', $user->id)->first();
            if ($model) {
                $model->status = $request->status;
                $model->save();
                return response()->json(['response' => 1, 'message' => 'Success']);
            } else {
                return response()->json(['response' => 0, 'message' => 'Something went wrong please try again letter!']);
            }
        }
    }

    public function myBooking(Request $request) {
        $user = JWTAuth::toUser($request->token);
        $models = Booking::with('pickupLocation')
                ->with('client')
                ->whereHas('driver', function($q) use ($user) {
                    $q->where('user_id', $user->id);
                    $q->where('status', 1);
                })                
                ->where(function ($q){ 
                    $q->whereNull('trip_status')
                    ->OrWhere("trip_status",1);
                    
                })
                
                ->orderBy('booking_time')
                ->paginate(30);
        if ($models->count()) {
            $booking = array();
            foreach ($models as $model) {
                $location = array();
                foreach ($model->pickupLocation as $pickupLocation) {
                    $location[] = array(
                        'location' => $pickupLocation->location_name
                    );
                }
                $data = array(
                    'id' => $model->id,
                    'type' => $model->type,
                    'name' => $model->client->name,
                    'trip_status' => $model->trip_status,
                    'phone_number' => $model->client->phone,
                    'booking_date' => date('d M y', strtotime($model->booking_time)),
                    'booking_time' => date('g:i A', strtotime($model->booking_time)),
                    'base_location' => $model->base_location,
                    'drop_location' => $model->drop_location,
                    'outward_companion' => $model->outward_companion,
                    'outward_waiting' => $model->outward_waiting,
                    'return_companion' => $model->outward_companion,
                    'return_waiting' => $model->outward_companion,
                    'total_distance' => $model->total_distance,
                    'total_duration' => $model->total_duration,
                    'trip_cost' => $model->price,
                    'pickup_location' => $location
                );
                $booking[] = $data;
            }
            $finalData = array(
                'currency_symbols' => env('CURRENCY_SYMBOL', "fa-gbp"),
                'total' => $models->count(),
                'current_page' => $models->currentPage(),
                'has_more' => $models->hasMorePages(),
                'per_page' => $models->perPage(),
                'total' => $models->count(),
                'data' => $booking
            );
            return response()->json(['response' => 1, 'data' => $finalData, 'message' => '']);
        } else {
            return response()->json(['response' => 0, 'message' => 'No data Found!']);
        }
    }

    public function tripStart(Request $request) {
        $validator = Validator::make($request->all(), ['booking_id' => 'required|exists:booking,id', 'status' => 'required|in:1,2']);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 2, 'errors' => $validationError, 'message' => 'Validation Error']);
        } else {
            $user = JWTAuth::toUser($request->token);
            $model = Booking::whereHas('driver', function($q) use ($user) {
                        $q->where('user_id', $user->id);
                        $q->where('status', 1);
                    })->find($request->booking_id);
            if ($model) {
                if ($model->trip_status == 2) {
                    return response()->json(['response' => 0, 'message' => 'You already mark as complete']);
                } else {
                    if($request->status == 1){
                        $now = \Carbon\Carbon::now()->subHour(15);
//                        echo $model->booking_time;
//                        pr($now);
                        //if($now > $model->booking_time )
                        if(1){
                            
                            $previous = Booking::whereHas('driver', function($q) use ($user) {
                                        $q->where('user_id', $user->id);
                                        $q->where('status', 1);
                                    })->where('trip_status',1)->where('id',"!=",$model->id)->first();
                            if($previous){
                                return response()->json(['response' => 0, 'message' => 'You already have a open booking']);
                            }else{
                                $model->trip_status = 1;
                                $model->save();
                                return response()->json(['response' => 1, 'message' => 'Successfully Start Trip']);
                            }
                            
                        }else{
                            
                            return response()->json(['response' => 0, 'message' => 'This is not good time to start this trip']);
                            
                        }
                    }else if($request->status == 2){
                        $model->trip_status = 2;
                        $model->save();
                        return response()->json(['response' => 1, 'message' => 'Successfully Complete']);
                    }else{
                        return response()->json(['response' => 0, 'message' => 'Unknown Status']);
                    }
                }
            } else {
                return response()->json(['response' => 0, 'message' => 'Something went wrong please try again letter!']);
            }
        }
    }

}
