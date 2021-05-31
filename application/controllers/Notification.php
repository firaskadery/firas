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
		$name = $this->session->userdata('name');
		$user = $this->Employee_model->getuser($name);
		if($user['ismanager'] != '1')
		{
			redirect(base_url().'task/tasks');
		}
	}

	function new()
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
	}

}