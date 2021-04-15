<?php

namespace App\Http\Controllers\News;

use App\Models\CommentModel as MainModel;
use App\Http\Requests\CommentRequest as MainRequest;
use Illuminate\Http\Request;

class CommentController extends FrontendController
{
    public function __construct()
    {
        $this->controllerName     = 'comment';
        $this->pathViewController = '';
        $this->model              = new MainModel();
        parent::__construct();
    }

    // public function addComment(Request $request)
    public function addComment(MainRequest $request)

    {
        echo '<h3>Die is Called Comment COntroller</h3>';die;

        echo '<pre style="color:red";>$params === '; print_r($request);echo '</pre>';

        echo '<h3>Die is Called Comment COntroller</h3>';die;

        if ($request->method() == 'POST') {
            $params = $request->all();

            echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';

            echo '<h3>Die is Called Comment COntroller</h3>';die;

            $notify = "Gửi Comment thành công, Pet Shop xin cám ơn!";

            // $this->model->saveItem($params, ['task' => 'add-item-news']);
            // return redirect()->back()->with("news_notify", $notify);
        }
    }

}