<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class GalleryController extends Controller
{
    private $pathViewController = 'news.pages.gallery.';
    private $controllerName     = 'gallery';

    public function __construct()
    {
        View::share('controllerName', $this->controllerName);
    }

    public function index()
    {
        View::share('title', 'Thư viện hình ảnh');
        $directory = public_path(config('zvn.path.gallery'));
        $images    = File::files($directory);

        return view($this->pathViewController . 'index', compact('images'));
    }

}
