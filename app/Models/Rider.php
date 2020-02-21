<?php
namespace App\Models;
use System\BaseModel;

class Rider extends BaseModel{

    public function get_hash($user_type)
    {
        $data = $this->db->select('password FROM users WHERE user_type = :user_type', [':user_type' => $user_type]);
        return (isset($data[0]->password) ? $data[0]->password : null);
    }

    public function get_data($username)
    {
        $data = $this->db->select('* FROM users WHERE username = :username', [':username' => $username]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function get_riders()
    {
        return $this->db->select('* from users WHERE user_type = :user_type',[':user_type'=> 'RIDER']);
    }

    public function get_id($id)
    {
        $data = $this->db->select("profiles.first_name, profiles.last_name, users.email, users.phone_number,
         users.current_location, users.password, users.id, users.user_type FROM profiles 
         INNER JOIN users ON profiles.user_id = users.id WHERE profiles.id = :id", [':id' => $id]);
        
         return (isset($data[0]) ? $data[0] : null);
    }
 
    public function get_rider($id)
    {
        $data = $this->db->select('* from users WHERE id = :id', [':id' => $id]);
        return (isset($data[0]) ? $data[0] : null);
    }
    public function get_all($id)
    {
        return $this->db->select("* FROM profiles INNER JOIN users ON profiles.user_id = users.id WHERE profiles.id = :id", [':id' => $id]);
    }
    
    public function get_rider_phone($phone_number)
    {
        $data = $this->db->select('phone_number from users WHERE phone_number = :phone_number', [':phone_number' => $phone_number]);
        return (isset($data[0]->phone_number) ? $data[0]->phone_number : null);
    }

    public function get_rider_email($email)
    {
        $data = $this->db->select('email from users WHERE email = :email', [':email' => $email]);
        return (isset($data[0]->email) ? $data[0]->email : null);
    }

    public function get_user_reset_token($token)
    {
        $data = $this->db->select('id from users WHERE reset_token = :reset_token', [':reset_token' => $token]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function insert($data)
    {
        $this->db->insert('users', $data);
    }

    public function update($data, $where)
    {
        $this->db->update('users', $data, $where);
    }

    public function delete($where)
    {
        $this->db->delete('users', $where);
    }


}
