<?php
class Employee extends CI_controller{
	
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
		$this->load->library('grocery_CRUD');
	}

	public function employees()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('employees');
		$crud->callback_before_insert(array($this,'encrypt_pw'));
		$crud->callback_before_update(array($this,'encrypt_pw'));
		$crud->columns('name','email','address','phone');
		$crud->field_type('ismanager','dropdown',
            array('1' => 'true', '0' => 'false'));
		$output = $crud->render();

		$this->load->view('listemployee',$output); 
	}
	function encrypt_pw($post_array) {
	if(!empty($post_array['password'])) {
		$post_array['password'] = md5($_POST['password']);
		}
		return $post_array;
	}
}
?>



