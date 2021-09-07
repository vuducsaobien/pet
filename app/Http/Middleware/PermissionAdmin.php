<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Models\PermissionModel;
use App\Models\UserModel;
use App\Models\GroupModel;

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

        if($request->session()->has('userInfo'))  
        {
            $userInfo     = $request->session()->get('userInfo');
            $routeCurrent = Route::currentRouteName();
            $perModel     = new PermissionModel();
            $userModel    = new UserModel();
                    
            $permission_id_current           = $perModel->getItem($routeCurrent, ['task' => 'get-permission-id-from-route-name']);
            $params['permission_id_current'] = $permission_id_current;
            $params['username']              = $userInfo['username'];

            $checkPerDenyUser = $userModel->getItem($params, ['task' => 'check-id-permission-deny-user']);
            $checkPermission  = config('zvn.checkPermission');

            if ( $checkPermission ) 
            {
                // Check permission_id Thuộc Deny User ?
                if ( $checkPerDenyUser ) 
                {
                    echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
                    var_dump( $checkPerDenyUser );
                    echo '<h3>Die is Called - noPermission Deny User</h3>';die;
                    return redirect()->route('notify/noPermission');
                } else {

                    // Check Default Group Permission
                    $params['group_id'] = $userInfo['group_id'];
                    $groupModel         = new GroupModel();
                    $checkPerDefGroup   = $groupModel->getItem($params, ['task' => 'check-id-permission-default-group']);

                    // Check Add User Permission
                    $checkPerAddUser    = $userModel->getItem($params, ['task' => 'check-id-permission-add-user']);

                    if ( $checkPerDefGroup ) {
                        // echo '<pre style="color:red";>$params 1 === '; print_r($params);echo '</pre>';
                        // var_dump( $checkPerDefGroup );    
                        return $next($request);

                    }elseif ( $checkPerAddUser ) {
                        echo '<pre style="color:red";>$params 2 === '; print_r($params);echo '</pre>';
                        var_dump( $checkPerAddUser );    
                        return $next($request);

                    }else{
                        echo '<pre style="color:red";>$params 3 === '; print_r($params);echo '</pre>';
                        var_dump( $checkPerDefGroup );  
                        var_dump( $checkPerAddUser );    
                        echo '<h3>Die is Called - noPermission</h3>';die;

                        return redirect()->route('notify/noPermission');
                    }

                }
            }else{
                return $next($request);
            }
            
        }

        return redirect()->route('auth/login');
    }
}

// news/login