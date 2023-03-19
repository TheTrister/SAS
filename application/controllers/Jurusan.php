<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_SAS');
		$this->load->library('session');
			//Do your magic here
	}
    function data_jurusan()
	{
		$data['data_jurusan'] = $this->db->query("SELECT * FROM jurusans")->result();
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/data_jurusan',$data);
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
	function tambah_data_jurusan()
	{
		$jurusan = $this->input->post('jurusan');

		$query = $this->model_SAS->tambah_data_jurusan($jurusan);
		$this->session->set_flashdata('pesan_jurusan', '<div class="alert alert-success alert-dismissible" role="alert">
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
	function edit_data_jurusan()
	{
		$formdata = $this->input->post('form_edit');
		parse_str($formdata,$data);
		$id = $data['id'];
		$jurusan = $data['jurusan'];

		$query=$this->model_SAS->edit_data_jurusan($id,$jurusan);

		$this->session->set_flashdata('pesan_jurusan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Edit Data Sukses
			</div>');
		$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
		if ($query) {
			$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
		}

		echo json_encode($info);
	}
	function ambil_detail_data_jurusan(){
		$id= $this->input->post('id');
		//$where=array('id' => $id);
		$query = $this->model_SAS->detail_data_jurusan($id);

		echo json_encode($query);
	}
	function delete_data_jurusan()
	{
		$formdata = $this->input->post('form_delete');
		parse_str($formdata,$data);
		$id = $data['id'];
		$query = $this->model_SAS->delete_data_jurusan($id);

		$this->session->set_flashdata('pesan_jurusan', '<div class="alert alert-success alert-dismissible" role="alert">
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