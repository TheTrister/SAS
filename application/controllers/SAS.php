<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SAS extends CI_Controller {

	public function index()
	{
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/template/main');
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
	function blank()
	{
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/blank');
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
	function template()
	{
		$this->load->view('SAS/template/index');
	}
}