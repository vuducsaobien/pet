<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB; 
use App\Models\ControllerModel;

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

        if($options['task'] == 'admin-list-items-get-all-controller') {
            $model  = new ControllerModel();
            $result = $model->listItems($params, ['task'  => 'admin-list-items-get-all-controller']);
        }

        if($options['task'] == 'admin-list-items-get-list-permission') {
            foreach ($params as $key => $value) {

                if ( !empty($value) ) {
                    $result[] = self::whereIn('id', $params)
                        ->pluck('controller_id')->toArray()
                    ;
                }else{
                    $result[] = null;
                }
                
            }
        }

        if($options['task'] == 'admin-list-items-get-list-permission-name-route_name') {
            foreach ($params as $key => $value) {

                if ( !empty($value) ) {
                    $result[] = self::whereIn('id', $value)
                        ->pluck('name', 'route_name')->toArray()
                    ;
                }else{
                    $result[] = null;
                }
                
            }
        }

        if($options['task'] == 'get-permission-name-of-list-permission-id') {
            foreach ($params as $key => $value) {
                
                if ( is_array( $value ) ) {
                    $result[] = self::whereIn('id', $value)->pluck('name')->toArray();
                }else{
                    $result[] = null;
                }
            }
        }

        if($options['task'] == 'admin-list-items-get-action-id-from-list-controller-id') {
            $query = self::select(
                'id', 'name', 'route_name', 'controller_id', 'action_id'
            );

            $result =  $query
                ->whereIn('controller_id', $params)
                ->where('status', 'active')
                ->orderBy('controller_id')
                ->get()->toArray()
            ;
        }

        if($options['task'] == 'get-all-permission-info-of-all-controller') {
            foreach ($params as $key => $value) {
                $result[] = self::select('id', 'name', 'route_name')
                    ->where('controller_id', $value)
                    ->orderBy('action_id')
                    ->get()->toArray()
                ;
            }
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
            if ( !is_numeric( strpos($params, '/') ) )$params = $params . '/index';
            $result = self::where('route_name', $params)->value('id');
        }

        if($options['task'] == 'get-arr-action-ids-from-controller-id') {
            $result = self::where('controller_id', $params)->pluck('action_id')->toArray();
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

        if($options['task'] == 'save-action-from-controller-form') {

            foreach ($params['arr_action_id'] as $key => $value) {
                self::insert([
                    'controller_id' => $params['controller_info']['controller_id'],
                    'action_id'     => $value,
                    'name'          => $params['action_info'][$key]['name_friendly'] . ' của ' . $params['controller_info']['name']['name_friendly'],
                    'route_name'    => $params['controller_info']['name']['name_dev'] . '/' . $params['action_info'][$key]['name_dev'],
                    'created_by'    => $createdBy,
                ]);
            }
    
        }

    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-items') {
            self::where('controller_id', $params['controller_id'])
            ->whereIn('action_id', $params['arr_action_ids'])->delete();
        }

        if($options['task'] == 'delete-items-from-controller-id') {
            self::where('controller_id', $params)->delete();
        }

        if($options['task'] == 'delete-items-from-action-id') {
            self::where('action_id', $params)->delete();
        }

    }

}

