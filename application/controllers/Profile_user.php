<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_user extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
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

		$get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();

		var_dump($get_prov);
		$data['provinsi'] = $get_prov->result();
		$data = [
			'title' => 'index',
			'nama'	=> $p->nama,
			'tgl_lahir'	=> $p->tgl_lahir,
			'hobi'	=> $p->hobi,
			'pekerjaan'	=> $p->pekerjaan,
			'deskripsi_diri'	=> $p->deskripsi_diri,
			'kriteria_pasangan'	=> $p->kriteria_pasangan,
			'ig'	=> $p->ig,
			'fb'	=> $p->fb,
			'phone'	=> $p->phone,
			'jenis_kelamin'	=> $p->jenis_kelamin,
			'foto'	=> $p->foto,
		];

		// $this->load->view('user/layouts/header');
		$this->load->view('user/profile', $data);
		// $this->load->view('user/layouts/footer');
	}
}
