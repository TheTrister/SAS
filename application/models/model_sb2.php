<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sb2 extends CI_Model {
	
	public function getdata1(){
		$query="SELECT * FROM tdata";
		$query=$this->db->query($query);
		if ($query) {
			return $query->result();
		}
	}
	
	public function get_agama(){
		$query="SELECT * FROM tagama";
		$tes=$this->db->query($query);
		return $tes->result();
		
	}

	public function detail_model($id){
		$query="SELECT * FROM tdata WHERE id='$id'";
		$query=$this->db->query($query);
		if ($query) {
			return $query->row();
		}
	}

	public function tambahdata($absen,$nama,$umur,$jk,$agama,$file,$username,$password){
		$query="INSERT INTO tdata VALUES (NULL,'$nama','$umur','$jk','$agama','$file','$username','$password','User')";
		$tes=$this->db->query($query);
	}

	public function editdata($absen,$nama,$umur,$jk,$agama){
		$query="UPDATE tdata SET nama = '$nama', umur ='$umur',kelamin ='$jk',agama ='$agama' WHERE $absen=id ";
		$tes=$this->db->query($query);
	}
	
	public function deletedata($absen){
		$query="DELETE FROM tdata WHERE $absen =id";
		$query=$this->db->query($query);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	//login
	public function cek_login($username,$password){
		$query = $this->db->query("SELECT * FROM tdata WHERE username = '$username' and password = '$password'");
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}
	public function login($username){
		$query = $this->db->query("SELECT * FROM tdata WHERE username = '$username'");
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}

	function getpria(){
		$query = $this->db->query("SELECT COUNT(kelamin)as jumlah From tdata where kelamin = 'pria';");
		return $query->row()->jumlah;
	}
	function getwanita(){
		$query = $this->db->query("SELECT COUNT(kelamin)as jumlah From tdata where kelamin = 'wanita';");
		return $query->row()->jumlah;
	}






}

/* End of file model_sb2.php */
/* Location: ./application/models/model_sb2.php */
?>