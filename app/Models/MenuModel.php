<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;

class MenuModel extends AdminModel
{
    public function __construct()
    {
        $this->table = 'menu';
        $this->folderUpload = 'menu';
        $this->fieldSearchAccepted = ['id', 'name', 'link'];
        $this->crudNotAccepted = ['_token'];
    }

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'admin-list-items') {
            $query = $this->select('id', 'name', 'link', 'status', 'ordering', 'type_menu', 'type_link');

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
            $query = $this->select('id', 'name', 'link', 'type_menu', 'type_link')->where('status', 'active')->orderBy('ordering', 'asc');

            $result = $query->get();
        }

        if ($options['task'] == 'news-list-items-footer') {
            $query = $this->select('id', 'name', 'link', 'type_menu', 'type_link')->where('status', 'active')->where('name', 'Contact Us');

            $result = $query->get();
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
            $status = $params['currentStatus'] == 'active' ? 'inactive' : 'active';
            $this->where('id', $params['id'])->update(['status' => $status]);

            $result = [
                'id' => $params['id'],
                'status' => ['name' => config("zvn.template.status.$status.name"), 'class' => config("zvn.template.status.$status.class")],
                'link' => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }

        if ($options['task'] == 'change-ordering') {
            $ordering = $params['ordering'];
            $this->where('id', $params['id'])->update(['ordering' => $ordering]);
            return [
                'id' => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }

        if ($options['task'] == 'change-type-menu') {
            $typeMenu = $params['selectedTypeMenu'];
            $this->where('id', $params['id'])->update(['type_menu' => $typeMenu]);
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
        if ($options['task'] == 'change-link') {

            $typeLink = $params['data'];
            $this->where('id', $params['id'])->update(['link' => $typeLink]);
            return [
                'id' => $params['id'],
                'message' => config('zvn.notify.success.update'),
                'link'=>$params['data']
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
            $result = $this->select('id', 'name', 'link', 'ordering', 'type_menu', 'type_link', 'status')->where('id', $params['id'])->first();
        }

        return $result;
    }
}
