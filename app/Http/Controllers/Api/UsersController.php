<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DrivingRequest;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use JWTAuth;
use DB;
use Mail;
use App\DrivingDetails;

class UsersController extends Controller {

    public function login(Request $request) {
        //pr($request->all());
        $token = null;
        try {
            $email = $request->email;
            $password = $request->password;
            //pr($email);
            //pr($password);
            if ($email && $password) {
                $credentials = $request->only('email', 'password');
                $authCheck = Auth::attempt(['email' => $email, 'password' => $password, 'user_type' => 3]);
                if ($authCheck) {
                    $users = User::where('email', $email)->first();
                    if ($users->status == 1) {
                        if ($token = JWTAuth::attempt($credentials)) {
                            return response()->json(['response' => 1, 'result' => ['token' => $token]]);
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

    public function getAuthUser(Request $request) {

        $user = JWTAuth::toUser($request->token);
        $userid = $user->id;
        $model = User::with("userDriverdetails")->findOrFail($userid);


        return response()->json(['response' => 1, 'data' => $model]);
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



        DB::beginTransaction();
        try {
            $user = JWTAuth::toUser($request->token);

            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'phone' => 'required',
                        'address' => 'required',
                        'suburb' => 'required',
                        'postcode' => 'required',
                        'licence_expiry_date' => 'required',
                        'driver_experience' => 'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors()->toArray();
                $validationError = validationError($errors);
                return response()->json(['response' => 2, 'errors' => $validationError, 'message' => 'Validation Error']);
            } else {
                $id = $user->id;
                $data = $request->all();

                $profileimage = $request->profile_pic;  // your base64 encoded 
                $profileimage = str_replace('data:image/png;base64,', '', $profileimage);
                $profileimage = str_replace(' ', '+', $profileimage);
                $profileimageName = str_random(10) . '.' . 'png';
                //\File::put(storage_path(). '/' . $profileimageName, base64_decode($profileimage));
                \File::put(public_path('/images/profilepic') . '/' . $profileimageName, base64_decode($profileimage));
                $data['profile_pic'] = $profileimageName;
                $user->update($data);

                $inputmodelAttribute = array();

                $inputmodelAttribute['licence_expiry_date'] = $request->licence_expiry_date;
                $inputmodelAttribute['driver_experience'] = $request->driver_experience;



                DrivingDetails::where("user_id", $id)->update($inputmodelAttribute);

                DB::commit();
                return response()->json(['response' => 1, 'message' => 'Profile has been  successfully updated!']);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['response' => 0, 'message' => 'Something went wrong']);
            //$request->session()->flash('error', 'Oops something went wrong try again !');
        }





//        $user = JWTAuth::toUser($request->token);
//        pr($request->all());
//        //pr($user);
//        die();
//
//        if ($user) {
//            $messages = [
//                'mobile_number.unique' => 'This mobile number is already registered. Please Login',
//            ];
//            $validator = Validator::make($request->all(), [
//                        'name' => 'required|max:255',
//                        //'email' => 'required|email',
//                        'phone' => 'required|numeric',
//                        //'dob' =>'required',
//                        'address' => 'required',
//                        'state' => 'required',
//                        'suburb' => 'required',
//                        'postcode' => 'required',
//                            ], $messages);
//            if ($validator->fails()) {
//                $errors = $validator->errors()->toArray();
//                $validationError = validationError($errors);
//                return response()->json(['response' => 2, 'errors' => $validationError, 'message' => 'Validation Error']);
//            } else {
//                $updateData = [
//                    //'email' => $request->email,
//                    'name' => $request->name,
//                    'phone' => $request->phone,
//                    //'dob' => $request->dob,
//                    'address' => $request->address,
//                    'state' => $request->state,
//                    'suburb' => $request->suburb,
//                    'postcode' => $request->postcode,
//                        //'driver_experience' => $request->driver_experience,                    
//                ];
//                //pr($updateData);
//
//                $otpModel = User::where('id', $user->id)->update($updateData);
//
//                if ($otpModel) {
//                    $user = User::where('id', $user->id)->first();
//                    
//                    
////                    if ($mobileOtp) {
////                        
////                    }
////                    if ($emailOtp) {
////                        Utility::sendOTPmail($user, $emailOtp);
////                    }
////
////                    if ($mobileOtp && $emailOtp) {
////                        $message = "Profile updated please validate Email & phone!";
////                    } else if (($mobileOtp) && $emailOtp == false) {
////                        $message = "Profile updated please validate your phone number!";
////                    } else if (($mobileOtp == false) && $emailOtp) {
////                        $message = "Profile updated please validate your email!";
////                    } else {
////                        $message = "Profile has been sent successfully updated!";
////                    }
//
//                    
//                    $userDetails = $user->toArray();
//
//                    return response()->json(['response' => 1, 'users' => $userDetails, 'message' => 'Profile has been sent successfully updated!']);
//                } else {
//                    return response()->json(['response' => 0, 'message' => 'Something went wrong']);
//                }
//            }
//        }
//        
//        else {
//            return response()->json(['response' => 0, 'message' => 'Not a valid user']);
//        }
    }

    public function getallFranchisees(Request $request) {
        $allfranchise = \App\Franchisee::select('id', 'name')->get()->toArray();
        return response()->json(['response' => 1, 'data' => $allfranchise]);
    }

//    public function logout()
//    {
//        $user = Auth::user();
//        $user->api_token = null;
//        $user->save();
//        return $this->outputJSON(null,"Successfully Logged Out"); 
//    }

    public function logout(Request $request) {
        //$accessToken = Auth::user()->token();

        $accessToken = JWTAuth::toUser($request->token);
        DB::table('users')
                ->where('id', $accessToken->id)
                ->update([
                    'device_token' => 0
        ]);

        //$accessToken->revoke();

        return response()->json(['response' => 1, 'message' => 'Successfully logged out']);
        //return response()->json(null, 204);
    }

    public function get_email(Request $request) {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 1,'error' => $validator->errors()], 401);
        } else {

            $email = $request->email;
            $user = User::where('email', $email)->first();

            if (!$user) {
                //Mail::to($email)->send(new forgotPassword($user));
                return response()->json(['response' => 0, 'message' => 'Not a valid Email']);
            } else {
                Mail::send('mail', ['data' => $user], function ($m) {
                    $m->from('hello@app.com', 'Your Application');
                    $m->to("lorem@gmail.com", "Lorem Ipsum")
                            ->subject('Your Reminder!');
                });

                return response()->json(['response' => 1, 'message' => 'Email Send Successfully']);
                //return response()->json(['msg' => 'email send']);
            }
        }
    }

}
