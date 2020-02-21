<?php  
namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\Customer;
use App\Models\Profile;


class Customers extends BaseController{

	protected $customer;
    protected $profile;

    public function __construct()
    {
        parent::__construct();

        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }

        $this->customer = new Customer();
        
        $this->profile = new Profile();
    }

    // public function index()
    // {
    //     $customers = $this->customer->get_customers();
    //     $profiles = $this->profile->get_profiles();
    //     $title = 'Customers';
    //     return $this->view->render('admin/customers/index', compact('customers','profiles', 'title'));
    // }

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
                if ($phone_number == $this->customer->get_customer_phone($phone_number)){
                    $errors[] = 'Phone Number is already in use';
                }
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address';
            } else {
                if ($email == $this->customer->get_customer_email($email)){
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
                    'user_type' => 'CUSTOMER',
                    'on_a_ride' => false,
                    'current_location' => $location,
                    'phone_number' => $phone_number,
                   
                ];

                $this->customer->insert($data);
               
                
              
                $customerId= $this->profile->user_id($phone_number);
                
                $data2 = [
                    'first_name'=>$first_name,
                    'last_name' => $last_name,
                    'user_id' => $customerId->id,
                ];
                $this->profile->insert($data2);

                
                
                

                Session::set('success', 'Customer created');

                Url::redirect('/customers/add');

            }

        }

        $title = 'Register Customer';
        $this->view->render('admin/auth/customerRegister', compact('errors', 'title'));
    }
    
    public function edit($id)
    {
     if (! is_numeric($id)) {
         Url::redirect('/riders');
     }

     $rider = $this->rider->get_rider($id);

     if ($rider == null) {
         Url::redirect('/404');
     }

     $errors = [];

     if (isset($_POST['submit'])) {
         $location = (isset($_POST['location']) ? $_POST['location'] : null);

         if (count($errors) == 0) {

             $data = [
                 'current_location'=> $location
             ];

             $where = ['id' => $id];

             $this->rider->update($data, $where);

             Session::set('success', 'Rider updated');

             Url::redirect('/riders');

         }

     }

     $title = 'Edit Rider';
     $this->view->render('admin/riders/edit', compact('rider', 'errors', 'title'));
 }
 public function view($id)
 {
     if (! is_numeric($id)) {
         Url::redirect('/riders');
     }

     $rider = $this->rider->get_rider($id);
     $profile = $this->rider->get_rider_profile($id);

     if ($rider && $profile == null) {
         Url::redirect('/404');
     }

     $title = 'View Rider';
     $this->view->render('admin/riders/view', compact('rider','profile' , 'title'));
 }

 public function delete($id)
 {
     if (! is_numeric($id)) {
         Url::redirect('/riders');
     }

     $role = $this->rider->get_rider($id);
     $profile = $this->rider->get_rider_profile($id);

     if ($rider && $profile == null) {
         Url::redirect('/404');
     }

     $where = ['id' => $rider->id, 'user_id'=> $profile->user_id];

     $this->rider>delete($where);

     Session::set('success', 'Rider deleted');

     Url::redirect('/riders');
 }

}