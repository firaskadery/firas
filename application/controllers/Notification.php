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
		$crud->columns('employee_id','text','priority','readed_by');
		$crud->set_table('notifications');
		$crud->display_as('employee_id','Employee');
		$crud->set_relation_n_n('employee_id','employee_notifications','employees', 'notification_id', 'employee_id', 'name');
		$crud->field_type('priority','dropdown',
            array('high' => 'High', 'low' => 'Low'));
		$crud->callback_column('readed_by',array($this, 'employee_readed'));
		//$crud->field_type('readed_by','hidden');
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
		}else{echo "error";}
	}

	function employee_readed($value = '10', $row)
	{
		$emp = $this->Notification_model->getreaded($row->id);
		$n = "";

		foreach($emp as $e)
		{
			$n = $e['name'].','.$n;
		}
		return $n;
	}

}