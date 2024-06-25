<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_user extends MY_Controller
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

		$get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();



		$id = $this->session->userdata('id');

		$p = $this->Biodata_model->get_profile($id);

		$get_prov = $this->db->select('*')->from('wilayah_provinsi')->get()->result();


		$data = [
			'title' => 'index',
			'nama' => $p->nama,
			'tgl_lahir' => $p->tgl_lahir,
			'hobi' => $p->hobi,
			'pekerjaan' => $p->pekerjaan,
			'deskripsi_diri' => $p->deskripsi_diri,
			'kriteria_pasangan' => $p->kriteria_pasangan,
			'ig' => $p->ig,
			'fb' => $p->fb,
			'phone' => $p->phone,
			'jenis_kelamin' => $p->jenis_kelamin,
			'alamat' => $p->alamat,
			'foto' => $p->foto,
			'des' => $p->desa,
			'kec' => $p->kecamatan,
			'kab' => $p->kabupaten,
			'prove' => $p->provinsi,
			'provinsi' => $get_prov,
			
		];

		$this->load->view('user/layouts/header');
		$this->load->view('user/profile', $data);
		$this->load->view('user/layouts/footer');
	}
	public function update()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
		$this->form_validation->set_rules('hobi', 'Hobi', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('deskripsi_diri', 'Deskripsi diri', 'required');
		$this->form_validation->set_rules('kriteria_pasangan', 'Kriteria pasangan', 'required');
		$this->form_validation->set_rules('ig', 'Instagram', 'required');
		$this->form_validation->set_rules('fb', 'facebook', 'required');
		$this->form_validation->set_rules('phone', 'No Telp', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		// $this->form_validation->set_rules('foto', 'Foto', 'required');

		

		if ($this->input->post('prov') != null) {

			$alamat = $this->input->post('alamat', TRUE);
			if (!$alamat) {
				$this->form_validation->set_rules('prov', 'Provinsi', 'required');
				$this->form_validation->set_rules('kab', 'Kabupaten', 'required');
				$this->form_validation->set_rules('kec', 'Kecamatan', 'required');
				$this->form_validation->set_rules('des', 'Desa', 'required');

				$prov = $this->input->post('prov', TRUE);
				$kab = $this->input->post('kab', TRUE);
				$kec = $this->input->post('kec', TRUE);
				$des = $this->input->post('des', TRUE);

			}
		} else {
			$alamat = $this->input->post('alamat');
		}

		// var_dump($alamat);

		$id = $this->session->userdata('id');
		if ($this->form_validation->run() == FALSE) {
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);
			$this->index();
		} else {
			$foto = '';
			if ($_FILES['file']['name'] != null) {
				$config['upload_path'] = 'assets/user/foto'; // Path untuk menyimpan gambar, pastikan folder tersebut ada dan dapat ditulis
				$config['allowed_types'] = 'gif|jpg|jpeg|png|svg|bmp|webp';
 // Jenis file yang diperbolehkan untuk diunggah
				$config['max_size'] = 5048; // Ukuran maksimum file dalam kilobyte (KB)
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					$this->index();
				} else {
					$upload_data = $this->upload->data();
					$foto = $upload_data['file_name'];
					

					// Dapatkan nama gambar lama dari database berdasarkan id_user
					$nama_gambar = $this->db->select('foto')->from('biodata')->where('id_user', $id)->get()->row();

					// Hapus file lama jika ada
					if ($nama_gambar && file_exists('assets/user/foto/' . $nama_gambar->foto)) {
						if (unlink('assets/user/foto/' . $nama_gambar->foto)) {
							echo "Gambar lama berhasil dihapus.";
						} else {
							echo "Gagal menghapus gambar lama.";
						}
					} else {
						echo "File lama tidak ditemukan.";
					}
				}
				$data = [
					'nama' => $this->input->post('nama', TRUE),
					'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
					'hobi' => $this->input->post('hobi', TRUE),
					'pekerjaan' => $this->input->post('pekerjaan', TRUE),
					'deskripsi_diri' => $this->input->post('deskripsi_diri', TRUE),
					'kriteria_pasangan' => $this->input->post('kriteria_pasangan', TRUE),
					'ig' => $this->input->post('ig', TRUE),
					'fb' => $this->input->post('fb', TRUE),
					
					'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
					'foto' => $foto,
					'alamat' => $alamat,
					'provinsi' => $this->input->post('prov', TRUE),
					'kabupaten' => $this->input->post('kab', TRUE),
					'kecamatan' => $this->input->post('kec', TRUE),
					'desa' => $this->input->post('des', TRUE),
	
				];
			}else{
				$data = [
					'nama' => $this->input->post('nama', TRUE),
					'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
					'hobi' => $this->input->post('hobi', TRUE),
					'pekerjaan' => $this->input->post('pekerjaan', TRUE),
					'deskripsi_diri' => $this->input->post('deskripsi_diri', TRUE),
					'kriteria_pasangan' => $this->input->post('kriteria_pasangan', TRUE),
					'ig' => $this->input->post('ig', TRUE),
					'fb' => $this->input->post('fb', TRUE),
					
					'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
					
					'alamat' => $alamat,
					'provinsi' => $this->input->post('prov', TRUE),
					'kabupaten' => $this->input->post('kab', TRUE),
					'kecamatan' => $this->input->post('kec', TRUE),
					'desa' => $this->input->post('des', TRUE),
	
				];

			}



			$data_user = [
				'phone' => $this->input->post('phone', TRUE),
			];

			$this->Users_model->update($id, $data_user);
			$this->Biodata_model->update_bd($id, $data);

			$this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('profile_user'));


			// $success = 'Profil berhasil di update';
			// $this->index($error = '', $success);
			// redirect(site_url('Users_profile'));
			// Redirect atau tampilkan pesan sukses
		}
		// var_dump($this->input->post());

	}
}
