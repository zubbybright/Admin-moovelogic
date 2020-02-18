<?php
namespace App\Controllers;

Use App\Helpers\Session;
Use App\Helpers\Url;
Use System\BaseController;
Use App\Models\Employee;

class Employees extends BaseController{

    protected $employee;

    public function __construct()
    {
        parent::__construct();
        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }
        $this->employee = new Employee();
    }

    public function index()
    {
        $employees = $this->employee->get_employees();
        $title = 'Employees';
        return $this->view->render('admin/employees/index', compact('employees', 'title'));
    }


    	public function add()
    {
        $errors = [];

        if (isset($_POST['submit'])) {
        	$first_name            = (isset($_POST['first_name']) ? $_POST['first_name'] : null);
        	$last_name           = (isset($_POST['last_name']) ? $_POST['last_name'] : null);
            $username            = (isset($_POST['username']) ? $_POST['username'] : null);
            $email               = (isset($_POST['email']) ? $_POST['email'] : null);
            $phone_number        = (isset($_POST['phone_number']) ? $_POST['phone_number'] : null);
            $password            = (isset($_POST['password']) ? $_POST['password'] : null);
            $password_confirm    = (isset($_POST['password_confirm']) ? $_POST['password_confirm'] : null);
            // $role               = (isset($_POST['role']) ? $_POST['role'] : null);

            if (strlen($username) < 3) {
                $errors[] = 'Username is too short';
            } else {
                if ($username == $this->employee->get_employee_username($username)){
                    $errors[] = 'Username is already in use';
                }
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address';
            } else {
                if ($email == $this->employee->get_employee_email($email)){
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
                    'phone_number'=> $phone_number,
                    // 'role' => $role
                ];

                $this->employee->insert($data);

                Session::set('success', 'Employee created');

                Url::redirect('/employees/add');

            }

        }

        $title = 'Create';
        $this->view->render('admin/employees/add', compact('errors', 'title'));
    }



    public function edit($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/employees');
        }

        $employee = $this->employee->get_employee($id);

        if ($employee == null) {
            Url::redirect('/404');
        }

        $errors = [];

        if (isset($_POST['submit'])) {
            $first_name  = (isset($_POST['first_name']) ? $_POST['first_name'] : null);
            $last_name  = (isset($_POST['last_name']) ? $_POST['last_name'] : null);
            $username  = (isset($_POST['username']) ? $_POST['username'] : null);
            $email  = (isset($_POST['email']) ? $_POST['email'] : null);
            $phone_number  = (isset($_POST['phone_number']) ? $_POST['phone_number'] : null);

            if (count($errors) == 0) {

                $data = [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'username' => $username,
                    'email' => $email,
                    'phone_number' => $phone_number
                ];

                $where = ['id' => $id];

                $this->employee->update($data, $where);

                Session::set('success', 'Employee Details updated');

                Url::redirect('/employees');

            }

        }

        $title = 'Update Employee';
        $this->view->render('admin/employees/edit', compact('employee', 'errors', 'title'));
    }

    public function view($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/employees');
        }
   
        $employee = $this->employee->get_employee($id);
       
   
        if ($employee== null) {
            Url::redirect('/404');
        }
   
        $title = 'View Employee';
        $this->view->render('admin/employees/view', compact('employee', 'title'));
    }
   
    public function delete($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/riders');
        }
   
        $employee = $this->employee->get_employee($id);
   
        if ($employee == null) {
            Url::redirect('/404');
        }
   
        $where = ['id' => $id];
   
        $this->employee->delete($where);
   
        Session::set('success', 'Employee deleted');
   
        Url::redirect('/employees');
    }
   



}