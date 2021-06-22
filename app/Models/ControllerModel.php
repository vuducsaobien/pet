<?php

namespace App\Models;

use App\Models\AdminModel;
use App\Models\ActionModel;
use App\Models\PermissionModel;

use Illuminate\Support\Facades\DB; 

class ControllerModel extends AdminModel
{

    public $timestamps = false;

    public function __construct()
    {
        $this->table               = 'controller';
        $this->fieldSearchAccepted = ['id', 'name'];
        $this->crudNotAccepted     = [
            '_token', 'multi_checkbox'
        ];
    }
    
    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = self::select(
                'id', 'name_dev', 'name_friendly', 
                'status', 'created' , 'created_by', 'modified', 'modified_by'
            );

            $result =  $query
                ->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
                // ->get()->toArray();
        }

        if($options['task'] == 'admin-list-items-get-all-controller') {
            $query = self::select(
                'id', 'name', 'controller', 'status'
            );

            $result =  $query
                ->where('status', 'active')
                ->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage'])
                // ->get()->toArray()
            ;

            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
        }

        if($options['task'] == 'admin-list-items-get-all-action') 
        {
            $model = new ActionModel();
            $items = $model->listItems($params, ['task' => 'admin-list-items-get-all-action']);

            foreach ($items as $value) {
                $result['name_friendly'][] = $value['name_friendly'];
                $result['id'][]            = $value['id'];
            }

            // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called Controller Model</h3>';die;
        }

        if($options['task'] == 'admin-list-items-get-action-id-from-list-controller-id') 
        {
            $model = new PermissionModel();
            $items = $model->listItems($params, ['task' => 'admin-list-items-get-action-id-from-list-controller-id']);

            foreach ($params as $key => $value) {
                $result[$key] = '';

                foreach ($items as $keyC => $valueC) {
                    if ( $valueC['controller_id'] == $value ) {
                        $result[$key] .= '- ' . $valueC['name'] . ' - ' . $valueC['route_name'] . '<br>';
                    }
                }
            }

            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';

            // echo '<h3>Die is Called Controller Model</h3>';die;
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
            $result = self::select('id', 'name_dev', 'name_friendly', 'status')
            ->where('id', $params['id'])->first()->toArray();
        }

        if($options['task'] == 'get-arr-action-ids-from-controller-id') {
            $model  = new PermissionModel();
            $result = $model->getItem($params, ['task' => 'get-arr-action-ids-from-controller-id']);
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

            // Insert New Controller
            self::insert($this->prepareParams($params));  

            // Prepare param
            $controller_info['controller_id'] = self::max('id');
            $controller_info['name']          = self::select('name_dev', 'name_friendly')->where('id', $controller_info['controller_id'])
            ->first()->toArray();

            foreach ($params['multi_checkbox'] as $key => $value) {
                if ( $value == 'on' ) {
                    $arrActionIds[] = $key;
                }
            }

            $actionModel = new ActionModel();
            $action_info = $actionModel->getItem($arrActionIds, ['task' => 'get-action-info-from-arr-action-id']);

            $paramsPermission['arr_action_id']   = $arrActionIds;
            $paramsPermission['controller_info'] = $controller_info;
            $paramsPermission['action_info']     = $action_info;

            // Save to Action Model Multi Checkbox
            $model = new PermissionModel();
            $model->saveItem($paramsPermission, ['task' => 'save-action-from-controller-form']);
        }

        if($options['task'] == 'edit-item') {

            // Update table Controller
            $params['modified_by'] = $modifiedBy;
            $params['modified']    = $modified;
            self::where('id', $params['id'])->update($this->prepareParams($params));

            // Update table Permission
            $arrActInsert = null;
            $arrActDel    = null;
            $model        = new PermissionModel();
            $itemAction   = $model->getItem( $params['id'], [
                'task' => 'get-arr-action-ids-from-controller-id'
            ]);
            
            if ( !empty($params['multi_checkbox']) ) 
            {
                // Get List Arr Action ID Insert
                foreach ($params['multi_checkbox'] as $key => $value) 
                {
                    if ( $value == 'on' ) {
                        if ( !in_array($key, $itemAction) ) {
                            $arrActInsert[] = $key;
                        }
                    }
                }

                // Get List Arr Action ID Delete
                foreach ($itemAction as $key => $value) 
                {
                    if ( !array_key_exists($value, $params['multi_checkbox']) ) {
                        $arrActDel[] = $value;
                    }
                }

            }else{
                // Get List Arr Action ID Delete
                $arrActDel = $itemAction;
            }


            // Insert Action Id From Database : Controller-Form-Multi-checkbox-Action
            if ( $arrActInsert != null ) 
            {
                $controller_info['controller_id'] = $params['id'];
                $controller_info['name']          = self::select('name_dev', 'name_friendly')->where('id', $controller_info['controller_id'])
                ->first()->toArray();
    
                $actionModel = new ActionModel();
                $action_info = $actionModel->getItem($arrActInsert, ['task' => 'get-action-info-from-arr-action-id']);

                $paramsPermission['arr_action_id']   = $arrActInsert;
                $paramsPermission['controller_info'] = $controller_info;
                $paramsPermission['action_info']     = $action_info;    

                // Save to Action Model Multi Checkbox
                $model = new PermissionModel();
                $model->saveItem($paramsPermission, ['task' => 'save-action-from-controller-form']);
            }

            // Delete Action Id From Database : Controller-Form-Multi-checkbox-Action
            if ( $arrActDel != null )
            {
                $paramsDel['controller_id']  = $params['id'];
                $paramsDel['arr_action_ids'] = $arrActDel;

                $model = new PermissionModel();
                $model->deleteItem($paramsDel, ['task' => 'delete-items']);
            }

        }

    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            $model     = new PermissionModel();
            $arrActDel = null;
            $arrActDel = $model->getItem( $params, [
                'task' => 'get-arr-action-ids-from-controller-id'
            ]);

            if ( $arrActDel != null )
            {
                $model->deleteItem($params['id'], ['task' => 'delete-items-from-controller-id']);
            }

            self::where('id', $params['id'])->delete();
        }
    }

}

