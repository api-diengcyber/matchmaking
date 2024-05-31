<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_user extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Request_model');
		$this->load->model('Biodata_model');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function index()
	{
		$id = $this->session->userdata('id');

		$p = $this->Biodata_model->get_profile($id);
		$data = [
			'title' => 'index',
			'jk'	=> $p->jenis_kelamin
		];
		// var_dump($data);

		$this->load->view('user/layouts/header');
		$this->load->view('user/index',$data);
		$this->load->view('user/layouts/footer');
	}



}
