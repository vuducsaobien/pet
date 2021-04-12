<?php

namespace App\Http\Controllers\News;

use App\Helpers\Feed;
use App\Models\RssModel as MainModel;
use Illuminate\Support\Facades\View;

class RssController extends FrontendController
{

    public function __construct()
    {
        $this->pathViewController = 'news.pages.rss.';
        $this->controllerName     = 'rss';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function index()
    {
        View::share('title', 'Tin tức tổng hợp');

        $data     = $this->model->listItems(null, ['task' => 'news-list-items']);
        $items    = Feed::read($data);

        // echo '<pre style="color:red";>$data === '; print_r($data);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;

        return view($this->pathViewController . 'index', compact('items'));
    }

    public function getGold()
    {
        echo json_encode(Feed::getGold());
    }

    public function getCoin()
    {
        echo json_encode(Feed::getCoin());
    }

}
