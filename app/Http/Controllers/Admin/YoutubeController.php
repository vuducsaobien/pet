<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
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
        $playlistID         = $settingModel->getItem('youtube-playlist-link', ['task' => 'admin-get-item-get-link-youtube-playlist']);
        // echo '<pre style="color:red";>$playlistID === '; print_r($playlistID);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;
        if ($playlistID) {
            $link       = "https://www.youtube.com/playlist?list=$playlistID";
            $api_key    = 'AIzaSyD9c63gg59C5CbZIoKHpN1id-4GhKbBTr8';
            $base_url   = 'https://www.googleapis.com/youtube/v3/';
            // $playlistID = 'PLV7_SDtanVwhB_Fw6Glpojck_qKEngpUp';
            $maxResult  = 10;
            $API_URL    = "{$base_url}playlistItems?part=snippet&maxResults=$maxResult&playlistId=$playlistID&key=$api_key";
    
            $video_list = json_decode(file_get_contents($API_URL), true);
    
            if($video_list['kind'] == 'youtube#playlistItemListResponse' )
            {
                $videos = $video_list['items'];
                foreach ($videos as $key => $value) {
                    // $items[$key]['title']    = $value['snippet']['title'];
                    // $items[$key]['images']   = $value['snippet']['thumbnails']['medium'];
                    // $items[$key]['video_id'] = $value['snippet']['resourceId']['videoId'];
    
                    $items[$key] = $value['snippet']['resourceId']['videoId'];
                }
            }
        }

        return view($this->pathViewController . 'index', compact('items', 'link'));
    }

    public function save(Request $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();

            $params['link'] = substr($params['link'], strpos($params['link'], "=") + 1);

            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            // echo '<pre style="color:red";>$whatIWant === '; print_r($whatIWant);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
            $notify = "Cập nhật phần tử thành công!";

            $settingModel = new SettingModel();
            $settingModel->saveItem($params, ['task' => 'update-link-youtube-playlist']);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }

}