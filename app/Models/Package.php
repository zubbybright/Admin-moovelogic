<?php

namespace App\Models;
use System\BaseModel;


class Package extends BaseModel{


	public function get_package($id)
	{
		$data = $this->db->select(' * from packages where id = :id', [':id' => $id]);
		return (isset($data[0]) ? $data[0] : null);
    }
    public function get_packages()
    {
        return $this->db->select('* from packages order by id DESC');
    }

	public function insert($data)
	{
		$this->db->insert('packages', $data);
	}
	
	public function update($data, $where)
	{
		$this->db->update('packages', $data, $where);
	}
	
	public function delete($where)
	{
		$this->db->delete('packages', $where);
	}
}