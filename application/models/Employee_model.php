<?php
class Employee_model extends CI_model{

	function addemployee($formArray)
	{
		$this->db->insert('employees',$formArray);
	}
	function all()
	{
		return $employees = $this->db->get('employees')->result_array();// SELECT * from employee
	}

	function allemp($page)
	{
		$this->db->limit(5,$page);
		return $employees = $this->db->get('employees')->result_array();// SELECT * from employee
	}

	function getuser($name)
	{
		$this->db->where('name',$name);
		return $employee = $this->db->get('employees')->row_array();
	}

	function getEmployee($id)
	{
		$this->db->where('id',$id);
		return $employee = $this->db->get('employees')->row_array();
	}
	function updateEmployee($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('employees',$formArray);
	}
	function deleteemployee($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('employees');
		$this->db->where('employee_id',$id);
		$this->db->delete('tasks');
	}

	function getnbemp()
	{
		return $this->db->count_all('employees');
	}
}
?>