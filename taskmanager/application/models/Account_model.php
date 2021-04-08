<?php
class Account_model extends CI_model{

function confirmation($name,$password)
	{
		$this->db->where('name',$name);
		$this->db->where('password',$password);
		$employee = $this->db->get('employees');
		return $employee->num_rows();
	}

}
?>