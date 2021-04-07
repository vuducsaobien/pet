<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest as MainRequest;
use App\Models\MenuModel as MainModel;
use Illuminate\Http\Request;

class MenuController extends AdminController
{
    public function __construct()
    {
        $this->controllerName = 'menu';
        $this->pathViewController = 'admin.pages.menu.';
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

    public function typeMenu(Request $request)
    {
        $this->params['selectedTypeMenu'] = $request->type_menu;
        $this->params['id'] = $request->id;
        $result = $this->model->saveItem($this->params, ['task' => 'change-type-menu']);
        echo json_encode($result);
    }

    public function typeLink(Request $request)
    {
        $this->params['selectedTypeLink'] = $request->type_link;
        $this->params['id'] = $request->id;
        $result = $this->model->saveItem($this->params, ['task' => 'change-type-link']);
        echo json_encode($result);
    }

    public function link(Request $request)
    {
        $this->params['data']=$request->data;
//        $this->params['selectedLink'] = $request->link;
        $this->params['id'] = $request->id;
        $result = $this->model->saveItem($this->params, ['task' => 'change-link']);
        echo json_encode($result);
    }

}
