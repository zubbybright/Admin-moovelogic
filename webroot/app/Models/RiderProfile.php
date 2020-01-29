<?php
namespace App\Models;
use System\BaseModel;

class RiderProfile extends BaseModel{

  
    public function get_data($first_name)
    {
        $data = $this->db->select('* FROM profiles WHERE first_name = :first_name', [':first_name' => $first_name]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function get_profile($id)
    {
        $data = $this->db->select('* from profiles where id = :id', [':id' => $id]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function insertProfile($data)
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
