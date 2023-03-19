<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_SAS extends CI_Model
{
    private $tbl_siswa = 'siswas';
    private $tbl_hadir = 'kehadirans';

    public function login($username){
		$query = $this->db->query("SELECT * FROM users WHERE USERNAME = '$username'");
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}
    public function cek_login($username,$password){
		$query = $this->db->query("SELECT * FROM users WHERE USERNAME = '$username' AND PASSWORD = '$password'");
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}

    function get_kelas($jurusan_id)
    {
        $query = $this->db->query("SELECT * FROM kelas WHERE ID_JURUSAN = '$jurusan_id' ");
        return $query;
    }
//DATA SISWA
    function tambah_data_siswa($nis, $nama, $jurusan, $kelas, $email)
    {
        $query = $this->db->query("INSERT INTO siswas(
            NIS,
            NAMA,
            ID_JURUSAN,
            ID_KELAS,
            PASSWORD,
            EMAIL
            ) VALUES(
            '$nis',
            '$nama',
            '$jurusan',
            '$kelas',
            '$nis',
            '$email'
            ) ");
    }
    function detail_data_siswa($id)
    {
        $query = $this->db->query("SELECT * FROM siswas WHERE id ='$id' ");
        if ($query) {
            return $query->row();
        }
    }
    function edit_data_siswa($id, $nis, $nama, $jurusan, $kelas,  $email)
    {
        $query = $this->db->query("UPDATE siswas SET
            NIS = '$nis',
            NAMA = '$nama',
            
            ID_JURUSAN = '$jurusan',
            ID_KELAS = '$kelas',
            PASSWORD = '$nis',
            EMAIL = '$email'
            WHERE id = '$id'
        ");
    }
    function delete_data_siswa($id)
    {
        $query = $this->db->query("DELETE FROM siswas WHERE id ='$id' ");
    }

//DATA USER
    function tambah_data_user($username,$password,$level)
    {
        $query = $this->db->query("INSERT INTO users (
            USERNAME,
            PASSWORD,
            LEVEL
            ) VALUES(
            '$username',
            '$password',
            '$level'
            ) ");
    }
    function detail_data_user($id)
    {
        $query = $this->db->query("SELECT * FROM users WHERE id ='$id' ");
        if ($query) {
            return $query->row();
        }
    }
    function edit_data_user($id,$username,$password,$level)
    {
        $query = $this->db->query("UPDATE users SET
            USERNAME = '$username',
            PASSWORD = '$password',
            LEVEL = '$level'
            WHERE id = '$id'
        ");
    }
    function delete_data_user($id)
    {
        $query = $this->db->query("DELETE FROM users WHERE ID ='$id' ");
    }
//DATA KEHADIRAN
    public function getAll_data_filter($filter_jurusan, $filter_kelas)
    {
        // $this->db->query("SELECT * FROM siswas WHERE ID_JURUSAN = '$filter_jurusan' AND ID_KELAS = '$filter_kelas' ")->result();
        // $this->db->query("SELECT * FROM tb_data_siswa")->result();
        $this->db->from($this->tbl_siswa);
        $this->db->where('ID_JURUSAN', $filter_jurusan);
        $this->db->where('ID_KELAS', $filter_kelas);

        return $this->db->get()->result();
    
    }   
    public function getAll_hadir_filter($filter_bulan,$filter_tahun,$filter_jurusan, $filter_kelas)
    {
        // $this->db->query("SELECT * FROM tb_kehadiran WHERE ID_JURUSAN = '$filter_jurusan' AND ID_KELAS = '$filter_kelas' AND WAKTU LIKE'%$filter_tahun-$filter_bulan%' ")->result();
        $this->db->query("SELECT * FROM siswas WHERE ID_JURUSAN = '1' AND ID_KELAS = '1'")->result();
    }
    // public function getAll_data_perbulan($m,$y)
    // {
    //     $this->db->from($this->tbl_siswa);
    //     //$this->db->where("WAKTU LIKE'$m-$y' ");
    //     return $this->db->get()->result();
    // }   
    public function getAll_data()
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
        $this->db->where("WAKTU>='$tglAw' and WAKTU<='$tglAk' and NIS='$nis' ORDER BY WAKTU DESC");
        return $this->db->get()->row();
    }
    public function jmlGetPerDay_hadir($tgl, $nis)
    {
        $tglAw = date("Y-m-d", strtotime($tgl)) . " " . "00:00:00";
        $tglAk = date("Y-m-d", strtotime($tgl)) . " " . "23:59:59";
        $this->db->from($this->tbl_hadir);
        $this->db->where("WAKTU>='$tglAw' and WAKTU<='$tglAk' and NIS='$nis' ORDER BY WAKTU DESC");
        return $this->db->get()->result();
    }
    public function ambil_data_pelanggaran($id)
    {
        $query = $this->db->query("SELECT * FROM kehadirans WHERE id ='$id' ");
        if ($query) {
            return $query->row();
        }
    }
    function edit_data_kehadiran($id,$kd_plg,$ket)
    {
        $query = $this->db->query("UPDATE kehadirans SET
            PELANGGARAN = '$kd_plg',
            KETERANGAN = '$ket'
            WHERE id = '$id'
        ");
    }
//DATA JURUSAN
    function tambah_data_jurusan($jurusan)
    {
        $query = $this->db->query("INSERT INTO jurusans (
            JURUSAN
            ) VALUES(
            '$jurusan'
            ) ");
    }
    function detail_data_jurusan($id)
    {
        $query = $this->db->query("SELECT * FROM jurusans WHERE ID ='$id' ");
        if ($query) {
            return $query->row();
        }
    }
    function edit_data_jurusan($id,$jurusan)
    {
        $query = $this->db->query("UPDATE jurusans SET
            JURUSAN = '$jurusan'
            WHERE ID = '$id'
        ");
    }
    function delete_data_jurusan($id)
    {
        $query = $this->db->query("DELETE FROM jurusans WHERE ID ='$id' ");
    }

//DATA KELAS
    function tambah_data_kelas($kelas,$jurusan)
    {
        $query = $this->db->query("INSERT INTO kelas (
            KELAS,
            ID_JURUSAN
            ) VALUES(
            '$kelas',
            '$jurusan'
            ) ");
    }
    function detail_data_kelas($id)
    {
        $query = $this->db->query("SELECT * FROM kelas WHERE ID ='$id' ");
        if ($query) {
            return $query->row();
        }
    }
    function edit_data_kelas($id,$kelas,$jurusan)
    {
        $query = $this->db->query("UPDATE kelas SET
            KELAS = '$kelas',
            ID_JURUSAN = '$jurusan'
            WHERE ID = '$id'
        ");
    }
    function delete_data_kelas($id)
    {
        $query = $this->db->query("DELETE FROM kelas WHERE ID ='$id' ");
    }
//ANDROID
public function login_andro($username){
    $query = $this->db->query("SELECT * FROM siswas WHERE NIS = '$username'");
    if ($query->num_rows()==1) {
        return $query->result();
    }else{
        return false;
    }
}
public function cek_login_andro($username,$password){
    $query = $this->db->query("SELECT * FROM siswas WHERE NIS = '$username' AND PASSWORD = '$password'");
    if ($query->num_rows()==1) {
        return $query->result();
    }else{
        return false;
    }
}
}
