<?php

namespace App\Models;

use App\Models\AdminModel;
use App\Models\PermissionModel;
use App\Models\ControllerModel;
use Illuminate\Support\Facades\DB;
use JsonException;

class GroupModel extends AdminModel
{

    public $timestamps = false;

    public function __construct()
    {
        $this->table               = 'group as g';
        $this->folderUpload        = 'group';
        $this->fieldSearchAccepted = ['id', 'name'];
        $this->crudNotAccepted     = [
            '_token', 'multi_checkbox'
        ];    
    }
    
    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'permission_ids', 'status', 'created' , 'created_by', 'modified', 'modified_by');

            $result =  $query
                ->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
        }

        if($options['task'] == 'admin-list-items-get-list-permission') {
            $model = new PermissionModel();
            $items = $model->listItems($params, ['task'  => 'admin-list-items-get-list-permission']);

            $controllerModel = new ControllerModel();
            $itemsController = $controllerModel->listItems($items, ['task'  => 'get-arr-controller-name-from-arr-controller-id']);

            foreach ($itemsController as $key => $value) {
                $result[$key] = null;
                if ( !empty($value) ) {
                    foreach ($value as $valueC) {
                        $result[$key] .= '- ' . $valueC['name_friendly'] . ' (' . $valueC['name_dev'] .  ')<br>';
                    }
                }
            }
            
        }

        if($options['task'] == 'get-permission_ids-of-list-user') {
            foreach ($params as $key => $value) {
                $result[] = self::select('name', 'permission_ids')
                    ->where('id', $value)
                    ->first()->toArray()
                ;
            }
        }

        if($options['task'] == "admin-list-items-check") {
            $users = DB::table($this->table)
            ->where('id', 1)
            ->whereJsonContains('permission_ids', "1")
            ->get('id')
            ;

            echo '<pre style="color:red";>$users === '; print_r($users);echo '</pre>';
            echo '<h3>Die is Called user</h3>';die;
        }

        if($options['task'] == 'get-all-controller-info') {
            $model  = new ControllerModel();
            $result = $model->listItems(null, ['task' => 'get-all-controller-info']);
        }

        if($options['task'] == 'get-all-permission-info-of-all-controller') {
            $model  = new PermissionModel();
            $result = $model->listItems($params, ['task' => 'get-all-permission-info-of-all-controller']);
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
            $result = self::select('id', 'name', 'permission_ids', 'status')->where('id', $params['id'])->first()->toArray();
        }

        if($options['task'] == 'auth-login-get-permission-ids-from-group-id') {
            $result = self::where('id', $params['id'])->value('permission_ids');
        }

        if($options['task'] == 'check-id-permission-default-group') {
            $users = DB::table($this->table)
                ->where('id', $params['group_id'])
                ->whereJsonContains('permission_ids', $params['permission_id_current'])
                // ->whereJsonContains('permission_ids', 10)
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
            $this->table = 'group';
            $params['created_by'] = $createdBy;
            $params['created']    = $created;

            if ( !empty( $params['multi_checkbox'] ) ) {
                $params['permission_ids'] = json_encode( array_keys( $params['multi_checkbox'] ), true );
            }
            
            self::insert($this->prepareParams($params));        
        }

        if($options['task'] == 'edit-item') {
            $params['modified_by'] = $modifiedBy;
            $params['modified']    = $modified;

            if ( !empty( $params['multi_checkbox'] ) ) {
                $params['permission_ids'] = json_encode( array_keys( $params['multi_checkbox'] ), true );
            }else{
                $params['permission_ids'] = '';
            }
            
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($options['task'] == 'change-level') {
            $level = $params['currentLevel'];
            self:: where('id', $params['id'])->update(['level' => $level]);
        }

    }

    public function deleteItem($params = null, $options = null) 
    { 
        $this->table = 'group';
        if($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
    }

}

