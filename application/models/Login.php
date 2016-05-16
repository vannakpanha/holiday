<?php 

class Login extends CI_Model{

	function check_user($email, $password){
		$this->db->where('u_email',$email);
		$this->db->where('u_password',$password);
		$this->db->where('u_status',1);
		return $this->db->get('users');
	}
}