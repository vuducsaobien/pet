<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB; 
use App\Helpers\Template;

class FaqModel extends AdminModel
{
    public function __construct()
    {
        $this->table               = 'faq';
        $this->fieldSearchAccepted = ['id', 'name', 'content'];
        $this->crudNotAccepted     = ['_token'];
    }
    
    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'status','name','ordering', 'content');
               
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
                ->orderBy('ordering', 'asc')
                ->paginate($params['pagination']['totalItemsPerPage'])
            ;
        }

        if($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name',  'link')
                ->where('status', '=', 'active' )
                ->limit(5);

            $result = $query->get();
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
            $result = self::select('id', 'content', 'name', 'ordering', 'status')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'news-get-item'){
            $result = self::select(
                'id', 'name',  'created', 'content'
            )->where('status', 'active')
            ->orderBy('ordering', 'asc')
            ->paginate($params['pagination']['totalItemsPerPage']);
        }        

        return $result;
    }

    public function saveItem($params = null, $options = null) { 
        $modifiedBy = session('userInfo')['username'];
        $modified   = date('Y-m-d H:i:s');
        $createdBy  = session('userInfo')['username'];
        $created    = date('Y-m-d H:i:s');

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
            self::insert($this->prepareParams($params));
        }

        if($options['task'] == 'edit-item') {
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if ($options['task'] == 'change-ordering') {
            $ordering   = $params['ordering'];
    
            self::where( 'id', $params['id'])
                ->update([
                    'ordering'    => $ordering,
                    'modified'    => $modified,
                    'modified_by' => $modifiedBy
                ]
            );

            $result =  [
                'id'       => $params['id'],
                'modified' => Template::showItemHistory($modifiedBy, $modified),
                'message'  => config('zvn.notify.success.update')
            ];

            return $result;
        }


    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
    }

}

