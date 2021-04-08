<?php
class Statistics_model extends CI_model{

	function hold()
	{
		$this->db->where('status','hold');
		$hold = $this->db->get('tasks');
		return $hold->num_rows();
	}
	function done()
	{
		$this->db->where('status','done');
		$done = $this->db->get('tasks');
		return $done->num_rows();
	}
	function inprogress()
	{
		$this->db->where('status','in progress');
		$inprogress = $this->db->get('tasks');
		return $inprogress->num_rows();
	}
	function canceled()
	{
		$this->db->where('status','canceled');
		$canceled = $this->db->get('tasks');
		return $canceled->num_rows();
	}
	function delayed()
	{
		$this->db->where('status !=','done');
		$this->db->where('status !=','canceled');
		$this->db->where('ddate <=',date('Y-m-d'));
		$this->db->select('description,name,status,ddate,priority');
		$this->db->from('tasks');
		$this->db->join('employees','employees.id = tasks.employee_id');
		return $delayed = $this->db->get()->result_array();
	}
	function delayedfilter($status,$name,$ddate)
	{

		if($status != 'all' && $status != ''){$this->db->where('status',$status);}
		if($name != 'all' && $name != ''){$this->db->where('employee_id',$name);}
		if($ddate != ''){$this->db->where('ddate',$ddate);}
		$this->db->select('description,name,status,ddate,priority');
		$this->db->from('tasks');
		$this->db->join('employees','employees.id = tasks.employee_id');
		return $delayed = $this->db->get()->result_array();
	}

}
?>