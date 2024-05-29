<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_user extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Request_model');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function index()
	{
		$data = [
			'title' => 'index',
		];

		$this->load->view('user/layouts/header');
		$this->load->view('user/index');
		$this->load->view('user/layouts/footer');
	}



}
