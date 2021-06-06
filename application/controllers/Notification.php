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
	}

	function notification()
	{
		$name = $this->session->userdata('name');
		$user = $this->Employee_model->getuser($name);
		if($user['ismanager'] != '1')
		{
			redirect(base_url().'task/tasks');
		}
		$crud = new grocery_CRUD();
		$crud->set_table('notifications');
		$crud->display_as('employee_id','Employee');
		$crud->set_relation_n_n('employee_id','employee_notifications','employees', 'notification_id', 'employee_id', 'name');

		$crud->field_type('priority','dropdown',
            array('high' => 'High', 'low' => 'Low'));
		$crud->field_type('readed_by','hidden');
		$output = $crud->render();

		$this->load->view('notification',$output);
	}

	function readed()
	{
		$id = $this->input->post('id');
		$notification_id = $this->input->post('notification_id');
		$name = $this->session->userdata('name');
		$user = $this->Employee_model->getuser($name);
		if($id == $user['id'])
		{
		$this->Notification_model->readed($id,$notification_id);
		$readed = $this->Notification_model->getreaded($notification_id);
		$n = "";
		if(!empty($readed)) { foreach($readed as $r) {
			$emp = $this->Employee_model->getEmployee($r['employee_id']);
			$n = $emp['name'].','.$n;
			$this->Notification_model->readed_by($r['notification_id'],$n);
		}}
		}else{echo "error";}
	}

}