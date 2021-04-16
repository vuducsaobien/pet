<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\SettingModel;

class YoutubeController extends Controller
{
    private $pathViewController = 'news.pages.youtube.';
    private $controllerName     = 'youtube';

    public function __construct()
    {
        View::share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $items = null;
        $link  = null;

        $settingModel = new SettingModel();
        $playlistID   = $settingModel->youtubeList(null, ['task' => 'admin-get-item-get-link-youtube-playlist']);
        $items        = $settingModel->youtubeListId(null, ['task' => 'admin-get-item-get-videos-id-youtube-playlist']);

        return view($this->pathViewController . 'index', compact('items'));
    }

}