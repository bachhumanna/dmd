<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Closure;

class PermissionMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $user = Auth::user();
        $pemissions = getUserPermissions($user);
        session(['permissions' => $pemissions]);

        $defaultPermission = $this->defaultPermission($user->user_type, $user->is_super);
        $defaultPermission[] ='admin';
        
        session(['defaultPermission' => $defaultPermission]);

        
        $currentRoute =array($request->route()->getName());
        
        if(permit($currentRoute)){
            return $next($request);
        }else{
            //return redirect(route('not-authorized'));
            if($request->ajax()){
                return $next($request);
            }else{
                abort(500, "You are not authorized");
            }
        }
        
        
        return $next($request);
    }

    function defaultPermission($type, $isSuper = null) {
        if ($isSuper) {
            return \App\DefaultPermissions::where('is_super', 1)->where('type', $type)->pluck('name')->toArray();
        } else {
            return \App\DefaultPermissions::where('is_super', 0)->where('type', $type)->pluck('name')->toArray();
        }
    }

}
