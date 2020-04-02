<?php
namespace App\Controllers;

Use App\Helpers\Session;
Use App\Helpers\Url;
use System\BaseController;
use App\Models\Package;

class Packages extends BaseController{

    protected $package;
    
    public function __construct()
    {
        parent::__construct();
        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }
        $this->package = new Package();
    }

    public function index()
    {
        $packages = $this->package->get_packages();
        $title = 'Packages';
        return $this->view->render('admin/packages/index', compact('packages', 'title'));
    }

    public function view($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/packages');
        }

        $package = $this->package->get_package($id);

        if ($package == null) {
            Url::redirect('/404');
        }

        $title = 'View Package';
        $this->view->render('admin/packages/view', compact('package',  'title'));
    }


}