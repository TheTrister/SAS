<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_SAS');
		$this->load->library('session');
			//Do your magic here
	}
    //DATA USER
	function data_user()
	{
		$data['user'] = $this->db->query("SELECT * FROM users")->result();
		//$data['jurusan'] = $this->db->query("SELECT * FROM tb_jurusan")->result();
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/data_user',$data);
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
	function tambah_data_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$query = $this->model_SAS->tambah_data_user($username,$password,$level);
		$this->session->set_flashdata('pesan_user', '<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Data Berhasil disimpan
				</div>');
			$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
			if ($query) {
				$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
				redirect(base_url('SAS/index'));
			}
			echo json_encode($info);
	}
	function edit_data_user()
	{
		$formdata = $this->input->post('form_edit');
		parse_str($formdata,$data);
		$id = $data['id'];
		$username = $data['username'];
		$password = $data['password'];
		$level = $data['level'];

		$query=$this->model_SAS->edit_data_user($id,$username,$password,$level);

		$this->session->set_flashdata('pesan_user', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Edit Data Sukses
			</div>');
		$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
		if ($query) {
			$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
		}

		echo json_encode($info);
	}
	function ambil_detail_data_user(){
		$id= $this->input->post('id');
		//$where=array('id' => $id);
		$query = $this->model_SAS->detail_data_user($id);

		echo json_encode($query);
	}
	function delete_data_user()
	{
		$formdata = $this->input->post('form_delete');
		parse_str($formdata,$data);
		$id = $data['id'];
		$query = $this->model_SAS->delete_data_user($id);

		$this->session->set_flashdata('pesan_user', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Delete Data Sukses
			</div>');
		$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
		if ($query) {
			$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
		}

		echo json_encode($info);
	}
}
?>