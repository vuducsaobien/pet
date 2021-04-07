<?php

namespace App\Models;

use App\Helpers\Template;
use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;

class RssModel extends AdminModel
{
    public function __construct()
    {
        $this->table = 'rss';
        $this->folderUpload = 'slider';
        $this->fieldSearchAccepted = ['id', 'name', 'link'];
        $this->crudNotAccepted = ['_token'];
    }

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'admin-list-items') {
            $query = $this->select('id', 'name', 'link', 'status', 'ordering', 'source');

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

            $result = $query->orderBy('ordering', 'asc')->paginate($params['pagination']['totalItemsPerPage']);
        }

        if ($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'source', 'link')->where('status', 'active')->orderBy('ordering', 'asc'); 
            $result = $query->get()->toArray();
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
        if ($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status]);

            $result = [
                'id' => $params['id'],
                'status' => ['name' => config("zvn.template.status.$status.name"), 'class' => config("zvn.template.status.$status.class")],
                'link' => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }

        if ($options['task'] == 'change-ordering') {
            $ordering   = $params['ordering'];

            self::where('id', $params['id'])->update(['ordering' => $ordering]);

            $result = [
                'id' => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
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
            $result = $this->select('id', 'name', 'link', 'source', 'status')->where('id', $params['id'])->firstOrFail();
        }
        return $result;
    }
}
