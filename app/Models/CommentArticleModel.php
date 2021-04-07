<?php

namespace App\Models;

use App\Helpers\Template;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; 
use Kalnoy\Nestedset\NodeTrait;
class CommentArticleModel extends AdminModel
{
    use NodeTrait;

    protected $table = 'comment_article';
    protected $guarded = [];

    public function article()
    {
        return $this->belongsTo(ArticleModel::class,'article_id');
    }

    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items") {
            $result = self::with('article')->withDepth()
//                ->withDepth()
                ->defaultOrder()
                ->where('status', 'active')
                ->get()
                ->toFlatTree();
        }
        /*================================= lay commentArticle o menu frontend =============================*/
        if($options['task'] == 'news-list-items') {
            $result = self::where('article_id',$params['article_id'])
                ->withDepth()
                ->defaultOrder()
                ->where('status', 'active')
                ->get()
                ->toFlatTree();

        }

        if($options['task'] == 'news-list-items-is-home') {
            $query = $this->select('id', 'name', 'display')
                ->where('status', '=', 'active' )
                ->where('is_home', '=', 'yes' );

            $result = $query->get()->toArray();
          
        }

        if ($options['task'] == 'admin-list-items-in-select-box-for-article') {
            $nodes = self::select('id', 'name')
                ->withDepth()
                ->having('depth', '>', 0)
                ->defaultOrder()
                ->get()
                ->toFlatTree()
                ->toArray();

            foreach ($nodes as $value) {

                $result[$value['id']] = str_repeat('|---- ', $value['depth'] + 2) . $value['name'];
            }
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

        if ($options['task'] == 'news-breadcrumbs') {
            $result = self::withDepth()->having('depth', '>', 0)->defaultOrder()->ancestorsAndSelf($params['commentArticle_id'])->toArray();
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

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item') {
            $result = self::select('id','message', 'name', 'parent_id', 'status')->where('id', $params['id'])->first();
        }
        if($options['task'] == 'get-item-by-slug') {
            $result = self::select('id','thumb','slug', 'name', 'parent_id', 'status')->where('slug', $params['slug'])->first();
        }

        if($options['task'] == 'news-get-item') {
            $id = self::where('article_id',$params['article_id'])->where('parent_id',null)->get();
            foreach ($id as $item) {
                 $result[]=self::withDepth()->descendantsAndSelf($item->id)->toFlatTree();
            }


        }

        if($options['task'] == 'get-commentArticle-id-form-slug') {
            $result = self::where('slug', $params['slug'])->value('id');
        }

        if($options['task'] == 'news-get-item-all-food') {
            $productModel = new ProductModel();
            $result       = $productModel->getItem($params, ['task' => 'news-get-item-all-food']);
        }

        if($options['task'] == 'news-get-item-commentArticle-id') {
            $productModel = new ProductModel();
            $result       = $productModel->getItem($params, ['task' => 'news-get-item-commentArticle-id']);
        }

        if($options['task'] == 'news-get-item-all-slug') {
            $result = self::where('id', '>', 1)
            ->pluck('slug')
            ;
            // if($result) $result = $result->get()->toArray();
            if($result) {
                $result = $result->toArray();
                array_push($result, 'all-food');
            }
        }


        
        return $result;
    }

    public function saveItem($params = null, $options = null) { 
        if($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            $modifiedBy = session('userInfo')['username'];
            $modified   = date('Y-m-d H:i:s');
            self::where('id', $params['id'])->update(['status' => $status, 'modified' => $modified, 'modified_by' => $modifiedBy]);

            $result = [
                'id' => $params['id'],
                'modified' => Template::showItemHistory($modifiedBy, $modified),
                'status' => ['name' => config("zvn.template.status.$status.name"), 'class' => config("zvn.template.status.$status.class")],
                'link' => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }

        if($options['task'] == 'change-is-home') {
            $isHome = ($params['currentIsHome'] == "yes") ? "no" : "yes";
            self::where('id', $params['id'])->update(['is_home' => $isHome ]);
        }

        if($options['task'] == 'change-display') {
            $display = $params['currentDisplay'];
            $modifiedBy = session('userInfo')['username'];
            $modified   = date('Y-m-d H:i:s');
            self::where('id', $params['id'])->update(['display' => $display, 'modified' => $modified, 'modified_by' => $modifiedBy]);

            return [
                'id' => $params['id'],
                'modified' => Template::showItemHistory($modifiedBy, $modified),
                'message' => config('zvn.notify.success.update')
            ];
        }

        if($options['task'] == 'add-item') {
            if($options['task'] == 'add-item') {
                $params['created_by'] = session('userInfo')['username'];
                $params['created']    = date('Y-m-d');
                $parent=null;
                if(isset($params['parent_id'])){
                    $parent = self::find($params['parent_id']);
                }

                self::create($this->prepareParams($params),$parent);


            }

        }

        if ($options['task'] == 'edit-item') {
            $params['created_by'] = session('userInfo')['username'];
            $parent = self::find($params['parent_id']);

            $query = $current = self::find($params['id']);
            unset($params['slug']);


            $query->update($this->prepareParams($params));
            if($current->parent_id != $params['parent_id']) $query->prependToNode($parent)->save();
        }

        if ($options['task'] == 'change-ordering') {
            $ordering   = $params['ordering'];
            $modifiedBy = session('userInfo')['username'];
            $modified   = date('Y-m-d H:i:s');

            self::where('id', $params['id'])->update(['ordering' => $ordering, 'modified' => $modified, 'modified_by' => $modifiedBy]);

            $result = [
                'id' => $params['id'],
                'modified' => Template::showItemHistory($modifiedBy, $modified),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if ($options['task'] == 'delete-item') {
            $node = self::find($params['id']);
            $node->delete();
        }
    }

    public function move($params = null, $options = null)
    {
        $node = self::find($params['id']);
        $historyBy = session('userInfo')['username'];
        $this->where('id', $params['id'])->update(['modified_by' => $historyBy]);
        if ($params['type'] == 'down') $node->down();
        if ($params['type'] == 'up') $node->up();
    }

}

