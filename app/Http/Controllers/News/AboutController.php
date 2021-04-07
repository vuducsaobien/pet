<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use App\Models\TeamModel;
use Illuminate\Http\Request;
use App\Models\TestimonialModel;

class AboutController extends Controller
{
    private $pathViewController = 'news.pages.about.';  // slider
    private $controllerName     = 'about';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {   
        // $params["article_id"]  = $request->article_id;
        // $articleModel  = new ArticleModel();
        

        // $itemArticle = $articleModel->getItem($params, ['task' => 'news-get-item']);
        // if(empty($itemArticle))  return redirect()->route('home');
        
        // $itemsLatest   = $articleModel->listItems(null, ['task'  => 'news-list-items-latest']);
        
        // $params["category_id"]  = $itemArticle['category_id'];
        // $itemArticle['related_articles'] = $articleModel->listItems($params, ['task' => 'news-list-items-related-in-category']);

        // $categoryModel = new CategoryModel();
        // $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);
       
        $testimonialModel = new TestimonialModel();
        $itemsTestimonial = $testimonialModel->listItems(null, ['task' => 'news-list-items']);


        $teamModel = new TeamModel();
        $items = $teamModel->listItems(null, ['task' => 'news-list-items']);

        // echo '<pre style="color:red";>$itemsTestimonial === '; print_r($itemsTestimonial);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;
        // dd($itemsTestimonial);

        return view($this->pathViewController . 'index',compact(
            'itemsTestimonial','items'
        ));
    }

    

 
}