<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubcribeModel extends AdminModel
{
    public function __construct()
    {
        $this->table               = 'subcribe';
        $this->folderUpload        = 'subcribe';
        $this->fieldSearchAccepted = ['id', 'name', 'phone', 'email', 'message'];
        $this->crudNotAccepted     = ['_token'];
    }

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'email', 'status', 'created');

            if ($params['filter']['status'] !== "all") {
                $query->where('status', '=', $params['filter']['status']);
            }

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }

            $result =  $query
                ->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage'])
            ;
        }

        if($options['task'] == "admin-list-items-dashboard") {
            $query = $this->select('id', 'email', 'status', 'created');
            $result =  $query->whereDate( 'created', Carbon::today() )
            ->orderBy('id', 'desc')->get()->toArray()
            ;

        }


        return $result;
    }

    public function countItems($params = null, $options  = null)
    {
        $result = null;

        if ($options['task'] == 'admin-count-items-group-by-status') {

            $query = $this::groupBy('status')
                ->select(DB::raw('status , COUNT(id) as count'));

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }

            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        $modifiedBy = session('userInfo')['username'];
        $modified   = date('Y-m-d H:i:s');
        $createdBy  = session('userInfo')['username'];
        $created    = date('Y-m-d H:i:s');

        if ($options['task'] == 'news-add-item') {
            $params['created'] = $created;
            $params['ip']      = $_SERVER['REMOTE_ADDR'];

            $this->insert($this->prepareParams($params));
        }

        if ($options['task'] == 'news-add-item-add-new-email-subcribe') {
            // $prepare['created'] = $created;
            $prepare['email']   = $params;

            $this->insert($this->prepareParams($prepare));
        }

    }

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'news-add-item-check-email-exist') {
            $result = self::where('email', $params)->exists();
        }

        return $result;
    }


}
