<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Request_model');
	}

	public function index()
	{
		$data = [
			'title' => 'index',
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/index');
		$this->load->view('admin/layouts/footer');
	}
	public function semua()
	{
		$data = [
			'title' => 'index',
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/index');
		$this->load->view('admin/layouts/footer');
	}
}
