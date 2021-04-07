<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RssRequest as MainRequest;
use Illuminate\Http\Request;
use App\Models\RssModel as MainModel;

class RssController extends AdminController
{
    public function __construct()
    {
        $this->controllerName = 'rss';
        $this->pathViewController = 'admin.pages.rss.';
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

    public function ordering(Request $request)
    {
        $this->params['ordering'] = $request->ordering;
        $this->params['id'] = $request->id;
        $result = $this->model->saveItem($this->params, ['task' => 'change-ordering']);
        echo json_encode($result);
    }
}
