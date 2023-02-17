<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_SAS');
		$this->load->library('session');
			//Do your magic here
	}
    function data_hadir()
	{
		$input_month = $this->input->post('month');
		$input_year = $this->input->post('year');
		$input_jurusan = $this->input->post('jurusan');
		$input_kelas = $this->input->post('kelas');
		$this->session->set_userdata('bulan_kehadiran',$input_month);
		$this->session->set_userdata('tahun_kehadiran',$input_year);
		$this->session->set_userdata('jurusan_kehadiran',$input_jurusan);
		$this->session->set_userdata('kelas_kehadiran',$input_kelas);
			$jurusan = '';
			$kelas = '';
		if($input_month AND $input_year AND $input_jurusan AND $input_kelas){
			// $data_hadir = $this->model_SAS->getAll_hadir_filter($input_month,$input_year,$input_jurusan, $input_kelas);
			$data_siswa = $this->model_SAS->getAll_data_filter($input_jurusan, $input_kelas);
			$m = $input_month;
			$y = $input_year;
		}else{
			// $data_hadir = $this->model_SAS->getAll_hadir($input_month, $input_year);
			$m = date('m');
		 	$y = date('y');
			$data_siswa = $this->model_SAS->getAll_data($jurusan, $kelas);
		}

		// $data['data_hadir'] = $data_hadir;
		$data['data_siswa'] = $data_siswa;
		$data['m'] = $m;
		$data['y'] = $y;
		$data['jurusan'] = $this->db->query("SELECT * FROM tb_jurusan")->result();

		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/data_kehadiran', $data);
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
	function export_data_kehadiran()
	{
		$input_month = $this->session->userdata('bulan_kehadiran');
		$input_year = $this->session->userdata('tahun_kehadiran');
		$input_jurusan = $this->session->userdata('jurusan_kehadiran');
		$input_kelas = $this->session->userdata('kelas_kehadiran');
		$jurusan = '';
		$kelas = '';
		if($input_month AND $input_year AND $input_jurusan AND $input_kelas){
			// $data_hadir = $this->model_SAS->getAll_hadir_filter($input_month,$input_year,$input_jurusan, $input_kelas);
			$data_siswa = $this->model_SAS->getAll_data_filter($input_jurusan, $input_kelas);
			$m = $input_month;
			$y = $input_year;
		}else{
			// $data_hadir = $this->model_SAS->getAll_hadir($input_month, $input_year);
			$m = date('m');
		 	$y = date('y');
			$data_siswa = $this->model_SAS->getAll_data($jurusan, $kelas);
		}

		// $data['data_hadir'] = $data_hadir;
		$data['data_siswa'] = $data_siswa;
		$data['m'] = $m;
		$data['y'] = $y;
		
		$this->load->view('SAS/export_kehadiran',$data);
	}

	function ambil_data_pelanggaran()
	{
		$id= $this->input->post('id');
		$query = $this->model_SAS->ambil_data_pelanggaran($id);

		echo json_encode($query);
	}
	function edit_data_pelanggaran()
	{
		$formdata = $this->input->post('form_tambah');
		parse_str($formdata,$data);
		$id = $data['id'];
		$kd_plg = $data['kode_pelanggaran'];
		$ket = $data['keterangan_pelanggaran'];

		$query=$this->model_SAS->edit_data_kehadiran($id,$kd_plg,$ket);
		
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Edit Data Sukses
			</div>');
		$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
		if ($query) {
			$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
		}

		echo json_encode($info);
	}
}
?>