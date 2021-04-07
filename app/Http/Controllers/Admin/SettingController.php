<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SettingModel as MainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SettingController extends Controller
{
    private $pathViewController = 'admin.pages.setting.';
    private $controllerName = 'setting';
    private $params = [];
    private $model;
    public function __construct()
    {
        $this->model = new MainModel();
        View::share('controllerName', $this->controllerName);
    }

    public function index(Request $request){
        $params['type'] = $request->input('type', 'general');
        $item = $this->model->getItem($params, null);
        return view($this->pathViewController . 'index', compact('item'));
    }

    public function general(Request $request){
        if ($request->method() == 'POST') {
            $params = $request->all();
            $this->model->saveItem($params, ['task' => 'general']);
            return redirect()->route($this->controllerName, ['type' => 'general'])->with('zvn_notify', 'Cập nhật cấu hình chung thành công!');
        }
    }

    public function emailAccount(Request $request){
        if ($request->method() == 'POST') {
            $params = $request->all();
            $this->model->saveItem($params, ['task' => 'email-account']);
            return redirect()->route($this->controllerName, ['type' => 'email'])->with('zvn_notify', 'Cập nhật cấu hình tài khoản email thành công!');
        }
    }

    public function emailBcc(Request $request){
        if ($request->method() == 'POST') {
            $params = $request->all();
            $this->model->saveItem($params, ['task' => 'email-bcc']);
            return redirect()->route($this->controllerName, ['type' => 'email'])->with('zvn_notify', 'Cập nhật cấu hình email bcc thành công!');
        }
    }

    public function social(Request $request){
        if ($request->method() == 'POST') {
            $params = $request->all();
            $this->model->saveItem($params, ['task' => 'social']);
            return redirect()->route($this->controllerName, ['type' => 'social'])->with('zvn_notify', 'Cập nhật cấu hình social thành công!');
        }
    }
    public function share(Request $request){
        if ($request->method() == 'POST') {
            $params = $request->all();
            $this->model->saveItem($params, ['task' => 'share']);
            return redirect()->route($this->controllerName, ['type' => 'share'])->with('zvn_notify', 'Cập nhật cấu hình share thành công!');
        }
    }
}
