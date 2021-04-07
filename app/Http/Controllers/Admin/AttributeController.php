<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AttributeRequest as MainRequest;
use App\Models\AttributeModel as MainModel;
use Illuminate\Http\Request;

class AttributeController extends AdminController
{
    public function __construct()
    {
        $this->controllerName = 'attribute';
        $this->pathViewController = 'admin.pages.attribute.';
        parent::__construct();
        $this->model = new MainModel();
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $task = 'add-item';
            $notify = 'Thêm dữ liệu thành công!';

            if ($params['id'] !== null) {
                $task = 'edit-item';
                $notify = 'Cập nhật dữ liệu thành công!';
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with('zvn_notify', $notify);
        }
    }



}
