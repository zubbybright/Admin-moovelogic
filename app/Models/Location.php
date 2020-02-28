<?php
namespace App\Models;
use System\BaseModel;

class Location extends BaseModel{

    public function get_locations()
    {
        return $this->db->select('* from locations order by id');
    }
  
    public function get_location($id)
    {
        $data = $this->db->select('* from locations WHERE id = :id', [':id' => $id]);
        return (isset($data[0]) ? $data[0] : null);
    }

    public function insert($data)
    {
        $this->db->insert('locations', $data);
    }

    public function update($data, $where)
    {
        $this->db->update('locations', $data, $where);
    }

    public function delete($where)
    {
        $this->db->delete('locations', $where);
    }


}
