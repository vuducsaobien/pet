<?php

namespace App\Models;

use App\Models\AdminModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\AttributeModel;
use App\Models\PaymentModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; 

class CartModel extends AdminModel
{
    protected $table               = 'cart as c';
    protected $folderUpload        = 'cart' ;
    protected $fieldSearchAccepted = ['order_code', 'name', 'email', 'address', 'quantity', 'amount'];
    protected $crudNotAccepted     = ['_token','name', 'thumb', 'id', 'attribute', 'total_price', 'product_code', 'slug'];

    // public function customer()
    // {
    //     return $this->belongsTo(CustomerModel::class);
    // }
    // public function payment()
    // {
    //     return $this->belongsTo(PaymentModel::class);
    // }

    // public function products()
    // {
    //     return $this->belongsToMany(ProductModel::class,'order_product','order_code','product_id','order_code')->withPivot(['quantity','price']);
    // }
    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items-customer") {
            $customerModel = new CustomerModel();

            $query = $customerModel->select(
                'id', 'status', 'name', 'phone', 'email', 'address', 'ip', 'order_code', 'quantity', 'amount',
                'created', 'modified', 'modified_by');
               
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
                } else if(in_array($params['search']['field'], $customerModel->fieldSearchAccepted)) { 
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }

            $result =  $query
                ->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
                // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();
        }


        if($options['task'] == "admin-list-items") {
            $query = self::select('c.id', 'c.quantity', 'c.price', 'c.order_code', 
            'c.attribute_id', 'c.attribute_value', 'p.name', 'p.id as product_id')
            ->leftJoin('product as p', 'c.product_id', '=', 'p.id');
            $result = $query->orderBy('id', 'desc')->get()->toArray();
        }

        if($options['task'] == "admin-list-items-view-cart") {
            $query = self::select('c.product_id', 'c.quantity', 'c.price', 'c.attribute_id', 'c.attribute_value', 
            'p.name', 'p.product_code', 'p.thumb')
            ->leftJoin('product as p', 'c.product_id', '=', 'p.id')
            ->where('order_code', '=', $params );
            $result = $query->orderBy('c.id', 'desc')->get()->toArray();
        }

        if($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'description', 'link', 'thumb')
                        ->where('status', '=', 'active' )
                        ->limit(5);

            $result = $query->get();
        }

        if($options['task'] == 'admin-list-items-get-attribute-string') {
            $productModel = new ProductModel();
            $result = $productModel->listItems($params, ['task'  => 'admin-list-items-get-attribute-string']);
        }

        if($options['task'] == 'admin-list-items-get-all-attribute-name') {
            $attributeModel = new AttributeModel();
            $result         = $attributeModel->getItem(null, ['task'  => 'admin-list-items-get-all-attribute-name']);
        }

        return $result;
    }

    public function countItems($params = null, $options  = null) {
     
        $result = null;

        if($options['task'] == 'admin-count-items-group-by-status') {
            $customerModel = new CustomerModel();

            $query = $customerModel::groupBy('status')
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
            $customerModel = new CustomerModel();

            $result = $customerModel::select('id', 'status', 'name', 'phone', 'email', 'address', 'ip', 'order_code', 'quantity', 'amount',
            'created', 'payment_id', 'ship')->where('id', $params['id'])->first()->toArray();

            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'news-list-items-get-product-info-in-cart') {
            $productModel = new ProductModel();
            $result       = $productModel->listItems($params, ['task' => 'news-list-items-get-product-info-in-cart']);
        }

        if($options['task'] == 'news-list-items-get-product-attribute-in-cart') {
            $productModel = new ProductModel();
            $result       = $productModel->listItems($params, ['task' => 'news-list-items-get-product-attribute-in-cart']);
        }

        if($options['task'] == 'news-list-items-get-product-attribute-value-in-cart') {
            $productModel = new ProductModel();
            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
            $result       = $productModel->listItems($params, ['task' => 'news-list-items-get-product-attribute-value-in-cart']);
        }

        if($options['task'] == 'get-payment-name-from-id') {
            $paymentModel = new PaymentModel();
            $result       = $paymentModel->getItem($params, ['task' => 'get-payment-name-from-id']);
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

        if($options['task'] == 'edit-item') {

            /* if(!empty($params['thumb'])){
                $this->deleteThumb($params['thumb_current']);
                $params['thumb'] = $this->uploadThumb($params['thumb']);
            }*/
            $params['modified_by'] = session('userInfo')['username'];
            $params['modified']    = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($options['task'] == 'news-add-item-customer-model') {

            $params['order_code'] = Str::random(7);
            $params['ip']         = $_SERVER['REMOTE_ADDR'];
            $params['status']     = 'inactive';

            $customerModel = new CustomerModel();
            $prepare       = $customerModel->prepareParams($params);
            $customerModel::insert($prepare);

            return $params['order_code'];
        }

        if($options['task'] == 'news-add-item-cart-model') {

            $cart = $params['cart'];
            foreach ($cart as $value) {
                $attributeModel = new AttributeModel();
                $attribute_id   = $attributeModel->getItem($value['attribute'], ['task' => 'get-attribute-id-from-attribute-name']);
                $value['product_id']      = $value['id'];
                $value['order_code']      = $params['order_code'];
                $value['price']           = $value['total_price'];
                $value['attribute_id']    = json_encode($attribute_id, JSON_UNESCAPED_UNICODE);
                $value['attribute_value'] = json_encode($value['attribute_value'], JSON_UNESCAPED_UNICODE);

                $this->table = 'cart';
                $prepare = $this->prepareParams($value);
                self::insert($prepare);
            }

        }


    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            /* $item   = self::getItem($params, ['task'=>'get-thumb']); //
            $this->deleteThumb($item['thumb']);*/
            self::where('id', $params['id'])->delete();
        }
    }

    public function fixArray($params = null, $options = null) 
    { 
        if($options['task'] == 'fix-array-01') {

            foreach ($params as $key => $value) {
                // $params          [$key]['product_id']   = $value['product_id'];
                $result          [$key]['attribute_id'] = $value['attribute_id'];
                $result[$key]['attribute_value'] = $value['attribute_value'];
            }
    
            foreach ($result as $keyB => $valueB) {
                // $result[$keyB]['product_id']      = $valueB['product_id'];
                $result[$keyB]['attribute_id']    = json_decode($valueB['attribute_id'], true);
                $result[$keyB]['attribute_value'] = json_decode($valueB['attribute_value'], true);
            }
    
        }

        if($options['task'] == 'fix-array-02') {
            $result         = $params['main'];
            $attribute_name = $params['attribute_name'];

            foreach ($result as $key => $value) {
                $result[$key]['attribute'] = '';

                foreach ($value['attribute_id'] as $keyB => $valueB) {
                    if (array_key_exists($valueB, $attribute_name)) {
                        $result[$key]['attribute_name'][] = $attribute_name[$valueB];
                        $result[$key]['attribute'] .= $attribute_name[$valueB] . ': ' . $result[$key]['attribute_value'][$keyB] . ' - ';
                    }
                    unset($result[$key]['attribute_id']);
                    unset($result[$key]['attribute_name']);
                }

                $result[$key]['attribute'] = substr($result[$key]['attribute'], 0, -3) . '.';
                unset($result[$key]['attribute_value']);
    
            }
        }

        if($options['task'] == 'fix-array-03') {
            foreach ($params as $key => $value) {
                $result[$key] = $value['attribute'];
            }
        }

        if($options['task'] == 'fix-array-04') {
            $result    = $params['main'];
            $attribute = $params['attribute'];

            foreach ($result as $key => $value) {
                $result[$key]['detail'] = $attribute[$key];
                unset($result[$key]['attribute_id']);
                unset($result[$key]['attribute_value']);
            }
        }

        return $result;
    }


}

