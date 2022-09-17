<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{


	public function allbankView()
	{
		$user_id = $this->session->userdata('user_id');
		$allbanks = $this->Bank_Model->bank_all($user_id);
		$this->load->view('home', ['allbanks' => $allbanks]);
	}

	public function addbankView()
	{
		$this->load->view('addbank');
	}

	public function addAccount()
	{
		$user_id = $this->session->userdata('user_id');
		//save to database	
		$data = array(
			'bank_account_no' => $this->input->post('accountno'),
			'user_id' => $user_id,
			'bank_name' => $this->input->post('bankname'),
			'branch' => $this->input->post('branch'),
			'branch_code' => $this->input->post('branchcode'),
			'status' => 'active'
		);

		$this->form_validation->set_rules('accountno', 'Account No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('bankname', 'Bank Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('branch', 'Branch', 'trim|required|xss_clean');
		$this->form_validation->set_rules('branchcode', 'Branch Code', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			$this->addbankView();
		} else {
			$this->Bank_Model->new_bank_in($data);
			$this->session->set_flashdata('submit_success', 'Bank Added Successfully..!');
			redirect(base_url() . 'Bank/addbankView');
		}
	}

	public function deleteBank($id)
	{
		$this->Bank_Model->bankDel($id);
		$this->session->set_flashdata('delete_success', 'Bank Deleted Successfully..!');
		redirect('Bank/allbankView');
	}

	public function editBank($id)
	{
		$results = $this->Bank_Model->bank_one($id);
		$this->load->view('updateBank', ['result' => $results]);
	}

	public function updateBank()
	{
		$id = $this->input->post('id');
		$accno = $this->input->post('accountno');
		$data = array(
			'bank_account_no' => $accno,
			'user_id' => $this->session->userdata('user_id'),
			'bank_name' => $this->input->post('bankname'),
			'branch' => $this->input->post('branch'),
			'branch_code' => $this->input->post('branchcode'),
			'status' => 'active'
		);

		$this->form_validation->set_rules('accountno', 'New Account No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('confirmaccno', 'Current Account No', 'required|matches[accountno]');
		$this->form_validation->set_rules('bankname', 'Bank Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('branch', 'Branch', 'trim|required|xss_clean');
		$this->form_validation->set_rules('branchcode', 'Branch Code', 'trim|required|xss_clean');


		if ($this->form_validation->run() == FALSE) {
			$this->editBank($id);
		} else {
			$this->Bank_Model->bank_update($id, $accno, $data);
			$this->session->set_flashdata('update_success', 'Bank Updated Successfully..!');
			redirect(base_url() . 'Bank/editBank/' . $id);
		}
	}
}
