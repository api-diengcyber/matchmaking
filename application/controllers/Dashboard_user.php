<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_user extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Request_model');
		$this->load->model('Biodata_model');
		$this->load->model('Pil_jam_model');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function index()
	{
		$id = $this->session->userdata('id');

		$p = $this->Biodata_model->get_profile($id);

		  	$reqMasuk = $this->db->select('COUNT(r.id) as total')
			->from('request r')
			->where('r.id_user2', $this->session->userdata('id'))
			->get()
			->row();
			$reqKeluar = $this->db->select('COUNT(r.id) as total')
			->from('request r')
			->where('r.id_user1', $this->session->userdata('id'))			
			->get()
			->row();
			
			$meet = $this->db->select('COUNT(r.id) as total')
			->from('request r')
			->where('r.id_user1', $this->session->userdata('id'))			
			->where('r.status', 5)		
			->get()
			->row();
			$newReqMasuk = $this->db->select('r.*, b.nama,b.id_user,b.foto')
			->from('request r')
			->join('biodata b','b.id_user=r.id_user1')
			->where('r.id_user2', $this->session->userdata('id'))
			->where('r.status',1)
			->get()
			->result();
			$newReqMasukJumlah = $this->db->select('COUNT(r.id) as jumlah')
			->from('request r')
			->join('biodata b','b.id_user=r.id_user1')
			->where('r.id_user2', $this->session->userdata('id'))
			->where('r.status',1)
			->get()
			->row();


			$this->db->order_by('s.id','DESC');

			$newUser = $this->db->select('b.*')
			->from('biodata b')
			->join('users s', 's.id=b.id_user')
			->where('s.company', NULL)
			->where('s.id!=', $this->session->userdata('id'))
			// ->where('b.jenis_kelamin!=', $this->session->userdata('jenis_kelamin'))
			->order_by('s.id','DESC')
			->get()
			->result();
		

			// request masuk
			$jam = $this->Pil_jam_model->get_all();
			
			$request = $this->Request_model->get_my_request_in_wait();

        // $data = array(
        //     'title' => 'request',
        //     'request' => $request,
        //     'jam' => $jam,
        //     'cari' => $cari,
        //     'sort' => $sort,
        //     'status' => $status,
        // );





		$data = [
			'title' => 'index',
			'jk'	=> $p->jenis_kelamin,
			'reqMasuk' => $reqMasuk->total,
			'reqKeluar' => $reqKeluar->total,
			'meet' => $meet->total,
			'newReqMasuk' => $newReqMasuk,
			'newReqMasukJumlah' => $newReqMasukJumlah->jumlah,
			'newUser' => $newUser,
			'request' => $request,
            'jam' => $jam,
			// 'search' => $this->load->view('user/component/formSearch')
		];
		// // var_dump($data);

		$this->load->view('user/layouts/header');
		$this->load->view('user/index',$data);
		$this->load->view('user/layouts/footer');
	}



}
