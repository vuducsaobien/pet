<?php
namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Models\CartModel;

class CheckoutController extends FrontendController
{

    public function __construct()
    {
        $this->pathViewController = 'news.pages.checkout.';
        $this->controllerName = 'checkout';
        // $this->model = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {   
        $cart  = $request->session()->get('cart');
        $items = null;

        if ( !empty($cart) ) {
            $items = [];
            foreach ($cart as $value) {
                $params['product_id'][]      = $value['product_id'];
                $params['attribute_id'][]    = $value['attribute_id'];
                $params['attribute_value'][] = $value['attribute_value'];
            }
            $cartModel = new CartModel();
            $info      = $cartModel->getItem($params, ['task' => 'news-list-items-get-product-info-in-cart']);
            $attribute = $cartModel->getItem($params, ['task' => 'news-list-items-get-product-attribute-in-cart']);
            // $items['attribute_value'] = $this->model->getItem($params, ['task' => 'news-list-items-get-product-attribute-value-in-cart']);
        
            foreach ($info as $key => $value) {
                $items[$key]                    = $value;
                $items[$key]['quantity']        = $cart[$key]['quantity'];
                $items[$key]['price']           = $cart[$key]['price'];
                $items[$key]['total_price']     = $cart[$key]['total_price'];
                $items[$key]['attribute']       = $attribute[$key];
                $items[$key]['attribute_value'] = $cart[$key]['attribute_value'];
            }
    
        }


        // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
        // echo '<pre style="color:red";>$attribute === '; print_r($attribute);echo '</pre>';
        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        
        // echo '<h3>Die is Called Checkout Controller</h3>';die;
        // $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);
        return view($this->pathViewController . 'index', compact('items'));
    }
}