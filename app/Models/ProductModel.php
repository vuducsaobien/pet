<?php
namespace App\Models;

use App\Models\AdminModel;
use App\Models\ProductImageModel;
use App\Models\AttributeModel;
use App\Models\ProductAttributeModel;
use App\Models\CommentModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductModel extends AdminModel
{
    protected $table               = 'product';
    protected $folderUpload        = 'product' ;
    protected $fieldSearchAccepted = ['id', 'name', 'product_code'];
    protected $crudNotAccepted     = ['changeInfo','changeSeo','changeCategory','changePrice','changeAttribute','changeSpecial','changeDropzone','dropzone','_token','thumb_current','id','attribute','nameImage','alt','res'];

    public function attribute()
    {
        return $this->hasMany(ProductAttributeModel::class,'product_id');
    }

    public function image()
    {
        return $this->hasMany(ProductImageModel::class,'product_id');
    }

    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id','price_sale','product_code', 'name','price','category_id','thumb','status')->with('image');

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

        // Home - Recent Products
        if($options['task'] == 'news-list-items') {
            $query = self::select('id', 'product_code', 'name', 'thumb', 'price', 'price_sale', 'sale', 'slug')
                ->where('status', '=', 'active' )
                ->orderBy('id', 'desc')
                ->orderBy('ordering', 'asc')
                ->limit(8);
            $result = $query->get()->toArray();
            // $result = $query->get();
        }

        // Product Detail - Related Product
        if($options['task'] == 'news-list-items-related-in-product') {
            $category_id = self::getItem($params, ['task' => 'news-get-category-id']);
            $query       = self::select('id', 'name', 'price', 'price_sale', 'sale', 'thumb', 'slug')
                ->where('category_id', $category_id)
                ->where('status', 'active')
                ->where('id', '!=', $params['product_id'])
                ->orderBy('ordering', 'asc')
                ->take(4)
            ;
            $result = $query->get()->toArray();
        }

        // Home - Best Deal
        if($options['task'] == 'news-list-items-best-deal') {
            $query = self::select('id', 'product_code', 'name', 'price', 'price_sale', 'sale', 'slug', 'short_description')
                ->where('status', '=', 'active' )
                ->orderBy('sale', 'desc')
                ->limit(2)
            ;
            // $result = $query->get()->toArray();
            $result = $query->first()->toArray();

        }

        if($options['task'] == 'news-list-items-get-product-info-in-cart') {

            foreach ($params["product_id"] as $value) {
                $result[] = self::select('id', 'name', 'product_code', 'thumb', 'slug')
                ->where('status', 'active')
                ->where('id', $value)
                ->first()->toArray();
            }

            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called Product Model</h3>';die;
        }

        if($options['task'] == 'news-list-items-get-product-attribute-in-cart') {

            foreach ($params["attribute_id"] as $value) {
                $newModel = new AttributeModel();
                $result = $newModel->listItems($params["attribute_id"], 
                ['task' => 'news-list-items-get-product-attribute-in-cart']);
            }

            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called Product Model</h3>';die;
        }

        if($options['task'] == 'news-get-item-search-all-food') {
            $result = self::select('id', 'product_code', 'name', 'thumb', 'price', 'quantity',
            'price_sale', 'sale', 'slug', 'short_description')
            ->where('status','active')
            ->where('name', 'LIKE', "%{$params['search']}%")
            ->orderBy('ordering', 'asc')

            ->paginate($params['pagination']['totalItemsPerPage']);
            // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();
        }

        if($options['task'] == 'news-get-item-search-price-all-food') {
            $result = self::select('id', 'product_code', 'name', 'thumb', 'price', 'quantity',
            'price_sale', 'sale', 'slug', 'short_description')
            ->where('status','active')
            ->whereBetween('price', [ $params['min'] * 1000, $params['max'] * 1000  ])
            ->orderBy('ordering', 'asc')

            ->paginate($params['pagination']['totalItemsPerPage']);
            // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();
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
            $result = self::where('id', $params['id'])
                ->with('attribute')
                ->first();
        }

        if($options['task'] == 'news-get-item-product-detail') {
            $result = self::select('id', 'category_id', 'product_code', 'name', 'quantity',
                'thumb', 'price', 'price_sale', 'sale', 'slug', 'short_description', 'description')
            ->where('status','active')
            ->where('id', $params["product_id"])
            ->first()->toArray();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'news-get-item-category-id') {
            $result = self::select('id', 'category_id', 'product_code', 'name', 'thumb', 'price', 'price_sale', 'sale', 'slug', 'short_description')
            ->where('status','active')
            ->where('category_id', $params["category_id"])
            ->orderBy('ordering', 'asc')
            ->paginate($params['pagination']['totalItemsPerPage']);
            // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();

            // $result = $params;
            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
        }

        if($options['task'] == 'news-get-item-all-food') {
            $result = self::select('id', 'product_code', 'name', 'thumb', 'price', 'quantity',
                'price_sale', 'sale', 'slug', 'short_description')
            ->where('status','active')
            ->orderBy('ordering', 'asc')
            ->paginate($params['pagination']['totalItemsPerPage']);
            // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();

        }

        if($options['task'] == 'news-get-items-modal') {
            $result = self::select('id', 'name', 'price', 'price_sale', 'sale', 'slug', 'short_description')
                ->where('id', $params['product_id'])
                ->where('status', 'active')
                // ->get()->toArray();
                ->first();
            
            $productImage = new ProductImageModel();
            $result['list_images'] = $productImage->getItem($params, ['task' => 'get-list-thumb-product-id-modal']);
             
            $attribute = new AttributeModel();
            $result['attribute'] = $attribute->getItem(null, ['task' => 'get-list-thumb-product-id-modal']);
            foreach ($result['attribute'] as $value) {
                $params['attribute_id'][] = $value['id'];
            }

            $productAttribute = new ProductAttributeModel();
            $result['list_attribute'] = $productAttribute->getItem($params, ['task' => 'get-list-thumb-product-id-modal']);

        }

        if($options['task'] == 'get-list-thumb-product-detail') {
            $productImage = new ProductImageModel();
            $result       = $productImage->getItem($params, ['task' => 'get-list-thumb-product-detail']);
        }

        if($options['task'] == 'get-list-thumb-product-id-modal') {
            $attribute = new AttributeModel();
            $result    = $attribute->getItem(null, ['task' => 'get-list-thumb-product-id-modal']);
        }

        if($options['task'] == 'get-list-thumb-product-id-modal-array') {
            $productAttribute = new ProductAttributeModel();
            $result           = $productAttribute->getItem($params, ['task' => 'get-list-thumb-product-id-modal-array']);
        }

        if($options['task'] == 'news-get-category-id') {
            $result        = self::where('id', $params['product_id'])->value('category_id');
        }

        return $result;


    }

    public function saveItem($params = null, $options = null) {
        if(isset($params['price'])){
            $params['price']=str_replace(".", "", $params['price']);
        }
        if(isset($params['price_sale'])){
            $params['price_sale']=str_replace(".", "", $params['price_sale']);
        }



        if($options['task'] == 'add-item') {

            $params['thumb']='/images/product/'.array_column($params['dropzone'],'name')[0];
            $params['product_code']="PET".rand(100,999);

            self::insert($this->prepareParams($params));
            /*================================= dropzone =============================*/
            $product=$this->find($lastId=DB::getPdo()->lastInsertId());
            $product->image()->createMany($params['dropzone']);

        }
        /*================================= EDIT =============================*/
        if($options['task']=='change-info-product'){
            // $params['special']=isset($params['special'])?1:0;

            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
        /*================================= change dropzone =============================*/
        if($options['task'] == 'edit-item') {

            self::where('id', $params['id'])->update($this->prepareParams($params));

            /*================================= dropzone =============================*/
            ProductImageModel::where('product_id',$params['id'])->delete();
            $product=$this->find($params['id']);
            $product->image()->createMany($params['dropzone']);
            
        }
        /*================================= attribute =============================*/
        if($options['task'] == 'change-attribute-product') {
            if(isset($params['attribute'])){
                $productAttr=new ProductAttributeModel();
                $productAttr->saveItem(['attr'=>$params['attribute'],'id'=>$params['id']],['task'=>'edit-item']);
            }
        }
        /*================================= status index =============================*/
        if ($options['task'] == 'change-status') {
            $status = $params['currentStatus'] == 'active' ? 'inactive' : 'active';
            $this->where('id', $params['id'])->update(['status' => $status]);

            $result = [
                'id' => $params['id'],
                'status' => ['name' => config("zvn.template.status.$status.name"), 'class' => config("zvn.template.status.$status.class")],
                'link' => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }
        /*================================= change category =============================*/
        if ($options['task'] == 'change-category') {
            // $params['modified_by']  = session('userInfo')['username'];
            // $params['modified']     = date('Y-m-d H:i:s');
            $this->where('id', $params['id'])->update($this->prepareParams($params));

            $result = [
                'id' => $params['id'],
                // 'modified' => Template::showItemHistory($params['modified_by'], $params['modified']),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }


    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {

            
            
            /*================================= xoa image va xoa row =============================*/
            $image=$this->where('id',$params['id'])->first()->image->toArray();
            foreach ($image as $item) {
                $this->deleteThumb($item['name']);
            }
            ProductImageModel::where('product_id',$params['id'])->delete();


            // $item   = self::getItem($params, ['task'=>'get-thumb']);
            // $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

    public function getComment($params = null, $options = null) 
    { 
        if($options['task'] == 'in-product-detail') {

            $commentModel = new CommentModel();
            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';

            $result = $commentModel->getItem($params, ['task' => 'in-product-detail']);
            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
            return $result;

        }
    }


}

