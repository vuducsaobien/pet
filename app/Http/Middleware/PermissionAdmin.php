<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

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
            $userInfo = $request->session()->get('userInfo');
       
            if ($userInfo['level'] == 'admin')  return $next($request);
            return redirect()->route('notify/noPermission');
        }

        return redirect()->route('auth/login');
    }
}

// news/login