<?php

namespace App\Models;

use App\Helpers\Template;
use App\Models\AdminModel;
use App\Models\SettingModel;
use Illuminate\Support\Facades\DB; 
use Kalnoy\Nestedset\NodeTrait;

class CategoryModel extends AdminModel
{
    use NodeTrait;

    protected $table   = 'category';
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(ProductModel::class,'category_id');
    }

    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items") {
            $result = self::withDepth()
                ->having('depth', '>', 0)
                ->defaultOrder()
                ->get()
                ->toFlatTree();
        }

        if($options['task'] == 'news-list-items') {
            $result = self::withDepth()
                ->having('depth', '>', 0)
                ->defaultOrder()
                ->where('status', 'active')
                ->get()
                ->toTree()
                ->toArray()
                ;
        }

        if($options['task'] == 'news-list-items-category') {
            $result = self::withDepth()
                ->having('depth', '>', 0)
                ->defaultOrder()
                ->where('status', 'active')
                ->get()
                ->toTree()
                ->toArray();
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
                $result[$value['id']] = str_repeat('|---- ', $value['depth'] - 1) . $value['name'];
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
            $result = self::withDepth()->having('depth', '>', 0)->defaultOrder()->ancestorsAndSelf($params['category_id'])->toArray();
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
            $result = self::select('id','thumb','slug', 'name', 'parent_id', 'status')->where('id', $params['id'])->first();
        }
        if($options['task'] == 'get-item-by-slug') {
            $result = self::select('id','thumb','slug', 'name', 'parent_id', 'status')->where('slug', $params['slug'])->first();
        }

        if($options['task'] == 'news-get-item') {
            $result = self::select('id','thumb','slug', 'name', 'display')
            ->where('id', $params['category_id'])
            ->where('is_home', 'yes')
            ->first();

            if($result) $result = $result->toArray();
        }

        if($options['task'] == 'get-category-id-form-slug') {
            $result = self::where('slug', $params['slug'])->value('id');
        }

        if($options['task'] == 'news-get-item-get-display-from-slug') {
            $result = self::where('slug', $params['slug'])->value('display');
        }

        if($options['task'] == 'news-get-item-all-food') {
            $productModel = new ProductModel();
            $result       = $productModel->getItem($params, ['task' => 'news-get-item-all-food']);
        }

        if($options['task'] == 'news-get-item-category-id') {
            $productModel = new ProductModel();
            $result       = $productModel->getItem($params, ['task' => 'news-get-item-category-id']);
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

        if($options['task'] == 'news-get-item-category-search-product-name') {
            $productModel = new ProductModel();
            $result       = $productModel->listItems($params, ['task' => 'news-get-item-category-search-product-name']);
        }

        if($options['task'] == 'news-get-item-category-search-product-price') {
            $productModel = new ProductModel();
            $result       = $productModel->listItems($params, ['task' => 'news-get-item-category-search-product-price']);
        }

        if($options['task'] == 'news-get-item-category-search-product-name-and-price') {
            $productModel = new ProductModel();
            $result       = $productModel->listItems($params, ['task' => 'news-get-item-category-search-product-name-and-price']);
        }

        if($options['task'] == 'news-get-item-get-product-from-tag') {
            $productAttribModel = new ProductAttributeModel();
            $result             = $productAttribModel->getItem($params, ['task' => 'news-get-item-get-product-from-tag']);
        }

        if($options['task'] == 'news-get-item-get-product-from-brand') {
            $productAttribModel = new ProductAttributeModel();
            $result             = $productAttribModel->getItem($params, ['task' => 'news-get-item-get-product-from-brand']);
        }

        if($options['task'] == 'news-get-item-category-display') {
            $result = self::where('id', $params)->value('display');
        }

        if($options['task'] == 'news-get-item-setting-price') {
            $model  = new SettingModel();
            $result = $model->getItem(null, ['task' => 'news-get-item-setting-price']);
        }

        if($options['task'] == 'news-get-item-search-price-all-food') {
            $productModel = new ProductModel();
            $result       = $productModel->listItems($params, ['task' => 'news-get-item-search-price-all-food']);
        }

        if($options['task'] == 'get-product-info-from-product-list-id') {
            $productModel = new ProductModel();
            $result       = $productModel->getItem($params, ['task' => 'get-product-info-from-product-list-id']);
        }

        
        return $result;
    }

    public function saveItem($params = null, $options = null) { 
        $modifiedBy = session('userInfo')['username'];
        $modified   = date('Y-m-d H:i:s');
        $createdBy  = session('userInfo')['username'];
        $created    = date('Y-m-d H:i:s');

        if($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status, 'modified' => $modified, 'modified_by' => $modifiedBy]);

            $result = [
                'id'       => $params['id'],
                'modified' => Template::showItemHistory($modifiedBy, $modified),
                'status'   => [
                    'name'  => config("zvn.template.status.$status.name"),
                    'class' => config("zvn.template.status.$status.class")
                ],
                'link'     => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message'  => config('zvn.notify.success.update')
            ];

            return $result;
        }

        if($options['task'] == 'change-is-home') {
            $isHome = ($params['currentIsHome'] == "yes") ? "no" : "yes";
            self::where(
                'id', $params['id'])->update(['is_home' => $isHome, 
                'modified' => $modified, 'modified_by' => $modifiedBy]
            );

            return [
                'id'     => $params['id'],
                'ishome' => [
                    'name'  => config("zvn.template.is_home.$isHome.name"),
                    'class' => config("zvn.template.is_home.$isHome.class"),
                ],
                'link'    => route($params['controllerName'] . '/isHome', ['isHome' => $isHome, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];
        }

        if($options['task'] == 'change-display') {
            $display    = $params['currentDisplay'];
            self::where(
                'id', $params['id'])->update(['display' => $display, 'modified' => $modified, 'modified_by' => $modifiedBy]
            );

            return [
                'id'       => $params['id'],
                'modified' => Template::showItemHistory($modifiedBy, $modified),
                'message'  => config('zvn.notify.success.update')
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

        if ($options['task'] == 'change-ordering') {
            $ordering   = $params['ordering'];

            self::where(
                'id', $params['id'])->update(['ordering' => $ordering, 'modified' => $modified, 'modified_by' => $modifiedBy]
            );

            $result = [
                'id'       => $params['id'],
                'modified' => Template::showItemHistory($modifiedBy, $modified),
                'message'  => config('zvn.notify.success.update')
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
        $node       = self::find($params['id']);
        $modifiedBy = session('userInfo')['username'];

        $this->where('id', $params['id'])->update(['modified_by' => $modifiedBy]);
        if ($params['type'] == 'down') $node->down();
        if ($params['type'] == 'up') $node->up();
    }

}

