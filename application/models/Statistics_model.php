<?php
class Statistics_model extends CI_model{

	function hold($user,$name)
	{
		if($user == '1'){
		$this->db->where('status','hold');
		$hold = $this->db->get('tasks');
		return $hold->num_rows();
		}
		else
		{
		$this->db->where('status','hold');
		$this->db->where('employee_id',$name);
		$hold = $this->db->get('tasks');
		return $hold->num_rows();	
		}
	}
	function done($user,$name)
	{
		if($user == '1'){
		$this->db->where('status','done');
		$done = $this->db->get('tasks');
		return $done->num_rows();
		}else
		{
		$this->db->where('status','done');
		$this->db->where('employee_id',$name);
		$done = $this->db->get('tasks');
		return $done->num_rows();	
		}
	}
	function inprogress($user,$name)
	{
		if($user == '1'){
		$this->db->where('status','in progress');
		$inprogress = $this->db->get('tasks');
		return $inprogress->num_rows();
		}else
		{
		$this->db->where('status','in progress');
		$this->db->where('employee_id',$name);
		$inprogress = $this->db->get('tasks');
		return $inprogress->num_rows();	
		}
	}
	function canceled($user,$name)
	{
		if($user == '1'){
		$this->db->where('status','canceled');
		$canceled = $this->db->get('tasks');
		return $canceled->num_rows();
		}else
		{
		$this->db->where('status','canceled');
		$this->db->where('employee_id',$name);
		$canceled = $this->db->get('tasks');
		return $canceled->num_rows();	
		}
	}
	function delayed($user,$name)
	{
		if($user == '0'){$this->db->where('employee_id',$name);}
		$this->db->where('status !=','done');
		$this->db->where('status !=','canceled');
		$this->db->where('ddate <=',date('Y-m-d'));
		$this->db->select('description,name,status,ddate,priority');
		$this->db->from('tasks');
		$this->db->join('employees','employees.id = tasks.employee_id');
		return $delayed = $this->db->get()->result_array();
	}
	function delayedfilter($status,$name,$ddate,$user,$n)
	{
		if($user == '0'){$this->db->where('employee_id',$n);}
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