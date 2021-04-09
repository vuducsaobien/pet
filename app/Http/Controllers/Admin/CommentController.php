<?php

namespace App\Http\Controllers\Admin;
use App\Models\CommentModel as MainModel;
use App\Http\Requests\CommentRequest as MainRequest;
use Illuminate\Http\Request;

class CommentController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.comment.';
        $this->controllerName     = 'comment';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all' ) ;
        $this->params['filter']['category'] = $request->input('filter_category', 'all' ) ;
        $this->params['search']['field']  = $request->input('search_field', '' ) ; // all id description
        $this->params['search']['value']  = $request->input('search_value', '' ) ;

        $items     = $this->model->listItems($this->params, ['task'  => 'admin-list-items']);
        $itemsData = $items->toArray()['data'];
        // echo '<pre style="color:red";>$itemsData === '; print_r($itemsData);echo '</pre>';
        // echo '<h3>Die is Called cc</h3>';die;

        foreach ($itemsData as $value) $paramsId[] = $value['id'];

        // $this->params['paramsId'] = $paramsId;
        // $itemsStatusCount   = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        $itemsStatusCount   = $this->model->countItems($paramsId, ['task' => 'admin-count-items-group-by-status']);

        // echo '<pre style="color:red";>$itemsStatusCount === '; print_r($itemsStatusCount);echo '</pre>';
        // echo '<pre style="color:red";>$itemsData === '; print_r($itemsData);echo '</pre>';

        // echo '<h3>Die is Called </h3>';die;
        return view($this->pathViewController .  'index', [
            'params'           => $this->params,
            'items'            => $items,
            'itemsStatusCount' => $itemsStatusCount
        ]);
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            if(empty($params['slug'])){
                $params['slug']=Str::slug($params['name']);
            }

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