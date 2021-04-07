<?php

namespace App\Http\Controllers\Admin;
use App\Models\SliderModel as MainModel;
use App\Http\Requests\SliderRequest as MainRequest;

class SliderController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.slider.';
        $this->controllerName = 'slider';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
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