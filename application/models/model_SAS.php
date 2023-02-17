<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_SAS extends CI_Model
{
    private $tbl_siswa = 'tb_data_siswa';
    private $tbl_hadir = 'tb_kehadiran';

    public function login($username){
		$query = $this->db->query("SELECT * FROM tb_user WHERE USERNAME = '$username'");
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}
    public function cek_login($username,$password){
		$query = $this->db->query("SELECT * FROM tb_user WHERE USERNAME = '$username' AND PASSWORD = '$password'");
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}

    function get_kelas($jurusan_id)
    {
        $query = $this->db->query("SELECT * FROM tb_kelas WHERE ID_JURUSAN = '$jurusan_id' ");
        return $query;
    }
//DATA SISWA
    function tambah_data_siswa($nis, $nama, $jurusan, $kelas)
    {
        $query = $this->db->query("INSERT INTO tb_data_siswa (
            NIS,
            NAMA,
            ID_JURUSAN,
            ID_KELAS,
            PASSWORD
            ) VALUES(
            '$nis',
            '$nama',
            '$jurusan',
            '$kelas',
            '$nis'
            ) ");
    }
    function detail_data_siswa($id)
    {
        $query = $this->db->query("SELECT * FROM tb_data_siswa WHERE ID ='$id' ");
        if ($query) {
            return $query->row();
        }
    }
    function edit_data_siswa($id, $nis, $nama, $jurusan, $kelas)
    {
        $query = $this->db->query("UPDATE tb_data_siswa SET
            NIS = '$nis',
            NAMA = '$nama',
            ID_JURUSAN = '$jurusan',
            ID_KELAS = '$kelas',
            PASSWORD = '$nis'
            WHERE ID = '$id'
        ");
    }
    function delete_data_siswa($id)
    {
        $query = $this->db->query("DELETE FROM tb_data_siswa WHERE ID ='$id' ");
    }

//DATA USER
    function tambah_data_user($username,$password)
    {
        $query = $this->db->query("INSERT INTO tb_user (
            USERNAME,
            PASSWORD,
            LEVEL
            ) VALUES(
            '$username',
            '$password',
            'admin'
            ) ");
    }
    function detail_data_user($id)
    {
        $query = $this->db->query("SELECT * FROM tb_user WHERE ID ='$id' ");
        if ($query) {
            return $query->row();
        }
    }
    function edit_data_user($id,$username,$password)
    {
        $query = $this->db->query("UPDATE tb_user SET
            USERNAME = '$username',
            PASSWORD = '$password'
            WHERE ID = '$id'
        ");
    }
    function delete_data_user($id)
    {
        $query = $this->db->query("DELETE FROM tb_user WHERE ID ='$id' ");
    }
//DATA KEHADIRAN
    public function getAll_data_filter($filter_jurusan, $filter_kelas)
    {
        // $this->db->query("SELECT * FROM tb_data_siswa WHERE ID_JURUSAN = '$filter_jurusan' AND ID_KELAS = '$filter_kelas' ")->result();
        // $this->db->query("SELECT * FROM tb_data_siswa")->result();
        $this->db->from($this->tbl_siswa);
        $this->db->where('ID_JURUSAN', 1);
        $this->db->where('ID_KELAS', 1);

        return $this->db->get()->result();
    
    }   
    public function getAll_hadir_filter($filter_bulan,$filter_tahun,$filter_jurusan, $filter_kelas)
    {
        // $this->db->query("SELECT * FROM tb_kehadiran WHERE ID_JURUSAN = '$filter_jurusan' AND ID_KELAS = '$filter_kelas' AND WAKTU LIKE'%$filter_tahun-$filter_bulan%' ")->result();
        $this->db->query("SELECT * FROM tb_data_siswa WHERE ID_JURUSAN = '1' AND ID_KELAS = '1'")->result();
    }
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
    public function ambil_data_pelanggaran($id)
    {
        $query = $this->db->query("SELECT * FROM tb_kehadiran WHERE ID ='$id' ");
        if ($query) {
            return $query->row();
        }
    }
    function edit_data_kehadiran($id,$kd_plg,$ket)
    {
        $query = $this->db->query("UPDATE tb_kehadiran SET
            PELANGGARAN = '$kd_plg',
            KETERANGAN = '$ket'
            WHERE ID = '$id'
        ");
    }
//DATA JURUSAN
    function tambah_data_jurusan($jurusan)
    {
        $query = $this->db->query("INSERT INTO tb_jurusan (
            JURUSAN
            ) VALUES(
            '$jurusan'
            ) ");
    }
    function detail_data_jurusan($id)
    {
        $query = $this->db->query("SELECT * FROM tb_jurusan WHERE ID ='$id' ");
        if ($query) {
            return $query->row();
        }
    }
    function edit_data_jurusan($id,$jurusan)
    {
        $query = $this->db->query("UPDATE tb_jurusan SET
            JURUSAN = '$jurusan'
            WHERE ID = '$id'
        ");
    }
    function delete_data_jurusan($id)
    {
        $query = $this->db->query("DELETE FROM tb_jurusan WHERE ID ='$id' ");
    }

//DATA KELAS
    function tambah_data_kelas($kelas,$jurusan)
    {
        $query = $this->db->query("INSERT INTO tb_kelas (
            KELAS,
            ID_JURUSAN
            ) VALUES(
            '$kelas',
            '$jurusan'
            ) ");
    }
    function detail_data_kelas($id)
    {
        $query = $this->db->query("SELECT * FROM tb_kelas WHERE ID ='$id' ");
        if ($query) {
            return $query->row();
        }
    }
    function edit_data_kelas($id,$kelas,$jurusan)
    {
        $query = $this->db->query("UPDATE tb_kelas SET
            KELAS = '$kelas',
            ID_JURUSAN = '$jurusan'
            WHERE ID = '$id'
        ");
    }
    function delete_data_kelas($id)
    {
        $query = $this->db->query("DELETE FROM tb_kelas WHERE ID ='$id' ");
    }
}
