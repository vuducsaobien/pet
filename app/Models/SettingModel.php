<?php

namespace App\Models;

use App\Models\AdminModel;

class SettingModel extends AdminModel
{

        protected $table = 'setting';
        protected $fieldSearchAccepted = ['key_value'];
        protected $crudNotAccepted = ['_token'];
        protected $guarded=['type'];
//        protected $timestamps = false;


    public function saveItem($params = null, $options = null){
        $result = null;

        if ($options['task'] == 'general') {
            $value = json_encode($this->prepareParams($params), JSON_UNESCAPED_UNICODE);
            $keyValue = 'setting-general';
            $this->where('key_value', $keyValue)->update(['value' => $value]);
        }

        if ($options['task'] == 'email-account') {
            $value = json_encode($this->prepareParams($params), JSON_UNESCAPED_UNICODE);
            $keyValue = 'setting-email';
            $this->where('key_value', $keyValue)->update(['value' => $value]);
        }

        if ($options['task'] == 'email-bcc') {
            $keyValue = 'setting-bcc';
            $this->where('key_value', $keyValue)->update(['value' => $params['bcc']]);
        }

        if ($options['task'] == 'social') {
            $value = json_encode($this->prepareParams($params), JSON_UNESCAPED_UNICODE);
            $keyValue = 'setting-social';
            $this->where('key_value', $keyValue)->update(['value' => $value]);
        }
        if ($options['task'] == 'share') {
            $value = json_encode($this->prepareParams($params), JSON_UNESCAPED_UNICODE);
            $keyValue = 'setting-share';
            $this->where('key_value', $keyValue)->update(['value' => $value]);
        }
        
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($params != null) {
            if ($params['type'] == 'general') {
                $item = $this->select('value')->where('key_value', 'setting-general')->firstOrFail()->toArray();
                $result = json_decode($item['value'], true);
            }
    
            if ($params['type'] == 'email') {
                $item = $this->select('value')->where('key_value', 'setting-email')->firstOrFail()->toArray();
                $result = json_decode($item['value'], true);
                $result['bcc'] = $this->select('value')->where('key_value', 'setting-bcc')->first()->value;
            }
    
            if ($params['type'] == 'social') {
                $item = $this->select('value')->where('key_value', 'setting-social')->firstOrFail()->toArray();
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
                $item = self::select('value')->where('key_value', 'setting-general')->firstOrFail()->toArray();
                $result['general'] = json_decode($item['value'], true);
    
                $item = self::select('value')->where('key_value', 'setting-social')->firstOrFail()->toArray();
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
