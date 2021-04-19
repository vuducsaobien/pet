<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel as MainModel;
use App\Http\Requests\UserRequest as MainRequest ;
use Illuminate\Support\MessageBag;

class UserController extends AdminController
{
    
    public function __construct() 
    {
        $this->pathViewController = 'admin.pages.user.';
        $this->controllerName     = 'user';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->params['filter']['status']   = $request->input('filter_status', 'all' ) ;
        $this->params['filter']['category'] = $request->input('filter_category', 'all' ) ;
        $this->params['search']['field']    = $request->input('search_field', '' ) ;        // all id description
        $this->params['search']['value']    = $request->input('search_value', '' ) ;
                      $params               = $this->params;

        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        $items            = $this->model->listItems($this->params, ['task'  => 'admin-list-items']);
        $itemsData        = $items->toArray()['data'];

        foreach ($itemsData as $key => $value) {
            // $data['user_id'][$key]         = $value['id'];
            $data['group_id'][$key]        = $value['group_id'];
            $data['permission_deny'][$key] = explode(',', $value['permission_deny']);
            $data['permission_new'][$key]  = explode(',', $value['permission_new']);
        }

        $listGroupPermision = $this->model->listItems($data['group_id'], ['task'  => 'get-permission_ids-of-list-user']);
        foreach ($listGroupPermision as $key => $value) {
            $listGroupPermision[$key] = explode(',', $value);
        }

        // Remove Deny Permission for user
        foreach ($data['permission_deny'] as $key => $value) {
            foreach ($value as $keyB => $valueB) {
                $key_value = array_search($valueB, $listGroupPermision[$key]);
                unset( $listGroupPermision[$key][$key_value] );
            }
        }

        // Add New Permission for User
        foreach ($data['permission_new'] as $key => $value) {
            foreach ($value as $keyB => $valueB) {
                if ($valueB !== '') {
                    array_push($listGroupPermision[$key], $valueB);
                }
            }
        }

        // Get All Permission name form List Permision
        $permissions      = $this->model->listItems($listGroupPermision, ['task'  => 'get-permission-name-of-list-permission-id']);
        foreach ($permissions as $key => $value) {
            $permissions[$key] = '- ' . implode('<br>- ', $value);
        }

        // echo '<pre style="color:red";>$permissions === '; print_r($permissions);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;
        return view($this->pathViewController . 'index', compact(
            'params', 'items', 'itemsStatusCount', 'permissions'
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

    public function changeLoggedPassword()
    {
        return view($this->pathViewController . 'form_change_logged_password');
    }

    public function postChangeLoggedPassword(MainRequest $request, MessageBag $messageBag)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            
            $userModel = new MainModel();
            $userInfo = $userModel->getItem($params, ['task' => 'check-password']);

            if (!$userInfo) {
                $messageBag->add('old_password', 'Old password is wrong');
                return redirect()->route($this->controllerName . '/change-logged-password')->withErrors($messageBag);
            }

            $this->model->saveItem($params, ['task' => 'change-logged-password']);
            return redirect()->route($this->controllerName)->with('zvn_notify', 'Thay đổi mật khẩu thành công!');
        }
    }

}