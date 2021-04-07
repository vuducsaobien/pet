<?php

namespace App\Http\Controllers\Admin;
use App\Models\CommentModel as MainModel;
use App\Http\Requests\CommentRequest as MainRequest;

class CommentController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.comment.';
        $this->controllerName = 'comment';
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