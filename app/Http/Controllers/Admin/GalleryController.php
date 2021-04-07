<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class GalleryController extends Controller
{
    private $pathViewController = 'admin.pages.gallery.';
    private $controllerName = 'gallery';
    private $params = [];

    public function __construct()
    {
        View::share('controllerName', $this->controllerName);
    }

    public function index()
    {
        return view($this->pathViewController . 'index');
    }
}
