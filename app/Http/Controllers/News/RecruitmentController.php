<?php

namespace App\Http\Controllers\News;
use App\Models\RecruitmentModel as MainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RecruitmentController extends FrontendController
{
    public function __construct()
    {
        $this->pathViewController = 'news.pages.recruitment.';
        $this->controllerName     = 'recruitment';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        View::share('title', 'Tuyển Dụng');

        $items        = $this->model->getItem($this->params, ['task' => 'news-get-item']);

        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        // echo '<h3>Die is Called Index Recruiment</h3>';die;

        return view($this->pathViewController .  'index', compact(
            'items'
        ));
    }

    public function detail(Request $request)
    {
        $articleModel   = new ArticleModel();
        $params['slug'] = $request->recruitment_slug;

        echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
        echo '<h3>Die is Called Detail Recreuiment</h3>';die;
        $item           = $articleModel->getItem($params, ['task' => 'news-get-item-by-slug']);
        $comment        = new CommentArticleModel();
        $itemComment    = $comment->listItems(['article_id'=>$item->id],['task'=>'news-list-items']);

        $setting       = new SettingModel();
        $share_setting = $setting->getItem(['type'=>'share']);

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