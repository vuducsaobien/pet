<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Mail\MailService;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\SubcribeModel as MainModel;

class SubcribeController extends Controller
{
    private $pathViewController = 'news.pages.subcribe.';
    private $controllerName     = 'subcribe';
    private $params             = [];
    private $model;

    public function __construct()
    {
        $this->model = new MainModel();
        View::share('controllerName', $this->controllerName);
    }

    public function postSubcribe(Request $request)
    {
        $checkEmailExist = false;
        $email = $request->email;

        $checkEmailExist = $this->model->getItem($email, ['task' => 'news-add-item-check-email-exist']);
        if ($checkEmailExist) {
            return redirect()->route('contact/thankyou' )->with('news_notify', 
            'Email đã được đăng ký rồi !');
        }else{

            $this->model->saveItem($email, ['task' => 'news-add-item-add-new-email-subcribe']);

            // $mailService = new MailService();
            // $mailService->sendContactConfirm($data);
            // $mailService->sendContactInfo($data);
    
            return redirect()->route('contact/thankyou')
            ->with('news_notify', 'Cám ơn bạn đã đăng ký, Chúng tôi sẽ gửi bài viết mới nhất cho bạn !');
        }

    }

}
