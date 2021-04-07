<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;    

use App\Models\ArticleModel;

class NotifyController extends Controller
{
    private $pathViewController = 'news.pages.notify.';  // slider
    private $controllerName     = 'notify';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function noPermission(Request $request)
    {   
        // $articleModel  = new ArticleModel();
        // $itemsLatest   = $articleModel->listItems(null, ['task'  => 'news-list-items-latest']);

        return view($this->pathViewController .  'no-permission', [
            // 'itemsLatest'   => $itemsLatest,
        ]);
    }

}