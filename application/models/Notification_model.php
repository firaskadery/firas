<?php
class Notification_model extends CI_model{

	/*function add($formArray)
	{
		$this->db->insert('notifications',$formArray);
	}*/

	function getalert()
	{
		return $alert = $this->db->get('employee_notifications')->result_array();
	}
	function getnot($notification_id)
	{
		$this->db->where('id',$notification_id);
		return $not = $this->db->get('notifications')->row_array();
	}

	function drop($employee_id)
	{
		$this->db->where('employee_id',$employee_id);
		$this->db->delete('employee_notifications');
	}
}
?>