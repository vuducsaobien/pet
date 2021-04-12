<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\FaqModel as MainModel;
use App\Http\Requests\FaqRequest as MainRequest ;

class FaqController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.faq.';
        $this->controllerName     = 'faq';
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

    public function ordering(Request $request)
    {
        $params['ordering'] = $request->ordering;
        $params['id']       = $request->id;

        $result = $this->model->saveItem($params, ['task' => 'change-ordering']);
        echo json_encode($result);
    }

}