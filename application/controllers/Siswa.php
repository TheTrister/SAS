<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_SAS');
		$this->load->library('session');
			//Do your magic here
	}
    function data_siswa()
	{
		$jurusan = $this->input->post('jurusan');
		$kelas = $this->input->post('kelas');
		if($jurusan AND $kelas){
			$data['data_siswa'] = $this->db->query("SELECT * FROM tb_data_siswa WHERE ID_KELAS = '$kelas' AND ID_JURUSAN = '$jurusan'  ")->result();

		}else if($jurusan == 9999)
		{
			$data['data_siswa'] = $this->db->query("SELECT * FROM tb_data_siswa GROUP BY NIS")->result();
		}else{
			$data['data_siswa'] = $this->db->query("SELECT * FROM tb_data_siswa GROUP BY NIS")->result();
		}
		
		$data['jurusan'] = $this->db->query("SELECT * FROM tb_jurusan")->result();
		$data['kelas'] = $this->db->query("SELECT * FROM tb_kelas")->result();
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/data_siswa',$data);
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
	function filter_data_siswa()
	{
		$jurusan = $this->input->post('jurusan');
		$kelas = $this->input->post('kelas');
		$data['data_siswa'] = $this->db->query("SELECT * FROM tb_data_siswa WHERE kelas = '$kelas' AND id_jurusan = '$jurusan'  ")->result();
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/data_siswa',$data);
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
	function viewKelasByJurusan($jurusan)
	{
		$jurusan = $jurusan;
		$data['kelas'] = $this->db->query("SELECT * FROM tb_kelas WHERE id_jurusan = '$jurusan' ")->result();
		$this->load->view('SAS/select_option_kelas');
	}
	function get_kelas(){
        $jurusan_id = $this->input->post('id',TRUE);
        $data = $this->model_SAS->get_kelas($jurusan_id)->result();
        echo json_encode($data);
    }
	function tambah_data_siswa()
	{
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$jurusan = $this->input->post('jurusan');
		$kelas = $this->input->post('kelas');

		$query = $this->model_SAS->tambah_data_siswa($nis,$nama,$jurusan,$kelas);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
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
	function edit_data_siswa()
	{
		$formdata = $this->input->post('form_edit');
		parse_str($formdata,$data);
		$id = $data['id'];
		$nis = $data['nis'];
		$nama = $data['nama'];
		$jurusan = $data['jurusan_edit'];
		$kelas = $data['kelas_edit'];

		$query=$this->model_SAS->edit_data_siswa($id,$nis,$nama,$jurusan,$kelas);

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
	function ambil_detail_data_siswa(){
		$id= $this->input->post('id');
		//$where=array('id' => $id);
		$query = $this->model_SAS->detail_data_siswa($id);

		echo json_encode($query);
	}
	function delete_data_siswa()
	{
		$formdata = $this->input->post('form_delete');
		parse_str($formdata,$data);
		$id = $data['id'];
		$query = $this->model_SAS->delete_data_siswa($id);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
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