<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\PermissionModel as MainModel;
use App\Http\Requests\PermissionRequest as MainRequest ;

class PermissionController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.permission.';
        $this->controllerName     = 'permission';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            // if(empty($params['slug'])){
            //     $params['slug']=Str::slug($params['name']);
            // }

            
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

    public function ordering(Request $request)
    {
        $params['ordering'] = $request->ordering;
        $params['id']       = $request->id;

        $result = $this->model->saveItem($params, ['task' => 'change-ordering']);
        echo json_encode($result);
    }

}