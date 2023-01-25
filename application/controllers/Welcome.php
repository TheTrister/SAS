<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_SAS extends CI_Model
{

    private $tbl_siswa = 'tb_data_siswa';
    private $tbl_hadir = 'tb_kehadiran';

    public function getAll_data($jurusan, $kelas)
    {
        $this->db->from($this->tbl_siswa);

        return $this->db->get()->result();
    }
    public function getAll_hadir($m, $y)
    {
        $this->db->from($this->tbl_hadir);

        return $this->db->get()->result();
    }
    public function getPerDay_hadir($tgl, $nis)
    {
        $tglAw = date("Y-m-d", strtotime($tgl)) . " " . "00:00:00";
        $tglAk = date("Y-m-d", strtotime($tgl)) . " " . "23:59:59";
        $this->db->from($this->tbl_hadir);
        $this->db->where("WAKTU>='$tglAw' and WAKTU<='$tglAk' and NIS='$nis'");
        return $this->db->get()->row();
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SAS extends CI_Controller
{

	public function  __construct()
	{
		parent::__construct();
		$this->load->model("model_SAS");
		// $this->load->model('')
	}

	public function index()
	{
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/dashboard');
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
	public function coba()
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
	function data_siswa()
	{
		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/data_siswa');
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
	function data_hadir()
	{
		$input_month = $this->input->post('month');
		$input_year = $this->input->post('year');
		$input_jurusan = $this->input->post('jurusan');
		$input_kelas = $this->input->post('kelas');

		if (!($input_month || $input_year)) {
			if ($input_jurusan && $input_kelas) {
				$jurusan = $input_jurusan;
				$kelas = $input_kelas;
			} elseif ($input_jurusan) {
				$jurusan = $input_jurusan;
				$kelas = '';
			} elseif ($input_kelas) {
				$jurusan = '';
				$kelas = $input_kelas;
			} else {
				$jurusan = '';
				$kelas = '';
			}
			$m = date('m');
			$y = date('y');
		} else {
			$jurusan = '';
			$kelas = '';
			$m = $input_month;
			$y = $input_year;
		}
		$data_hadir = $this->model_SAS->getAll_hadir($input_month, $input_year);
		$data_siswa = $this->model_SAS->getAll_data($jurusan, $kelas);

		$data['data_hadir'] = $data_hadir;
		$data['data_siswa'] = $data_siswa;
		$data['m'] = $m;
		$data['y'] = $y;

		$this->load->view('SAS/template/begin');
		$this->load->view('SAS/template/header');
		$this->load->view('SAS/template/sidenav');
		$this->load->view('SAS/daftar_hadir', $data);
		$this->load->view('SAS/template/footer');
		$this->load->view('SAS/template/end');
	}
	function template()
	{
		$this->load->view('SAS/template/index');
	}
}
