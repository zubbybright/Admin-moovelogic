<?php
namespace App\Models;
use System\BaseModel;

class Employee extends BaseModel{

    public function get_employees()
{
    return $this->db->select('* from employees order by first_name');
}

public function get_employee($id)
{
    $data = $this->db->select('* from employees where id = :id', [':id' => $id]);
    return (isset($data[0]) ? $data[0] : null);
}
public function get_employee_username($username)
{
    $data = $this->db->select('username from employees where username = :username', [':username' => $username]);
    return (isset($data[0]->username) ? $data[0]->username : null);
}

public function get_employee_email($email)
{
    $data = $this->db->select('email from employees where email = :email', [':email' => $email]);
    return (isset($data[0]->email) ? $data[0]->email : null);
}


public function insert($data)
{
    $this->db->insert('employees', $data);
}

public function update($data, $where)
{
    $this->db->update('employees', $data, $where);
}

public function delete($where)
{
    $this->db->delete('employees', $where);
}



}