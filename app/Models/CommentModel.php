<?php

namespace App\Models;

use App\Models\AdminModel;
use App\Models\CustomerModel;
use App\Models\ProductModel;

use Illuminate\Support\Facades\DB; 

class CommentModel extends AdminModel
{

    public function __construct()
    {
        $this->table               = 'comment as c';
        $this->folderUpload        = 'comment';
        $this->fieldSearchAccepted = ['customer_name', 'message', 'email', 'star', 'product_name'];
        $this->crudNotAccepted     = ['_token','thumb_current', 'product_code'];    
    }

    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == "admin-list-items") 
        {
            $query = self::select(
                'c.id', 'c.name', 'c.email', 'c.status', 'c.product_id', 'c.star', 'c.message', 'c.created', 
                'c.created_by', 'c.modified', 'c.modified_by', 'p.name AS product_name'
            )->leftJoin('product as p', 'c.product_id', '=', 'p.id');
            ;
               
            if ($params['filter']['status'] !== "all")  {
                $query->where('c.status', '=', $params['filter']['status'] );
            }

            if ($params['search']['value'] !== "")  {
                $searchField = $params['search']['field'];
                $searchValue = $params['search']['value'];

                if($searchField == "all") {

                    $query->where(function($query) use ($params){

                    $searchAccepted = $this->fieldSearchAccepted;
                    unset( $searchAccepted[ array_search('customer_name', $searchAccepted) ] );
                    unset( $searchAccepted[ array_search('product_name', $searchAccepted) ] );
                    $searchAccepted[] = 'c.name';
                    $searchAccepted[] = 'p.name';

                    foreach($searchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });

                } else if(in_array($searchField, $this->fieldSearchAccepted)) { 

                    if ( $searchField == 'product_name' ) {
                        $query->where('p.name', 'LIKE',  "%{$searchValue}%" );

                    }else if( $searchField == 'customer_name' ){
                        $query->where('c.name', 'LIKE',  "%{$searchValue}%" );

                    }else{
                        $query->where($searchField, 'LIKE',  "%{$searchValue}%" );
                    }
                } 

            }

            $result =  $query
                ->orderBy('id', 'desc')            
                ->paginate($params['pagination']['totalItemsPerPage']);
                // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();
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
                ->select( DB::raw('status , COUNT(id) as count') )
                ->whereIn('id', $params)
            ;

            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item') {

            $result = self::select(
                'c.id', 'c.name', 'c.email', 'c.status', 'c.product_id', 'c.star', 'c.message', 'c.created', 
                'c.ip', 'p.product_code'
            )->leftJoin('product as p', 'c.product_id', '=', 'p.id')
            ->where('c.id', $params['id'])->first()->toArray()
            ;

            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'in-product-detail') {
            $result = self::select('id', 'product_id', 'star', 'message', 'name', 'created')
                ->where('product_id', $params['product_id'])
                ->where('status', 'active')
                // ->get();
                ->get()->toArray()
            ;
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) { 
        $modifiedBy  = session('userInfo')['username'];
        $modified    = date('Y-m-d H:i:s');
        $createdBy   = session('userInfo')['username'];
        $created     = date('Y-m-d H:i:s');
        $this->table = 'comment';

        if($options['task'] == 'add-item') {
            $params['created_by'] = $createdBy;

                    $productModel = new ProductModel();
            $params['product_id'] = $productModel->getItem($params['product_code'], ['task' => 'get-product-id-from-product-code']);
                    $prepare      = $this->prepareParams($params);
            self::insert($prepare);
        }

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

        if($options['task'] == 'add-item-news') {
            $customerModel = new CustomerModel();

            $params['customer_id'] = $customerModel->getItem($params, ['task' => 'frontend-get-customer-id']);
            $params['created']     = date('Y-m-d H:i:s');
            $params['status']      = 'inactive';

            $preparam = $this->prepareParams($params);

            self::insert($preparam);
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
            $item   = self::getItem($params, ['task'=>'get-thumb']); // 
            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

}

