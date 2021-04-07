<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

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


        
        return view($this->pathViewController .  'index', compact([
            'itemsSliderCount', 'itemsUserCount', 'itemsCategoryCount', 'itemsArticleCount',
            'itemsAttributeCount', 'itemsCartCount', 'itemsCommentArticleCount', 
            'itemsCommentCount', 'itemsContactCount', 'itemsCustomerCount', 'itemsDiscountCount',
            'itemsMenuCount', 'itemsPageCount', 'itemsPaymentCount', 'itemsProductAttributeCount',
            'itemsProductImageCount', 'itemsProductCount', 'itemsRecruitmentCount', 'itemsRssCount',
            'itemsSettingCount', 'itemsShippingCount', 'itemsTeamCount',
            'itemsTestimoniaCount', 'itemsUserCount', 'itemsRssContentCount'
        ]));
    }

}

