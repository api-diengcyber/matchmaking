<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Users_user extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->model('Request_model');
		$this->load->model('Jadwal_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'users/index.html';
			$config['first_url'] = base_url() . 'users/index.html';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Users_model->total_rows($q);
		$users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'users_data' => $users,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->load->view('users/users_list', $data);
	}

	public function read($id)
	{
		$row = $this->Users_model->get_by_id($id);
		if ($row) {
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
			$this->load->view('users/users_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('users'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('users/create_action'),
			'id' => set_value('id'),
			'ip_address' => set_value('ip_address'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'email' => set_value('email'),
			'activation_selector' => set_value('activation_selector'),
			'activation_code' => set_value('activation_code'),
			'forgotten_password_selector' => set_value('forgotten_password_selector'),
			'forgotten_password_code' => set_value('forgotten_password_code'),
			'forgotten_password_time' => set_value('forgotten_password_time'),
			'remember_selector' => set_value('remember_selector'),
			'remember_code' => set_value('remember_code'),
			'created_on' => set_value('created_on'),
			'last_login' => set_value('last_login'),
			'active' => set_value('active'),
			'first_name' => set_value('first_name'),
			'last_name' => set_value('last_name'),
			'company' => set_value('company'),
			'phone' => set_value('phone'),
		);
		$this->load->view('users/users_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'ip_address' => $this->input->post('ip_address', TRUE),
				'username' => $this->input->post('username', TRUE),
				'password' => $this->input->post('password', TRUE),
				'email' => $this->input->post('email', TRUE),
				'activation_selector' => $this->input->post('activation_selector', TRUE),
				'activation_code' => $this->input->post('activation_code', TRUE),
				'forgotten_password_selector' => $this->input->post('forgotten_password_selector', TRUE),
				'forgotten_password_code' => $this->input->post('forgotten_password_code', TRUE),
				'forgotten_password_time' => $this->input->post('forgotten_password_time', TRUE),
				'remember_selector' => $this->input->post('remember_selector', TRUE),
				'remember_code' => $this->input->post('remember_code', TRUE),
				'created_on' => $this->input->post('created_on', TRUE),
				'last_login' => $this->input->post('last_login', TRUE),
				'active' => $this->input->post('active', TRUE),
				'first_name' => $this->input->post('first_name', TRUE),
				'last_name' => $this->input->post('last_name', TRUE),
				'company' => $this->input->post('company', TRUE),
				'phone' => $this->input->post('phone', TRUE),
			);

			$this->Users_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('users'));
		}
	}

	public function update($id)
	{
		$row = $this->Users_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('users/update_action'),
				'id' => set_value('id', $row->id),
				'ip_address' => set_value('ip_address', $row->ip_address),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'email' => set_value('email', $row->email),
				'activation_selector' => set_value('activation_selector', $row->activation_selector),
				'activation_code' => set_value('activation_code', $row->activation_code),
				'forgotten_password_selector' => set_value('forgotten_password_selector', $row->forgotten_password_selector),
				'forgotten_password_code' => set_value('forgotten_password_code', $row->forgotten_password_code),
				'forgotten_password_time' => set_value('forgotten_password_time', $row->forgotten_password_time),
				'remember_selector' => set_value('remember_selector', $row->remember_selector),
				'remember_code' => set_value('remember_code', $row->remember_code),
				'created_on' => set_value('created_on', $row->created_on),
				'last_login' => set_value('last_login', $row->last_login),
				'active' => set_value('active', $row->active),
				'first_name' => set_value('first_name', $row->first_name),
				'last_name' => set_value('last_name', $row->last_name),
				'company' => set_value('company', $row->company),
				'phone' => set_value('phone', $row->phone),
			);
			$this->load->view('users/users_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('users'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$data = array(
				'ip_address' => $this->input->post('ip_address', TRUE),
				'username' => $this->input->post('username', TRUE),
				'password' => $this->input->post('password', TRUE),
				'email' => $this->input->post('email', TRUE),
				'activation_selector' => $this->input->post('activation_selector', TRUE),
				'activation_code' => $this->input->post('activation_code', TRUE),
				'forgotten_password_selector' => $this->input->post('forgotten_password_selector', TRUE),
				'forgotten_password_code' => $this->input->post('forgotten_password_code', TRUE),
				'forgotten_password_time' => $this->input->post('forgotten_password_time', TRUE),
				'remember_selector' => $this->input->post('remember_selector', TRUE),
				'remember_code' => $this->input->post('remember_code', TRUE),
				'created_on' => $this->input->post('created_on', TRUE),
				'last_login' => $this->input->post('last_login', TRUE),
				'active' => $this->input->post('active', TRUE),
				'first_name' => $this->input->post('first_name', TRUE),
				'last_name' => $this->input->post('last_name', TRUE),
				'company' => $this->input->post('company', TRUE),
				'phone' => $this->input->post('phone', TRUE),
			);

			$this->Users_model->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('users'));
		}
	}

	public function delete($id)
	{
		$row = $this->Users_model->get_by_id($id);

		if ($row) {
			$this->Users_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('users'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('users'));
		}
	}

	// user
	public function semua()
	{
		$sort = 'ASC';
		$nama = '';
		if ($this->input->get('sort') != null) {
            $sort = $this->input->get('sort');
        }
		if ($this->input->get('cari')) {
			$nama = $this->input->get('cari');
		}
		

		$this->load->library('pagination');

		// Configure pagination
		$config['base_url'] = site_url('users_user/semua');  // Change 'your_controller' to your actual controller
		$config['total_rows'] = $this->Users_model->get_users_count($nama,$sort);
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
	
		// Bootstrap pagination configuration
		$config['full_tag_open'] = '<nav aria-label="Page navigation "><ul class="pagination justify-content-center ">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item bg-seccondary"><a class="page-link " href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link card-morp rounded-0 border-0');
	
		$this->pagination->initialize($config);
	
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$users = $this->Users_model->get_all_users($nama, $config['per_page'], $page,$sort);
	
		$data = [
			'cari' => $nama,
			'users' => $users,
			'sort' => $sort,
			'pagination' => $this->pagination->create_links()
		];
	
		$this->load->view('user/layouts/header');
		$this->load->view('user/semua', $data);
		$this->load->view('user/layouts/footer');
	}

	public function cari()
	{
		$nama = '';
		$order = 'DESC';
		$limit = 3;
		if($this->input->get('cari')){
			$nama = $this->input->get('cari');
		}
		if($this->input->get('semua')){
			$limit = '';
		}
		$users = $this->Users_model->search_users($nama,$order,$limit);
		$data = [
			'users' => $users,
			'cari' => $nama,
			'semua' => $limit,
		];
		$this->load->view('user/layouts/header');
		$this->load->view('user/hasilCari', $data);
		$this->load->view('user/layouts/footer');
	}


	public function detail($id)
	{

		// 
		$users = $this->Users_model->get_detail_users($id);




		$cekJadwal = '';
		$text = '';

		$statusMeet = '';

		$tglSekarang = date('Y-m-d');
		$waktu_sekarang = date('H:i:s');

		$cekRequest = $this->Request_model->get_by_user($id);

		if ($cekRequest != null) {
			$cekJadwal = $this->Jadwal_model->get_by_id_request_jam($cekRequest->id);
			if ($cekJadwal == null) {

			} elseif ($tglSekarang < $cekJadwal->tgl_meeting) {
				$text = '';
			} elseif ($tglSekarang == $cekJadwal->tgl_meeting) {
				$text = 'Hari ini';
				$statusMeet = 1;
				if ($waktu_sekarang <= $cekJadwal->jmm) {
					$text = '<span class="badge mb-3 bg-info rounded-pill">Hari ini</span>';
					$statusMeet = 2;
				} elseif ($waktu_sekarang >= $cekJadwal->jmm && $waktu_sekarang <= $cekJadwal->jms) {
					$text = '<span class="badge mb-3 bg-success rounded-pill">Meet Sekarang</span>';
					$statusMeet = 3;
				} elseif ($waktu_sekarang >= $cekJadwal->jms) {
					$text = '<span class="badge mb-3 bg-danger rounded-pill">Request masuk, meet expired</span>';
					if ($cekRequest->status != 5) {

						$data = [
							'status' => 7,
							'tgl_update' => date('Y-m-d H:i:s')
						];
						$this->Request_model->update($cekRequest->id, $data);
					}

					$statusMeet = 4;
				}

			} elseif ($tglSekarang > $cekJadwal->tgl_meeting) {
				$text = '<span class="badge mb-3 bg-danger rounded-pill">Request masuk, meet expired</span>';
				if ($cekRequest->status != 5) {

					$data = [
						'status' => 7,
						'tgl_update' => date('Y-m-d H:i:s')
					];
					$this->Request_model->update($cekRequest->id, $data);
				}
				$statusMeet = 4;
			}
		}



		$isUser = $this->session->userdata('id');






		// var_dump($reqMasuk,$reqKeluar);
		$data = [
			'id' => $id,
			'isUser' => $isUser,
			'users' => $users,
			'cekRequest' => $cekRequest,
			'statusMeet' => $statusMeet,
			'text' => $text,
		];

		// var_dump($data);
		$this->load->view('user/layouts/header');
		$this->load->view('user/detailUser', $data);
		$this->load->view('user/layouts/footer');

		// // if ($cek!=null) {
		// // 	if ($cek->id_user1==$this->session->userdata('id') && $cek->id_user2==$id) {
		// // 		echo "ADA k";
		// // 	}elseif($cek->id_user1==$id && $cek->id_user2==$this->session->userdata('id')) {
		// // 		echo "ADA m";
		// // 	}else{
		// // 		echo " GADA";
		// // 	}
		// // }


		// $masukMenunggu = $this->Request_model->get_by_masuk($id, $status = 1);


		// $masukDiterima = $this->Request_model->get_by_masuk($id, $status = 2);
		// $masukDitolak = $this->Request_model->get_by_masuk($id, $status = 3);
		// $masukAktif = $this->Request_model->get_by_masuk($id, $status = 4);

		// $masukSelesai = $this->Request_model->get_by_masuk($id, $status = 5);
		// $masukNoRoom = $this->Request_model->get_by_masuk($id, $status = 6);
		// $masukExp = $this->Request_model->get_by_masuk($id, $status = 7);

		// $keluarMenunggu = $this->Request_model->get_by_keluar($id, $status = 1);
		// $keluarDiterima = $this->Request_model->get_by_keluar($id, $status = 2);
		// $keluarDitolak = $this->Request_model->get_by_keluar($id, $status = 3);
		// $keluarAktif = $this->Request_model->get_by_keluar($id, $status = 4);
		// if ($keluarAktif != null) {
		// 	$cekJadwalKeluar = $this->Jadwal_model->get_by_id_request_jam($keluarAktif->id);
		// 	if ($tglSekarang < $cekJadwalKeluar->tgl_meeting) {
		// 		$text = 'ada';
		// 	} elseif ($tglSekarang == $cekJadwalKeluar->tgl_meeting) {
		// 		$text = 'Hari ini';
		// 		$statusMeet = 1;
		// 		if ($waktu_sekarang <= $cekJadwalKeluar->jmm) {
		// 			$text = '<span class="badge bg-warning rounded-pill">Meet Sekarang</span>';
		// 			$statusMeet = 2;
		// 		} elseif ($waktu_sekarang >= $cekJadwalKeluar->jmm && $waktu_sekarang <= $cekJadwalKeluar->jms) {
		// 			$text = '<span class="badge bg-primary rounded-pill">Meet Sekarang</span>';
		// 			$statusMeet = 3;
		// 		} elseif ($waktu_sekarang >= $cekJadwalKeluar->jms) {
		// 			$text = '<span class="badge bg-danger rounded-pill">Request keluar, meet expired</span>';
		// 			$data = [
		// 				'status' => 7,
		// 			];
		// 			$this->Request_model->update($keluarAktif->id, $data);
		// 			$statusMeet = 4;
		// 		}

		// 	} elseif ($tglSekarang > $cekJadwalKeluar->tgl_meeting) {
		// 		$text = '<span class="badge bg-danger rounded-pill">Request keluar, meet expired</span>';
		// 		$data = [
		// 			'status' => 7,
		// 		];
		// 		$this->Request_model->update($keluarAktif->id, $data);
		// 		$statusMeet = 4;
		// 	}
		// }
		// $keluarSelesai = $this->Request_model->get_by_keluar($id, $status = 5);
		// $keluarNoRoom = $this->Request_model->get_by_keluar($id, $status = 6);
		// $keluarExp = $this->Request_model->get_by_keluar($id, $status = 7);
		// $data = [
		// 			'users' => $users,
		// 			'masukMenunggu' => $masukMenunggu,
		// 			'masukDiterima' => $masukDiterima,
		// 			'masukDitolak' => $masukDitolak,
		// 			'masukAktif' => $masukAktif,
		// 			'masukSelesai' => $masukSelesai,
		// 			'masukNoRoom' => $masukNoRoom,
		// 			'masukexp' => $masukExp,
		// 			'keluarMenunggu' => $keluarMenunggu,
		// 			'keluarDiterima' => $keluarDiterima,
		// 			'keluarDitolak' => $keluarDitolak,
		// 			'keluarAktif' => $keluarAktif,
		// 			'keluarSelesai' => $keluarSelesai,
		// 			'keluarNoRoom' => $keluarNoRoom,
		// 			'keluarexp' => $keluarExp,
		// 			'cekJadwalMasuk' => $cekJadwalMasuk,
		// 			'cekJadwalKeluar' => $cekJadwalKeluar,
		// 			'statusMeet' => $statusMeet,
		// 			'text'	=> $text 

		// 		];
		// var_dump($data);
		// var_dump($cek);


		// $cekMasuk = $this->Request_model->get_by_req_masuk($id);
		// $cekKeluar = $this->Request_model->get_by_req_keluar($id);
		// if($cekMasuk!=null){
		// 	if ($cekMasuk->status == 4) {
		// 		$cekJadwalMasuk = $this->Jadwal_model->get_by_id_request_jam($cekMasuk->id);
		// 		if ($tglSekarang < $cekJadwalMasuk->tgl_meeting) {
		// 			$text = 'ada';
		// 		} elseif ($tglSekarang == $cekJadwalMasuk->tgl_meeting) {
		// 			$text = 'Hari ini';
		// 			$statusMeet = 1;
		// 			if ($waktu_sekarang <= $cekJadwalMasuk->jmm) {
		// 				$text = '<span class="badge bg-warning rounded-pill">Meet Sekarang</span>';
		// 				$statusMeet = 2;
		// 			} elseif ($waktu_sekarang >= $cekJadwalMasuk->jmm && $waktu_sekarang <= $cekJadwalMasuk->jms) {
		// 				$text = '<span class="badge mb-3 bg-primary rounded-pill">Meet Sekarang</span>';
		// 				$statusMeet = 3;
		// 			} elseif ($waktu_sekarang >= $cekJadwalMasuk->jms) {
		// 				$text = '<span class="badge bg-danger rounded-pill">Request masuk, meet expired</span>';
		// 				$data = [
		// 					'status' => 7,
		// 				];
		// 				$this->Request_model->update($cekMasuk->id, $data);

		// 				$statusMeet = 4;
		// 			}

		// 		} elseif ($tglSekarang > $cekJadwalMasuk->tgl_meeting) {
		// 			$text = '<span class="badge bg-danger rounded-pill">Request masuk, meet expired</span>';
		// 			$data = [
		// 				'status' => 7,
		// 			];
		// 			$this->Request_model->update($cekMasuk->id, $data);
		// 			$statusMeet = 4;
		// 		}
		// 	}else{

		// 	}
		// }
		// if($cekKeluar!=null){
		// 	if ($cekKeluar->status == 4) {
		// 		$cekJadwalKeluar = $this->Jadwal_model->get_by_id_request_jam($cekKeluar->id);
		// 		if ($tglSekarang < $cekJadwalKeluar->tgl_meeting) {
		// 			$text = 'ada';
		// 		} elseif ($tglSekarang == $cekJadwalKeluar->tgl_meeting) {
		// 			$text = 'Hari ini';
		// 			$statusMeet = 1;
		// 			if ($waktu_sekarang <= $cekJadwalKeluar->jmm) {
		// 				$text = '<span class="badge bg-warning rounded-pill">Meet Sekarang</span>';
		// 				$statusMeet = 2;
		// 			} elseif ($waktu_sekarang >= $cekJadwalKeluar->jmm && $waktu_sekarang <= $cekJadwalKeluar->jms) {
		// 				$text = '<span class="badge mb-3 bg-primary rounded-pill">Meet Sekarang</span>';
		// 				$statusMeet = 3;
		// 			} elseif ($waktu_sekarang >= $cekJadwalKeluar->jms) {
		// 				$text = '<span class="badge bg-danger rounded-pill">Request keluar, meet expired</span>';
		// 				$data = [
		// 					'status' => 7,
		// 				];
		// 				$this->Request_model->update($cekKeluar->id, $data);
		// 				$statusMeet = 4;
		// 			}

		// 		} elseif ($tglSekarang > $cekJadwalKeluar->tgl_meeting) {
		// 			$text = '<span class="badge bg-danger rounded-pill">Request keluar, meet expired</span>';
		// 			$data = [
		// 				'status' => 7,
		// 			];
		// 			$this->Request_model->update($cekKeluar->id, $data);
		// 			$statusMeet = 4;
		// 		}
		// 	}
		// }




		// $data = [
		// 	'id' => $id,
		// 	'users' => $users,
		// 	'cekMasuk' =>$cekMasuk,
		// 	'cekKeluar' =>$cekKeluar,
		// 	'statusMeet' =>$statusMeet,
		// 	'text' =>$text,
		// ];

		// // var_dump($data);
		// $this->load->view('user/layouts/header');
		// $this->load->view('user/detailUser', $data);
		// $this->load->view('user/layouts/footer');


		// $masukMenunggu = $this->Request_model->get_by_masuk($id, $status = 1);


		// $masukDiterima = $this->Request_model->get_by_masuk($id, $status = 2);
		// $masukDitolak = $this->Request_model->get_by_masuk($id, $status = 3);
		// $masukAktif = $this->Request_model->get_by_masuk($id, $status = 4);
		// if ($masukAktif != null) {
		// 	$cekJadwalMasuk = $this->Jadwal_model->get_by_id_request_jam($masukAktif->id);
		// 	if ($tglSekarang < $cekJadwalMasuk->tgl_meeting) {
		// 		$text = 'ada';
		// 	} elseif ($tglSekarang == $cekJadwalMasuk->tgl_meeting) {
		// 		$text = 'Hari ini';
		// 		$statusMeet = 1;
		// 		if ($waktu_sekarang <= $cekJadwalMasuk->jmm) {
		// 			$text = '<span class="badge bg-warning rounded-pill">Meet Sekarang</span>';
		// 			$statusMeet = 2;
		// 		} elseif ($waktu_sekarang >= $cekJadwalMasuk->jmm && $waktu_sekarang <= $cekJadwalMasuk->jms) {
		// 			$text = '<span class="badge bg-primary rounded-pill">Meet Sekarang</span>';
		// 			$statusMeet = 3;
		// 		} elseif ($waktu_sekarang >= $cekJadwalMasuk->jms) {
		// 			$text = '<span class="badge bg-danger rounded-pill">Request masuk, meet expired</span>';
		// 			$data = [
		// 				'status' => 7,
		// 			];
		// 			$this->Request_model->update($masukAktif->id, $data);

		// 			$statusMeet = 4;
		// 		}

		// 	} elseif ($tglSekarang > $cekJadwalMasuk->tgl_meeting) {
		// 		$text = '<span class="badge bg-danger rounded-pill">Request masuk, meet expired</span>';
		// 		$data = [
		// 			'status' => 7,
		// 		];
		// 		$this->Request_model->update($masukAktif->id, $data);
		// 		$statusMeet = 4;
		// 	}
		// }
		// $masukSelesai = $this->Request_model->get_by_masuk($id, $status = 5);
		// $masukNoRoom = $this->Request_model->get_by_masuk($id, $status = 6);
		// $masukExp = $this->Request_model->get_by_masuk($id, $status = 7);

		// $keluarMenunggu = $this->Request_model->get_by_keluar($id, $status = 1);
		// $keluarDiterima = $this->Request_model->get_by_keluar($id, $status = 2);
		// $keluarDitolak = $this->Request_model->get_by_keluar($id, $status = 3);
		// $keluarAktif = $this->Request_model->get_by_keluar($id, $status = 4);
		// if ($keluarAktif != null) {
		// 	$cekJadwalKeluar = $this->Jadwal_model->get_by_id_request_jam($keluarAktif->id);
		// 	if ($tglSekarang < $cekJadwalKeluar->tgl_meeting) {
		// 		$text = 'ada';
		// 	} elseif ($tglSekarang == $cekJadwalKeluar->tgl_meeting) {
		// 		$text = 'Hari ini';
		// 		$statusMeet = 1;
		// 		if ($waktu_sekarang <= $cekJadwalKeluar->jmm) {
		// 			$text = '<span class="badge bg-warning rounded-pill">Meet Sekarang</span>';
		// 			$statusMeet = 2;
		// 		} elseif ($waktu_sekarang >= $cekJadwalKeluar->jmm && $waktu_sekarang <= $cekJadwalKeluar->jms) {
		// 			$text = '<span class="badge bg-primary rounded-pill">Meet Sekarang</span>';
		// 			$statusMeet = 3;
		// 		} elseif ($waktu_sekarang >= $cekJadwalKeluar->jms) {
		// 			$text = '<span class="badge bg-danger rounded-pill">Request keluar, meet expired</span>';
		// 			$data = [
		// 				'status' => 7,
		// 			];
		// 			$this->Request_model->update($keluarAktif->id, $data);
		// 			$statusMeet = 4;
		// 		}

		// 	} elseif ($tglSekarang > $cekJadwalKeluar->tgl_meeting) {
		// 		$text = '<span class="badge bg-danger rounded-pill">Request keluar, meet expired</span>';
		// 		$data = [
		// 			'status' => 7,
		// 		];
		// 		$this->Request_model->update($keluarAktif->id, $data);
		// 		$statusMeet = 4;
		// 	}
		// }
		// $keluarSelesai = $this->Request_model->get_by_keluar($id, $status = 5);
		// $keluarNoRoom = $this->Request_model->get_by_keluar($id, $status = 6);
		// $keluarExp = $this->Request_model->get_by_keluar($id, $status = 7);



		// $data = [
		// 	'users' => $users,
		// 	'masukMenunggu' => $masukMenunggu,
		// 	'masukDiterima' => $masukDiterima,
		// 	'masukDitolak' => $masukDitolak,
		// 	'masukAktif' => $masukAktif,
		// 	'masukSelesai' => $masukSelesai,
		// 	'masukNoRoom' => $masukNoRoom,
		// 	'masukexp' => $masukExp,
		// 	'keluarMenunggu' => $keluarMenunggu,
		// 	'keluarDiterima' => $keluarDiterima,
		// 	'keluarDitolak' => $keluarDitolak,
		// 	'keluarAktif' => $keluarAktif,
		// 	'keluarSelesai' => $keluarSelesai,
		// 	'keluarNoRoom' => $keluarNoRoom,
		// 	'keluarexp' => $keluarExp,
		// 	'cekJadwalMasuk' => $cekJadwalMasuk,
		// 	'cekJadwalKeluar' => $cekJadwalKeluar,
		// 	'statusMeet' => $statusMeet,
		// 	'text'	=> $text 

		// ];
		// var_dump($data);
		// $this->load->view('user/layouts/header');
		// $this->load->view('user/detailUser', $data);
		// $this->load->view('user/layouts/footer');

		// if ($cekRequestMasuk==null && $cekRequestKeluar == null) {
		// 	$status = 'belum ada request';
		// }elseif ($cekRequestMasuk!=null && $cekRequestKeluar != null) {
		// 	$status = 'Ada Masuk dan keluar';
		// }elseif($cekRequestMasuk){
		// 	$status = 'Ada Masuk';
		// }elseif($cekRequestKeluar){
		// 	$status = 'Ada Keluar';
		// }

		// if($cekRequestMasuk){
		// 	$typeStatus=1;
		// 	$status=$cekRequestMasuk->status;
		// 	$pesan = 'ada masuk';
		// }elseif($cekRequestKeluar){
		// 	$typeStatus=2;
		// 	$status=$cekRequestKeluar->status;
		// 	$pesan = 'ada keluar';			
		// }elseif($cekRequestKeluar==null && $cekRequestMasuk==null){
		// 	$typeStatus='';
		// 	$status='';
		// 	$pesan = 'kosong';
		// }
		// if($status==4){
		// 	echo "ada rooom";
		// }



		// $request = $this->Request_model->get_request_id($id);
		// $requestCek = $this->Request_model->get_request_id($id);
		// $requestCekMasuk = $this->Request_model->get_request_id_m($id);
		// $idStatus = '';
		// $statusRequest = '';
		// $idJadwal='';

		// if ($requestCekMasuk != null) {
		// 	$idStatus = 9;
		// }elseif($requestCekMasuk){

		// } else {
		// 	if ($requestCek == null) {
		// 		$idStatus = '';
		// 		$statusRequest = 'minta';
		// 	} elseif ($requestCek->status == 1) {
		// 		$idStatus = 1;
		// 		$statusRequest = 'menunggu';
		// 	} elseif ($requestCek->status == 2) {
		// 		$idStatus = 2;
		// 		$statusRequest = 'diterima';
		// 	} elseif ($requestCek->status == 3) {
		// 		$idStatus = 3;
		// 		$statusRequest = 'ditolak';

		// 	} elseif ($requestCek->status == 4) {

		// 		$tgl_sekarang = date('d-m-Y');



		// 		$jadwal = $this->Jadwal_model->get_by_id_request_jam($requestCek->id);

		// 		$tgl_meet = date('d-m-Y', strtotime($jadwal->tgl_meeting));
		// 		$tgl_meet = date('d-m-Y', strtotime($jadwal->tgl_meeting));

		// 		$waktu_sekarang = date('H:i:s');



		// 		if ($tgl_sekarang < $tgl_meet) {

		// 			$selisih_hari = floor((strtotime($tgl_meet) - strtotime($tgl_sekarang)) / (60 * 60 * 24)); // Menghitung selisih hari
		// 			// echo $selisih_hari . " hari lagi";
		// 			$statusMeet = 1;
		// 			$idStatus = 1;
		// 			$statusRequest = $selisih_hari . " hari lagi";
		// 		} elseif ($tgl_sekarang == $tgl_meet && $waktu_sekarang >= $jadwal->jmm && $waktu_sekarang <= $jadwal->jms) {
		// 			$statusMeet = 2;
		// 			$idStatus = 1;
		// 			$statusRequest = "Meet sekarang";
		// 		} elseif ($tgl_sekarang >= $tgl_meet && $waktu_sekarang >= $jadwal->jmm && $waktu_sekarang >= $jadwal->jms) {
		// 			$statusMeet = 3;
		// 			$idStatus = 7;
		// 			$statusRequest = "Expired";

		// 		} else {
		// 			$idStatus = 4;
		// 			$statusRequest = 'room aktif';
		// 			$idJadwal = $jadwal->id_request;

		// 		}





		// 	} elseif ($requestCek->status == 5) {
		// 		$idStatus = 5;
		// 		$statusRequest = 'room selesai';

		// 	} elseif ($requestCek->status == 6) {
		// 		$idStatus = 6;
		// 		$statusRequest = 'room ditolak';

		// 	} else {

		// 	}
		// }



		// $data = [
		// 	'users' => $users,
		// 	'requestCek' => $requestCek,
		// 	'requestCekMasuk' => $requestCekMasuk,
		// 	'statusRequest' => $statusRequest,
		// 	'idStatus' => $idStatus,
		// 	'idJadwal' => $idJadwal
		// ];

		// var_dump($data);



	}



	// encuser


	public function _rules()
	{
		$this->form_validation->set_rules('ip_address', 'ip address', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('activation_selector', 'activation selector', 'trim|required');
		$this->form_validation->set_rules('activation_code', 'activation code', 'trim|required');
		$this->form_validation->set_rules('forgotten_password_selector', 'forgotten password selector', 'trim|required');
		$this->form_validation->set_rules('forgotten_password_code', 'forgotten password code', 'trim|required');
		$this->form_validation->set_rules('forgotten_password_time', 'forgotten password time', 'trim|required');
		$this->form_validation->set_rules('remember_selector', 'remember selector', 'trim|required');
		$this->form_validation->set_rules('remember_code', 'remember code', 'trim|required');
		$this->form_validation->set_rules('created_on', 'created on', 'trim|required');
		$this->form_validation->set_rules('last_login', 'last login', 'trim|required');
		$this->form_validation->set_rules('active', 'active', 'trim|required');
		$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		$this->form_validation->set_rules('company', 'company', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-17 06:10:52 */
/* http://harviacode.com */