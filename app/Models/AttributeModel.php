<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;

class AttributeModel extends AdminModel
{
    public function __construct()
    {
        $this->table               = 'attribute';
        $this->folderUpload        = 'attribute';
        $this->fieldSearchAccepted = ['id', 'name', 'link'];
        $this->crudNotAccepted     = ['_token'];
    }

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'admin-list-items') {
            $query = $this->select('id', 'name', 'ordering','status');

            if (isset($params['filter']['status']) && $params['filter']['status'] != 'all') $query->where('status', $params['filter']['status']);

            if ($params['search']['value'] != '') {
                if ($params['search']['field'] == 'all') {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $field) {
                            $query->orWhere($field, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }

            $result = $query->orderBy('id', 'asc')->paginate($params['pagination']['totalItemsPerPage']);
        }
        if($options['task']=='admin-list-items-for-product'){
            return $this->select('id', 'name', 'ordering','status')->orderBy('ordering','asc')->get()->toArray();
        }

        if($options['task'] == 'news-list-items-get-product-attribute-in-cart') {

            // foreach ($params as $key => $value) {
            //     foreach ($value as $keyChild => $valueChild) {
            //         $result[$key][$keyChild] = self::select('id', 'name')
            //         ->where('status', 'active')
            //         ->where('id', $valueChild)
            //         ->first()->toArray();
            //     }
            // }

            foreach ($params as $key => $value) {
                foreach ($value as $keyChild => $valueChild) {
                    $result[$key][$keyChild] = self::where('status', 'active')
                    ->where('id', $valueChild)
                    ->value('name')
                    ;
                }
            }


            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            // echo '<pre style="color:red";>$result === '; print_r($result);echo '</pre>';
            // echo '<h3>Die is Called Attribute Model</h3>';die;
        }

        return $result;
    }

    public function countItems($params = null, $options = null)
    {
        $result = null;

        if ($options == null) {
            $query = $this->select(DB::raw('COUNT(id) AS count'));
            $result = $query->first()->toArray()['count'];
            return $result;
        }

        if ($options['task'] == 'admin-count-items-group-by-status') {
            $query = $this->select(DB::raw('status, COUNT(id) AS count'));

            if ($params['search']['value'] != '') {
                if ($params['search']['field'] == 'all') {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $field) {
                            $query->orWhere($field, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }

            $result = $query->groupBy('status')->get()->toArray();
        }
        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'change-link') {
            $link = $params['link'];
            $this->where('id', $params['id'])->update(['link' => $link]);

            return [
                'id' => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }

        if ($options['task'] == 'change-type-attribute') {
            $typeAttribute = $params['selectedTypeAttribute'];
            $this->where('id', $params['id'])->update(['type_attribute' => $typeAttribute]);
            return [
                'id' => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }

        if ($options['task'] == 'change-type-link') {
            $typeLink = $params['selectedTypeLink'];
            $this->where('id', $params['id'])->update(['type_link' => $typeLink]);
            return [
                'id' => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }

        if ($options['task'] == 'add-item') {
            $this->insert($this->prepareParams($params));
        }

        if ($options['task'] == 'edit-item') {
            $this->where('id', $params['id'])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $this->where('id', $params['id'])->delete();
        }
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;
        if ($options['task'] == 'get-item') {
            $result = $this->select('id', 'name', 'ordering', 'status')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'get-list-thumb-product-id-modal') {
            // $result = self::select('id', 'name')->where('status', 'active')->orderBy('ordering')->limit(2)->get();
            $result = self::select('id', 'name')->where('status', 'active')->orderBy('ordering')->limit(2)->get()->toArray();
        }

        if ($options['task'] == 'get-attribute-id-from-attribute-name') {
            $result = self::whereIn('name', $params)->pluck('id')->toArray();
        }

        if ($options['task'] == 'admin-list-items-get-all-attribute-name') {
            $result = self::where('status', 'active')->pluck('name', 'id')->toArray();
        }
        

        return $result;
    }
}
