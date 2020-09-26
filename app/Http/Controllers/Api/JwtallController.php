<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DrivingRequest;
use App\User;
use JWTAuth;

class JwtallController extends Controller {

    public function DrivingrequestStore(Request $request) {

        //$data = $request->all();            
        //DrivingRequest::create($data);       


        try {
            $data = $request->all();
            DrivingRequest::create($data);
            //$request->session()->flash('success', 'Booking has been successfully added!');
            return response()->json(['success' => true, 'message' => 'Thanks for signing up! Please check your email to complete your registration.']);
        } catch (Exception $e) {
            //$request->session()->flash('error', 'Oops something went wrong try again !');
            return response()->json(['error' => true, 'message' => 'Oops something went wrong try again !']);

            //return response()->json(['success' => false, 'error' => 'Oops something went wrong try again !'], 500);
        }
    }

}
