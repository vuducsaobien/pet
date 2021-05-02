<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\ControllerModel as MainModel;
use App\Http\Requests\GroupRequest as MainRequest;

class ControllerController extends AdminController
{
    
    public function __construct() 
    {
        $this->pathViewController = 'admin.pages.controller.';
        $this->controllerName     = 'controller';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            
            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if($params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }

}