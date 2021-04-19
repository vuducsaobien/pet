<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Models\PermissionModel;

class PermissionAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        App::setLocale(session()->get('language'));

        if($request->session()->has('userInfo'))  {

            $userInfo              = $request->session()->get('userInfo');
            $routeCurrent          = Route::currentRouteName();
            $model                 = new PermissionModel();
            $permission_id_current = $model->getItem($routeCurrent, 
            ['task' => 'get-permission-id-from-route-name']);

            if ( in_array($permission_id_current, $userInfo['permission_ids_accepted'] ) 
                && $userInfo['level'] == 'admin'
            ) {
                return $next($request);
            }else{
                // return $next($request);
                return redirect()->route('notify/noPermission');            
            }
        }

        return redirect()->route('auth/login');
    }
}

// news/login