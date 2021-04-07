<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;

class ProductAttributeModel extends AdminModel
{

        protected $table = 'product_attribute';
        protected $folderUpload = 'productAttribute';
        protected $fieldSearchAccepted = ['id', 'name', 'description', 'link'];
        protected $crudNotAccepted = ['_token', 'thumb_current', 'id', 'attribute'];


    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    public function listItems($params = null, $options = null)
    {

        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'created', 'created_by', 'modified', 'modified_by');

            if ($params['filter']['status'] !== "all") {
                $query->where('status', '=', $params['filter']['status']);
            }

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }

            $result = $query->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);

        }


        if ($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'description', 'link', 'thumb')
                ->where('status', '=', 'active')
                ->limit(5);

            $result = $query->get()->toArray();
        }

        // if($options['task'] == 'news-list-items-get-product-attribute-value-in-cart') {

        //     foreach ($params as $key => $value) {

        //         foreach ($value as $keyChild => $valueChild) {
        //             $result[$key][$keyChild] = self::where('value', 'LIKE', $valueChild)
        //             ->pluck('value')->toArray()
        //             ;
        //         }

        //     }

        //     // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
        //     // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
        //     // echo '<h3>Die is Called Attribute va Model</h3>';die;
        // }



        return $result;
    }

    public function countItems($params = null, $options = null)
    {

        $result = null;

        if ($options['task'] == 'admin-count-items-group-by-status') {

            $query = $this::groupBy('status')
                ->select(DB::raw('status , COUNT(id) as count'));

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }

            $result = $query->get()->toArray();


        }

        return $result;
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::select('id', 'name')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'get-list-thumb-product-id-modal') {
            foreach ($params['attribute_id'] as $key => $value) {
                $result[$value] = self::select('value')
                ->where('product_id', $params['product_id'])
                ->where('attribute_id', $value)
                
                ->get();

                if (count($result[$value]) == 0 ) unset($result[$value]);

            }
        }

        if ($options['task'] == 'get-list-thumb-product-id-modal-array') {

            foreach ($params['attribute_id'] as $key => $value) {
                $result[$value] = self::select('value')
                ->where('product_id', $params['product_id'])
                ->where('attribute_id', $value)
                
                ->get()->toArray();

                if (count($result[$value]) == 0 ) unset($result[$value]);

            }

            

        }

        

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {

        if ($options['task'] == 'edit-item') {
            self::where('product_id', $params['id'])->delete();
        }

        foreach ($params['attr'] as $key => $value) {
            if (isset($value)) {
                $value = explode(',', $value);

                foreach ($value as $name) {
                    self::insert(
                        [
                            'product_id' => $params['id'],
                            'attribute_id' => $key,
                            'value' => $name
                        ]);

                }

            }
        }


    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
//            $item = self::getItem($params, ['task' => 'get-thumb']); //
//            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

}

