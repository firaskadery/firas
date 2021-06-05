<?php
class Notification extends CI_controller{
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != 'true')
		{
			redirect(base_url());
		}
		$this->load->model('Employee_model');
		$this->load->model('Notification_model');
		$this->load->library('grocery_CRUD');
		$name = $this->session->userdata('name');
		$user = $this->Employee_model->getuser($name);
		if($user['ismanager'] != '1')
		{
			redirect(base_url().'task/tasks');
		}
	}

	function notification()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('notifications');
		$crud->display_as('employee_id','Employee');
		$crud->set_relation_n_n('employee_id','employee_notifications','employees', 'notification_id', 'employee_id', 'name');

		$crud->field_type('priority','dropdown',
            array('high' => 'High', 'low' => 'Low'));
		$output = $crud->render();

		$this->load->view('notification',$output);
	}
	/*function new()
	{
		$this->load->model('Employee_model');
		$data = array();
		$data['employees'] = $this->Employee_model->all();
		$this->load->view('notification',$data);
	}

	function add()
	{
		$this->load->model('Notification_model');
		$formArray = array();
		$formArray['employee_id'] = $this->input->post('employee_id');
		$formArray['text'] = $this->input->post('text');
		$formArray['status'] = $this->input->post('status');
		$this->Notification_model->add($formArray);
		redirect(base_url());
	}*/

}