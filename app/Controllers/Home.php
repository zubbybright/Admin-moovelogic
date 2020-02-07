<?php

namespace App\Controllers;
use System\BaseController;
use App\Controllers\Admin;

class Home extends BaseController{
	
	public function index()
    {
        return $this->view->render('../views/admin/auth/login');
    }

    public function dashboard()
    {
        return $this->view->render('../views/admin/index');
    }
}