<?php

namespace App\Http\Controllers\News;

use App\Helpers\Feed;
use App\Http\Controllers\Controller;
use App\Models\RssModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RssController extends Controller
{
    private $pathViewController = 'news.pages.rss.';
    private $controllerName = 'rss';
    private $params = [];

    public function __construct()
    {
        View::share('controllerName', $this->controllerName);
    }

    public function index()
    {
        View::share('title', 'Tin tức tổng hợp');

        $rssModel = new RssModel();
        $data = $rssModel->listItems(null, ['task' => 'news-list-items']);
        $items = Feed::read($data);

        // return view($this->pathViewController . 'index', compact('items'));
        return view($this->pathViewController . 'index');

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
