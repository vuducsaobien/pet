<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helpers\Functions;

use App\Models\ArticleModel;
use App\Models\AttributeModel;
use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\CommentArticleModel;
use App\Models\CommentModel;
use App\Models\ContactModel;
use App\Models\CustomerModel;
use App\Models\DiscountModel;
use App\Models\MenuModel;
use App\Models\PageModel;
use App\Models\PaymentModel;
use App\Models\ProductAttributeModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use App\Models\RecruitmentModel;
use App\Models\RssContentModel;
use App\Models\RssModel;
use App\Models\SettingModel;
use App\Models\ShippingModel;
use App\Models\SliderModel;
use App\Models\TeamModel;
use App\Models\TestimonialModel;
use App\Models\UserModel;
use App\Models\FaqModel;

class DashboardController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.dashboard.';
        $this->controllerName = 'dashboard';
        parent::__construct();
    }

    public function index(Request $request)
    {
        $itemsArticleCount          = ArticleModel::countItemsDashboad();
        $itemsAttributeCount        = AttributeModel::countItemsDashboad();
        $itemsCartCount             = CartModel::countItemsDashboad();
        $itemsCategoryCount         = CategoryModel::countItemsDashboad();
        $itemsCommentArticleCount   = CommentArticleModel::countItemsDashboad();
        $itemsCommentCount          = CommentModel::countItemsDashboad();
        $itemsContactCount          = ContactModel::countItemsDashboad();
        $itemsCustomerCount         = CustomerModel::countItemsDashboad();
        $itemsDiscountCount         = DiscountModel::countItemsDashboad();
        $itemsMenuCount             = MenuModel::countItemsDashboad();
        $itemsPageCount             = PageModel::countItemsDashboad();
        $itemsPaymentCount          = PaymentModel::countItemsDashboad();
        $itemsProductAttributeCount = ProductAttributeModel::countItemsDashboad();
        $itemsProductImageCount     = ProductImageModel::countItemsDashboad();
        $itemsProductCount          = ProductModel::countItemsDashboad();
        $itemsRecruitmentCount      = RecruitmentModel::countItemsDashboad();
        $itemsRssContentCount       = RssContentModel::countItemsDashboad();
        $itemsRssCount              = RssModel::countItemsDashboad();
        $itemsSettingCount          = SettingModel::countItemsDashboad();
        $itemsShippingCount         = ShippingModel::countItemsDashboad();
        $itemsSliderCount           = SliderModel::countItemsDashboad();
        $itemsTeamCount             = TeamModel::countItemsDashboad();
        $itemsTestimoniaCount       = TestimonialModel::countItemsDashboad();
        $itemsUserCount             = UserModel::countItemsDashboad();
        $itemsFaqCount              = FaqModel::countItemsDashboad();

        $itemsCart    = $this->cart($request);
        $itemsContact = $this->contact($request);
        
        return view($this->pathViewController .  'index', compact([
            'itemsSliderCount', 'itemsUserCount', 'itemsCategoryCount', 'itemsArticleCount',
            'itemsAttributeCount', 'itemsCartCount', 'itemsCommentArticleCount', 
            'itemsCommentCount', 'itemsContactCount', 'itemsCustomerCount', 'itemsDiscountCount',
            'itemsMenuCount', 'itemsPageCount', 'itemsPaymentCount', 'itemsProductAttributeCount',
            'itemsProductImageCount', 'itemsProductCount', 'itemsRecruitmentCount', 'itemsRssCount',
            'itemsSettingCount', 'itemsShippingCount', 'itemsTeamCount',
            'itemsTestimoniaCount', 'itemsUserCount', 'itemsRssContentCount', 
            'itemsCart', 'itemsContact', 'itemsFaqCount'
        ]));
    }

    public function cart(Request $request)
    {
        $this->params['filter']['status']   = $request->input('filter_status', 'all' ) ;
        $this->params['filter']['category'] = $request->input('filter_category', 'all' ) ;
        $this->params['search']['field']    = $request->input('search_field', '' ) ;
        $this->params['search']['value']    = $request->input('search_value', '' ) ;

        // Items Customer
        $cartModel        = new CartModel();
        $items            = $cartModel->listItems($this->params, ['task'  => 'admin-list-items-customer-dashboard']);

        // Items Cart
        $itemsCart      = $cartModel->listItems($this->params, ['task'  => 'admin-list-items']);
        $attribute_name = $cartModel->listItems(null, ['task'  => 'admin-list-items-get-all-attribute-name']);
        $prepareParams  = $cartModel->fixArray($itemsCart, ['task' => 'fix-array-01']);

        $params['main']           = $prepareParams;
        $params['attribute_name'] = $attribute_name;
        $params    = $cartModel->fixArray($params, ['task' => 'fix-array-02']);
        $attribute = $cartModel->fixArray($params, ['task' => 'fix-array-03']);

        $params['main']      = $itemsCart;
        $params['attribute'] = $attribute;

        $itemsCart = $cartModel->fixArray($params, ['task'  => 'fix-array-04']);
        $itemsCart = Functions::merge_05($itemsCart);

        foreach ($items as $key => $value) $items[$key]['detail'] = $itemsCart[$key];
        // $items = $items->toArray()['data'];

        // $items = array_slice($items, 0, 2);
        // echo '<pre style="color:red";>$itemss === '; print_r($itemss);echo '</pre>';
        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';

        // echo '<h3>Die is Called </h3>';die;

        return $items;
    }

    public function contact(Request $request)
    {
        $this->params['filter']['status']   = $request->input('filter_status', 'all' ) ;
        $this->params['filter']['category'] = $request->input('filter_category', 'all' ) ;
        $this->params['search']['field']    = $request->input('search_field', '' ) ;        // all id description
        $this->params['search']['value']    = $request->input('search_value', '' ) ;

        $contactModel     = new ContactModel();
        $items            = $contactModel->listItems($this->params, ['task'  => 'admin-list-items-dashboard']);

        return $items;
    }



}

