<?php

namespace App\Controllers;
use System\BaseController;

class Home extends BaseController{
	
	public function index()
    {
        return $this->view->render('Login');
    }

    public function dashboard()
    {
        return $this->view->render('dashboard');
    }
}