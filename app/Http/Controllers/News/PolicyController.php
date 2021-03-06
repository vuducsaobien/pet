<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\SettingModel;

class PolicyController extends Controller
{
    private $pathViewController = 'news.pages.policy.';
    private $controllerName     = 'policy';

    public function __construct()
    {
        View::share('controllerName', $this->controllerName);
    }

    public function use(Request $request)
    {
        $item           = null;
        $settingModel   = new SettingModel();
        $params['type'] = 'policy-use';
        $item           = $settingModel->getItem($params, null);

        return view($this->pathViewController . 'use', compact('item'));
    }

    public function exchange(Request $request)
    {
        $item           = null;
        $settingModel   = new SettingModel();
        $params['type'] = 'policy-exchange';
        $item           = $settingModel->getItem($params, null);

        return view($this->pathViewController . 'exchange', compact('item'));
    }

    public function shopping(Request $request)
    {
        $item           = null;
        $settingModel   = new SettingModel();
        $params['type'] = 'policy-shopping-guide';
        $item           = $settingModel->getItem($params, null);

        return view($this->pathViewController . 'shopping', compact('item'));
    }

    public function business(Request $request)
    {
        $item           = null;
        $settingModel   = new SettingModel();
        $params['type'] = 'policy-business-conception';
        $item           = $settingModel->getItem($params, null);

        return view($this->pathViewController . 'business', compact('item'));
    }


}