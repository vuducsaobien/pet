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
        // echo '<h3>Die is Called Index</h3>';die;

        $display      = 'grid';
        $search_name  = null;
        $search_price = null;

        $setting_price = $this->model->getItem(null, ['task' => 'news-get-item-setting-price']);

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
        return view($this->pathViewController . 'index', compact('items', 'search_name', 'display', 'setting_price', 'search_price'));
    }
 
    public function search(Request $request)
    {
        // echo '<h3>Die is Called Search</h3>';die;
        $all           = $request->all();
        $search_name   = $request->search_name;
        $price_min     = $request->min;
        $price_max     = $request->max;
        $setting_price = $this->model->getItem(null, ['task' => 'news-get-item-setting-price']);

        // Get Category Id From URL when Search
        $url_current = url()->current();
        $slug        = explode('/', $url_current);
        array_pop($slug);
        $slug = end($slug);
        $slug = explode(".", $slug, 2);
        $slug = $slug[0];

        $this->params['search_name']      = $search_name;
        $this->params['slug']             = $slug;
        $this->params['search_price_min'] = $price_min;
        $this->params['search_price_max'] = $price_max;

        // echo '<pre style="color:red";>$this->params === '; print_r($this->params);echo '</pre>';
        // echo '<pre style="color:red";>$slug === '; print_r($slug);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;
        
        $display = $this->model->getItem($this->params, ['task' => 'news-get-item-get-display-from-slug']);

        // Search Name + Price
        if ( $price_min !== null && $price_min !== '' && $price_max !== null && $price_max !== '' &&
            $search_name !== null && $search_name !== ''
        ) {
            $items   = $this->model->getItem($this->params, ['task' => 'news-get-item-category-search-product-name-and-price']);
            $search_price['min'] = $price_min;
            $search_price['max'] = $price_max;

            // Search_name
        } else if( $search_name !== null && $search_name !== '' ) {
            $items   = $this->model->getItem($this->params, ['task' => 'news-get-item-category-search-product-name']);
            $search_price = null;

            // Search_Price
        } else if( $price_min !== null && $price_min !== '' && $price_max !== null && $price_max !== '' ) {
            $items   = $this->model->getItem($this->params, ['task' => 'news-get-item-category-search-product-price']);
            $search_price['min'] = $price_min;
            $search_price['max'] = $price_max;
        }
        

        if (!$display) $display = 'grid';
        $slug = $slug . '.html';
        // $items        = $items->toArray();

        return view($this->pathViewController . 'index', compact(
            'items', 'search_name', 'display', 'setting_price', 'search_price', 'slug'
        ));
    }

}