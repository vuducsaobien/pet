<?php

namespace App\Models;

use App\Models\AdminModel;

class SettingModel extends AdminModel
{
    protected $guarded = ['type'];

    public function __construct()
    {
        $this->table               = 'setting';
        $this->folderUpload        = 'discount';
        $this->fieldSearchAccepted = ['key_value'];
        $this->crudNotAccepted     = ['_token'];    
    }

    public function saveItem($params = null, $options = null){
        $result = null;

        if ($options['task'] == 'general') {
            $value    = json_encode($this->prepareParams($params), JSON_UNESCAPED_UNICODE);
            $keyValue = 'setting-general';
            $this->where('key_value', $keyValue)->update(['value' => $value]);
        }

        if ($options['task'] == 'email-account') {
            $value    = json_encode($this->prepareParams($params), JSON_UNESCAPED_UNICODE);
            $keyValue = 'setting-email';
            $this->where('key_value', $keyValue)->update(['value' => $value]);
        }

        if ($options['task'] == 'email-bcc') {
            $keyValue = 'setting-bcc';
            $this->where('key_value', $keyValue)->update(['value' => $params['bcc']]);
        }

        if ($options['task'] == 'social') {
            $value    = json_encode($this->prepareParams($params), JSON_UNESCAPED_UNICODE);
            $keyValue = 'setting-social';
            $this->where('key_value', $keyValue)->update(['value' => $value]);
        }
        if ($options['task'] == 'share') {
            $value    = json_encode($this->prepareParams($params), JSON_UNESCAPED_UNICODE);
            $keyValue = 'setting-share';
            $this->where('key_value', $keyValue)->update(['value' => $value]);
        }

        if ($options['task'] == 'update-link-youtube-playlist') {
            $playlistID = substr($params['link'], strpos($params['link'], "=") + 1);
            $keyValue   = 'youtube-playlist-link';
            
            // Save playlist ID to Database
            self::where('key_value', $keyValue)->update(['value' => $playlistID]);

            // Get API From Youtube
            $api_key    = 'AIzaSyD9c63gg59C5CbZIoKHpN1id-4GhKbBTr8';
            $base_url   = 'https://www.googleapis.com/youtube/v3/';
            // https://www.youtube.com/playlist?list=PLV7_SDtanVwiClWBjnVr6ICDfvKS1qdl4
            // https://www.youtube.com/playlist?list=PLV7_SDtanVwhB_Fw6Glpojck_qKEngpUp
            $maxResult  = 10;
            $API_URL    = "{$base_url}playlistItems?part=snippet&maxResults=$maxResult&playlistId=$playlistID&key=$api_key";
            $video_list = json_decode(file_get_contents($API_URL), true);
    
            // Save Videos_Id to Database
            if($video_list['kind'] == 'youtube#playlistItemListResponse' )
            {
                $videos = $video_list['items'];
                foreach ($videos as $key => $value) {
                    $items[$key] = $value['snippet']['resourceId']['videoId'];
                }

                $items = json_encode($items, JSON_UNESCAPED_UNICODE);
                self::where('key_value', 'youtube-playlist-link-ids')->update(['value' => $items]);
            }

        }
        
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'admin-get-item-get-link-youtube-playlist') {
            $result = self::where('key_value', 'youtube-playlist-id')->value('value');
            $params = null;
            $options = null;
        }

        if ($options['task'] == 'admin-get-item-get-videos-id-youtube-playlist') {
            $result = self::where('key_value', 'youtube-playlist-link-ids')->value('value');

            if ($result) {
                $result = json_decode($result, true);
            }

            $params = null;
            $options = null;
        }

        if ($params != null) {
    
            if ($params['type'] == 'general') {
                $item   = $this->select('value')->where('key_value', 'setting-general')->firstOrFail()->toArray();
                $result = json_decode($item['value'], true);
            }
    
            if ($params['type'] == 'email') {
                        $item   = $this->select('value')->where('key_value', 'setting-email')->firstOrFail()->toArray();
                        $result = json_decode($item['value'], true);
                $result['bcc']  = $this->select('value')->where('key_value', 'setting-bcc')->first()->value;
            }
    
            if ($params['type'] == 'social') {
                $item   = $this->select('value')->where('key_value', 'setting-social')->firstOrFail()->toArray();
                $result = json_decode($item['value'], true);
            }

            if ($params['type'] == 'share') {
                $item = $this->select('value')->where('key_value', 'setting-share')->get()->toArray();

                if(empty($item)){
                    $params['key_value']='setting-share';
                    $params['value']="{}";
                    $this->create($params);
                }else{

                    $result = json_decode($item[0]['value'], true);
                }
            }
        }

        if ($options != null) {

            if ($options['task'] == 'news-list-items-footer') {
                        $item      = self::select('value')->where('key_value', 'setting-general')->firstOrFail()->toArray();
                $result['general'] = json_decode($item['value'], true);
    
                        $item     = self::select('value')->where('key_value', 'setting-social')->firstOrFail()->toArray();
                $result['social'] = json_decode($item['value'], true);
            }

            if ($options['task'] == 'news-get-item-setting-price') {
                $result['min']   = self::where('key_value', 'filter_price_min')->value('value');
                $result['max']   = self::where('key_value', 'filter_price_max')->value('value');
                $result['range'] = self::where('key_value', 'filter_price_range')->value('value');
            }

        }

        return $result;

    }
}
