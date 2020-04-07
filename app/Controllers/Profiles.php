<?php  
namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\User;
use App\Models\Profile;


class Profiles extends BaseController{

    protected $profile;

    public function __construct()
    {
        parent::__construct();

        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }
        
        $this->profile = new Profile();
        $this->user = new User();
    }

    public function index()
    {   

        $id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        
        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }

        if (! is_numeric($id)) {
            Url::redirect('/admin');
        }

        
        $profile = $this->user->get_user($id);
       
        if ($profile == null) {
            Url::redirect('/404');
        }

        $title = 'Profile';

        $this->view->render('admin/profile', compact('profile','title'));
    }

    public function profile_pic(){

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

            Url::redirect('/profiles');


        }
        $title = 'Edit Profile';
        $this->view->render('admin/profile', compact('user', 'errors', 'title'));
    }

}