<?php
namespace App\Models;
use System\BaseModel;

class Profile extends BaseModel{



  
    public function get_data($first_name)
    {
        $data = $this->db->select('* FROM profiles WHERE first_name = :first_name', [':first_name' => $first_name]);
        return (isset($data[0]) ? $data[0] : null);
    }

    // public function get_profile($id)
    // {
    //     $data = $this->db->select('* from profiles where id = :id', [':id' => $id]);
    //     return (isset($data[0]) ? $data[0] : null);
    // }
    public function get_profiles()
    {
        return $this->db->select('profiles.id,profiles.first_name, profiles.last_name, users.email, users.phone_number, users.user_type, users.current_location FROM profiles INNER JOIN users ON profiles.user_id = users.id');
    }
    public function user_id($phone_number){
        $data = $this->db->select(" id FROM users WHERE phone_number =  $phone_number") ;
        return (isset($data[0]) ? $data[0] : null);
        
    }

    // public function get_profile($id)
    // {
    //     $data = $this->db->select("* FROM profiles INNER JOIN users ON profiles.user_id = users.id WHERE profiles.id = :id", [':id' => $id]);
    //     return (isset($data[0]) ? $data[0] : null);
    // }

    public function get_profile($id)
    {
        $data = $this->db->select('* from profiles where id = :id', [':id' => $id]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function insert($data)
    {
        $this->db->insert('profiles', $data);
    }
    
    public function update($data, $where)
    {
        $this->db->update('profiles', $data, $where);
    }

    public function delete($where)
    {
        $this->db->delete('profiles', $where);
    }


}
