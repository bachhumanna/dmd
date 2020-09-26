<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\DrivingDetails;
use Auth;
use JWTAuth;
use DB;
use Mail;
use File;
use App\DriverAttendance;
use App\Booking;
use App\DriversVehicles;
use App\Vehicles;
use Carbon\Carbon;
use Image;

class DriverController extends Controller {

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'password' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 2, 'errors' => $validationError, 'message' => 'Validation Error']);
        } else {
            $token = null;
            try {
                $email = $request->email;
                $password = $request->password;
                if ($email && $password) {
                    $credentials = $request->only('email', 'password');
                    $authCheck = Auth::attempt(['email' => $email, 'password' => $password, 'user_type' => 3]);
                    if ($authCheck) {
                        $users = User::where('email', $email)->first();
                        if ($users->status == 1) {
                            if ($token = JWTAuth::attempt($credentials)) {

                                $today = date("Y-m-d");
                                $model = DriverAttendance::where('attendance_date', $today)->where('user_id', $users->id)->whereNull('out_time')->first();
                                return response()->json(['response' => 1,
                                            'result' => [
                                                'token' => $token,
                                                'name' => $users->name,
                                                'surname' => $users->surname,
                                                'email' => $users->email,
                                                'phone' => $users->phone,
                                                'image' => $users->image,
                                                'islogin' => $model ? 1 : 0
                                            ]
                                ]);
                            } else {
                                return response()->json(['response' => 0, 'message' => 'Failed to create token']);
                            }
                        } else {
                            return response()->json(['response' => 0, 'message' => 'Users not active']);
                        }
                    } else {
                        return response()->json(['response' => 0, 'message' => 'Invalid password']);
                    }
                } else {
                    return response()->json(['response' => 0, 'message' => 'Provide your Email and password']);
                }
            } catch (JWTAuthException $e) {
                return response()->json(['response' => 0, 'message' => $e->getMessage()]);
            }
        }
    }

    public function account(Request $request) {
        $user = JWTAuth::toUser($request->token);
        $model = User::with("userDriverdetails")->find($user->id);
        if ($model) {
            $data = array(
                'name' => $model->name,
                'surname' => $model->surname,
                'email' => $model->email,
                'phone' => $model->phone,
                'street' => $model->street,
                'locality' => $model->locality,
                'town' => $model->town,
                'postcode' => $model->postcode,
                'dob' => $model->dob,
                'image' => $model->image,
                'licence_no' => $model->userDriverdetails->licence_no,
                'licence_expiry_date' => $model->userDriverdetails->licence_expiry_date,
            );


            return response()->json(['response' => 1, 'data' => $data]);
        } else {
            return response()->json(['response' => 0, 'message' => "User not found"]);
        }
    }

    public function changePassword(Request $request) {
        $user = JWTAuth::toUser($request->token);
        if ($user) {
            $validator = Validator::make($request->all(), [
                        'password' => 'required',
                        'password_confirmation' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors()->toArray();
                $validationError = validationError($errors);
                return response()->json(['response' => 2, 'errors' => $validationError, 'message' => 'Validation Error']);
            } else {
                $otpModel = User::where('id', $user->id)->update(['password' => bcrypt($request->password)]);
                if ($otpModel) {
                    return response()->json(['response' => 1, 'message' => 'Password has been update successfully !']);
                } else {
                    return response()->json(['response' => 0, 'message' => 'Something wentt wrong']);
                }
            }
        }
    }

    public function profileEdit(Request $request) {

        $data = $request->all();
        DB::beginTransaction();
        try {
            $user = JWTAuth::toUser($request->token);

            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'surname' => 'required',
                        'phone' => 'required',
                        'postcode' => 'required',
                        'locality' => 'required',
                        'street' => 'required',
                        'town' => 'required',
                        'licence_expiry_date' => 'required',
                            //'driver_experience' => 'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors()->toArray();
                $validationError = validationError($errors);
                return response()->json(['response' => 2, 'errors' => $validationError, 'message' => 'Validation Error']);
            } else {
                $id = $user->id;

                $data = $request->all();
                //pr($data);

                if ($request->profile_pic) {
                    $profileimage = $request->profile_pic;
                    $profileimage = str_replace('data:image/jpeg;base64,', '', $profileimage);
                    $profileimage = str_replace(' ', '+', $profileimage);
                    $profileimageName = time() . '.jpeg';
                    $imagePath = public_path('/images/profilepic/' . $profileimageName);


                    $image = Image::make(base64_decode($profileimage));
                    $image->save($imagePath);


                    $data['profile_pic'] = $profileimageName;
                }
                //pr($data);
                unset($data['licence_expiry_date']);
                User::where('id', $user->id)->update($data);
                $user == User::find($user->id);
                //$user->update($data);                
                $inputmodelAttribute = array();
                $inputmodelAttribute['licence_expiry_date'] = $request->licence_expiry_date;
                //$inputmodelAttribute['driver_experience'] = $request->driver_experience;

                DrivingDetails::where("user_id", $id)->update($inputmodelAttribute);
                DB::commit();
                return response()->json(['response' => 1, 'users' => [
                                'name' => $user->name,
                                'surname' => $user->surname,
                                'email' => $user->email,
                                'phone' => $user->phone,
                                'image' => $user->image,
                            ]
                            , 'message' => 'Profile has been  successfully updated!']);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['response' => 0, 'message' => 'Something went wrong']);
        }
    }

    public function forgotPassword(Request $request) {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 2, 'error' => $validator->errors(), 'message' => 'Validation Error'], 401);
        } else {
            $email = $request->email;
            $user = User::where('email', $email)->first();
            if (!$user) {
                return response()->json(['response' => 0, 'message' => 'Not a valid Email']);
            } else {
                Mail::send('mail', ['data' => $user], function ($m) use($user) {
                    $m->from(env('APP_EMIL'), env('APP_NAME'));
                    $m->to($user->email, $user->name);
                    $m->subject('Reset Passwprd');
                });
                return response()->json(['response' => 1, 'message' => 'Email Send Successfully']);
            }
        }
    }

    public function logout(Request $request) {
        $user = JWTAuth::toUser($request->token);
        DB::table('users')->where('id', $user->id)->update(['device_token' => 0]);
        //return $this->attendance($user);
        return response()->json(['response' => 1, 'message' => 'Successfully logged out']);
    }

    public function driverAttendance(Request $request) {
        $user = JWTAuth::toUser($request->token);
        return $this->attendance($user);
    }

    public function attendanceStatus(Request $request) {
        $today = date("Y-m-d");
        $user = JWTAuth::toUser($request->token);
        $model = DriverAttendance::where('attendance_date', $today)->where('user_id', $user->id)->whereNull('out_time')->first();
        if ($model) {
            return response()->json(['response' => 1, 'islogin' => 1]);
        } else {
            return response()->json(['response' => 1, 'islogin' => 0]);
        }
    }

    private function attendance($user) {
        $today = date("Y-m-d");
        $time = date("H:i:s");
        try {
            $model = DriverAttendance::where('attendance_date', $today)->where('user_id', $user->id)->whereNull('out_time')->first();
            if ($model) {
                $model->out_time = $time;
                $model->save();
                return response()->json(['response' => 1, 'message' => "Success", 'islogin' => 0]);
            } else {
                $model = new DriverAttendance();
                $model->attendance_date = $today;
                $model->in_time = $time;
                $model->user_id = $user->id;
                $model->franchisees_id = $user->franchisees_id;
                $model->save();
                return response()->json(['response' => 1, 'date' => $today, 'message' => "Success", 'islogin' => 1]);
            }
        } catch (Exception $e) {
            return response()->json(['response' => 0, 'message' => "please try again"]);
        }
    }

    public function myEarning(Request $request) {
        $user = JWTAuth::toUser($request->token);

        $date = Carbon::now();
        $today = $date->toDateString();


        $todayEarning = DB::table('booking')
                ->select(DB::raw('sum(booking_details.driver_charge) as total'))
                ->join('booking_details', 'booking.id', '=', 'booking_details.booking_id')
                ->join('booking_vehicle', 'booking.id', '=', 'booking_vehicle.booking_id')
                ->where('booking_vehicle.user_id', $user->id)
                ->where('booking.trip_status', 2)
                ->where(DB::raw("DATE(booking.booking_time) = '" . $today . "'"), 1)
                ->first();
        $totalEarning = DB::table('booking')
                ->select(DB::raw('sum(booking_details.driver_charge) as total'))
                ->join('booking_details', 'booking.id', '=', 'booking_details.booking_id')
                ->join('booking_vehicle', 'booking.id', '=', 'booking_vehicle.booking_id')
                ->where('booking_vehicle.user_id', $user->id)
                ->where('booking.trip_status', 2)
                //->where(DB::raw("DATE(booking.booking_time) = '".$today."'"),1)
                ->first();

        $data = array(
            'currency_symbols' => env('CURRENCY_SYMBOL', "fa-gbp"),
            'todayEarning' => $todayEarning->total ? $todayEarning->total : 0,
            'totalEarning' => $totalEarning->total ? $totalEarning->total : 0
        );

        return response()->json(['response' => 1, 'data' => $data]);
    }

    public function tripHistory(Request $request) {
        $user = JWTAuth::toUser($request->token);
        $query = Booking::whereHas('driver', function($q) use ($user) {
                    $q->where('user_id', $user->id);
                    $q->where('status', 1);
                });



        if ($request->type == "today") {
            $date = Carbon::now();
            $today = $date->toDateString();
            $query->where(DB::raw("DATE(booking.booking_time) = '" . $today . "'"), 1);
        }

        $models = $query->where('trip_status', 2)->orderBy('booking_time', 'DESC')->paginate(30);
//        pr($models->toArray());
//        die();
//        
        if ($models->count()) {
            $booking = array();
            foreach ($models as $model) {

                $data = array(
                    'id' => $model->id,
                    'type' => $model->type,
                    'name' => $model->client->name,
                    'phone_number' => $model->client->phone,
                    'booking_date' => date('d M y', strtotime($model->booking_time)),
                    'booking_time' => date('g:i A', strtotime($model->booking_time)),
                    'base_location' => $model->base_location,
                    'drop_location' => $model->drop_location,
                    'driver_charge' => $model->price,
                    'price' => $model->price
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

    public function changeVehiclePosition(Request $request) {
        $validator = Validator::make($request->all(), [
                    'lat' => 'required',
                    'lng' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 2, 'errors' => $validationError, 'message' => 'Validation Error']);
        } else {

            $user = JWTAuth::toUser($request->token);
            $driverid = $user->id;
            $model = DriversVehicles::where('user_id', $driverid)->first();
            if ($model) {
                Vehicles::where('id', $model->vehicle_id)->update([
                    "lat" => $request->lat,
                    "lng" => $request->lng
                ]);
                return response()->json(['response' => 1, 'data' => $data, 'message' => 'VehilesPosition Successfull Update']);
            } else {
                return response()->json(['response' => 0, 'message' => 'Driver Not Allocation with Vehicle']);
            }
        }
    }

}
