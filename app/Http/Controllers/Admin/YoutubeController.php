<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\YoutubeRequest as MainRequest;
use Illuminate\Http\Request;
use App\Models\SettingModel;

class YoutubeController extends Controller
{
    private $pathViewController = 'admin.pages.youtube.';
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
        // $link         = $settingModel->getItem(null, ['task' => 'admin-get-item-get-link-youtube-playlist']);
        // $items        = $settingModel->getItem(null, ['task' => 'admin-get-item-get-videos-id-youtube-playlist']);
        $playlistID   = $settingModel->youtubeList(null, ['task' => 'admin-get-item-get-link-youtube-playlist']);
        $items        = $settingModel->youtubeListId(null, ['task' => 'admin-get-item-get-videos-id-youtube-playlist']);

        return view($this->pathViewController . 'index', compact('items', 'link'));
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {

            $params = $request->all();
            $notify = "Cập nhật phần tử thành công!";

            $settingModel = new SettingModel();
            $settingModel->saveItem($params, ['task' => 'update-link-youtube-playlist']);
            
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }

}