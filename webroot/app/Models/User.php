<?php
namespace App\Models;
use System\BaseModel;

class User extends BaseModel{

	public function get_hash($username)
    {
        $data = $this->db->select('password FROM admin WHERE username = :username', [':username' => $username]);
        return (isset($data[0]->password) ? $data[0]->password : null);
    }

    public function get_data($username)
    {
        $data = $this->db->select('* FROM admin WHERE username = :username', [':username' => $username]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function get_users()
    {
        return $this->db->select('* from admin order by username');
    }

    public function get_user($id)
    {
        $data = $this->db->select('* from admin where id = :id', [':id' => $id]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function get_user_username($username)
    {
        $data = $this->db->select('username from admin where username = :username', [':username' => $username]);
        return (isset($data[0]->username) ? $data[0]->username : null);
    }

    public function get_user_email($email)
    {
        $data = $this->db->select('email from admin where email = :email', [':email' => $email]);
        return (isset($data[0]->email) ? $data[0]->email : null);
    }

    public function get_user_reset_token($token)
    {
        $data = $this->db->select('id from admin where reset_token = :reset_token', [':reset_token' => $token]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function insert($data)
    {
        $this->db->insert('admin', $data);
    }

    public function update($data, $where)
    {
        $this->db->update('admin', $data, $where);
    }

    public function delete($where)
    {
        $this->db->delete('admin', $where);
    }


}
