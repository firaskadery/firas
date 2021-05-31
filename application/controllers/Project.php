<?php
class Project extends CI_controller{
	
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('login') != 'true')
		{
			redirect(base_url());
		}
		$this->load->model('Employee_model');
		$this->load->model('Notification_model');
		$name = $this->session->userdata('name');
		$user = $this->Employee_model->getuser($name);
		if($user['ismanager'] != '1')
		{
			redirect(base_url().'task/tasks');
		}
		$this->load->library('grocery_CRUD');

	}

	public function projects()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('projects');
		$crud->set_relation('leadby','employees','name');
		$output = $crud->render();

		$this->load->view('listproject',$output); 
	}



	
}
?>