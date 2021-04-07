<?php

namespace App\Models;

use App\Models\AdminModel;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; 
class CommentModel extends AdminModel
{
        protected $table               = 'comment';
        protected $folderUpload        = 'comment' ;
        protected $fieldSearchAccepted = ['id', 'name', 'description', 'link'];
        protected $crudNotAccepted     = ['_token','thumb_current', 'username'];


    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'email', 'status', 'star','message','created', 'created_by', 'modified', 'modified_by');
               
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

            $result =  $query->orderBy('id', 'desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);

        }

        if($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'description', 'link', 'thumb')
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
            $result = self::select('id', 'name', 'message', 'status')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'in-product-detail') {
            $result = self::select('id', 'product_id', 'customer_id', 'star', 'message', 'name', 'created')
            ->where('product_id', $params['product_id'])
            ->where('status', 'active')
            // ->get();
            ->get()->toArray();
        }


        return $result;
    }

    public function saveItem($params = null, $options = null) { 
        if($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status ]);
            return  [
                'id' => $params['id'],
                'status' => ['name' => config("zvn.template.status.$status.name"), 'class' => config("zvn.template.status.$status.class")],
                'link' => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];
        }

        if($options['task'] == 'add-item') {
            $params['created_by'] = session('userInfo')['username'];
            $params['created']    = date('Y-m-d');
            self::insert($this->prepareParams($params));
        }

        if($options['task'] == 'add-item-news') {
            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            $customerModel = new CustomerModel();
            $params['customer_id'] = $customerModel->getItem($params, ['task' => 'frontend-get-customer-id']);
            $params['created']     = date('Y-m-d H:i:s');
            $params['status']      = 'inactive';

            $preparam = $this->prepareParams($params);
            echo '<pre style="color:red";>$preparam === '; print_r($preparam);echo '</pre>';

            // echo '<h3>Die is Called Model Comemnrt</h3>';die;
            self::insert($preparam);
        }


        if($options['task'] == 'edit-item') {

            /* if(!empty($params['thumb'])){
                $this->deleteThumb($params['thumb_current']);
                $params['thumb'] = $this->uploadThumb($params['thumb']);
            }*/
            $params['modified_by'] = session('userInfo')['username'];
            $params['modified']    = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            $item   = self::getItem($params, ['task'=>'get-thumb']); // 
            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

}

