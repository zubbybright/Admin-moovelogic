<?php  
namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\User;

class Users extends BaseController{

	protected $user;

    public function __construct()
    {
        parent::__construct();

        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }

        $this->user = new User();
    }

	public function add()
    {
        
        $errors = [];

        if (isset($_POST['submit'])) {
        	$first_name            = (isset($_POST['first_name']) ? $_POST['first_name'] : null);
        	$last_name           = (isset($_POST['last_name']) ? $_POST['last_name'] : null);
            $username            = (isset($_POST['username']) ? $_POST['username'] : null);
            $email               = (isset($_POST['email']) ? $_POST['email'] : null);
            $password            = (isset($_POST['password']) ? $_POST['password'] : null);
            $password_confirm    = (isset($_POST['password_confirm']) ? $_POST['password_confirm'] : null);
            // $role               = (isset($_POST['role']) ? $_POST['role'] : null);

            if (strlen($username) < 3) {
                $errors[] = 'Username is too short';
            } else {
                if ($username == $this->user->get_user_username($username)){
                    $errors[] = 'Username address is already in use';
                }
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address';
            } else {
                if ($email == $this->user->get_user_email($email)){
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
                	'first_name'=>$first_name,
                	'last_name' => $last_name,
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                    // 'role' => $role
                ];

                $this->user->insert($data);

                Session::set('success', 'User created');

                Url::redirect('/users/add');

            }

        }

        $title = 'Create';
        $this->view->render('admin/auth/register', compact('errors', 'title'));
    }


	public function index()
    {
        $users = $this->user->get_users();
        $title = 'Users';

        $this->view->render('admin/users/index', compact('users', 'title'));
    }



    public function edit()
    {
        $id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        
        $user = $this->user->get_user($id);

        if ($user == null) {
            Url::redirect('/404');
        }

        $errors = [];

        if (isset($_POST['submit'])) {
            $first_name            = (isset($_POST['first_name']) ? $_POST['first_name'] : null);
            $last_name           = (isset($_POST['last_name']) ? $_POST['last_name'] : null);
            $username          = (isset($_POST['username']) ? $_POST['username'] : null);
            $email               = (isset($_POST['email']) ? $_POST['email'] : null);
            $password            = (isset($_POST['password']) ? $_POST['password'] : null);
            $password_confirm    = (isset($_POST['password_confirm']) ? $_POST['password_confirm'] : null);
            // $location           = (isset($_POST['location']) ? $_POST['location'] : null);


            
            // if (strlen($username) < 3 ) {
            //     $errors[] = 'username is too short';
            // } else {
            //     if ($username == $this->user->get_user_username($username)){
            //         $errors[] = 'Username is already in use';
            //     }
            // }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address';}
            // } else {
            //     if ($email == $this->user->get_user_email($email)){
            //         $errors[] = 'Email address is already in use';
            //     }
            // }

            if ($password != $password_confirm) {
                $errors[] = 'Passwords do not match';
            } elseif (strlen($password) < 3) {
                $errors[] = 'Password is too short';
            }

            if (count($errors) == 0) {

                $data = [
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                    'username' => $username,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                ];

                $where = ['id' => $id];

                $this->user->update($data, $where);

                Session::set('success', 'Profile updated');

                Url::redirect('/admin/profile');

            }

        }

        $title = 'Edit Profile';
        $this->view->render('admin/users/edit', compact('user', 'errors', 'title'));
    }


        public function addPic(){

            $id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                
            $user = $this->user->get_user($id);

            if ($user == null) {
                Url::redirect('/404');
            }
            $errors = [];

            if (isset($_POST['submit'])) {
                $avatar            = (isset($_POST['avatar']) ? $_POST['avatar'] : null);
            }

            $imagename = $_FILES["avatar"]["name"]; 
            $imagetmp = addslashes (file_get_contents($_FILES['avatar']['tmp_name']));

        

            if (count($errors) == 0) {

                $data = [
                    'avatar' => $avatar
                ];

                $where = ['id' => $id];

                $this->user->update($data, $where);

                Session::set('success', 'Profile updated');

                Url::redirect('/admin/profile');


            }
            $title = 'Edit Profile';
            $this->view->render('admin/users/edit', compact('user', 'errors', 'title'));
        }
}