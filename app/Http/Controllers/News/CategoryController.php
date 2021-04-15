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
        $search       = null;
        $search_price = null;
        // $all          = $request->all();

        $setting_price = $this->model->getItem(null, ['task' => 'news-get-item-setting-price']);

        // if ( $search == null ) {
            // echo '<pre style="color:red";>$search === '; print_r($search);echo '</pre>';
            // echo '<h3>Die is Called 11</h3>';die;
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

        // }else{
        //     // Get Category Id From URL when Search
        //     $url_current = url()->current();
        //     $slug        = substr( strrchr( $url_current, '/' ), 1 );
        //     $slug        = explode(".", $slug, 2);
        //     $slug        = $slug[0];

        //     $this->params['search'] = $search;
        //     $this->params['slug']   = $slug;

        //     $items     = $this->model->getItem($this->params, ['task' => 'news-get-item-search-all-food']);
        //     return view($this->pathViewController . 'index', compact('items', 'search', 'display', 'setting_price', 'search_price'));
        // }
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
        // $slug        = substr( strrchr( $url_current, '/' ), 1 );
        // $slug        = explode(".", $slug, 2);
        // $slug        = $slug[0];

        $slug = explode('/', $url_current);
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
        $items   = $this->model->getItem($this->params, ['task' => 'news-get-item-search-product-name']);
        $display = $this->model->getItem($this->params, ['task' => 'news-get-item-get-display-from-slug']);
        if (!$display) $display = 'grid';
        
        $items = $items->toArray();

        echo '<pre style="color:red";>$display === '; print_r($display);echo '</pre>';
        echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        echo '<h3>Die is Called </h3>';die;


        // if ( !empty($price_min) && !empty($price_max) ) {
        //     $search_price['min'] = $price_min;
        //     $search_price['max'] = $price_max;

        //     $this->params['min']  = $price_min;
        //     $this->params['max']  = $price_max;

        //     $items     = $this->model->getItem($this->params, ['task' => 'news-get-item-search-price-all-food']);

        //     // echo '<pre style="color:red";>$search_price === '; print_r($search_price);echo '</pre>';
        //     // echo '<h3>Die is Called </h3>';die;

        //     return view($this->pathViewController . 'index', compact(
        //         'items', 'search', 'display', 'setting_price', 'search_price'
        //     ));
        // }else{
        //     return redirect()->back();
        // }

    }

}