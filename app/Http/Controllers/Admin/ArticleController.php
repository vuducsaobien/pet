<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleModel as MainModel;
use App\Models\CategoryModel;
use App\Models\SubcribeModel;
use App\Mail\MailService;

use App\Http\Requests\ArticleRequest as MainRequest ;
use Illuminate\Support\Str;

class ArticleController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.article.';
        $this->controllerName = 'article';
        $this->model = new MainModel();
        parent::__construct();
    }

    public function form(Request $request)
    {
        $item = null;
        if($request->id !== null ) {
            $params["id"] = $request->id;
            $item = $this->model->getItem( $params, ['task' => 'get-item']);
        }

        $categoryModel  = new CategoryModel();
        $itemsCategory  = $categoryModel->listItems(null, ['task' => 'admin-list-items-in-select-box']);

        return view($this->pathViewController .  'form', [
            'item'        => $item,
            'itemsCategory'=>$itemsCategory
        ]);
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            if(empty($params['slug'])){
                $params['slug']=Str::slug($params['name']);
            }

            
            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if($params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }

    public function type(Request $request) {

        $params["currentType"]    = $request->type;
        $params["id"]             = $request->id;
        $result=$this->model->saveItem($params, ['task' => 'change-type']);
        echo json_encode($result);
    }

    public function sendMailToSubcribe(Request $request)
    {
        $params['article_id'] = $request->article_id;
        $article_info = $this->model->getItem($params, ['task' => 'admin-get-item-get-article-info-from-article-id']);



        $mailService = new MailService();
        $mailService->sendArticle($article_info);

        // echo '<pre style="color:red";>$article_id === '; print_r($article_id);echo '</pre>';
        // echo '<pre style="color:red";>$emails === '; print_r($emails);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;

        return redirect()->route($this->controllerName)->with('zvn_notify', 'Gửi Bài viết Thành Công!');
    }

}