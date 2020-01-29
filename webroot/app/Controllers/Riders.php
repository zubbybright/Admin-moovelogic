<?php  
namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\Rider;
use App\Models\RiderProfile;


class Riders extends BaseController{

	protected $rider;
    protected $profile;

    public function __construct()
    {
        parent::__construct();

        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }

        $this->rider = new Rider();
        
        $this->profile = new RiderProfile();
    }

	public function add()
    {
        $errors = [];

        if (isset($_POST['submit'])) {
        	$first_name            = (isset($_POST['first_name']) ? $_POST['first_name'] : null);
        	$last_name           = (isset($_POST['last_name']) ? $_POST['last_name'] : null);
            $phone_number            = (isset($_POST['phone_number']) ? $_POST['phone_number'] : null);
            $email               = (isset($_POST['email']) ? $_POST['email'] : null);
            $password            = (isset($_POST['password']) ? $_POST['password'] : null);
            $password_confirm    = (isset($_POST['password_confirm']) ? $_POST['password_confirm'] : null);
            $location           = (isset($_POST['location']) ? $_POST['location'] : null);

            if (strlen($phone_number) < 11 ) {
                $errors[] = 'phone_number must not be less than 11 digits';
            } else {
                if ($phone_number == $this->rider->get_rider_phone($phone_number)){
                    $errors[] = 'Phone Number is already in use';
                }
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address';
            } else {
                if ($email == $this->rider->get_rider_email($email)){
                    $errors[] = 'Email address is already in use';
                }
            }

            if ($password != $password_confirm) {
                $errors[] = 'Passwords do not match';
            } elseif (strlen($password) < 3) {
                $errors[] = 'Password is too short';
            }

            if (count($errors) == 0) {

                $data = [
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                    'user_type' => 'RIDER',
                    'on_a_ride' => false,
                    'current_location' => $location,
                    'phone_number' => $phone_number,
                ];

                $saveRider = $this->rider->insert($data);
                
                $data2 = [
                    'first_name'=>$first_name,
                    'last_name' => $last_name,
                    'user_id' => $saveRider->id,
                ];

               
                
                $this->profile->insertProfile($data2);

                Session::set('success', 'Rider created');

                Url::redirect('/riders/add');

            }

        }

        $title = 'Register Rider';
        $this->view->render('admin/auth/riderRegister', compact('errors', 'title'));
    }


	// public function index()
 //    {
 //        $users = $this->user->get_users();
 //        $title = 'Users';

 //        $this->view->render('admin/users/index', compact('users', 'title'));
 //    }


}