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

}