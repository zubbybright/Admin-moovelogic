<?php

namespace App\Models;
use System\BaseModel;


class Role extends BaseModel{

	public function get_roles()
	{
		return $this->db->select(' * from roles order by title');
	}

	public function get_role($id)
	{
		$data = $this->db->select(' * from roles where id = :id', [':id' => $id]);
		return (isset($data[0]) ? $data[0] : null);
	}

	public function insert($data)
	{
		$this->db->insert('roles', $data);
	}
	
	public function update($data, $where)
	{
		$this->db->update('roles', $data, $where);
	}
	
	public function delete($where)
	{
		$this->db->delete('roles', $where);
	}
}