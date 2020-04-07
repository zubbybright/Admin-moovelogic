<?php 
namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Admin extends BaseController
{
    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = new User();
    }

    public function index()
    {
        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }

        $title = 'Dashboard';

        $this->view->render('admin/index', compact('title'));
    }



    public function login()
    {
        //  echo password_hash('demo', PASSWORD_BCRYPT);

        if (Session::get('logged_in')) {
            Url::redirect('/admin');
        }

        $errors = [];

        if (isset($_POST['submit'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            if (password_verify($password, $this->user->get_hash($username)) == false) {
                $errors[] = 'Wrong username or password';
            }

            if (count($errors) == 0) {

                //logged in
                $data = $this->user->get_data($username);

                Session::set('logged_in', true);
                Session::set('user_id', $data->id);

                Url::redirect('/admin');
            }
        }

        $title = 'Login';

        $this->view->render('admin/auth/login', compact('title', 'errors'));
    }



    public function logout()
    {
        Session::destroy();
        Url::redirect('/admin/login');
    }

    public function reset()
    {
        if (Session::get('logged_in')) {
            Url::redirect('/admin');
        }

        $errors = [];

        if (isset($_POST['submit'])) {

           $email = (isset($_POST['email']) ? $_POST['email'] : null);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address';
            } else {
                if ($email != $this->user->get_user_email($email)){
                    $errors[] = 'Email address not found';
                }
            }

            if (count($errors) == 0) {

                $token = md5(uniqid(rand(),true));
                $data  = ['reset_token' => $token];
                $where = ['email' => $email];
                $this->user->update($data, $where);
        
                $mail = new PHPMailer(true);
                $mail->setFrom('noreply@moovelogic.com');
                $mail->addAddress($email);
                // $mail->isSMTP();
                $mail->Host = "smtp.mailtrap.io";
                $mail->SMTPAuth = true;
                $mail->Username = '8813df984fe70a';
                $mail->Password = 'b4c7e475644605';
                $mail->Subject = 'Reset your password';
                $mail->Body    = "<p>To change your password please click <a href='https://stg-admin.moovelogic.com/admin/change_password/$token'>this link</a></p>";
                $mail->AltBody = "To change your password please go to this address: https://stg-admin.moovelogic.com/admin/change_password/$token";
                $mail->send();
        

                Session::set('success', "Email sent to ".htmlentities($email));

                Url::redirect('/admin/reset');

            }

        }

        $title = 'Reset Password';

        $this->view->render('admin/auth/reset', compact('title', 'errors'));
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


    public function change_password($token)
    {
        if (Session::get('logged_in')) {
            Url::redirect('/admin');
        }

        $errors = [];

        $user = $this->user->get_user_reset_token($token);

        if ($user == null) {
            $errors[] = 'user not found.';
        }

        if (isset($_POST['submit'])) {

            $token            = htmlspecialchars($_POST['token']);
            $password         = htmlspecialchars($_POST['password']);
            $password_confirm = htmlspecialchars($_POST['password_confirm']);

            $user = $this->user->get_user_reset_token($token);

            if ($user == null) {
                $errors[] = 'user not found.';
            }

            if ($password != $password_confirm) {
                $errors[] = 'Passwords to not match';
            } elseif (strlen($password) < 3) {
                $errors[] = 'Password is too short';
            }

            if (count($errors) == 0) {

                $data  = [
                    'reset_token' => null,
                    'password' => password_hash($password, PASSWORD_BCRYPT)
                ];

                $where = [
                    'id' => $user->id,
                    'reset_token' => $token
                ];

                $this->user->update($data, $where);

                Session::set('logged_in', true);
                Session::set('user_id', $user->id);
                Session::set('success', "Password updated");

                Url::redirect('/admin');

            }

        }

        $title = 'Change Password';

        $this->view->render('admin/auth/change_password', compact('title', 'token', 'errors'));
    }


}
