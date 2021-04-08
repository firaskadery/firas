<?php
class Task_model extends CI_model{

	function getnbtask()
	{
		return $this->db->count_all('tasks');
	}

	function getnbtaskfilter($status,$n,$priority,$ddate)
	{
		if($status != 'all' && $status != ''){$this->db->where('status',$status);}
		if($n != 'all' && $n != ''){$this->db->where('employee_id',$n);}
		if($priority != 'all' && $priority != ''){$this->db->where('priority',$priority);}
		if($ddate != ''){$this->db->where('ddate',$ddate);}
		return $this->db->count_all_results('tasks');
	}

	function alltask($ptask)
	{
		$this->db->limit(5,$ptask);
		$this->db->select('tasks.id,tasks.description,name,status,ddate,priority,attachment');
		$this->db->from('tasks');
		$this->db->join('employees','employees.id = tasks.employee_id');
		return $tasks = $this->db->get()->result_array();// SELECT * from employee
	}

	function alltaskfilter($ptask,$status,$n,$priority,$ddate)
	{
		if($status != 'all' && $status != ''){$this->db->where('status',$status);}
		if($n != 'all' && $n != ''){$this->db->where('employee_id',$n);}
		if($priority != 'all' && $priority != ''){$this->db->where('priority',$priority);}
		if($ddate != ''){$this->db->where('ddate',$ddate);}
		$this->db->limit(5,$ptask);
		$this->db->select('tasks.id,description,name,status,ddate,priority,attachment');
		$this->db->from('tasks');
		$this->db->join('employees','employees.id = tasks.employee_id');
		return $tasks = $this->db->get()->result_array();// SELECT * from employee
	}

	function gettaskforuser($name,$ptask)
	{
		$this->db->limit(5,$ptask);
		$this->db->select('tasks.id,description,name,status,ddate,priority,attachment');
		$this->db->from('tasks');
		$this->db->join('employees','employees.id = tasks.employee_id');
		$this->db->where('name',$name);
		return $tasks = $this->db->get()->result_array();
	}

	function gettaskforuserfilter($name,$ptask,$status,$n,$priority,$ddate)
	{
		if($status != 'all' && $status != ''){$this->db->where('status',$status);}
		if($n != 'all' && $n != ''){$this->db->where('employee_id',$n);}
		if($priority != 'all' && $priority != ''){$this->db->where('priority',$priority);}
		if($ddate != ''){$this->db->where('ddate',$ddate);}
		$this->db->limit(5,$ptask);
		$this->db->select('tasks.id,description,name,status,ddate,priority,attachment');
		$this->db->from('tasks');
		$this->db->join('employees','employees.id = tasks.employee_id');
		$this->db->where('name',$name);
		return $tasks = $this->db->get()->result_array();
	}

	function getnbtaskuser($name)
	{
		$this->db->select('name');
		$this->db->from('tasks');
		$this->db->join('employees','employees.id = tasks.employee_id');
		$this->db->where('name',$name);
		return $this->db->count_all_results();
	}

	function getnbtaskuserfilter($name,$status,$n,$priority,$ddate)
	{
		if($status != 'all' && $status != ''){$this->db->where('status',$status);}
		if($n != 'all' && $n != ''){$this->db->where('employee_id',$n);}
		if($priority != 'all' && $priority != ''){$this->db->where('priority',$priority);}
		if($ddate != ''){$this->db->where('ddate',$ddate);}
		$this->db->select('name');
		$this->db->from('tasks');
		$this->db->join('employees','employees.id = tasks.employee_id');
		$this->db->where('name',$name);
		return $this->db->count_all_results();
	}

	function addtask($formArray)
	{
		$this->db->insert('tasks',$formArray);
	}

	function getTask($id)
	{
		$this->db->where('id',$id);
		return $task = $this->db->get('tasks')->row_array();
	}

	function updateTask($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('tasks',$formArray);
	}

	function deletetask($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tasks');
	}
}
?>
