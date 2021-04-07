<?php

namespace App\Models;

use App\Helpers\Template;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
class ArticleModel extends AdminModel
{
/*    public function __construct() {
        $this->table               = 'article';
        $this->folderUpload        = 'article' ; 
        $this->fieldSearchAccepted = ['name', 'content']; 
        $this->crudNotAccepted     = ['_token','thumb_current'];
    }*/
    protected $table='article';
    protected $folderUpload='article';
    protected $fieldSearchAccepted=['name','content'];
    protected $crudNotAccepted=['_token','thumb_current'];

    public function comments()
    {
        return $this->hasMany(CommentArticleModel::class,'article_id','id');
    }
    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this
                    ->select("*")
//                ->leftJoin('category as c', 'article.category_id', '=', 'c.id')
            ;


            if ($params['filter']['status'] !== "all")  {
                $query->where('status', '=', $params['filter']['status'] );
            }

            if ($params['filter']['category'] !== "all")  {
                $categories = CategoryModel::descendantsAndSelf($params['filter']['category'])->pluck('id')->toArray();
                $query->whereIN('a.category_id', $categories);
            }

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere( $column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }


            $result =  $query->orderBy('article.id', 'desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);


        }

        if($options['task'] == 'news-list-items') {
            $query = $this->select('id','slug', 'name', 'thumb','created','created_by')
                        ->where('status', '=', 'active' )
                        ->limit(3);

            $result = $query->get();
        }

        if($options['task'] == 'news-list-items-featured') {
	
            $query = $this->select('a.id', 'a.name', 'a.content', 'a.category_id', 'c.name as category_name', 'a.thumb')
                ->leftJoin('category as c', 'a.category_id', '=', 'c.id')
                ->where('a.status', '=', 'active')
                ->where('a.type', 'featured')
                ->orderBy('a.id', 'desc')
                ->take(3);

            $result = $query->get()->toArray();
        }

        
        if($options['task'] == 'news-list-items-latest') {
            
            $query = $this->select('a.id', 'a.name', 'a.created', 'a.category_id', 'c.name as category_name', 'a.thumb')
                ->leftJoin('category as c', 'a.category_id', '=', 'c.id')
                ->where('a.status', '=', 'active')
                ->orderBy('id', 'desc') 
                ->take(4);
            ;
            $result = $query->get()->toArray();
        }

        if($options['task'] == 'news-list-items-in-category') {
            $query = $this->select('id', 'name', 'content', 'thumb', 'created')
                ->where('status', '=', 'active')
                ->where('category_id', '=', $params['category_id'])
                ->take(4)
            ;
            $result = $query->get()->toArray();
        }
        
        if($options['task'] == 'news-list-items-related-in-category') {
            $query = $this->select('id', 'name', 'content', 'thumb', 'created')
                ->where('status', '=', 'active')
                ->where('a.id', '!=', $params['article_id'])
                ->where('category_id', '=', $params['category_id'])
                ->take(4)
            ;
            $result = $query->get()->toArray();
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
            $result = self::select('id', 'slug','name', 'content', 'status', 'thumb', 'category_id')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

/*        if($options['task'] == 'news-get-item') {
            $result = self::select('a.id', 'a.name','a.slug', 'content', 'a.category_id', 'c.name as category_name', 'a.thumb', 'a.created', 'c.display')
                         ->leftJoin('category as c', 'a.category_id', '=', 'c.id')
                         ->where('a.id', '=', $params['article_id'])
                         ->where('a.status', '=', 'active')->first();
            if($result) $result = $result->toArray();
        }*/
        if($options['task']=='news-get-item'){
            $result=self::select('id','name','slug','content','created_by','created','thumb')->paginate(6);
        }
        if($options['task']=='news-get-item-recent'){
            $result=self::select('id','name','slug','content','created_by','created','thumb')->take(3)->orderBy('id','desc')->get();
        }
        if($options['task']=='news-get-item-by-slug'){
            $result=self::with('comments')->where('slug',$params['slug'])->first();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) { 


        if($options['task'] == 'change-type') {
            self::where('id', $params['id'])->update(['type' => $params['currentType']]);
            return [
                'id' => $params['id'],
                'message' => config('zvn.notify.success.update')
            ];
        }
        

        if($options['task'] == 'add-item') {



            $params['created_by'] = "hailan";
            $params['created']    = date('Y-m-d');
//            $params['thumb']      = $this->uploadThumb($params['thumb']);



            self::insert($this->prepareParams($params));        
        }

        if($options['task'] == 'edit-item') {
            /*if(!empty($params['thumb'])){
                // Xóa hình cũ
                $this->deleteThumb($params['thumb_current']);

                // Up hình mới
                $params['thumb']      = $this->uploadThumb($params['thumb']);
            }*/

            $params['modified_by']   = "hailan";
            $params['modified']      = date('Y-m-d');

            self::where(['id' => $params['id'] ] )->update($this->prepareParams($params));
        }

        if ($options['task'] == 'change-category') {
            $params['modified_by']  = session('userInfo')['username'];
            $params['modified']     = date('Y-m-d H:i:s');
            $this->where('id', $params['id'])->update($this->prepareParams($params));

            $result = [
                'id' => $params['id'],
                'modified' => Template::showItemHistory($params['modified_by'], $params['modified']),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            $item   = self::getItem($params, ['task'=>'get-thumb']);
            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

}

