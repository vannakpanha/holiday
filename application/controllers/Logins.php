<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logins extends CI_Controller{

	function index(){
		is_logined();
		$this->load->view('login/login');
	}

	function check(){
		is_logined();
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|min_length[5]');

		if($this->form_validation->run()==FALSE){
			$this->load->view('login/login');
		}else{
			//check user in database usig model Login 
			$check = $this->Login->check_user($email,$password);
			if($check->num_rows()>0){
				$this->session->set_userdata('uid',$check->row()->u_id);
				//redirect('logins/profile');
				echo json_encode(array('status'=>TRUE,'message'=>"You have successed to login, system is redirecting to your profile!"));
			}else{
				echo json_encode(array('status'=>FALSE,'message'=>"Email & Password don't match!"));
			}
		}
	}


	function profile(){
		is_notLogin();
		echo "your id is: ".$this->session->userdata('uid');
		echo anchor('logins/sign_out','Logout');
	}

	function sign_out(){
		$this->session->unset_userdata('uid');
		redirect('Logins');
	}
}