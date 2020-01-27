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
            $username            = (isset($_POST['username']) ? $_POST['username'] : null);
            $email               = (isset($_POST['email']) ? $_POST['email'] : null);
            $password            = (isset($_POST['password']) ? $_POST['password'] : null);
            $password_confirm    = (isset($_POST['password_confirm']) ? $_POST['password_confirm'] : null);
            $role               = (isset($_POST['role']) ? $_POST['role'] : null);

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
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                    'role' => $role
                ];

                $this->user->insert($data);

                Session::set('success', 'User created');

                Url::redirect('/');

            }

        }

        $title = 'Register';
        $this->view->render('admin/auth/register', compact('errors', 'title'));
    }


	public function index()
    {
        $users = $this->user->get_users();
        $title = 'Users';

        $this->view->render('admin/users/index', compact('users', 'title'));
    }


}