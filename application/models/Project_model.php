<?php
class Project_model extends CI_model{


	function getnbproject()
	{
		return $this->db->count_all('projects');
	}

	function allproject($page)
	{
		$this->db->limit(5,$page);
		return $projects = $this->db->get('projects')->result_array();// SELECT * from 
	}

	function all()
	{
		return $projects = $this->db->get('projects')->result_array();// SELECT * from
	}

	function addproject($formArray)
	{
		$this->db->insert('projects',$formArray);
	}

	function getProject($id)
	{
		$this->db->where('id',$id);
		return $project = $this->db->get('projects')->row_array();
	}

	function deleteproject($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('projects');
	}

	function updateProject($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('projects',$formArray);
	}

	function getp($id)
	{
		$this->db->where('id',$id);
		return $project = $this->db->get('projects')->row_array();
	}

}
?>