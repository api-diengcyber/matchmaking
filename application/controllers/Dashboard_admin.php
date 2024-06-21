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
		
		$this->load->helper('date');

		$requestActive = $this->db->select('COUNT(r.id) as total')
		->from('request r')
		->where('r.status',4)
		->get()
		->row();
		$requestAll = $this->db->select('COUNT(r.id) as total_semua')
		->from('request r')
		->get()
		->row();
		$jadwalActive = $this->db->select('COUNT(j.id) as jadwal')
		->from('jadwal j')
		->where('j.tgl_meeting',date('Y-m-d'))
		->get()
		->row();
        $requestMasuk = $this->db->select('r.*,b.nama')
		->from('request r')
		->join('biodata b', 'b.id_user = r.id_user1', 'left')
		->where('r.status',2)
		->get()
		->result();


		$data = [
			'title' => 'index',
			'requestActive' => $requestActive,
			'requestAll' => $requestAll,
			'jadwalActive' => $jadwalActive,
			'requestMasuk' => $requestMasuk,
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/index',$data);
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
