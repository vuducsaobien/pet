<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\News\FrontendController;
use App\Models\CommentModel as MainModel;
use App\Http\Requests\CommentRequest as MainRequest;

class CommentController extends FrontendController
{
    public function __construct()
    {
        $this->controllerName = 'comment';
        $this->model = new MainModel();
        parent::__construct();
    }

    public function addComment(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();

            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';

            // echo '<h3>Die is Called Comment COntroller</h3>';die;

            $notify = "Gửi Comment thành công, Pet Shop xin cám ơn!";

            $this->model->saveItem($params, ['task' => 'add-item-news']);
            return redirect()->back()->with("news_notify", $notify);
        }
    }

}