<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DrivingRequest;
use Illuminate\Support\Facades\Validator;

class DrivingRequestController extends Controller {

    public function drivingRequest(Request $request) {

        $data = $request->all();
        //pr($data);
        //die();
        $string = $request->name;            
        $firstCharacter = $string[0];

        $secondstring = $request->surname;            
        $secCharacter = $secondstring[0];
        $shortname = $firstCharacter.$secCharacter;
        //pr($shortname);
        //die();
        $data['short_name'] = $shortname;
        
        $image = $request->drivinglicence;  // your base64 encoded 
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10).'.'.'png'; 
        //public_path('/images/advertisements/' . $inputname)
        \File::put(public_path('/images/drivingrequest/'). '/' . $imageName, base64_decode($image));
        $data['drivinglicence'] = $imageName;
        
        $profileimage = $request->profile_pic;  // your base64 encoded 
        $profileimage = str_replace('data:image/png;base64,', '', $profileimage);
        $profileimage = str_replace(' ', '+', $profileimage);
        $profileimageName = str_random(10).'.'.'png';       
        //\File::put(storage_path(). '/' . $profileimageName, base64_decode($profileimage));
        \File::put(public_path('/images/profilepic/'). '/' . $profileimageName, base64_decode($profileimage));
        $data['profile_pic'] = $profileimageName;
        
        $phlimage = $request->phl_image;  // your base64 encoded 
        $phlimage = str_replace('data:image/png;base64,', '', $phlimage);
        $phlimage = str_replace(' ', '+', $phlimage);
        $phlimageName = str_random(10).'.'.'png';       
        //\File::put(storage_path(). '/' . $profileimageName, base64_decode($profileimage));
        \File::put(public_path('/images/phlimage/'). '/' . $phlimageName, base64_decode($phlimage));
        $data['phl_image'] = $phlimageName;
        
        $passportimage = $request->passport_image;  // your base64 encoded 
        $passportimage = str_replace('data:image/png;base64,', '', $passportimage);
        $passportimage = str_replace(' ', '+', $passportimage);
        $passportimageName = str_random(10).'.'.'png'; 
        //\File::put(storage_path(). '/' . $profileimageName, base64_decode($profileimage));
        \File::put(public_path('/images/passportimg/'). '/' . $passportimageName, base64_decode($passportimage));
        $data['passport_image'] = $passportimageName;
        
        
              
        
        $messages = [
            'email.unique' => 'This email is already registered. Please use a different email to create a new user account.'
        ];
        $validator = Validator::make($data, [
                    'name' => 'required|min:4|max:255',
                    'surname' => 'required',
                    'email' => 'required|email|unique:driving_request',
                    'dob' => 'required',
                    'phone' => 'required|numeric',
                    'street' => 'required|min:5|max:255',
                    'locality' => 'required|min:1|max:100',
                    'town' => 'required|min:1|max:100',
                    'postcode' => 'required',
                    //'drivinglicence_image_pdf' => 'required|mimes:jpeg,png,jpg,pdf',
                    //'drivinglicence_image_pdf' => 'required|mimes:jpeg,png,jpg',
                    'licence_no' => 'required',
                    'phl_number' => 'required',
                    //'phl_image' => 'required|mimes:jpeg,png,jpg',
                    'licence_expiry_date' => 'required',
                    'driver_experience' => 'required',
                    'phl_expiry_date' => 'required',
                    'national_insurance_no' => 'required',
                    'passport_number' => 'required',
                    //'passport_image' => 'required|mimes:jpeg,png,jpg',
                    'renewal_date' => 'required',
                        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            $errorMessage = getFristError($validationError);

            return response()->json(['response' => 2, 'errors' => $validationError, 'message' => ucwords($errorMessage)]);
        } else {
            //pr($data);
            //die();
            $users = DrivingRequest::create($data);
            if ($users) {
                return response()->json(['response' => 1, 'message' => 'Thanks for signing up!']);
            } else {
                return response()->json(['response' => 0, 'message' => 'Something went wrong please try again letter!']);
            }
        }
    }

}
