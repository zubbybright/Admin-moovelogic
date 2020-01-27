<?php
namespace App\Models;
use System\BaseModel;

class Trip extends BaseModel{


    public function get_trips()
    {
        return $this->db->select('* from trips order by trip_status');
    }

    public function insert($data)
    {
        $this->db->insert('trips', $data);
    }

    public function update($data, $where)
    {
        $this->db->update('trips', $data, $where);
    }

    public function delete($where)
    {
        $this->db->delete('trips', $where);
    }


}
