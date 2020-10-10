<?php 
class M_auth extends CI_Model {

	function auth($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query=$this->db->get('users');
		return $query;
	}

}
?>