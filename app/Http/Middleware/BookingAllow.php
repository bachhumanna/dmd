<?php

namespace App\Http\Middleware;

use Closure;

class BookingAllow {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(isSuperAdmin()){
            
            if(selectedFranchisees()){
                return $next($request);
            }else{
                \session()->flash('error', 'Please select Franchisee!');
               // return redirect(route('booking.index'));
                return redirect()->back();
            }
        }
        return $next($request);
    }

}
