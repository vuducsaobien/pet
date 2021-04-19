<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\GroupModel as MainModel;
use App\Http\Requests\GroupRequest as MainRequest;

class GroupController extends AdminController
{
    
    public function __construct() 
    {
        $this->pathViewController = 'admin.pages.group.';
        $this->controllerName     = 'group';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        $items             = $this->model->listItems($this->params, ['task'  => 'admin-list-items']);
        $data = $items->toArray()['data'];
        foreach ($data as $key => $value) {
            $params[$key] = explode(',', $value['permission_ids']);
        }

        $list_permission = $this->model->listItems($params, ['task'  => 'admin-list-items-get-list-permission']);
        $stringPer = [];
        foreach ($list_permission as $key => $value) {
            $stringPer[$key] = '- ' . implode('<br>- ', $value);
        }

        return view($this->pathViewController .  'index', [
            'params'    => $this->params,
            'items'     => $items,
            'stringPer' => $stringPer
        ]);
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