<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactModel as MainModel;

class ContactController extends AdminController
{
    public function __construct()
    {
        $this->controllerName = 'contact';
        $this->pathViewController = 'admin.pages.contact.';
        parent::__construct();
        $this->model = new MainModel();
    }
}
