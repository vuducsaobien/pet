<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB; 

class ActionModel extends AdminModel
{

    public $timestamps = false;

    public function __construct()
    {
        $this->table               = 'action';
        $this->fieldSearchAccepted = ['id', 'name'];
        $this->crudNotAccepted     = [
            '_token'
        ];
    }
    
    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = self::select('id', 'name_dev', 'name_friendly', 'status',
            'created' , 'created_by', 'modified', 'modified_by');

            $result =  $query
                ->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
        }

        if($options['task'] == 'admin-list-items-get-all-action') {

            $query  = self::select('id', 'name_friendly');
            $result = $query
            ->where('status', 'active')
            ->get()->toArray()
            ;
        }

        if($options['task'] == 'get-arr-action-ids-from-controller-id') 
        {
            $query  = self::select('id', 'name', 'route')->whereIn('id', $params);
            $result = $query
            ->where('status', 'active')
            ->get()->toArray();
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
            $result = self::select('id', 'name', 'route', 'status')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'get-action-info-from-arr-action-id') {
            $result = self::select('name_dev', 'name_friendly')->whereIn('id', $params)->get()->toArray();
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
            self::insert($this->prepareParams($params));        
        }

        if($options['task'] == 'edit-item') {
            $params['modified_by'] = $modifiedBy;
            $params['modified']    = $modified;
            self::where('id', $params['id'])->update($this->prepareParams($params));
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

