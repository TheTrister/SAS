<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_sb2');
		$this->load->library('session');
			//Do your magic here
	}
	
	public function dashboard(){
		$agama_set = $this->model_sb2->get_agama();
		$allquery= $this->model_sb2->getdata1();
		$data1 = array('tes'=>$allquery,'data_agama'=>$agama_set,'data_agama_edit'=>$agama_set);

		$this->load->view('templates/sb2_head');
		$this->load->view('templates/sb2_sidenav');
		$this->load->view('templates/sb2_topbar');
		$this->load->view('templates/sb2_dashboard',$data1);
		$this->load->view('templates/sb2_footer');
	}
	public function tes(){
		$query= $this->model_sb2->getdata1();
		$data = array('user'=>$query);
		$this->load->view('templates/sb2_head');
		$this->load->view('templates/sb2_sidenav');
		$this->load->view('templates/sb2_topbar');
		$this->load->view('templates/sb2_user_dashboard',$data);
		$this->load->view('templates/sb2_footer');
	}
	function export(){
		$allquery= $this->db->query("SELECT *FROM tdata")->result();
		$data = array('allq'=>$allquery);
		$this->load->view('export',$data);
	}
	function chart(){
		$kelamin['pria']= $this->model_sb2->getpria();
		$kelamin['wanita']= $this->model_sb2->getwanita();

		$this->load->view('templates/sb2_head');
		$this->load->view('templates/sb2_sidenav');
		$this->load->view('templates/sb2_topbar');
		$this->load->view('templates/sb2_chart');
		$this->load->view('templates/sb2_footer',$kelamin);
	}

	function ambil_detail(){
		$id= $this->input->post('id');
		$where=array('id' => $id);
		$tes=$this->model_sb2->detail_model($id);

		echo json_encode($tes);
	}

	function insert_data(){
		$this->input->post();

		$config['upload_path']          = './assets/';
		$config['allowed_types']        = 'gif|jpg|png|JPG|PNG';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);
        //echo $_FILES['tfile']['name'];

		if ( ! $this->upload->do_upload('tfile'))
		{
			print_r($this->upload->display_errors());
		}
		else
		{

			$formdata = $this->input->post('form_tambah');
			$file = $this->upload->data();
			$file = $file['file_name'];
			$absen= $this->input->post('absen');
			$nama= $this->input->post('nama');
			$umur= $this->input->post('umur');
			$jk= $this->input->post('kelamin');
			$agama= $this->input->post('agama');
			$username= $this->input->post('username');
			$password= $this->input->post('password');
			$edit = array(
				'nama'=> $nama,
				'umur'=> $umur,
				'kelamin'=> $jk,
				'agama'=> $agama,
				'file'=>$file,
				'username'=>$username,
				'password'=>$password
			);

			$tes=$this->model_sb2->tambahdata($absen,$nama,$umur,$jk,$agama,$file,$username,$password);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Data Berhasil disimpan
				</div>');
			$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
			if ($tes) {
				$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
				redirect(base_url('Template/dashboard'));
			}

			echo json_encode($info);
		}

	}

	function form_edit(){
		$formdata = $this->input->post('form_edit');
		parse_str($formdata,$data);
		$absen = $data['absen'];
		$nama = $data['nama'];
		$umur = $data['umur'];
		$jk = $data['kelamin'];
		$agama = $data['agama'];

		$tes=$this->model_sb2->editdata($absen,$nama,$umur,$jk,$agama);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Edit Data Sukses
			</div>');
		$info = array('hasil'=>'FALSE', 'pesan'=>'data gagal');
		if ($tes) {
			$info = array('hasil'=>'TRUE', 'pesan'=>'data tersimpan');
		}

		echo json_encode($info);
	}

	public function fungsi_hapus($absen){
		$this->model_sb2->deletedata($absen);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Hapus data sukses
			</div>
			');
		redirect(base_url('Template/dashboard'));
	}

	function upload(){
		$config['upload_path']          = './assets/';
		$config['allowed_types']        = 'gif|jpg|png|JPG|PNG';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);
            //echo $_FILES['userfile']['name'];

		if ( ! $this->upload->do_upload('userfile'))
		{
            //print_r($this->upload->display_errors());
		}
		else
		{
			$file = $this->upload->data();
			$file = $file['file_name'];

			$data =array(
				'id_file'=>"NULL",
				'file'=>$file
			);
			$this->db->insert('tuplode',$data);
			echo "<script>
			document.location='header_view';
			alert('Sukses');
			</script>";
		}

	}

	//login
	function login(){
		$this->load->view('templates/sb2_login');
	}

	function proses_login(){
		$username = $this->input->post('txtusername');
		$password = $this->input->post('txtpassword');

		$ceklogin = $this->model_sb2->login($username);
		if ($ceklogin) {
			$login = $this->model_sb2->cek_login($username,$password);
			if ($login) {
				foreach ($login as $row)
					$this->session->set_userdata('user',$row->username);
				$this->session->set_userdata('level',$row->level);
				if ($this->session->userdata('level')=="admin") {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						login admin berhasil
						</div>
						');
					redirect('Template/dashboard','refresh');
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						login user berhasil
						</div>
						');
					redirect('Template/tes','refresh');
				}
			}
		}else{
			echo "<script>
			alert('password atau username salah');
			document.location='login';
			</script>";
		}
	}






	
}

/* End of file Template.php */
/* Location: ./application/controllers/Template.php */
?>