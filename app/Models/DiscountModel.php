<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB; 

class DiscountModel extends AdminModel
{
    public function __construct()
    {
        $this->table               = 'discount';
        $this->folderUpload        = 'discount';
        $this->fieldSearchAccepted = ['id', 'code', 'price', 'times_used', 'total_times', 'date_start'];
        $this->crudNotAccepted     = ['_token','thumb_current'];    
    }

    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select(
                'id', 'status','code','date_start', 'date_end','times_used', 'total_times', 'price', 'percent', 
                'min_price', 'created', 'created_by', 'modified', 'modified_by', 'max_price'
            );
               
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
                ->paginate($params['pagination']['totalItemsPerPage'])
            ;

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
            $result = self::select('id', 'code', 'date_start', 'date_end', 'status'
            , 'times_used', 'total_times', 'price', 'percent', 'min_price', 'max_price')
            ->where('id', $params['id'])->first();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'news-get-items-get-price-coupon') {
            $result = self::select('total_times', 'times_used', 'price', 'percent', 'min_price', 
            'max_price', 'date_start', 'date_end')
            // $result = self::select('total_times')

            ->where('status', 'active')
            ->where('code', $params['coupon_name'])
            ->first()->toArray();
        }

        if($options['task'] == 'news-get-items-increase-coupon-times-used') {
            $result = self::where('code', $params['coupon_name'])->value('times_used');

            if ($result == null || $result == '' || $result == 0) {
                self::where('code', $params['coupon_name'])
                ->update(['times_used' => 1 ]);
            } else {
                self::where('code', $params['coupon_name'])
                ->update(['times_used' => $result + 1 ]);
            }
            
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
            $params['created_by'] = $createdBy;
            $params['created']    = $created;
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
            self::where('id', $params['id'])->delete();
        }
    }

}

