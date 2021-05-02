<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB; 

class PermissionModel extends AdminModel
{

    public $timestamps = false;

    public function __construct()
    {
        $this->table               = 'permission';
        $this->folderUpload        = 'permission';
        $this->fieldSearchAccepted = ['id', 'name', 'route_name'];
        $this->crudNotAccepted     = [
            '_token'
        ];    
    }
    
    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'route_name', 'status', 'created' , 'created_by', 'modified', 'modified_by');

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
                ->orderBy('route_name', 'desc')
                ->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
        }

        if($options['task'] == 'admin-list-items-get-list-permission') {
            foreach ($params as $value) {
                $result[] = self::select('name')->whereIn('id', $value)->where('status', 'active')
                ->pluck('name')->toArray()
                ;
            }
        }

        if($options['task'] == 'get-permission-name-of-list-permission-id') {
            foreach ($params as $key => $value) {
                $result[] = self::whereIn('id', $value)->pluck('name')->toArray();
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
            $result = self::select('id', 'name', 'route_name', 'status')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'auth-login-get-permission-ids-from-group-id') {
            $result = self::where('id', $params['id'])->value('permission_ids');
        }

        if($options['task'] == 'get-permission-id-from-route-name') {
            $result = self::where('route_name', $params)->value('id');
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
            $prepare = $this->prepareParams($params);

            // echo '<pre style="color:red";>$prepare === '; print_r($prepare);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
            self::insert( $prepare );        
        }

        if($options['task'] == 'edit-item') {
            $params['modified_by'] = $modifiedBy;
            $params['modified']    = $modified;
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($options['task'] == 'add-route-name') {
            // $params['created_by'] = $createdBy;
            // $prepare = $this->prepareParams($params);
            foreach ($params as $key => $value) {
                $prepare['controller'][] = $key; 
            }
            echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            echo '<pre style="color:red";>$prepare === '; print_r($prepare);echo '</pre>';

            echo '<h3>Die is Called per Model</h3>';die;
            // self::insert( $prepare );        
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

