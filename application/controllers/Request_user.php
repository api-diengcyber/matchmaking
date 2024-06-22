<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request_user extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Request_model');
        $this->load->model('Users_model');
        $this->load->model('Jadwal_model');
        $this->load->model('Pil_jam_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $jam = $this->Pil_jam_model->get_all();
        $cari = '';
        if ($this->input->post('cari') != null) {
            $cari = $this->input->post('cari');
        }
        $request = $this->Request_model->get_my_request_out($cari);


        $data = array(
            'title' => 'request',
            'request' => $request,
            'jam' => $jam,
            'cari' => $cari
        );

        $this->load->view('user/layouts/header');
        $this->load->view('user/request', $data);
        $this->load->view('user/layouts/footer');
    }
    public function request_all()
    {
        $jam = $this->Pil_jam_model->get_all();
        $cari = '';
        $type = '';
        $sort = 'ASC';
        $status = '';
        if ($this->input->post('type') != null) {
            $type = $this->input->post('type');
        }
        if ($this->input->post('cari') != null) {
            $cari = $this->input->post('cari');
        }
        if ($this->input->post('sort') != null) {
            $sort = $this->input->post('sort');
        }
        if ($this->input->post('status') != null) {
            $status = $this->input->post('status');
        }
        $request = $this->Request_model->get_all($type,$cari, $sort, $status);


        $data = array(
            'title' => 'request',
            'request' => $request,
            'jam' => $jam,
            'cari' => $cari,
            'sort' => $sort,
            'status' => $status,
        );
        var_dump($data);
        $this->load->view('user/layouts/header');
        $this->load->view('user/request', $data);
        $this->load->view('user/layouts/footer');
    }
    public function keluar($status,$id='')
    {
        
        $jam = $this->Pil_jam_model->get_all();
        $cari = '';
        $sort = 'ASC';
        if ($status == 'allkeluar') {
            $status = '';
        }
        if ($this->input->get('cari') != null) {
            $cari = $this->input->get('cari');
        }
        if ($this->input->get('sort') != null) {
            $sort = $this->input->get('sort');
        }
        if ($this->input->get('status') != null) {
            $status = $this->input->get('status');
        }
        $request = $this->Request_model->get_my_request_out($cari, $sort, $status,$id);


        $data = array(
            'title' => 'request',
            'request' => $request,
            'jam' => $jam,
            'cari' => $cari,
            'sort' => $sort,
            'status' => $status,
        );

        $this->load->view('user/layouts/header');
        $this->load->view('user/requestKeluar', $data);
        $this->load->view('user/layouts/footer');
    }
    public function masuk($status,$id='')
    {
        $jam = $this->Pil_jam_model->get_all();
        $cari = '';
        $sort = 'ASC';
        if ($this->input->get('cari') != null) {
            $cari = $this->input->get('cari');
        }
        if ($this->input->get('sort') != null) {
            $sort = $this->input->get('sort');
        }
        if ($status == 'all') {
            $status = '';
        }

        // var_dump($status);
        $request = $this->Request_model->get_my_request_in($cari, $sort, $status,$id);

        $data = array(
            'title' => 'request',
            'request' => $request,
            'jam' => $jam,
            'cari' => $cari,
            'sort' => $sort,
            'status' => $status,
        );

        $this->load->view('user/layouts/header');
        $this->load->view('user/requestMasuk', $data);
        $this->load->view('user/layouts/footer');
    }
    public function acc($id)
    {
        $data = array(
            'status' => 2,
            'tgl_update' => date('Y-m-d H:i:s'),

        );
        $this->Request_model->update($id, $data);
        $this->session->set_flashdata('message', 'Request diterima');
        redirect(site_url('request_user/masuk/all'));
    }
    public function cancel($id)
    {
        $data = array(
            'status' => 8,
            'tgl_update' => date('Y-m-d H:i:s'),

        );
        $this->Request_model->update($id, $data);

        $this->session->set_flashdata('message', 'Delete');
        redirect(site_url('request_user/keluar/allkeluar'));
    }
    public function reject($id)
    {
        $data = array(
            'status' => 3,
            'tgl_update' => date('Y-m-d H:i:s'),
        );
        $this->Request_model->update($id, $data);
        $this->session->set_flashdata('message', 'Request diterima');
        redirect(site_url('request_user/masuk/all'));
    }

    public function ulang($id)
    {
        $data = array(
            'status' => 1,
            'tgl_update' => date('Y-m-d H:i:s')
            
        );
        $this->Request_model->update($id, $data);
        $this->session->set_flashdata('message', 'Request ulang berhasil');
        redirect(site_url('request_user/keluar'));

    }
    public function open($id)
    {
        $data = array(
            'status' => 1,
            'tgl_update' => date('Y-m-d H:i:s')

        );
        $this->Request_model->update($id, $data);
        $this->session->set_flashdata('message', 'Request ulang berhasil');
        redirect(site_url('request_user/masuk'));

    }


    public function check_request($id)
    {   
        $row=$this->Request_model->get_by_user($id);
        // if(!$row){            
        //     $row=$this->Request_model->get_by_req_keluar($id);
        // }
        echo json_encode($row);

    }

    public function check($id)
    {
        $cekMasuk = $this->Request_model->get_by_req_masuk($id);
		$cekKeluar = $this->Request_model->get_by_req_keluar($id);

        
        
        $data = [
            'cekMasuk' => $cekMasuk,
            'cekKeluar' => $cekKeluar
        ];

        

        var_dump($data);
    }

    public function request($id)
    {
      
        $data = [
            'id_user1' => $this->session->userdata('id'),
            'id_user2' => $id,
            'status' => 1,
            'tgl_update' => date('Y-m-d H:i:s')
        ];
        $this->Request_model->insert($data);

        $last_id = $this->db->insert_id();
        // $row = $this->Request_model->get_by_id($last_id);
        // $match = $this->Request_Model->get();


        redirect(site_url('request_user/detail/' . $last_id));

        // $this->session->set_flashdata('message', 'Request berhasil dikirim');
        // redirect(site_url('users_user/detail/' . $id));

    }

    public function detail($id)
    {
        $row = $this->Request_model->get_by_id($id);

        $data = array(            
            'id_request' => $row->id_request,
            'nama_user1' => $row->nama_user1,
            'tgl_lahir_user1' => $row->tgl_lahir_user1,
            'alamat_user1' => $row->alamat_user1,
            'hobi_user1' => $row->hobi_user1,
            'pekerjaan_user1' => $row->pekerjaan_user1,
            'deskripsi_diri_user1' => $row->deskripsi_diri_user1,
            'kriteria_pasangan_user1' => $row->kriteria_pasangan_user1,
            'ig_user1' => $row->ig_user1,
            'fb_user1' => $row->fb_user1,
            'jenis_kelamin_user1' => $row->jenis_kelamin_user1,
            'foto_user1' => $row->foto_user1,
            'tgl_register_user1' => $row->tgl_register_user1,
            'kabupaten_user1' => $row->kabupaten_user1,
            'provinsi_user1' => $row->provinsi_user1,
            'nama_user2' => $row->nama_user2,
            'tgl_lahir_user2' => $row->tgl_lahir_user2,
            'alamat_user2' => $row->alamat_user2,
            'hobi_user2' => $row->hobi_user2,
            'pekerjaan_user2' => $row->pekerjaan_user2,
            'deskripsi_diri_user2' => $row->deskripsi_diri_user2,
            'kriteria_pasangan_user2' => $row->kriteria_pasangan_user2,
            'ig_user2' => $row->ig_user2,
            'fb_user2' => $row->fb_user2,
            'jenis_kelamin_user2' => $row->jenis_kelamin_user2,
            'foto_user2' => $row->foto_user2,
            'tgl_register_user2' => $row->tgl_register_user2,
            'kabupaten_user2' => $row->kabupaten_user2,
            'provinsi_user2' => $row->provinsi_user2,
            'status' => $row->status,
            'tgl_update' => $row->tgl_update,
            'tgl_meeting' => $row->tgl_meeting,
            'id_jam' => $row->id_jam,
            'link_zoom' => $row->link_zoom,
        );

        $this->load->view('user/layouts/header');
        $this->load->view('user/requestDetail', $data);
        $this->load->view('user/layouts/footer');
    }






    public function get_req($id)
    {
        $row = $this->Request_model->get_jam_req_by_id($id);

        echo json_encode($row);
    }
    public function update_finish($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);

        $data_request = array(
            'status' => 5,
            'tgl_update' => date('Y-m-d H:i:s')
        );
        $data = array(
            'status' => 3,

        );

        $this->Request_model->update($id, $data_request);
        $this->Jadwal_model->update($row->id_request, $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        // redirect(site_url('jadwal_admin'));

        echo json_encode($row);
    }


    public function read($id)
    {
        $row = $this->Request_model->get_by_id($id);
        $jam = $this->Pil_jam_model->get_all();
        if ($row) {
            $data = array(
                'jam' => $jam,
                'id_request' => $row->id_request,
                'nama_user1' => $row->nama_user1,
                'tgl_lahir_user1' => $row->tgl_lahir_user1,
                'alamat_user1' => $row->alamat_user1,
                'hobi_user1' => $row->hobi_user1,
                'pekerjaan_user1' => $row->pekerjaan_user1,
                'deskripsi_diri_user1' => $row->deskripsi_diri_user1,
                'kriteria_pasangan_user1' => $row->kriteria_pasangan_user1,
                'ig_user1' => $row->ig_user1,
                'fb_user1' => $row->fb_user1,
                'jenis_kelamin_user1' => $row->jenis_kelamin_user1,
                'foto_user1' => $row->foto_user1,
                'tgl_register_user1' => $row->tgl_register_user1,
                'nama_user2' => $row->nama_user2,
                'tgl_lahir_user2' => $row->tgl_lahir_user2,
                'alamat_user2' => $row->alamat_user2,
                'hobi_user2' => $row->hobi_user2,
                'pekerjaan_user2' => $row->pekerjaan_user2,
                'deskripsi_diri_user2' => $row->deskripsi_diri_user2,
                'kriteria_pasangan_user2' => $row->kriteria_pasangan_user2,
                'ig_user2' => $row->ig_user2,
                'fb_user2' => $row->fb_user2,
                'jenis_kelamin_user2' => $row->jenis_kelamin_user2,
                'foto_user2' => $row->foto_user2,
                'tgl_register_user2' => $row->tgl_register_user2,
                'status' => $row->status,
                'tgl_update' => $row->tgl_update,
            );
            $this->load->view('admin/layouts/header');
            $this->load->view('admin/request/request_read', $data);
            $this->load->view('admin/layouts/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('request_admin'));
        }
    }

    public function confirm()
    {
        // $this->form_validation->set_rules('tgl', 'Tanggal harus di isi', 'trim|required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required', array('required' => 'Tanggal harus di isi'));
        $this->form_validation->set_rules('link_zoom', 'Link Zoom', 'trim|required', array('required' => 'Link Zoom harus di isi'));
        $this->form_validation->set_rules('jam', 'Jam ', 'trim|required', array('required' => 'Jam harus di isi'));
        // $this->form_validation->set_rules('waktu', 'Waktu', 'trim|required|numeric|less_than_equal_to[50]', array(
        //     'required' => 'Waktu harus di isi',
        //     'numeric' => 'Waktu harus berupa angka',
        //     'less_than_equal_to' => 'Maximal waktu 50 menit'
        // ));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors());
            $this->index();
        } else {
            $jam = $this->Pil_jam_model->get_by_id($this->input->post('jam', TRUE));

            $jam_mulai = DateTime::createFromFormat('H:i', trim($jam->jam_mulai));
            $jam_selesai = DateTime::createFromFormat('H:i', trim($jam->jam_selesai));

            $interval = $jam_mulai->diff($jam_selesai);

            $total_menit = ($interval->h * 60) + $interval->i;

            $data_jadwal = array(
                'id_request' => $this->input->post('id_request', TRUE),
                'id_jam' => $this->input->post('jam', TRUE),
                'tgl_meeting' => $this->input->post('tgl', TRUE),
                'link_zoom' => $this->input->post('link_zoom', TRUE),
                'waktu' => $total_menit,
                // 'id_user2' => $this->input->post('id_user2', TRUE),
                // 'status' => $this->input->post('status', TRUE),
                // 'tgl_update' => date('Y-m-d H:i:s'),
            );
            $this->Jadwal_model->insert($data_jadwal);
            $data = array(
                'status' => 1,
                'tgl_update' => date('Y-m-d H:i:s')
            );

            $this->Request_model->update($this->input->post('id_request', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('request_admin'));

            // $this->Request_model->insert($data);
            // $this->session->set_flashdata('message', 'Create Record Success');
            // redirect(site_url('request_admin'));
        }
    }

    public function create()
    {
        $l = $this->Users_model->get_by_gender(1);
        $p = $this->Users_model->get_by_gender(2);
        $lPilih = null;
        $pPilih = null;
        $data = array(
            'button' => 'Create',
            'action' => site_url('request_admin/create_action'),
            'id' => set_value('id'),
            'id_user1' => set_value('id_user1'),
            'id_user2' => set_value('id_user2'),
            'status' => set_value('status'),
            'tgl_update' => set_value('tgl_update'),
            'l' => $l,
            'p' => $p,
            'lp' => $lPilih,
            'pp' => $pPilih
        );
        var_dump($l);
        $this->load->view('admin/request/request_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_user1' => $this->input->post('id_user1', TRUE),
                'id_user2' => $this->input->post('id_user2', TRUE),
                'status' => $this->input->post('status', TRUE),
                'tgl_update' => date('Y-m-d H:i:s'),
            );

            $this->Request_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('request_admin'));
        }
    }

    public function update($id)
    {
        $row = $this->Request_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('request_admin/update_action'),
                'id' => set_value('id', $row->id),
                'id_user1' => set_value('id_user1', $row->id_user1),
                'id_user2' => set_value('id_user2', $row->id_user2),
                'status' => set_value('status', $row->status),
                'tgl_update' => set_value('tgl_update', $row->tgl_update),
            );
            $this->load->view('admin/request/request_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('request_admin'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'id_user1' => $this->input->post('id_user1', TRUE),
                'id_user2' => $this->input->post('id_user2', TRUE),
                'status' => $this->input->post('status', TRUE),
                'tgl_update' => $this->input->post('tgl_update', TRUE),
            );

            $this->Request_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('request_admin'));
        }
    }

    public function delete($id)
    {
        $row = $this->Request_model->get_by_id($id);

        if ($row) {
            $rowJadwal = $this->Jadwal_model->get_by_id_request($id);
            $this->Jadwal_model->delete($rowJadwal->id);

            $this->Request_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('request_admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('request_admin'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_user1', 'id user1', 'trim|required');
        $this->form_validation->set_rules('id_user2', 'id user2', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        // $this->form_validation->set_rules('tgl_update', 'tgl update', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Request_admin.php */
/* Location: ./application/controllers/Request_admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-16 07:42:18 */
/* http://harviacode.com */
