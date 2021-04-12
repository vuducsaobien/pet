<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\RecruitmentModel as MainModel;
use App\Http\Requests\RecruitmentRequest as MainRequest ;
use Illuminate\Support\Str;

class RecruitmentController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.recruitment.';
        $this->controllerName     = 'recruitment';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            if(empty($params['slug'])){
                $params['slug']=Str::slug($params['name']);
            }

            
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