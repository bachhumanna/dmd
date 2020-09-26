<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function authenticate(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
            return redirect(route('admin'));
        } else {
            $users = \App\User::where('email', $email)->first();
            if($users){
                if($users->status ==0){
                    return redirect()->back()->withInput()->with(['error' => 'This Account is not active']);
                }else{
                    return redirect()->back()->withInput()->with(['error' => 'These credentials do not match our records.']);
                }
            }else{
                return redirect()->back()->withInput()->with(['error' => 'These credentials do not match our records.']);
            }
        }
    }

}
