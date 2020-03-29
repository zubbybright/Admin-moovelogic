<?php  
namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\Rider;
use App\Models\Profile;
use System\BaseModel;
use App\Config;
use App\Helpers\Database;


class Riders extends BaseController{

	
    protected $profile;
    protected $rider;
    

    public function __construct()
    {
        parent::__construct();

        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }

        
        $this->rider= new Rider();
        $this->profile = new Profile();
       
    }

    public function index()
    {
        $riders = $this->profile->get_profiles();
        // var_dump($riders);
        //     die();
        $title = 'Riders and Customers';
        return $this->view->render('admin/Riders_Customers/index', compact('riders', 'title'));
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

            }
            
            $riderId= $this->profile->user_id($phone_number);
            // echo $riderId; die();
                
            $data2 = [
                'first_name'=>$first_name,
                'last_name' => $last_name,
                'user_id' => $riderId->id,
            ];

            
            $this->profile->insert($data2);

            Session::set('success', 'Rider created');

            Url::redirect('/riders/add');

        }

        $title = 'Register Rider';
        $this->view->render('admin/auth/riderRegister', compact('errors', 'title'));
    }

    public function all_riders(){
        $riders = $this->rider->get_riders();
        //  var_dump($riders);
        //     die();
        $title = ' Riders';
        return $this->view->render('admin/Riders_Customers/riders', compact('riders', 'title'));
    }

   

    public function edit($id)
    {
     if ( is_numeric($id)) {

        $rider = $this->rider->get_id($id);   
           
        // if ($rider == null) {
        //     Url::redirect('/404');
        // }
   
     
       $errors = [];
   
           if (isset($_POST['submit'])) {
               $first_name = (isset($_POST['first_name']) ? $_POST['first_name'] : null);
               $last_name = (isset($_POST['last_name']) ? $_POST['last_name'] : null); 
               $email = (isset($_POST['email']) ? $_POST['email'] : null); 
               $phone_number = (isset($_POST['phone_number']) ? $_POST['phone_number'] : null); 
               $password = (isset($_POST['password']) ? $_POST['password'] : null); 
               $password_confirm = (isset($_POST['password_confirm']) ? $_POST['password'] : null); 
               $location = (isset($_POST['location']) ? $_POST['location']: null);
   
   
           if (strlen($phone_number) < 11 ) {
               $errors[] = 'phone_number must not be less than 11 digits';}
       
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $errors[] = 'Please enter a valid email address';}
   
           if ($password != $password_confirm) {
               $errors[] = 'Passwords do not match';
           } elseif (strlen($password) < 3) {
               $errors[] = 'Password is too short';
           }
   
            if (count($errors) == 0) {
   
                $data = [
                    
                    'email' => $email,
                    'phone_number' => $phone_number,
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                    'current_location' => $location
                ];
   
                $where = ['id' => $id];
   
                $this->rider->update($data, $where);

                $data2 = [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                ];
                
                $where = ['user_id' => $id];

                $this->profile->update($data2, $where);

   
                Session::set('success', ' Updated');
   
                Url::redirect('/riders');
   
            }
   
        }
   
        $title = 'Edit';
        $this->view->render('admin/Riders_Customers/edit', compact('rider', 'errors', 'title'));
           
    
     }


    }
    public function view($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/riders');
        }

        $rider = $this->rider->get_id($id);

        if ($rider == null) {
            Url::redirect('/404');
        }

        $title = 'View';
        $this->view->render('admin/Riders_Customers/view', compact('rider', 'title'));
    }

    public function delete($id)
    {
        if (is_numeric($id)) {

        $profile = $this->profile->get_profile($id);

        if ($profile == null) {
            Url::redirect('/404');
        }
        $where = ['id' => $profile->id];
        $this->profile->delete($where);
        //  var_dump($profile);;
        //    die();

        $where2 = ['id' => $profile->user_id];
        $this->rider->delete($where2);

        Session::set('success', 'Deleted');

        Url::redirect('/riders');
    }
}

}