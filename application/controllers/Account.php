<?php
class Account extends CI_controller{

	private function logged_in()
	{
		$this->load->model('Notification_model');
		if($this->session->userdata('login') != 'true')
		{
			redirect(base_url());
		}
	}
    function login()
	{
		$name = $this->input->post('username');
		$pass = md5($this->input->post('pass'));
		$this->load->model('Account_model');
		if($this->Account_model->confirmation($name,$pass) != '1'){
			$this->session->set_userdata('v','1');
			redirect(base_url());
		}
		$this->load->model('Employee_model');
		$this->load->library('session');
		$this->session->set_userdata('login','true');
		$this->session->set_userdata('name',$name);
		$user = $this->Employee_model->getuser($name);
		$this->session->set_userdata('ismanager',$user['ismanager']);
		redirect(base_url().'employee/employees');
	}

	function profile()
	{
		$this->logged_in();
		$this->load->model('Employee_model');
		$data = array();
		$data['name'] = $this->session->userdata('name');
		$data['login'] = $this->session->userdata('login');
		$name = $this->session->userdata('name');
		$data['user'] = $this->Employee_model->getuser($name);
		$this->load->view('profile',$data);
	}

	function logout()
	{
		$this->load->library('session');
		$this->session->set_userdata('login','false');
		$this->session->set_userdata('v','0');
		$this->session->set_userdata('name','');
		$this->session->set_userdata('ismanager','');
		redirect(base_url());
	}

}
?>