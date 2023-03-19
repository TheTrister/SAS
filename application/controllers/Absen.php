<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_SAS');
		$this->load->library('session');
			//Do your magic here
	}

    function login()
    {
        $this->load->view('SAS/andro/login_andro');
    }
    function proses_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$ceklogin = $this->model_SAS->login_andro($username);
		if ($ceklogin) {
			$login = $this->model_SAS->cek_login_andro($username,$password);
			if ($login) {
				foreach ($login as $row)
					$this->session->set_userdata('nis',$row->NIS);
					$this->session->set_userdata('nama',$row->NAMA);
					$this->session->set_userdata('jurusan',$row->ID_JURUSAN);
					$this->session->set_userdata('kelas',$row->ID_KELAS);

                    redirect('Absen/index','refresh');
			}
		}else{
			echo "<script>
			alert('password atau username salah');
			document.location='login';
			</script>";
		}
	}
    function index()
    {
        $this->load->view('SAS/andro/dashboard');
    }
    function absen_pagi()
    {
        $nis = $this->session->userdata('nis');
        $kelas = $this->session->userdata('kelas');
        $jurusan = $this->session->userdata('jurusan');
        $waktu = date("Y-m-d h:i:sa");
        $this->db->query("INSERT INTO kehadirans (NIS,WAKTU,STATUS,ID_KELAS,ID_JURUSAN) VALUES('$nis','$waktu','H','$kelas','$jurusan') ");
        echo "<script>
			alert('Berhasil Absen');
			document.location='index';
			</script>";
        // redirect('Absen/index','refresh');
    }
    function absen_sore()
    {
        $nis = $this->session->userdata('nis');
		$kelas = $this->session->userdata('kelas');
        $jurusan = $this->session->userdata('jurusan');
        $waktu = date("Y-m-d h:i:sa");
        $this->db->query("INSERT INTO kehadirans (NIS,WAKTU,STATUS,ID_KELAS,ID_JURUSAN) VALUES('$nis','$waktu','P','$kelas','$jurusan') ");
        echo "<script>
			alert('Berhasil Absen');
			document.location='index';
			</script>";
    }
    function logout()
    {
        redirect('Absen/login','refresh');
    }
}
?>