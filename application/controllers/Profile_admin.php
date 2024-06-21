<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Biodata_model');
		$this->load->model('Users_model');
		$this->load->library('form_validation');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$row = $this->Users_model->get_by_id($id);
		$data = array(
			'id' => $row->id,
			'ip_address' => $row->ip_address,
			'username' => $row->username,

			'password' => $row->password,
			'email' => $row->email,
			'activation_selector' => $row->activation_selector,
			'activation_code' => $row->activation_code,
			'forgotten_password_selector' => $row->forgotten_password_selector,
			'forgotten_password_code' => $row->forgotten_password_code,
			'forgotten_password_time' => $row->forgotten_password_time,
			'remember_selector' => $row->remember_selector,
			'remember_code' => $row->remember_code,
			'created_on' => $row->created_on,
			'last_login' => $row->last_login,
			'active' => $row->active,
			'first_name' => $row->first_name,
			'last_name' => $row->last_name,
			'company' => $row->company,
			'phone' => $row->phone,
		);

		// if ($row) {
		// 
		$this->load->view('admin/layouts/header');
		$this->load->view('admin/profile/profile', $data);
		$this->load->view('admin/layouts/footer');
		// }
		// $this->session->set_flashdata('message', 'Record Not Found');
		// redirect(site_url('profile_admin'));


	}
	public function update()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_unique_email');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// Validation failed
			$error = validation_errors();
			$this->session->set_flashdata('message', $error);
			$this->index();
		} else {
			$data = array(
				
				'username' => $this->input->post('username',TRUE),
				'password' => $this->ion_auth->hash_password($this->input->post('password',TRUE)),
				'email' => $this->input->post('email',TRUE),				
				'first_name' => $this->input->post('first_name',TRUE),
				'last_name' => $this->input->post('last_name',TRUE),
				'phone' => $this->input->post('phone',TRUE),
				);
		
					$this->Users_model->update($this->session->userdata('id'), $data);
					$this->session->set_flashdata('message', 'Update Record Success');
					redirect(site_url('profile_admin'));
				}
		
	}

	// Callback function to check if the email is unique
	public function check_unique_email($email)
	{
		$user_id = $this->session->userdata('id'); // Assuming you have user_id in your form

		$this->db->where('email', $email);
		$this->db->where('id !=', $user_id); // Exclude the current user's email
		$query = $this->db->get('users');

		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('check_unique_email', 'The email address is already in use.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// public function _rules() 
	// {

	// $this->form_validation->set_rules('username', 'username', 'trim|required');
	// $this->form_validation->set_rules('password', 'password', 'trim|required');
	// $this->form_validation->set_rules('email', 'email', 'trim|required');
	// $this->form_validation->set_rules('activation_selector', 'activation selector', 'trim|required');
	// $this->form_validation->set_rules('activation_code', 'activation code', 'trim|required');
	// $this->form_validation->set_rules('forgotten_password_selector', 'forgotten password selector', 'trim|required');
	// $this->form_validation->set_rules('forgotten_password_code', 'forgotten password code', 'trim|required');
	// $this->form_validation->set_rules('forgotten_password_time', 'forgotten password time', 'trim|required');
	// $this->form_validation->set_rules('remember_selector', 'remember selector', 'trim|required');
	// $this->form_validation->set_rules('remember_code', 'remember code', 'trim|required');
	// $this->form_validation->set_rules('created_on', 'created on', 'trim|required');
	// $this->form_validation->set_rules('last_login', 'last login', 'trim|required');
	// $this->form_validation->set_rules('active', 'active', 'trim|required');
	// $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	// $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	// $this->form_validation->set_rules('company', 'company', 'trim|required');
	// $this->form_validation->set_rules('phone', 'phone', 'trim|required');

	// $this->form_validation->set_rules('id', 'id', 'trim');
	// $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	// }
}
