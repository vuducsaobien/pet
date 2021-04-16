<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubcribeModel as MainModel;

class SubcribeController extends AdminController
{
    public function __construct()
    {
        $this->controllerName     = 'subcribe';
        $this->pathViewController = 'admin.pages.subcribe.';
        parent::__construct();
        $this->model = new MainModel();
    }
}
