<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SAS extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_SAS');
		$this->load->library('session');
			//Do your magic here
	}

	public function index()
	{
		$tgl = date("Y-m-d");
		
		$data['jumlah_siswa'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM siswas")->row();
		$data['jumlah_hadir'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE WAKTU LIKE'%$tgl%' AND STATUS = 'H' ")->row();
		$data['jumlah_sakit'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE WAKTU LIKE'%$tgl%' AND STATUS = 'S' ")->row();
		$data['jumlah_izin'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE WAKTU LIKE'%$tgl%' AND STATUS LIKE '%I%' ")->row();
		$data['jumlah_alpa'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE WAKTU LIKE'%$tgl%' AND STATUS = 'A' ")->row();
		$data['jumlah_terlambat'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE WAKTU LIKE'%$tgl%' AND STATUS = 'T' ")->row();

		$data['pieRPL'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '1' AND WAKTU LIKE'%$tgl%' ")->row();
		$data['pieMEKA'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '2' AND WAKTU LIKE'%$tgl%' ")->row();
		$data['piePH'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '3' AND WAKTU LIKE'%$tgl%' ")->row();
		$data['pieMM'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '4' AND WAKTU LIKE'%$tgl%' ")->row();
		$data['pieTKJ'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '5' AND WAKTU LIKE'%$tgl%' ")->row();
		$data['pieDG'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '6' AND WAKTU LIKE'%$tgl%' ")->row();
		$data['pieLOG'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '7' AND WAKTU LIKE'%$tgl%' ")->row();
		$data['pieANIM'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '8' AND WAKTU LIKE'%$tgl%' ")->row();
		$data['piePD'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '9' AND WAKTU LIKE'%$tgl%' ")->row();
			
		$data['barRPL'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '1' AND WAKTU LIKE'%$tgl%' AND STATUS = 'H' ")->row();
		$data['barMEKA'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '2' AND WAKTU LIKE'%$tgl%' AND STATUS = 'H' ")->row();
		$data['barPH'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '3' AND WAKTU LIKE'%$tgl%' AND STATUS = 'H' ")->row();
		$data['barMM'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '4' AND WAKTU LIKE'%$tgl%' AND STATUS = 'H' ")->row();
		$data['barTKJ'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '5' AND WAKTU LIKE'%$tgl%' AND STATUS = 'H' ")->row();
		$data['barDG'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '6' AND WAKTU LIKE'%$tgl%' AND STATUS = 'H' ")->row();
		$data['barLOG'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '7' AND WAKTU LIKE'%$tgl%' AND STATUS = 'H' ")->row();
		$data['barANIM'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '8' AND WAKTU LIKE'%$tgl%' AND STATUS = 'H' ")->row();
		$data['barPD'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '9' AND WAKTU LIKE'%$tgl%' AND STATUS = 'H' ")->row();
		
		$data['tanggal'] = $tgl;
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/dashboard',$data);
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
		$this->load->view('SAS/chart',$data);
	}
	public function index_filter()
	{
		$tgl = date("Y-m-d");
		$filter_tanggal = $this->input->post('tanggal');
		
		$data['jumlah_siswa'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM siswas")->row();
		$data['jumlah_hadir'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'H' ")->row();
		$data['jumlah_sakit'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'S' ")->row();
		$data['jumlah_izin'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE WAKTU LIKE'%$filter_tanggal%' AND STATUS LIKE '%I%' ")->row();
		$data['jumlah_alpa'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'A' ")->row();
		$data['jumlah_terlambat'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'T' ")->row();

		$data['pieRPL'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '1' AND WAKTU LIKE'%$filter_tanggal%' ")->row();
		$data['pieMEKA'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '2' AND WAKTU LIKE'%$filter_tanggal%' ")->row();
		$data['piePH'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '3' AND WAKTU LIKE'%$filter_tanggal%' ")->row();
		$data['pieMM'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '4' AND WAKTU LIKE'%$filter_tanggal%' ")->row();
		$data['pieTKJ'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '5' AND WAKTU LIKE'%$filter_tanggal%' ")->row();
		$data['pieDG'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '6' AND WAKTU LIKE'%$filter_tanggal%' ")->row();
		$data['pieLOG'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '7' AND WAKTU LIKE'%$filter_tanggal%' ")->row();
		$data['pieANIM'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '8' AND WAKTU LIKE'%$filter_tanggal%' ")->row();
		$data['piePD'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '9' AND WAKTU LIKE'%$filter_tanggal%' ")->row();
			
		$data['barRPL'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '1' AND WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'H' ")->row();
		$data['barMEKA'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '2' AND WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'H' ")->row();
		$data['barPH'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '3' AND WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'H' ")->row();
		$data['barMM'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '4' AND WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'H' ")->row();
		$data['barTKJ'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '5' AND WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'H' ")->row();
		$data['barDG'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '6' AND WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'H' ")->row();
		$data['barLOG'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '7' AND WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'H' ")->row();
		$data['barANIM'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '8' AND WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'H' ")->row();
		$data['barPD'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM kehadirans WHERE ID_JURUSAN = '9' AND WAKTU LIKE'%$filter_tanggal%' AND STATUS = 'H' ")->row();

		$data['tanggal'] = $filter_tanggal;
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/dashboard',$data);
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
		$this->load->view('SAS/chart',$data);
	}
	function login()
	{
		$this->load->view('SAS/login');
	}
	function proses_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$ceklogin = $this->model_SAS->login($username);
		if ($ceklogin) {
			$login = $this->model_SAS->cek_login($username,$password);
			if ($login) {
				foreach ($login as $row)
					$this->session->set_userdata('user',$row->USERNAME);
					$this->session->set_userdata('level',$row->LEVEL);
				if ($this->session->userdata('level')=="admin" || $this->session->userdata('level')=="superadmin" || $this->session->userdata('level')=="walkel") {
					// $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
					// 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					// 	login admin berhasil
					// 	</div>
					// 	');
					redirect('SAS/index','refresh');
				}else{
					echo "<script>
						alert('tidak memiliki akses');
						document.location='login';
						</script>";
					redirect('SAS/login','refresh');
				}
			}
		}else{
			echo "<script>
			alert('password atau username salah');
			document.location='login';
			</script>";
		}
	}
	function Logout()
    {
        // $this->session->sess_destroy();
        redirect('SAS/login','refresh');
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
// DATA SISWA
	// function data_siswa()
	// {
	// 	$jurusan = $this->input->post('jurusan');
	// 	$kelas = $this->input->post('kelas');
	// 	if($jurusan AND $kelas){
	// 		$data['data_siswa'] = $this->db->query("SELECT * FROM siswas WHERE ID_KELAS = '$kelas' AND ID_JURUSAN = '$jurusan'  ")->result();

	// 	}else if($jurusan == 9999)
	// 	{
	// 		$data['data_siswa'] = $this->db->query("SELECT * FROM tb_data_siswa GROUP BY NIS")->result();
	// 	}else{
	// 		$data['data_siswa'] = $this->db->query("SELECT * FROM tb_data_siswa GROUP BY NIS")->result();
	// 	}
		
	// 	$data['jurusan'] = $this->db->query("SELECT * FROM tb_jurusan")->result();
	// 	$data['kelas'] = $this->db->query("SELECT * FROM tb_kelas")->result();
	// 	$this->load->view('SAS/template/begin');
	// 	$this->load->view('SAS/template/header');
	// 	$this->load->view('SAS/template/sidenav');
	// 	$this->load->view('SAS/data_siswa',$data);
	// 	$this->load->view('SAS/template/footer');
	// 	$this->load->view('SAS/template/end');
	// }
	// function filter_data_siswa()
	// {
	// 	$jurusan = $this->input->post('jurusan');
	// 	$kelas = $this->input->post('kelas');
	// 	$data['data_siswa'] = $this->db->query("SELECT * FROM tb_data_siswa WHERE kelas = '$kelas' AND id_jurusan = '$jurusan'  ")->result();
	// 	$this->load->view('SAS/template/begin');
	// 	$this->load->view('SAS/template/header');
	// 	$this->load->view('SAS/template/sidenav');
	// 	$this->load->view('SAS/data_siswa',$data);
	// 	$this->load->view('SAS/template/footer');
	// 	$this->load->view('SAS/template/end');
	// }
	// function viewKelasByJurusan($jurusan)
	// {
	// 	$jurusan = $jurusan;
	// 	$data['kelas'] = $this->db->query("SELECT * FROM tb_kelas WHERE id_jurusan = '$jurusan' ")->result();
	// 	$this->load->view('SAS/select_option_kelas');
	// }
	function get_kelas(){
        $jurusan_id = $this->input->post('id',TRUE);
        $data = $this->model_SAS->get_kelas($jurusan_id)->result();
        echo json_encode($data);
    }
	// function tambah_data_siswa()
	// {
	// 	$nis = $this->input->post('nis');
	// 	$nama = $this->input->post('nama');
	// 	$jurusan = $this->input->post('jurusan');
	// 	$kelas = $this->input->post('kelas');

	// 	$query = $this->model_SAS->tambah_data_siswa($nis,$nama,$jurusan,$kelas);
	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 			Data Berhasil disimpan
	// 			</div>');
	// 		$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 		if ($query) {
	// 			$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 			redirect(base_url('SAS/index'));
	// 		}
	// 		echo json_encode($info);
	// }
	// function edit_data_siswa()
	// {
	// 	$formdata = $this->input->post('form_edit');
	// 	parse_str($formdata,$data);
	// 	$id = $data['id'];
	// 	$nis = $data['nis'];
	// 	$nama = $data['nama'];
	// 	$jurusan = $data['jurusan_edit'];
	// 	$kelas = $data['kelas_edit'];

	// 	$query=$this->model_SAS->edit_data_siswa($id,$nis,$nama,$jurusan,$kelas);

	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 		Edit Data Sukses
	// 		</div>');
	// 	$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 	if ($query) {
	// 		$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 	}

	// 	echo json_encode($info);
	// }
	// function ambil_detail_data_siswa(){
	// 	$id= $this->input->post('id');
	// 	//$where=array('id' => $id);
	// 	$query = $this->model_SAS->detail_data_siswa($id);

	// 	echo json_encode($query);
	// }
	// function delete_data_siswa()
	// {
	// 	$formdata = $this->input->post('form_delete');
	// 	parse_str($formdata,$data);
	// 	$id = $data['id'];
	// 	$query = $this->model_SAS->delete_data_siswa($id);

	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 		Delete Data Sukses
	// 		</div>');
	// 	$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 	if ($query) {
	// 		$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 	}

	// 	echo json_encode($info);
	// }
//DATA USER
	// function data_user()
	// {
	// 	$data['user'] = $this->db->query("SELECT * FROM tb_user")->result();
	// 	//$data['jurusan'] = $this->db->query("SELECT * FROM tb_jurusan")->result();
	// 	$this->load->view('SAS/template/begin');
	// 	$this->load->view('SAS/template/header');
	// 	$this->load->view('SAS/template/sidenav');
	// 	$this->load->view('SAS/data_user',$data);
	// 	$this->load->view('SAS/template/footer');
	// 	$this->load->view('SAS/template/end');
	// }
	// function tambah_data_user()
	// {
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');

	// 	$query = $this->model_SAS->tambah_data_user($username,$password);
	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 			Data Berhasil disimpan
	// 			</div>');
	// 		$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 		if ($query) {
	// 			$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 			redirect(base_url('SAS/index'));
	// 		}
	// 		echo json_encode($info);
	// }
	// function edit_data_user()
	// {
	// 	$formdata = $this->input->post('form_edit');
	// 	parse_str($formdata,$data);
	// 	$id = $data['id'];
	// 	$username = $data['username'];
	// 	$password = $data['password'];

	// 	$query=$this->model_SAS->edit_data_user($id,$username,$password);

	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 		Edit Data Sukses
	// 		</div>');
	// 	$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 	if ($query) {
	// 		$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 	}

	// 	echo json_encode($info);
	// }
	// function ambil_detail_data_user(){
	// 	$id= $this->input->post('id');
	// 	//$where=array('id' => $id);
	// 	$query = $this->model_SAS->detail_data_user($id);

	// 	echo json_encode($query);
	// }
	// function delete_data_user()
	// {
	// 	$formdata = $this->input->post('form_delete');
	// 	parse_str($formdata,$data);
	// 	$id = $data['id'];
	// 	$query = $this->model_SAS->delete_data_user($id);

	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 		Delete Data Sukses
	// 		</div>');
	// 	$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 	if ($query) {
	// 		$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 	}

	// 	echo json_encode($info);
	// }
//DATA HADIR
	// function data_hadir()
	// {
	// 	$input_month = $this->input->post('month');
	// 	$input_year = $this->input->post('year');
	// 	$input_jurusan = $this->input->post('jurusan');
	// 	$input_kelas = $this->input->post('kelas');
	// 	$this->session->set_userdata('bulan_kehadiran',$input_month);
	// 	$this->session->set_userdata('tahun_kehadiran',$input_year);
	// 	$this->session->set_userdata('jurusan_kehadiran',$input_jurusan);
	// 	$this->session->set_userdata('kelas_kehadiran',$input_kelas);
	// 		$jurusan = '';
	// 		$kelas = '';
	// 	if($input_month AND $input_year AND $input_jurusan AND $input_kelas){
	// 		// $data_hadir = $this->model_SAS->getAll_hadir_filter($input_month,$input_year,$input_jurusan, $input_kelas);
	// 		$data_siswa = $this->model_SAS->getAll_data_filter($input_jurusan, $input_kelas);
	// 		$m = $input_month;
	// 		$y = $input_year;
	// 	}else{
	// 		// $data_hadir = $this->model_SAS->getAll_hadir($input_month, $input_year);
	// 		$m = date('m');
	// 	 	$y = date('y');
	// 		$data_siswa = $this->model_SAS->getAll_data($jurusan, $kelas);
	// 	}

	// 	// $data['data_hadir'] = $data_hadir;
	// 	$data['data_siswa'] = $data_siswa;
	// 	$data['m'] = $m;
	// 	$data['y'] = $y;
	// 	$data['jurusan'] = $this->db->query("SELECT * FROM tb_jurusan")->result();

	// 	$this->load->view('SAS/template/begin');
	// 	$this->load->view('SAS/template/header');
	// 	$this->load->view('SAS/template/sidenav');
	// 	$this->load->view('SAS/data_kehadiran', $data);
	// 	$this->load->view('SAS/template/footer');
	// 	$this->load->view('SAS/template/end');
	// }
	// function export_data_kehadiran()
	// {
	// 	$input_month = $this->session->userdata('bulan_kehadiran');
	// 	$input_year = $this->session->userdata('tahun_kehadiran');
	// 	$input_jurusan = $this->session->userdata('jurusan_kehadiran');
	// 	$input_kelas = $this->session->userdata('kelas_kehadiran');
	// 	$jurusan = '';
	// 	$kelas = '';
	// 	if($input_month AND $input_year AND $input_jurusan AND $input_kelas){
	// 		// $data_hadir = $this->model_SAS->getAll_hadir_filter($input_month,$input_year,$input_jurusan, $input_kelas);
	// 		$data_siswa = $this->model_SAS->getAll_data_filter($input_jurusan, $input_kelas);
	// 		$m = $input_month;
	// 		$y = $input_year;
	// 	}else{
	// 		// $data_hadir = $this->model_SAS->getAll_hadir($input_month, $input_year);
	// 		$m = date('m');
	// 	 	$y = date('y');
	// 		$data_siswa = $this->model_SAS->getAll_data($jurusan, $kelas);
	// 	}

	// 	// $data['data_hadir'] = $data_hadir;
	// 	$data['data_siswa'] = $data_siswa;
	// 	$data['m'] = $m;
	// 	$data['y'] = $y;
		
	// 	$this->load->view('SAS/export_kehadiran',$data);
	// }
//DATA JURUSAN
	// function data_jurusan()
	// {
	// 	$data['data_jurusan'] = $this->db->query("SELECT * FROM tb_jurusan")->result();
	// 	$this->load->view('SAS/template/begin');
	// 	$this->load->view('SAS/template/header');
	// 	$this->load->view('SAS/template/sidenav');
	// 	$this->load->view('SAS/data_jurusan',$data);
	// 	$this->load->view('SAS/template/footer');
	// 	$this->load->view('SAS/template/end');
	// }
	// function tambah_data_jurusan()
	// {
	// 	$jurusan = $this->input->post('jurusan');

	// 	$query = $this->model_SAS->tambah_data_jurusan($jurusan);
	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 			Data Berhasil disimpan
	// 			</div>');
	// 		$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 		if ($query) {
	// 			$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 			redirect(base_url('SAS/index'));
	// 		}
	// 		echo json_encode($info);
	// }
	// function edit_data_jurusan()
	// {
	// 	$formdata = $this->input->post('form_edit');
	// 	parse_str($formdata,$data);
	// 	$id = $data['id'];
	// 	$jurusan = $data['jurusan'];

	// 	$query=$this->model_SAS->edit_data_jurusan($id,$jurusan);

	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 		Edit Data Sukses
	// 		</div>');
	// 	$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 	if ($query) {
	// 		$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 	}

	// 	echo json_encode($info);
	// }
	// function ambil_detail_data_jurusan(){
	// 	$id= $this->input->post('id');
	// 	//$where=array('id' => $id);
	// 	$query = $this->model_SAS->detail_data_jurusan($id);

	// 	echo json_encode($query);
	// }
	// function delete_data_jurusan()
	// {
	// 	$formdata = $this->input->post('form_delete');
	// 	parse_str($formdata,$data);
	// 	$id = $data['id'];
	// 	$query = $this->model_SAS->delete_data_jurusan($id);

	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 		Delete Data Sukses
	// 		</div>');
	// 	$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 	if ($query) {
	// 		$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 	}

	// 	echo json_encode($info);
	// }
//DATA KELAS
	// function data_kelas()
	// {
	// 	$data['data_kelas'] = $this->db->query("SELECT * FROM tb_kelas")->result();
	// 	//$data['jurusan'] = $this->db->query("SELECT * FROM tb_jurusan")->result();
	// 	$this->load->view('SAS/template/begin');
	// 	$this->load->view('SAS/template/header');
	// 	$this->load->view('SAS/template/sidenav');
	// 	$this->load->view('SAS/data_kelas',$data);
	// 	$this->load->view('SAS/template/footer');
	// 	$this->load->view('SAS/template/end');
	// }
	// function tambah_data_kelas()
	// {
	// 	$kelas = $this->input->post('kelas');
	// 	$jurusan = $this->input->post('jurusan');

	// 	$query = $this->model_SAS->tambah_data_kelas($kelas,$jurusan);
	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 			Data Berhasil disimpan
	// 			</div>');
	// 		$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 		if ($query) {
	// 			$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 			redirect(base_url('SAS/index'));
	// 		}
	// 		echo json_encode($info);
	// }
	// function edit_data_kelas()
	// {
	// 	$formdata = $this->input->post('form_edit');
	// 	parse_str($formdata,$data);
	// 	$id = $data['id'];
	// 	$kelas = $data['kelas'];
	// 	$jurusan = $data['jurusan'];

	// 	$query=$this->model_SAS->edit_data_kelas($id,$kelas,$jurusan);

	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 		Edit Data Sukses
	// 		</div>');
	// 	$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 	if ($query) {
	// 		$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 	}

	// 	echo json_encode($info);
	// }
	// function ambil_detail_data_kelas(){
	// 	$id= $this->input->post('id');
	// 	//$where=array('id' => $id);
	// 	$query = $this->model_SAS->detail_data_kelas($id);

	// 	echo json_encode($query);
	// }
	// function delete_data_kelas()
	// {
	// 	$formdata = $this->input->post('form_delete');
	// 	parse_str($formdata,$data);
	// 	$id = $data['id'];
	// 	$query = $this->model_SAS->delete_data_kelas($id);

	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 		Delete Data Sukses
	// 		</div>');
	// 	$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
	// 	if ($query) {
	// 		$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
	// 	}

	// 	echo json_encode($info);
	// }
	
//HALAMAN FEEDBACK
	// function feedback()
	// {
	// 	$data['feedback'] = $this->db->query("SELECT * FROM tb_feedback")->result();
	// 	$this->load->view('SAS/template/begin');
	// 	$this->load->view('SAS/template/header');
	// 	$this->load->view('SAS/template/sidenav');
	// 	$this->load->view('SAS/feedback', $data);
	// 	$this->load->view('SAS/template/footer');
	// 	$this->load->view('SAS/template/end');
	// }
	

}
