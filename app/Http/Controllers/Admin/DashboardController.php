<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SliderModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\ArticleModel;


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
        $itemSliderCount   = SliderModel::countItemsDashboad(); 
        $itemUserCount     = UserModel::countItemsDashboad(); 
        $itemCategoryCount = CategoryModel::countItemsDashboad(); 
        $itemArticleCount  = ArticleModel::countItemsDashboad(); 
        
        return view($this->pathViewController .  'index', compact([
            'itemSliderCount', 'itemUserCount', 'itemCategoryCount', 'itemArticleCount'
        ]));
    }

}

