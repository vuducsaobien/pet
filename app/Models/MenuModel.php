<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;
use Kalnoy\Nestedset\NodeTrait;

class MenuModel extends AdminModel
{
    use NodeTrait;

    protected $table   = 'menu';
    protected $guarded = [];

    // public function __construct()
    // {
    //     $this->table               = 'menu';
    //     $this->folderUpload        = 'menu';
    //     $this->fieldSearchAccepted = ['id', 'name', 'link'];
    //     $this->crudNotAccepted     = ['_token'];
    // }

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if($options['task'] == "admin-list-items") {
            $result = self::withDepth()
                ->having('depth', '>', 0)
                ->defaultOrder('asc')
                ->get()
                ->toFlatTree()
                ;
        }

        if($options['task'] == 'news-list-items') {
            $result = self::withDepth()
                ->having('depth', '>', 0)
                ->defaultOrder()
                ->where('status', 'active')
                ->get()
                ->toTree()
            ;
        }

        if ($options['task'] == 'news-list-items-footer') {
            $query = $this->select('id', 'name', 'link', 'type_menu', 'type_link')
                ->where('status', 'active')->where('name', 'Contact Us')
            ;

            $result = $query->get();
        }

        if($options['task'] == "admin-list-items-in-select-box") {
            $query = self::select('id', 'name')->withDepth()->defaultOrder();
       
           
            /*================================= truong hop edit =============================*/
            if (isset($params['id'])) {
                $node = self::find($params['id']);
                $query->where('_lft', '<', $node->_lft)->orWhere('_lft', '>', $node->_rgt);
            }
            
            $nodes = $query->get();

            foreach ($nodes as $value) {
                $result[$value['id']] = str_repeat('|---- ', $value['depth']) . $value['name'];
            }
        }


        return $result;
    }

    public function countItems($params = null, $options  = null) {
     
        $result = null;

        if($options['task'] == 'admin-count-items-group-by-status') {
         
            $query = $this::groupBy('status')
                        ->select( DB::raw('status , COUNT(id) as count') );

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }

            $result = $query->get()->toArray();
           

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

        if ($options['task'] == 'change-ordering') {
            $ordering = $params['ordering'];
            $this->where('id', $params['id'])->update(['ordering' => $ordering]);

            return [
                'id'      => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }

        if ($options['task'] == 'change-type-menu') {
            $typeMenu = $params['selectedTypeMenu'];
            $this->where('id', $params['id'])->update(['type_menu' => $typeMenu]);

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

        if ($options['task'] == 'change-link') {

            $typeLink = $params['data'];
            $this->where('id', $params['id'])->update(['link' => $typeLink]);

            return [
                'id'      => $params['id'],
                'message' => config('zvn.notify.success.update'),
                'link'    => $params['data']
            ];
        }

        if ($options['task'] == 'add-item') {
            $params['created_by'] = $createdBy;
            $params['created']    = $created;

            $prepare = $this->prepareParams($params);
            $parent  = self::find($params['parent_id']);
            self::create($prepare, $parent);
        }

        if ($options['task'] == 'edit-item') {
            $params['created_by'] = $createdBy;
            $parent = self::find($params['parent_id']);

            $query = $current = self::find($params['id']);
            $query->update($this->prepareParams($params));
            if($current->parent_id != $params['parent_id']) $query->prependToNode($parent)->save();
        }

    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $node = self::find($params['id']);
            $node->delete();
        }
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;
        if ($options['task'] == 'get-item') {
            $result = $this->select('id', 'name', 'link', 'ordering', 'type_menu', 'type_link', 'status')
                ->where('id', $params['id'])->first()
            ;
        }

        return $result;
    }

    public function move($params = null, $options = null)
    {
        $node       = self::find($params['id']);
        $modifiedBy = session('userInfo')['username'];

        $this->where('id', $params['id'])->update(['modified_by' => $modifiedBy]);
        if ($params['type'] == 'down') $node->down();
        if ($params['type'] == 'up') $node->up();
    }


}
