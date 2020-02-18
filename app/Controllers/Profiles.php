<?php  
namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\Rider;
use App\Models\RiderProfile;


class Riders extends BaseController{

    protected $profile;

    public function __construct()
    {
        parent::__construct();

        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }
        
        $this->profile = new Profile();
    }

    // public function index()
    // {
    //     $profile = $this->RiderProfile->get_profiles();
    //     $title = 'Riders';
    //     return $this->view->render('admin/riders/index', compact('riders','profile', 'title'));
    // }



}