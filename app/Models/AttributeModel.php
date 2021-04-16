<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;
use App\Helpers\Template;

class AttributeModel extends AdminModel
{
    public function __construct()
    {
        $this->table               = 'attribute';
        $this->folderUpload        = 'attribute';
        $this->fieldSearchAccepted = ['name'];
        $this->crudNotAccepted     = ['_token'];    
    }

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'admin-list-items') {
            $query = $this->select('id', 'name', 'ordering','status', 'created', 'created_by',
                'modified_by', 'modified'
            );

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
            return self::select('id', 'name', 'ordering','status')->where('status', 'active')
            ->orderBy('ordering','asc')->get()->toArray();
        }

        if($options['task'] == 'news-list-items-get-product-attribute-in-cart') {
            foreach ($params as $key => $value) {
                foreach ($value as $keyChild => $valueChild) {
                    $result[$key][$keyChild] = self::where('status', 'active')
                    ->where('id', $valueChild)
                    ->value('name')
                    ;
                }
            }
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
        $result     = null;
        $modifiedBy = session('userInfo')['username'];
        $modified   = date('Y-m-d H:i:s');
        $createdBy  = session('userInfo')['username'];
        $created    = date('Y-m-d H:i:s');

        if ($options['task'] == 'change-link') {
            $link = $params['link'];
            $this->where('id', $params['id'])->update(['link' => $link]);

            return [
                'id'      => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }

        if ($options['task'] == 'change-type-attribute') {
            $typeAttribute = $params['selectedTypeAttribute'];
            $this->where('id', $params['id'])->update(['type_attribute' => $typeAttribute]);
            return [
                'id'      => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }

        if ($options['task'] == 'change-type-link') {
            $typeLink = $params['selectedTypeLink'];
            $this->where('id', $params['id'])->update(['type_link' => $typeLink]);
            return [
                'id'      => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }

        if ($options['task'] == 'change-ordering') {
            $ordering   = $params['ordering'];

            self::where( 'id', $params['id'])
                ->update([
                    'ordering'    => $ordering,
                    'modified'    => $modified,
                    'modified_by' => $modifiedBy
                ]
            );

            $result =  [
                'id'       => $params['id'],
                'modified' => Template::showItemHistory($modifiedBy, $modified),
                'message'  => config('zvn.notify.success.update')
            ];

            return $result;
        }

        if ($options['task'] == 'add-item') {
            $params['created_by'] = $createdBy;
            $params['created']    = $created;
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
            $result = self::select('id', 'name')->where('status', 'active')->where('name', 'NOT LIKE', '%tag%')
            ->orderBy('ordering')->get()->toArray();
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
