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
		$this->load->model('Notification_model');
		$name = $this->session->userdata('name');
		$user = $this->Employee_model->getuser($name);
	}
	
	function statistic()
	{
		$this->load->model('Employee_model');
		$this->load->model('Statistics_model');
		$data = array();
		$name = $this->session->userdata('name');
		$data['user'] = $this->Employee_model->getuser($name);
		$data['hold'] = $this->Statistics_model->hold($data['user']['ismanager'],$data['user']['id']);
		$data['done'] = $this->Statistics_model->done($data['user']['ismanager'],$data['user']['id']);
		$data['inprogress'] = $this->Statistics_model->inprogress($data['user']['ismanager'],$data['user']['id']);
		$data['canceled'] = $this->Statistics_model->canceled($data['user']['ismanager'],$data['user']['id']);
		$data['delayed'] = $this->Statistics_model->delayed($data['user']['ismanager'],$data['user']['id']);
		$data['login'] = $this->session->userdata('login');
		$data['employees'] = $this->Employee_model->all();
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
		$n = $this->session->userdata('name');
		$data['user'] = $this->Employee_model->getuser($n);
		$data['employees'] = $this->Employee_model->all();
		$data['delayed'] = $this->Statistics_model->delayedfilter($status,$name,$ddate,$data['user']['ismanager'],$data['user']['id']);
		$data['hold'] = $this->Statistics_model->hold($data['user']['ismanager'],$data['user']['id']);
		$data['done'] = $this->Statistics_model->done($data['user']['ismanager'],$data['user']['id']);
		$data['inprogress'] = $this->Statistics_model->inprogress($data['user']['ismanager'],$data['user']['id']);
		$data['canceled'] = $this->Statistics_model->canceled($data['user']['ismanager'],$data['user']['id']);
		$data['login'] = $this->session->userdata('login');
		$this->load->view('statistics',$data);
	}
}

?>