<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function loginAuth()
	{

		try {

			$userid = $this->input->post('nic');
			$password = $this->input->post('password');
			$encPassowrd = md5($password);

			//echo $encPassowrd;
			//$this->load->view('log');

			$this->form_validation->set_rules('nic','NIC','trim|required|xss_clean');
			$this->form_validation->set_rules('password','Password','trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('index');
			}else{
			   //Send & Receive Userinfo from the Model
				$result = $this->User_Model->login_user($userid, $encPassowrd);

				if ($result) {
				//Navigate User to Related View
						$this->session->set_userdata('user_id', $result['user_id']);
						$this->session->set_userdata('username', $result['user_fname']);
						$user_id = $result['user_id'];
						//echo $user_id;
						//echo $encPassowrd;
						$allbanks = $this->Bank_Model->bank_all($user_id);
						$this->load->view('home',['allbanks'=>$allbanks]);

				}else {
					$this->session->set_flashdata('login_error','Invalid Username or Password');
					redirect('Welcome');
				} 
			}
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		redirect(base_url().'Welcome');
	}

}
