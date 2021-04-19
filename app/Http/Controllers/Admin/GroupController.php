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

    public function changeLevel(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $this->model->saveItem($params, ['task' => 'change-level-post']);
            return redirect()->back()->with("zvn_notify", "Thay đổi level thành công!");
        }
    }

    public function changePassword(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $this->model->saveItem($params, ['task' => 'change-password']);
            return redirect()->back()->with("zvn_notify", "Thay đổi mật khẩu thành công!");
        }
    }

    public function level(Request $request) {
        $params["currentLevel"]   = $request->level;
        $params["id"]               = $request->id;
        $this->model->saveItem($params, ['task' => 'change-level']);
        return redirect()->route($this->controllerName)->with("zvn_notify", "Cập nhật kiểu hiện thị thành công!");
    }

}