<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Http\Requests\AuthLoginRequest as MainRequest;
use App\Models\GroupModel;
use App\Models\UserModel;

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

            $userModel       = new UserModel();
            $userInfo        = $userModel->getItem($params, ['task' => 'auth-login']);
            $permission_deny = explode(',', $userInfo['permission_deny']);
            $permission_new  = explode(',', $userInfo['permission_new']);

            // Get Permission of Group User
            $groupModel     = new GroupModel();
            $groupPermision = $groupModel->getItem($userInfo, ['task' => 'auth-login-get-permission-ids-from-group-id']);
            $groupPermision = explode(',', $groupPermision);

            // Remove Deny Permission for user
            foreach ($permission_deny as $key => $value) {
                echo $key_value = array_search($value, $groupPermision);
                unset( $groupPermision[$key_value] );
            }

            // Add New Permission for User
            foreach ($permission_new as $key => $value) {
                if ($value !== '') {
                    array_push($groupPermision, $value);
                }
            }

            // Edit UserINfo
            unset($userInfo['permission_deny']);
            unset($userInfo['permission_new']);
            $userInfo['permission_ids_accepted'] = $groupPermision;

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