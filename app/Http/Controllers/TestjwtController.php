<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterForm;
use App\User;
use Auth;

class TestjwtController extends Controller {

    public function __construct() {
        //  $this->middleware('auth');
    }

    public function index(Request $request) {
        
        return view('contactus');
        
    }

   
}
