<?php

namespace App\Http\Controllers\Admin;
use App\Models\CartModel as MainModel;
use App\Http\Requests\CartRequest as MainRequest;
use Illuminate\Http\Request;
use App\Helpers\Functions;

class CartController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.cart.';
        $this->controllerName = 'cart';
        $this->model = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->params['filter']['status']   = $request->input('filter_status', 'all' ) ;
        $this->params['filter']['category'] = $request->input('filter_category', 'all' ) ;
        $this->params['search']['field']    = $request->input('search_field', '' ) ;
        $this->params['search']['value']    = $request->input('search_value', '' ) ;

        // Items Customer
        $items              = $this->model->listItems($this->params, ['task'  => 'admin-list-items-customer']);
        $itemsStatusCount   = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);

        // Items Cart
        $itemsCart      = $this->model->listItems($this->params, ['task'  => 'admin-list-items']);
        $attribute_name = $this->model->listItems(null, ['task'  => 'admin-list-items-get-all-attribute-name']);
        $prepareParams  = $this->model->fixArray($itemsCart, ['task' => 'fix-array-01']);

        $params['main']           = $prepareParams;
        $params['attribute_name'] = $attribute_name;
        $params    = $this->model->fixArray($params, ['task' => 'fix-array-02']);
        $attribute = $this->model->fixArray($params, ['task' => 'fix-array-03']);

        $params['main']      = $itemsCart;
        $params['attribute'] = $attribute;

        $itemsCart = $this->model->fixArray($params, ['task'  => 'fix-array-04']);
        $itemsCart = Functions::merge_05($itemsCart);

        foreach ($items as $key => $value) $items[$key]['detail'] = $itemsCart[$key];
        // $items = $items->toArray();

        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        // echo '<h3>Die is Called Controller</h3>';die;

        return view($this->pathViewController .  'index', [
            'params'           => $this->params,
            'items'            => $items,
            'itemsStatusCount' => $itemsStatusCount,
        ]);
    }

    public function view(Request $request)
    {
        $params["id"] = $request->id;

        // Items Customer
        $item = $this->model->getItem( $params, ['task' => 'get-item']);

        // Items Payment
        $item['payment'] = $this->model->getItem( $item['payment_id'], ['task' => 'get-payment-name-from-id']);
        unset($item['payment_id']);

        // Items Cart
        $itemsCart      = $this->model->listItems($item['order_code'], ['task'  => 'admin-list-items-view-cart']);
        $attribute_name = $this->model->listItems(null, ['task'  => 'admin-list-items-get-all-attribute-name']);
        $prepareParams  = $this->model->fixArray($itemsCart, ['task' => 'fix-array-01']);

        $params['main']           = $prepareParams;
        $params['attribute_name'] = $attribute_name;
        $params    = $this->model->fixArray($params, ['task' => 'fix-array-02']);
        $attribute = $this->model->fixArray($params, ['task' => 'fix-array-03']);

        $params['main']      = $itemsCart;
        $params['attribute'] = $attribute;
                $itemsCart   = $this->model->fixArray($params, ['task'  => 'fix-array-04']);
        $item   ['detail']   = $itemsCart;
        
        return view($this->pathViewController .  'view', [
            'item'        => $item
        ]);
    }
}