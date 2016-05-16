<?php 
class Manages extends CI_Controller{

	function add_product(){
		is_notLogin();
		$data['p_name'] = $this->input->post('pro_name');
		$data['p_description'] = $this->input->post('pro_desc');
		$data['u_id'] = $this->session->userdata('uid');
		$insert = $this->Login->add_product($data);
		if($insert){
			echo json_encode(array('status'=>true,'Message'=>'You have success to insert data!'));
		}else{
			echo json_encode(array('status'=>false,'Message'=>'Cannot insert data!'));
		}
	}
}
