<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_SAS');
		$this->load->library('session');
			//Do your magic here
	}
    function feedback()
	{
		$data['feedback'] = $this->db->query("SELECT * FROM feedback")->result();
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/feedback', $data);
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
}
?>