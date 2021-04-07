<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\MailService;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\ContactModel as MainModel;

class ContactController extends Controller
{
    private $pathViewController = 'news.pages.confirm.';
    private $controllerName = 'confirm';
    private $params = [];
    private $model;

    public function __construct()
    {
        $this->model = new MainModel();
        View::share('controllerName', $this->controllerName);
    }

    public function index()
    {
        $setting=new SettingModel();
        $setting_general=$setting->getItem(['type'=>'general'],null);

        return view($this->pathViewController . 'index',compact(
            'setting_general'
        ));
    }

}
