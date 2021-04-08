<?php
class Task extends CI_controller{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != 'true')
		{
			redirect(base_url());
		}
		$this->load->library('grocery_CRUD');
	}

	public function tasks()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('tasks');
		$crud->display_as('employee_id','Employee');
		$crud->display_as('ddate','Date');
		$crud->display_as('project_id','Project');
		$crud->set_relation('employee_id','employees','name');
		$crud->set_relation('project_id','projects','title');
		$crud->field_type('status','dropdown',
            array('hold' => 'Hold', 'In Progress' => 'In Progress','Done' => 'Done','Canceled' => 'Canceled'));
		$crud->field_type('priority','dropdown',
            array('high' => 'High', 'medium' => 'Medium','low' => 'Low'));
		$crud->set_field_upload('attachment','assets/uploads/tasks');
		$output = $crud->render();

		$this->load->view('listtask',$output); 
	}
}
?>