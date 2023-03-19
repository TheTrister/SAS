<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perizinan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_SAS');
		$this->load->library('session');
			//Do your magic here
	}
        function perizinan ()
        {
            $input_month = $this->input->post('month');
            $input_year = $this->input->post('year');
            $input_jurusan = $this->input->post('jurusan');
            $input_kelas = $this->input->post('kelas');
            $input_status = $this->input->post('validasi');
            $this->session->set_userdata('bulan_kehadiran',$input_month);
            $this->session->set_userdata('tahun_kehadiran',$input_year);
            $this->session->set_userdata('jurusan_kehadiran',$input_jurusan);
            $this->session->set_userdata('kelas_kehadiran',$input_kelas);
                $jurusan = '';
                $kelas = '';
            if($input_month AND $input_year AND $input_status  AND $input_jurusan AND $input_kelas){
                $m = $input_month;
                $y = $input_year;
                if($input_status == 'IV'){
                    $validasi = 01;
                }else if($input_status == 'I'){
                    $validasi = 0;
                }
                $data_perizinan = $this->db->query("SELECT * FROM kehadirans WHERE WAKTU LIKE '%$input_year-$input_month%' AND ID_JURUSAN = '$input_jurusan' AND ID_KELAS = '$input_kelas' AND STATUS = '$input_status' ORDER BY STATUS ")->result();
            }else if($input_month AND $input_year AND $input_status ){
                $m = $input_month;
                $y = $input_year;
                if($input_status == 'IV'){
                    $validasi = 01;
                }else if($input_status == 'I'){
                    $validasi = 0;
                }
                $data_perizinan = $this->db->query("SELECT * FROM kehadirans WHERE WAKTU LIKE '%$input_year-$input_month%' AND STATUS = '$input_status' ORDER BY STATUS ASC ")->result();
            }else{
                $m = date('m');
                $y = date('y');
                $validasi = 0;
                $data_perizinan = $this->db->query("SELECT * FROM kehadirans WHERE WAKTU LIKE '%$y-$m%'  AND STATUS LIKE '%I%' ORDER BY STATUS ASC ")->result();
            }
            // echo $this->db->last_query();
            $data['data_perizinan'] = $data_perizinan;
            $data['m'] = $m;
            $data['y'] = $y;
            $data['input_jurusanCtrl'] = $input_jurusan;
            $data['input_kelasCtrl'] = $input_kelas;
            $data['input_status'] = $input_status;
            $data['filter_validasi'] = $validasi;
            $data['jurusan'] = $this->db->query("SELECT * FROM jurusans")->result();

            $this->load->view('SAS/template/begin');
            $this->load->view('SAS/template/header');
            $this->load->view('SAS/template/sidenav');
            $this->load->view('SAS/validasi_perizinan', $data);
            $this->load->view('SAS/template/footer');
            $this->load->view('SAS/template/end');
        }

        function validasi($id)
        {
            $this->db->query("UPDATE kehadirans SET STATUS = 'IV' WHERE ID_KETERANGAN = '$id'");
            $this->db->query("UPDATE keterangan__izins SET STATUS = '01' WHERE ID_KEHADIRAN = '$id'");
            // echo $this->db->last_query();
            redirect('Perizinan/perizinan');
        }

        function perizinan_sakit()
        {
            $input_month = $this->input->post('month');
            $input_year = $this->input->post('year');
            $input_jurusan = $this->input->post('jurusan');
            $input_kelas = $this->input->post('kelas');
            $input_status = $this->input->post('validasi');
            $this->session->set_userdata('bulan_kehadiran',$input_month);
            $this->session->set_userdata('tahun_kehadiran',$input_year);
            $this->session->set_userdata('jurusan_kehadiran',$input_jurusan);
            $this->session->set_userdata('kelas_kehadiran',$input_kelas);
                $jurusan = '';
                $kelas = '';
            if($input_month AND $input_year AND $input_status  AND $input_jurusan AND $input_kelas){
                $m = $input_month;
                $y = $input_year;
                if($input_status == 'SV'){
                    $validasi = 01;
                }else if($input_status == 'S'){
                    $validasi = 0;
                }
                $data_perizinan = $this->db->query("SELECT * FROM kehadirans WHERE WAKTU LIKE '%$input_year-$input_month%' AND ID_JURUSAN = '$input_jurusan' AND ID_KELAS = '$input_kelas' AND STATUS = '$input_status' ORDER BY STATUS ")->result();
            }else if($input_month AND $input_year AND $input_status ){
                $m = $input_month;
                $y = $input_year;
                if($input_status == 'SV'){
                    $validasi = 01;
                }else if($input_status == 'S'){
                    $validasi = 0;
                }
                $data_perizinan = $this->db->query("SELECT * FROM kehadirans WHERE WAKTU LIKE '%$input_year-$input_month%' AND STATUS = '$input_status' ORDER BY STATUS ASC ")->result();
            }else{
                $m = date('m');
                $y = date('y');
                $validasi = 0;
                $data_perizinan = $this->db->query("SELECT * FROM kehadirans WHERE WAKTU LIKE '%$y-$m%'  AND STATUS LIKE '%S%' ORDER BY STATUS ASC ")->result();
            }
            // echo $this->db->last_query();
            $data['data_perizinan_sakit'] = $data_perizinan;
            $data['m'] = $m;
            $data['y'] = $y;
            $data['input_jurusanCtrl'] = $input_jurusan;
            $data['input_kelasCtrl'] = $input_kelas;
            $data['input_status'] = $input_status;
            $data['filter_validasi'] = $validasi;
            $data['jurusan'] = $this->db->query("SELECT * FROM jurusans")->result();

            $this->load->view('SAS/template/begin');
            $this->load->view('SAS/template/header');
            $this->load->view('SAS/template/sidenav');
            $this->load->view('SAS/validasi_perizinan_sakit', $data);
            $this->load->view('SAS/template/footer');
            $this->load->view('SAS/template/end'); 
        }
        function validasi_sakit($id)
        {
            $this->db->query("UPDATE kehadirans SET STATUS = 'SV' WHERE ID_KETERANGAN = '$id'");
            $this->db->query("UPDATE keterangan__izins SET STATUS = '01' WHERE ID_KEHADIRAN = '$id'");
            redirect('Perizinan/perizinan_sakit');
        }
    }
?>