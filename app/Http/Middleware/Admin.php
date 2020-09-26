<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::user() && (in_array(Auth::user()->user_type,[1,2,3,5]))) {
            if(!isSuperAdmin()){
                session()->put('selectedFranchisees', Auth::user()->franchisees_id);
            }
            return $next($request);
        }
        return redirect(route('adminLogin'));
    }
    
    
//    public function handle($request, Closure $next) {
//        if (Auth::user()){
//            if (Auth::user() && (in_array(Auth::user()->user_type,[1,2]))) {
//                if(!isSuperAdmin()){
//                    session()->put('selectedFranchisees', Auth::user()->franchisees_id);
//                }
//                return $next($request);
//            }else{
//                return redirect(route('home'));
//            }
//        }else{
//            return redirect(route('adminLogin'));
//        }
//    }

}
