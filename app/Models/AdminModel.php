<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 

class AdminModel extends Model
{
     
    public $timestamps = false;
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $table            = '';
    protected $folderUpload     = '' ;
    protected $fieldSearchAccepted   = [
        'id',
        'name'
    ]; 

    protected $crudNotAccepted = [
        '_token',
        'thumb_current',
    ];


    public function uploadThumb($thumbObj,$dir='') {

        $thumbName        = Str::random(10) . '.' . $thumbObj->clientExtension();

        $thumbObj->storeAs(!empty($dir)?$dir:$this->folderUpload, $thumbName, 'zvn_storage_image' );
        return $thumbName;
    }

    /*============== chuyen file tu tmp sang product,sắp xếp lại mảng để lưu vào database =============================*/
    public function dropzone($params)
    {
        foreach ($params['nameImage'] as $value) {
            if(file_exists(public_path('images/tmp/'.$value))){
                rename(public_path('images/tmp/'.$value),public_path('images/product/'.$value));
            }
        }
        $res = array_map(null, $params['nameImage'], $params['alt']);
        $keys = array("name", "alt");
        return array_map(function ($e) use ($keys) {
            return array_combine($keys, $e);
        }, $res);
    }

    public function deleteThumb($thumbName){
        Storage::disk('zvn_storage_image')->delete($this->folderUpload . '/' . $thumbName);
    }

    public function prepareParams($params){
        return array_diff_key($params, array_flip($this->crudNotAccepted));
    }


    public static function countItemsDashboad($params = null){
        return self::count();
    }

    public function status($params,$options)
    {
        if($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status ]);
            $result = [
                'id' => $params['id'],
                'status' => ['name' => config("zvn.template.status.$status.name"), 'class' => config("zvn.template.status.$status.class")],
                'link' => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }
    }

}

