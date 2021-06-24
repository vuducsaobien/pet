<?php

namespace App\Models;

use App\Models\AdminModel;
use App\Models\PermissionModel;
use Illuminate\Support\Facades\DB; 
use JsonException;

class UserModel extends AdminModel
{

    public $timestamps = false;

    public function __construct()
    {
        $this->table               = 'user';
        $this->folderUpload        = 'user';
        $this->fieldSearchAccepted = ['id', 'username', 'email', 'fullname'];
        $this->crudNotAccepted     = [
            '_token','avatar_current', 'password_confirmation', 'taskAdd', 
            'taskChangePassword', 'taskChangeLevel', 'taskEditInfo'
        ];    
    }
    
    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'username', 'email', 'fullname', 'thumb', 'status', 'level', 'group_id',
            'permission_id_deny', 'permission_id_add', 'created' ,'created_by','modified','modified_by');
               
            if ($params['filter']['status'] !== "all")  {
                $query->where('status', '=', $params['filter']['status'] );
            }

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }

            $result =  $query
                ->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
        }

        if($options['task'] == 'get-permission-name-of-list-permission-id') {
            $model  = new PermissionModel();
            $result = $model->listItems($params, ['task'  => 'get-permission-name-of-list-permission-id']);
        }

        if($options['task'] == 'get-permission_ids-of-list-user') {
            $model = new GroupModel();
            $items = $model->listItems($params, ['task' => 'get-permission_ids-of-list-user']);

            foreach ($items as $key => $value) {
                $result['group_name'][$key] = $value['name'];
                $data   [$key]              = json_decode($value['permission_ids'], true);
            }

            $permissionModel      = new PermissionModel();
            $dataPermissionPgroup = $permissionModel->listItems($data, ['task' => 'admin-list-items-get-list-permission-name-route_name']);

            foreach ($dataPermissionPgroup as $key => $value) 
            {
                if ( !empty( $value ) ) 
                {
                    foreach ($value as $keyB => $valueB) 
                    {
                        $result['permission_group'][$key][] = $valueB . " - (" . $keyB . ")";
                        unset($result['permission_group'][$key][$keyB]);
                    }

                    $result['permission_group'][$key] = null;
                    foreach ($value as $keyC => $valueC) 
                    {
                        $result['permission_group'][$key] .= '- ' . $valueC . " - (" . $keyC . ")<br>";
                    }
                }else{
                    $result['permission_group'][$key] = null;
                }
            }

        }

        if($options['task'] == 'admin-list-items-get-list-permission') {
            $model = new PermissionModel();

            $result['permission_id_deny'] = $model->listItems($params['permission_id_deny'], [
                'task'  => 'admin-list-items-get-list-permission-name-route_name'
            ]);

            foreach ($result['permission_id_deny'] as $key => $value) 
            {
                if ( !empty( $value ) ) 
                {
                    foreach ($value as $keyB => $valueB) 
                    {
                        $result['permission_id_deny'][$key][] = $valueB . " - (" . $keyB . ")";
                        unset($result['permission_id_deny'][$key][$keyB]);
                    }

                    $result['permission_id_deny'][$key] = null;
                    foreach ($value as $keyC => $valueC) 
                    {
                        $result['permission_id_deny'][$key] .= '- ' . $valueC . " - (" . $keyC . ")<br>";
                    }
                }else{
                    $result['permission_id_deny'][$key] = null;
                }
            }

            $result['permission_id_add'] = $model->listItems($params['permission_id_add'], [
                'task'  => 'admin-list-items-get-list-permission-name-route_name'
            ]);

            foreach ($result['permission_id_add'] as $key => $value) 
            {
                if ( !empty( $value ) ) 
                {
                    foreach ($value as $keyB => $valueB) 
                    {
                        $result['permission_id_add'][$key][] = $valueB . " - (" . $keyB . ")";
                        unset($result['permission_id_add'][$key][$keyB]);
                    }

                    $result['permission_id_add'][$key] = null;
                    foreach ($value as $keyC => $valueC) 
                    {
                        $result['permission_id_add'][$key] .= '- ' . $valueC . " - (" . $keyC . ")<br>";
                    }
                }else{
                    $result['permission_id_add'][$key] = null;
                }
            }
            
        }

        return $result;
    }

    public function countItems($params = null, $options  = null) {
        $result = null;

        if($options['task'] == 'admin-count-items-group-by-status') {
         
            $query = $this::groupBy('status')
                        ->select( DB::raw('status , COUNT(id) as count') );

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }

            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item') {
            $result = self::select('id', 'username', 'email', 'status', 'fullname', 'level', 'thumb')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'get-avatar') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'auth-login') {
            $result = self::select('id', 'username', 'fullname', 'email', 'level', 'thumb', 'group_id', 'permission_id_deny', 'permission_id_add')
                ->where('status', 'active')
                ->where('email', $params['email'])
                ->where('password', md5($params['password']) )->first();

            if($result) $result = $result->toArray();
        }

        if ($options['task'] == 'check-password') {
            $result = $this->select('id')->where([
                ['username', session('userInfo')['username']],
                ['password', md5($params['old_password'])]
            ])->first();
        }

        if ($options['task'] == 'news-get-user-info') {
            $result = self::select('address', 'phone')
            ->where('username', $params)
            ->first()->toArray()
            ;
        }

        if ($options['task'] == 'check-id-permission-deny-user') {
            $users = DB::table($this->table)
                ->where('username', $params['username'])
                ->whereJsonContains('permission_id_deny', $params['permission_id_current'])
                // ->whereJsonContains('permission_id_deny', 6)
                ->get('id')->toArray()
            ;

            $result = true;
            if ( empty($users) ) $result = false;
        }

        if ($options['task'] == 'check-id-permission-add-user') {
            $users = DB::table($this->table)
                ->where('username', $params['username'])
                ->whereJsonContains('permission_id_add', $params['permission_id_current'])
                // ->whereJsonContains('permission_id_add', 24)
                ->get('id')->toArray()
            ;

            $result = false;
            if ( !empty($users) ) $result = true;
        }


        return $result;
    }

    public function saveItem($params = null, $options = null) {
        $modifiedBy = session('userInfo')['username'];
        $modified   = date('Y-m-d H:i:s');
        $createdBy  = session('userInfo')['username'];
        $created    = date('Y-m-d H:i:s');

        /*================================= change ajax status =============================*/
        if($options['task'] == 'change-status') {

            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status ]);

            return  [
                'id'      => $params['id'],
                'status'  => [
                    'name'  => config("zvn.template.status.$status.name"),
                    'class' => config("zvn.template.status.$status.class")
                ],
                'link'    => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];
        }

        if($options['task'] == 'add-item') {
            $params['created_by'] = $createdBy;
            $params['created']    = $created;
            $params['password']   = md5($params['password']);
            self::insert($this->prepareParams($params));        
        }

        if($options['task'] == 'edit-item') {
            $params['modified_by'] = $modifiedBy;
            $params['modified']    = $modified;
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($options['task'] == 'change-level') {
            $level = $params['currentLevel'];
            self:: where('id', $params['id'])->update(['level' => $level]);
        }

        if($options['task'] == 'change-level-post') {
            $level = $params['level'];
            self::where('id', $params['id'])->update(['level' => $level]);
        }
        
        if($options['task'] == 'change-password') {
            $password       = md5($params['password']);
            self::where('id', $params['id'])->update(['password' => $password]);
        }

        if ($options['task'] == 'change-logged-password') {
            $password   = md5($params['password']);
            
            $this->where('id', session('userInfo')['id'])->update([
                'password'    => $password,
                'modified'    => $modified,
                'modified_by' => $modifiedBy
            ]);
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            $item   = self::getItem($params, ['task'=>'get-avatar']); // 
            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

}

