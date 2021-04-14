<?php

namespace App\Http\Controllers\News;

use App\Models\SettingModel;
use Illuminate\Http\Request;
use App\Helpers\Functions;
use App\Models\ProductModel as MainModel;

class ProductController extends FrontendController
{
    public function __construct()
    {
        $this->pathViewController = 'news.pages.product.';
        $this->controllerName     = 'product';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        $params["product_slug"] = $request->product_slug;
        $params["product_id"]   = $request->product_id;

        $items = $this->model->getItem($params, ['task' => 'news-get-item-product-detail']);
        if(empty($items))  return redirect()->route('home');

        $items['list_images'] = $this->model->getItem($params, ['task' => 'get-list-thumb-product-detail']);
        $items['attribute']   = $this->model->getItem(null, ['task' => 'get-list-thumb-product-id-modal']);
        foreach ($items['attribute'] as $key => $value) $params['attribute_id'][] = $value['id'];
        $items['list_attribute'] = $this->model->getItem($params, ['task' => 'get-list-thumb-product-id-modal-array']);

        // Merge Attribute
        $merge_attribute = Functions::fixArray_01($items['list_attribute'], 'value');
        $allAttribute    = Functions::merge_Multidi_Array_02($items['attribute'], $merge_attribute, 'id');
        foreach ($allAttribute as $key => $value) {
            if (!array_key_exists("detail", $value) ) {
                unset($allAttribute[$key]);
            }
        }
        $items['all_attribute'] = Functions::implode_01($allAttribute, 'detail', ', ');
        $items['comment']       = $this->model->getComment($params, ['task' => 'in-product-detail']);
        $items['related']       = $this->model->listItems($params, ['task' => 'news-list-items-related-in-product']);

        // $cart = $request->session()->get('cart');
        // echo '<pre style="color:red";>$cart === '; print_r($cart);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;
        // $request->session()->pull('cart');
        $setting=new SettingModel();
        $share_setting=$setting->getItem(['type'=>'share']);
        // echo '<pre style="color:red";>$share_setting === '; print_r($share_setting);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;
        return view($this->pathViewController . 'index', compact('items','share_setting'));
    }


    public function addToCart(Request $request)
    {
        $cart = $request->session()->get('cart');

        // echo '<pre style="color:red";>$cart === '; print_r($cart);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;

        $product_id      = $request->product_id;
        $quantity        = $request->quantity;
        $price           = $request->price;
        $total_price     = $request->total_price;
        $attribute_id    = explode(',', $request->attribute_id);
        $attribute_value = explode(',', $request->attribute_value);

        $arr = [
            'product_id'      => $product_id,
            'quantity'        => $quantity,
            'price'           => $price,
            'total_price'     => $total_price,
            'attribute_id'    => $attribute_id,
            'attribute_value' => $attribute_value
        ];

        if(!$cart){
            $cart[] = $arr;
        }else{
            array_push($cart, $arr);
		}

        $request->session()->put('cart', $cart);

        return response()->json($quantity);

    }

    public function get_image_modal(Request $request)
    {
        $params["product_id"] = $request->product_id;

                $result    = $this->model->getItem($params, ['task' => 'news-get-items-modal']);
        $result['comment'] = $this->model->getItem($params, ['task' => 'news-get-items-modal-rating-from-product-id']);

        return response()->json($result);

    }

    public function coupon(Request $request)
    {
        $params["coupon_name"] = $request->coupon_name;
        $params["total_price"] = $request->total_price;

        $items = $this->model->getItem($params, ['task' => 'news-get-items-get-price-coupon']);
        if ( // Ok
            $items['total_times'] >= $items['times_used'] &&
            (
                $params["total_price"] >= $items['min_price'] && 
                $params["total_price"] <= $items['max_price']
            ) && (
                ( ( time() - strtotime($items['date_start']) ) >= 0 ) &&
                ( ( strtotime($items['date_end']) - time() ) >= 0 )
            )
        ) {

            if ( $items['price'] == null || $items['price'] == '' ) {
                $result['value'] = $items['percent'];
                $result['type']  = 'percent';
            } else {
                $result['value'] = $items['price'];
                $result['type']  = 'price';
            }

            // Increase times_used Coupon +1
            // $this->model->getItem($params, 
            // ['task' => 'news-get-items-increase-coupon-times-used']);
        }else{
            $result['type'] = 'error';
        }

        if ($items == null || $items == '') {
            $result['type'] = 'error';
        }

        // $result = $result['total_times'];
        // $result = time();
        // $result = strtotime($items['date_start']);
        // $result = date("Y-m-d H:i:s", $result);
        // $result = date("H:i:s d-m-Y", $result);

        return response()->json($result);
    }


}