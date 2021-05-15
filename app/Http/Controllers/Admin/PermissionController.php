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

    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all' ) ;
        $this->params['filter']['category'] = $request->input('filter_category', 'all' ) ;
        $this->params['search']['field']  = $request->input('search_field', '' ) ; // all id description
        $this->params['search']['value']  = $request->input('search_value', '' ) ;

        $itemsController  = $this->model->listItems($this->params, ['task'  => 'admin-list-items-get-all-controller']);

        echo '<h3>Die is Called </h3>';die;
        // $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);  // [ ['status', 'count']]

        return view($this->pathViewController .  'index', [
            'params'        => $this->params,
            // 'items'         => $items,
            // 'itemsStatusCount' =>  $itemsStatusCount
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