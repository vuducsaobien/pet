<?php

namespace App\Http\Controllers\News;
use App\Models\FaqModel as MainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FaqController extends FrontendController
{
    public function __construct()
    {
        $this->pathViewController = 'news.pages.faq.';
        $this->controllerName     = 'faq';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        // View::share('title', 'Câu Hỏi Thường Gặp');
        $title = 'Câu Hỏi Thường Gặp';
        $items = $this->model->getItem($this->params, ['task' => 'news-get-item']);

        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        // echo '<h3>Die is Called Index Recruiment</h3>';die;

        return view($this->pathViewController .  'index', compact(
            'items', 'title'
        ));
    }

}