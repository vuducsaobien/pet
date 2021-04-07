<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\ArticleModel;
use App\Models\MenuModel;
use App\Models\ProductModel;
use App\Models\TestimonialModel;
use Illuminate\Http\Request;
use App\Models\SliderModel;
use App\Models\CategoryModel;

class HomeController extends Controller
{
    private $pathViewController = 'news.pages.home.';
    private $controllerName = 'home';
    private $params = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {

        /*================================= lay category ==========================*/
        $categoryModel = new CategoryModel();
        $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items']);

        /*================================= lay slider ==========================*/
        $sliderModel = new SliderModel();
        $itemsSlider = $sliderModel->listItems(null, ['task' => 'news-list-items']);

        /*================================= lay testimonial ==========================*/
        $testimonialModel = new TestimonialModel();
        $itemsTestimonial = $testimonialModel->listItems(null, ['task' => 'news-list-items']);

        /*================================= lay recent product ==========================*/
        $productModel  = new ProductModel();
        $items         = $productModel->listItems(null, ['task' => 'news-list-items']);
        $itemsBestDeal = $productModel->listItems(null, ['task' => 'news-list-items-best-deal']);

        /*================================= lay recent article ==========================*/
        $articleModel = new ArticleModel();
        $itemsArticle = $articleModel->listItems(null, ['task' => 'news-list-items']);


        return view($this->pathViewController . 'index', compact('itemsCategory', 'itemsSlider', 'items', 'itemsArticle',
                'itemsTestimonial', 'itemsBestDeal'
        ));
    }

    public function notFound(Request $request)
    {
        return view($this->pathViewController . 'not-found', [
        ]);
    }


}