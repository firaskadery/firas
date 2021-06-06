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

	function readed($employee_id,$notification_id)
	{
		$this->db->where('notification_id',$notification_id);
		$this->db->where('employee_id',$employee_id);
		$this->db->update('employee_notifications', array('readed' => 'read'));
	}
	function getreaded($notification_id)
	{
		$this->db->where('notification_id',$notification_id);
		$this->db->where('readed','read');
		return $readed = $this->db->get('employee_notifications')->result_array();
	}
	function readed_by($notification_id,$name)
	{
		$this->db->where('id',$notification_id);
		$this->db->update('notifications', array('readed_by' => $name));
	}
}
?>