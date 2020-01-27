<?php  
namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\Trip;

class Users extends BaseController{

	protected $trip;

	public function __construct{

		parent::__construct();

		if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }

        $this->$trip = new Trip();
        
	}
}