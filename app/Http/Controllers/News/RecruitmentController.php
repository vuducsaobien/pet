<?php

namespace App\Http\Controllers\News;
use App\Models\RecruitmentModel as MainModel;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RecruitmentController extends FrontendController
{
    public function __construct()
    {
        $this->pathViewController = 'news.pages.recruitment.';
        $this->controllerName     = 'recruitment';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        View::share('title', 'Tuyển Dụng');

        $items        = $this->model->getItem($this->params, ['task' => 'news-get-item']);

        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        // echo '<h3>Die is Called Index Recruiment</h3>';die;

        return view($this->pathViewController .  'index', compact(
            'items'
        ));
    }

    public function detail(Request $request)
    {
        $params['slug'] = $request->recruitment_slug;
        $item           = $this->model->getItem($params, ['task' => 'news-get-item-by-slug']);
        View::share('title', $item['name'] );
        
        // echo '<pre style="color:red";>$item === '; print_r($item);echo '</pre>';
        // echo '<h3>Die is Called Detail Recreuiment</h3>';die;

        $setting       = new SettingModel();
        $share_setting = $setting->getItem(['type'=>'share']);

        return view($this->pathViewController .  'detail', compact(
            'item', 'share_setting'
        ));
    }

}