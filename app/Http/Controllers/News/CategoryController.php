<?php

namespace App\Http\Controllers\News;
use Illuminate\Http\Request;
use App\Models\CategoryModel as MainModel;

class CategoryController extends FrontendController
{

    public function __construct()
    {
        $this->pathViewController = 'news.pages.category.';
        $this->controllerName = 'category';
        $this->model = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {   
        $display      = 'grid';
        $search       = $request->search;
        $search_price = null;

        $setting_price = $this->model->getItem(null, ['task' => 'news-get-item-setting-price']);

        if ( $search == null ) {

            $params['slug']   = $request->category_slug;
                    $all_slug = $this->model->getItem(null, ['task' => 'news-get-item-all-slug']);
            if (!in_array($params['slug'], $all_slug)) {
                return redirect()->route('home');
            }

            // All Food
            if( $params['slug'] == 'all-food') {
                $items = $this->model->getItem($this->params, ['task' => 'news-get-item-all-food']);
            // Food in Category
            } else {
                $this->params['category_id'] = $this->model->getItem($params, ['task' => 'get-category-id-form-slug']);

                $items   = $this->model->getItem($this->params, ['task' => 'news-get-item-category-id']);
                $display = $this->model->getItem($this->params['category_id'], ['task' => 'news-get-item-category-display']);
            }

            // $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);
            return view($this->pathViewController . 'index', compact('items', 'search', 'display', 'setting_price', 'search_price'));

        }else{
            $this->params['search']  = $search;
            $items     = $this->model->getItem($this->params, ['task' => 'news-get-item-search-all-food']);
            return view($this->pathViewController . 'index', compact('items', 'search', 'display', 'setting_price', 'search_price'));
        }
    }
 
    public function search_price(Request $request)
    {
        $price_min     = $request->min;
        $price_max     = $request->max;
        $display       = 'grid';
        $search        = null;
        $setting_price = $this->model->getItem(null, ['task' => 'news-get-item-setting-price']);

        if ( !empty($price_min) && !empty($price_max) ) {
            $search_price['min'] = $price_min;
            $search_price['max'] = $price_max;

            $this->params['min']  = $price_min;
            $this->params['max']  = $price_max;

            $items     = $this->model->getItem($this->params, ['task' => 'news-get-item-search-price-all-food']);

            // echo '<pre style="color:red";>$search_price === '; print_r($search_price);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;

            return view($this->pathViewController . 'index', compact(
                'items', 'search', 'display', 'setting_price', 'search_price'
            ));
        }else{
            return redirect()->back();
        }

    }

}