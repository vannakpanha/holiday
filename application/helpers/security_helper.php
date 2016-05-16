<?php 
	function is_logined(){
		$CI = & get_instance();
		if($CI->session->userdata('uid')){
			redirect('logins/profile');
		}
		//$this->session->userdata('uid');
	}

	function is_notLogin(){
		$CI = & get_instance();
		if(!$CI->session->userdata('uid')){
			redirect('logins');
		}
	}
?>