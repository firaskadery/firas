<?php
class Notification_model extends CI_model{

	function add($formArray)
	{
		$this->db->insert('notifications',$formArray);
	}

	function getalert()
	{
		return $alert = $this->db->get('notifications')->result_array();
	}

	function drop($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('notifications');
	}
}
?>