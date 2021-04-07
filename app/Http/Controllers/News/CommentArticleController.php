<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\News\FrontendController;
use App\Models\CommentArticleModel as MainModel;
use App\Http\Requests\CommentArticleRequest as MainRequest;

class CommentArticleController extends FrontendController
{
    public function __construct()
    {
        $this->controllerName = 'commentArticle';
        $this->model = new MainModel();
        parent::__construct();
    }

    public function addCommentArticle(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();

            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';

            // echo '<h3>Die is Called CommentArticle COntroller</h3>';die;

            $notify = "Gửi CommentArticle thành công, Pet Shop xin cám ơn!";

            $this->model->saveItem($params, ['task' => 'add-item-news']);
            return redirect()->back()->with("news_notify", $notify);
        }
    }

}