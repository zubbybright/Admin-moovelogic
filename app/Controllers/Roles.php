<?php
namespace App\Controllers;

Use App\Helpers\Session;
Use App\Helpers\Url;
use System\BaseController;
use App\Models\Role;

class Roles extends BaseController{

    protected $role;
    
    public function __construct()
    {
        parent::__construct();
        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }
        $this->role = new Role();
    }

    public function index()
    {
        $roles = $this->role->get_roles();
        $title = 'Roles';
        return $this->view->render('admin/roles/index', compact('roles', 'title'));
    }

    public function add()
    {
        $errors = [];

        if (isset($_POST['submit'])) {
            $title  = (isset($_POST['title']) ? $_POST['title'] : null);
            $description = (isset($_POST['description']) ? $_POST['description'] : null);          

            if (count($errors) == 0) {

                $data = [
                    'title' => $title,
                    'description' => $description,
                ];

                $this->role->insert($data);

                Session::set('success', 'Role created');

                Url::redirect('/roles');

            }

        }

        $this->view->render('admin/roles/add', compact('errors'));
    }

    public function edit($id)
    {   
        if ( is_numeric($id)) {
            

        $role = $this->role->get_role($id);

        if ($role == null) {
            Url::redirect('/404');
        }

        $errors = [];

        if (isset($_POST['submit'])) {
            $title  = (isset($_POST['title']) ? $_POST['title'] : null);
            $description = (isset($_POST['description']) ? $_POST['description'] : null); 

            if (count($errors) == 0) {

                $data = [
                    'title' => $title,
                    'description' => $description,
                ];

                $where = ['id' => $id];

                $this->role->update($data, $where);

                Session::set('success', 'Role updated');

                Url::redirect('/roles');

            }

        }

        $title = 'Edit Role';
        $this->view->render('admin/roles/edit', compact('role', 'errors', 'title'));

        }
    }

    // public function edit($id)
    // {
    //     if ( is_numeric($id)) {

    //         $role = $this->role->get_role($id);   
            
    //             if ($role == null) {
    //                 Url::redirect('/404');
    //             }
    
     
    //         $errors = [];
    
    //         if (isset($_POST['submit'])) {
    //             $title  = (isset($_POST['title']) ? $_POST['title'] : null);
    //             $description = (isset($_POST['description']) ? $_POST['description'] : null); 

    //             if (count($errors) == 0) {

    //                 $data = [
    //                     'title' => $title,
    //                     'description' => $description,
    //                 ];

    //                 $where = ['id' => $id];

    //                 $this->role->update($data, $where);

    //                 Session::set('success', 'Role updated');

    //                 Url::redirect('/roles');

    //             }

        
    
    //         $title = 'Edit Role';
    //         $this->view->render('admin/roles/edit', compact('role', 'errors', 'title'));
            
        
    //         }

    //     }

    // }

    public function view($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/roles');
        }

        $role = $this->role->get_role($id);

        if ($role == null) {
            Url::redirect('/404');
        }

        $title = 'View Role';
        $this->view->render('admin/roles/view', compact('role',  'title'));
    }

    public function delete($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/roles');
        }

        $role = $this->role->get_role($id);

        if ($role == null) {
            Url::redirect('/404');
        }

        $where = ['id' => $role->id];

        $this->role->delete($where);

        Session::set('success', 'Role deleted');

        Url::redirect('/roles');
    }
}