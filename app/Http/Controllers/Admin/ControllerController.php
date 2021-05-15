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
        $itemsAllRoute    = $this->model->listItems(null, ['task'  => 'admin-list-items-get-all-route']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);

        foreach ($items as $key => $value) {
            $itemsRoute[$key] = json_decode($value['route_id'], true);
        }

        // Get route name from list route_id
        foreach ($itemsRoute as $key => $value) 
        {
            $routesName[$key] = null;

            if ( is_array($value) ) 
            {
                foreach ($value as $keyC => $valueC) 
                {
                    // echo $valueC . '<br>';
                    if ( array_key_exists($valueC, $itemsAllRoute) ) 
                    {
                        // echo $keyC . '<br>';
                        // echo $valueC . '<br>';
                        // echo $itemsAllRoute[$valueC]['name'] . '<br>';

                        $itemsRoute[$key][$keyC] = '-' . $itemsAllRoute[$valueC]['name'] ;

                    }
                }

                $routesName[$key] = implode('<br>', $itemsRoute[$key]);
            }
        }

        // echo '<pre style="color:red";>$itemsRoute === '; print_r($itemsRoute);echo '</pre>';
        // echo '<pre style="color:red";>$routesName === '; print_r($routesName);echo '</pre>';

        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;

        $params = $this->params;
        return view($this->pathViewController . 'index', compact(
            'params', 'items', 'itemsStatusCount', 'routesName'
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