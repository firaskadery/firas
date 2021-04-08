<?php
class Statistics extends CI_controller{
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != 'true')
		{
			redirect(base_url());
		}
		$this->load->model('Employee_model');
		$name = $this->session->userdata('name');
		$user = $this->Employee_model->getuser($name);
		if($user['ismanager'] != '1')
		{
			redirect(base_url().'task/tasks');
		}
	}
	
	function statistic()
	{
		$this->load->model('Employee_model');
		$this->load->model('Statistics_model');
		$data = array();
		$data['hold'] = $this->Statistics_model->hold();
		$data['done'] = $this->Statistics_model->done();
		$data['inprogress'] = $this->Statistics_model->inprogress();
		$data['canceled'] = $this->Statistics_model->canceled();
		$data['delayed'] = $this->Statistics_model->delayed();
		$data['login'] = $this->session->userdata('login');
		$data['employees'] = $this->Employee_model->all();
		$name = $this->session->userdata('name');
		$data['user'] = $this->Employee_model->getuser($name);
		$data['s'] = "";
		$data['na'] = "";
		$data['d'] = "";
		$this->load->view('statistics',$data);
	}

	function filter()
	{
		$this->load->model('Employee_model');
		$this->load->model('Statistics_model');
		$status = $this->input->post('status');
		$name = $this->input->post('employee_id');
		$ddate = $this->input->post('ddate');
		$data = array();
		$data['s'] = $status;
		$data['na'] = $name;
		$data['d'] = $ddate;
		$data['employees'] = $this->Employee_model->all();
		$data['hold'] = $this->Statistics_model->hold();
		$data['done'] = $this->Statistics_model->done();
		$data['inprogress'] = $this->Statistics_model->inprogress();
		$data['canceled'] = $this->Statistics_model->canceled();
		$data['delayed'] = $this->Statistics_model->delayedfilter($status,$name,$ddate);
		$data['login'] = $this->session->userdata('login');
		$name = $this->session->userdata('name');
		$data['user'] = $this->Employee_model->getuser($name);
		$this->load->view('statistics',$data);
	}
}

?>