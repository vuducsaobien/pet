<?php

namespace App\Http\Controllers\News;
use Illuminate\Http\Request;
use App\Models\CartModel as MainModel;
use App\Mail\MailService;

class CartController extends FrontendController
{

    public function __construct()
    {
        $this->pathViewController = 'news.pages.cart.';
        $this->controllerName = 'cart';
        $this->model = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {   
        $cart  = $request->session()->get('cart');
        $items = null;
        // echo '<pre style="color:red";>$cart === '; print_r($cart);echo '</pre>';
        if ( !empty($cart) ) {
            $items = [];
            foreach ($cart as $value) {
                $params['product_id'][]      = $value['product_id'];
                $params['attribute_id'][]    = $value['attribute_id'];
                $params['attribute_value'][] = $value['attribute_value'];
            }

            $info      = $this->model->getItem($params, ['task' => 'news-list-items-get-product-info-in-cart']);
            $attribute = $this->model->getItem($params, ['task' => 'news-list-items-get-product-attribute-in-cart']);
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
        
        // echo '<h3>Die is Called Cart Controller</h3>';die;
        // $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);
        return view($this->pathViewController . 'index', compact('items'));
    }

    public function postOrder(Request $request)
    {
        $data = $request->all()['info'];
        $cart = json_decode($request->cart, true);

        // echo '<pre style="color:red";>$data === '; print_r($data);echo '</pre>';
        // echo '<pre style="color:red";>$cart === '; print_r($cart);echo '</pre>';
        // echo '<h3>Die is Called Cart Controll</h3>';die;

        $order_code = $this->model->saveItem($data, ['task' => 'news-add-item-customer-model']);
        $data['order_code'] = $order_code;

              $mailService  = new MailService();
              $items        = $this->getProductDetail($cart);
        $data['cart']       = $items;
        $data['order_code'] = $order_code;
        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;
        $this->model->saveItem($data, ['task' => 'news-add-item-cart-model']);
        $mailService->sendOrderConfirm($data);
        $request->session()->pull('cart');
        return redirect()->route('contact/thankyou' )->with('news_notify', 
        'Cảm ơn bạn đã Đặt Hàng từ Shop !!.');
    }

    public function thankyou()
    {
        return view($this->pathViewController . 'thankyou');
    }

    public function getProductDetail($cart)
    {
        $result = null;

        if ( !empty($cart) ) {
            $result = [];
            foreach ($cart as $value) {
                $params['product_id'][]      = $value['product_id'];
                $params['attribute_id'][]    = $value['attribute_id'];
                $params['attribute_value'][] = $value['attribute_value'];
            }

            $info      = $this->model->getItem($params, ['task' => 'news-list-items-get-product-info-in-cart']);
            $attribute = $this->model->getItem($params, ['task' => 'news-list-items-get-product-attribute-in-cart']);
            // $result['attribute_value'] = $this->model->getItem($params, ['task' => 'news-list-items-get-product-attribute-value-in-cart']);
        
            foreach ($info as $key => $value) {
                $result[$key]                    = $value;
                $result[$key]['quantity']        = $cart[$key]['quantity'];
                $result[$key]['price']           = $cart[$key]['price'];
                $result[$key]['total_price']     = $cart[$key]['total_price'];
                $result[$key]['attribute']       = $attribute[$key];
                $result[$key]['attribute_value'] = $cart[$key]['attribute_value'];
            }
        }
        
        return $result;
    }
 
}