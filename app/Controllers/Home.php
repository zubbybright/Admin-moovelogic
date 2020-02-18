<?php

namespace App\Controllers;
use System\BaseController;

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