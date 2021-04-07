<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use App\Models\CommentArticleModel;
use App\Models\SettingModel;
use Illuminate\Http\Request;

use App\Models\ArticleModel;
use App\Models\CategoryModel;

class ArticleController extends Controller
{
    private $pathViewController = 'news.pages.article.';  // slider
    private $controllerName     = 'article';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {

         $articleModel  = new ArticleModel();
         $items = $articleModel->getItem(null, ['task' => 'news-get-item']);


        return view($this->pathViewController .  'index', compact(
            'items'

        ));
    }

    public function detail(Request $request)
    {

        $articleModel  = new ArticleModel();
        $params['slug']=$request->article_slug;
        $item = $articleModel->getItem($params, ['task' => 'news-get-item-by-slug']);
        $comment=new CommentArticleModel();
        $itemComment=$comment->listItems(['article_id'=>$item->id],['task'=>'news-list-items']);

        $setting=new SettingModel();
        $share_setting=$setting->getItem(['type'=>'share']);






        return view($this->pathViewController .  'detail', compact(
            'item','itemComment','share_setting'

        ));
    }

    public function postComment(Request $request)
    {
        $params=$request->all();
        $commentArticleModel=new CommentArticleModel();
        $commentArticleModel->saveItem($params, ['task' => 'add-item']);

        return redirect()->back();


    }


 
}