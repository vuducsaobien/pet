<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\ControllerModel as MainModel;
use App\Http\Requests\ControllerRequest as MainRequest;

class ControllerController extends AdminController
{
    
    public function __construct() 
    {
        $this->pathViewController = 'admin.pages.controller.';
        $this->controllerName     = 'controller';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->params['filter']['status']   = $request->input('filter_status', 'all' ) ;
        $this->params['filter']['category'] = $request->input('filter_category', 'all' ) ;
        $this->params['search']['field']    = $request->input('search_field', '' ) ;
        $this->params['search']['value']    = $request->input('search_value', '' ) ;

        $items            = $this->model->listItems($this->params, ['task'  => 'admin-list-items']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);

        foreach ($items as $key => $value) $controllerIDs[] = $value['id'];
        
        $controller_detail = $this->model->listItems($controllerIDs, [
            'task' => 'admin-list-items-get-action-id-from-list-controller-id'
        ]);

        $params = $this->params;
        return view($this->pathViewController . 'index', compact(
            'params', 'items', 'itemsStatusCount', 'controller_detail'
        ));
    }

    public function form(Request $request)
    {
        $item = null;
        if($request->id !== null ) {
            $params["id"] = $request->id;

            $item      = $this->model->getItem( $params, ['task' => 'get-item']);
            $itemRoute = $this->model->getItem( json_decode( $item['route_id'], true ), 
            ['task' => 'get-route-info-from-route-list-ids']);

        }

        $itemsAllAction    = $this->model->listItems(null, ['task'  => 'admin-list-items-get-all-action']);

        return view($this->pathViewController . 'form', compact(
            'item', 'itemsAllAction'
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

}