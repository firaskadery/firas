<?php
class Task extends CI_controller{

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
		$crud->add_action('SubTask', '', 'task/subtask', 'fas fa-bars');
		$output = $crud->render();

		$this->load->view('listtask',$output); 
	}

	public function subtask($task_id)
	{
		$data['task_id'] = $task_id;

		$this->load->model('Task_model');
		$data['subtasks'] = $this->Task_model->getsubtasks($task_id);

		$this->load->view('subtask',$data);
	}

	public function savesubtasks()
	{
		$this->load->model('Task_model');
		$titles = $this->input->post('titles');
		$check = $this->input->post('check');
		$task_id = $this->input->post('task_id');
		;
		$this->Task_model->deletesubtask($task_id);
		//insert
		for($i=0;$i<count($titles);$i++){
			
			$formArray = array();
			$formArray['title'] = $titles[$i];
			$formArray['added_by'] = $this->session->userdata('name');
			$formArray['added_date'] = date('Y-m-d');

				for($j=0;$j<count($check);$j++)
				{
					$formArray['done'] = '0';
					if($titles[$i] == $check[$j])
					{
					$formArray['done'] = '1';
					break;
					}
				}
				$formArray['task_id'] = $task_id;
				$this->Task_model->savesubtask($formArray);
			}
		redirect(base_url().'task/tasks');
	}

	function drop($id)
	{
		$this->Notification_model->drop($id);
		redirect(base_url());
	}
}
?>