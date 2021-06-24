<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Http\Requests\AuthLoginRequest as MainRequest;
use App\Models\GroupModel;
use App\Models\UserModel;
use App\Models\PermissionModel;

class AuthController extends Controller
{
    private $pathViewController = 'news.pages.auth.';  // slider
    private $controllerName     = 'auth';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        // $userInfo = session('userInfo');
        // echo '<pre style="color:red";>$userInfo === '; print_r($userInfo);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;
    }

    public function login(Request $request)
    {
        if ((strpos(url()->previous(), $request->url()) === false)) session(['url.intended' => url()->previous()]);
        return view($this->pathViewController . 'login');
    }

    // middelware
    

    public function postLogin(MainRequest $request)
    {   
        if ($request->method() == 'POST') {
            $params = $request->all();

            $userModel           = new UserModel();
            $userInfo            = $userModel->getItem($params, ['task' => 'auth-login']);
            $permissionUser_deny = json_decode($userInfo['permission_id_deny'], true);
            $permissionUser_add  = json_decode($userInfo['permission_id_add'], true);

            // Get Permission of Group User
            $groupModel     = new GroupModel();
            $permisionGroup = $groupModel->getItem($userInfo, ['task' => 'auth-login-get-permission-ids-from-group-id']);
            $permisionGroup = json_decode($permisionGroup, true);

            // echo '<pre style="color:red";>$permissionUser_deny === '; print_r($permissionUser_deny);echo '</pre>';
            // echo '<pre style="color:red";>$permissionUser_add === '; print_r($permissionUser_add);echo '</pre>';
            // echo '<pre style="color:red";>$permisionGroup === '; print_r($permisionGroup);echo '</pre>';
            // echo '<h3>Die is Called Posst Login</h3>';die;

            // Remove Deny Permission for user
            foreach ($permissionUser_deny as $key => $value) {
                echo $key_value = array_search($value, $permisionGroup);
                unset( $permisionGroup[$key_value] );
            }

            // Add New Permission for User
            foreach ($permissionUser_add as $value) {
                if ($value !== '') {
                    array_push($permisionGroup, $value);
                }
            }

            // Edit UserINfo
            unset($userInfo['permission_id_deny']);
            unset($userInfo['permission_id_add']);
            $userInfo['permission_ids_accepted'] = $permisionGroup;

                      $perModel                  = new PermissionModel();
            $userInfo['permission_route_name_accepted'] = $perModel->listItems($userInfo['permission_ids_accepted'], [
                'task' => 'get-permission-route_name-of-list-permission-id'
            ]);

            foreach ($userInfo['permission_route_name_accepted'] as $key => $value) {
                $userInfo['permission_route_name_accepted'][$key] = explode('/', $value)[0];
            }

            $userInfo['permission_route_name_accepted'] = array_unique($userInfo['permission_route_name_accepted']);

            if (!$userInfo) return redirect()->route($this->controllerName . '/login')
            ->with('news_notify', 'Tài khoản hoặc mật khẩu không chính xác!');

            $request->session()->put('userInfo', $userInfo);
            $url = session()->pull('url.intended');
            return redirect()->away($url);
        }
    }

    public function logout(Request $request)
    {
        if($request->session()->has('userInfo')) {
            $request->session()->pull('userInfo');
            $request->session()->pull('cart');
        }
        return redirect()->route('home');
    }

 
}