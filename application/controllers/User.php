<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


	public function registerView()
	{
		$this->load->view('register');
	}

	public function userRegister()
	{
		//save to database	
		$data = array(
			'nic' => $this->input->post('nic'),
			'user_fname' => $this->input->post('firstname'),
			'user_lname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'contact' => $this->input->post('contactno'),
			'password' => md5($this->input->post('confirm_password')),
			'status' => 'active'
		);

		$this->form_validation->set_rules('nic', 'NIC', 'trim|required|xss_clean');
		$this->form_validation->set_rules('firstname', 'Full Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contactno', 'Contact No', 'trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			$this->registerView();
		} else {
			$this->User_Model->new_user_in($data);
			$this->session->set_flashdata('submit_success', 'User Registered Successfully..!');
			redirect('Welcome');
		}
	}

	public function userView($user_id)
	{
		$results = $this->User_Model->user_one($user_id);
		$this->load->view('profile', ['userres' => $results]);
	}
}
