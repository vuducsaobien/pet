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
        $items = $this->model->listItems($this->params, ['task'  => 'admin-list-items']);
        $data  = $items->toArray()['data'];
        // $itemsCheck = $this->model->listItems(null, ['task'  => 'admin-list-items-check']);
        // echo '<pre style="color:red";>$itemsCheck === '; print_r($itemsCheck);echo '</pre>';

        foreach ($data as $key => $value) {
            $params[$key] = json_decode($value['permission_ids'], true);
        }

        $list_permission = $this->model->listItems($params, ['task'  => 'admin-list-items-get-list-permission']);

        return view($this->pathViewController . 'index', compact(
            'items', 'list_permission'
        ));
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

    public function form(Request $request)
    {
        $item           = null;
        $controllerInfo = null;
        $permissionInfo = null;

        if($request->id !== null ) {
            $params["id"] = $request->id;
            $item = $this->model->getItem( $params, ['task' => 'get-item']);

        }else{

            $controllerInfo = $this->model->listItems( null, ['task' => 'get-all-controller-info']);
            foreach ($controllerInfo as $key => $value) {
                $itemsController['id'][]            = $value['id'];
                $itemsController['name_dev'][]      = $value['name_dev'];
                $itemsController['name_friendly'][] = $value['name_friendly'];
            }

            $permissionInfo = $this->model->listItems( $itemsController['id'], ['task' => 'get-all-permission-info-of-all-controller']);
            foreach ($permissionInfo as $key => $value) {
                foreach ($value as $keyC => $valueC) {
                    $itemsPerActIDs  [$key][] = $valueC['action_id'];
                    $itemsPerActName [$key][] = $valueC['name'];
                    $itemsPerActRoute  [$key][] = $valueC['route_name'];
                }
            }

        }

        return view($this->pathViewController . 'form', compact(
            'item', 'itemsController', 'itemsPerActIDs', 'itemsPerActName', 'itemsPerActRoute'
        ));
    }

}