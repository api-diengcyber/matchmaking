<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal_admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->model('Request_model');
        $this->load->model('Pil_jam_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $jadwal_admin = $this->Jadwal_model->get_all();
        // var_dump($jadwal_admin);
        $data = array(
            'jadwal_admin_data' => $jadwal_admin,
        );
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/jadwal/jadwal_list', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function finish($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);
        $data = array(
            'status' => 3,
            'tgl_update' => date('Y-m-d H:i:s')
        );

        $this->Request_model->update($row->id_request, $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('jadwal_admin'));
    }

    public function read($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'id_request' => $row->id_request,
                'link_zoom' => $row->link_zoom,
                'tgl_meeting' => $row->tgl_meeting,
                'waktu' => $row->waktu,
                'nama_user1' => $row->nama_user1,
                'nama_user2' => $row->nama_user2,
                'jenis_kelamin_user1' => $row->jenis_kelamin_user1,
                'jenis_kelamin_user2' => $row->jenis_kelamin_user2,
                'jam' => $row->jmm . ' - ' . $row->jms,
            );
            $this->load->view('admin/layouts/header');
            $this->load->view('admin/jadwal/jadwal_read', $data);
            $this->load->view('admin/layouts/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal_admin'));
        }
    }

    public function create()
    {
        $request = $this->Request_model->get_by_status();
        $jam = $this->Pil_jam_model->get_all();
        $data = array(
            'jam_pilih' => set_value('jam'),
            'jam' => $jam,
            'request_pilih' => set_value('id_request'),
            'request' => $request,
            'button' => 'Create',
            'action' => site_url('jadwal_admin/create_action'),
            'id' => set_value('id'),
            'id_request' => set_value('id_request'),
            'link_zoom' => set_value('link_zoom'),
            'tgl_meeting' => set_value('tgl_meeting'),
            'waktu' => set_value('waktu'),
        );
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/jadwal/jadwal_form', $data);
        $this->load->view('admin/layouts/footer');
        // var_dump($request);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $jam = $this->Pil_jam_model->get_by_id($this->input->post('jam', TRUE));

            $jam_mulai = DateTime::createFromFormat('H:i', trim($jam->jam_mulai));
            $jam_selesai = DateTime::createFromFormat('H:i', trim($jam->jam_selesai));

            $interval = $jam_mulai->diff($jam_selesai);

            $total_menit = ($interval->h * 60) + $interval->i;

            $data_jadwal = array(
                'id_request' => $this->input->post('id_request', TRUE),
                'id_jam' => $this->input->post('jam', TRUE),
                'tgl_meeting' => $this->input->post('tgl_meeting', TRUE),
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
            redirect(site_url('jadwal_admin'));
        }
    }

    public function update($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);
        $request = $this->Request_model->get_by_status();
        $jam = $this->Pil_jam_model->get_all();

        if ($row) {
            $data = array(
                'jam_pilih' => set_value('jam', $row->id_jam),
                'jam' => $jam,
                'request_pilih' => set_value('id_request', $row->id_request),
                'request' => $request,
                'button' => 'Update',
                'action' => site_url('jadwal_admin/update_action'),
                'id' => set_value('id', $row->id),
                'id_request' => set_value('id_request', $row->id_request),
                'link_zoom' => set_value('link_zoom', $row->link_zoom),
                'tgl_meeting' => set_value('tgl_meeting', $row->tgl_meeting),
                'waktu' => set_value('waktu', $row->waktu),
                'nama_user1' => set_value('user1', $row->nama_user1),
                'nama_user2' => set_value('user2', $row->nama_user2),
            );
            $this->load->view('admin/layouts/header');
            $this->load->view('admin/jadwal/jadwal_form', $data);
            $this->load->view('admin/layouts/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal_admin'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $jam = $this->Pil_jam_model->get_by_id($this->input->post('jam', TRUE));

            $jam_mulai = DateTime::createFromFormat('H:i', trim($jam->jam_mulai));
            $jam_selesai = DateTime::createFromFormat('H:i', trim($jam->jam_selesai));

            $interval = $jam_mulai->diff($jam_selesai);

            $total_menit = ($interval->h * 60) + $interval->i;

            $data = array(
                'id_request' => $this->input->post('id_request', TRUE),
                'link_zoom' => $this->input->post('link_zoom', TRUE),
                'tgl_meeting' => $this->input->post('tgl_meeting', TRUE),
                'waktu' => $total_menit,
            );

            $this->Jadwal_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jadwal_admin'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);
        $request = $this->Request_model->get_by_id($row->id_request);

        if ($row) {
            $this->Jadwal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jadwal_admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal_admin'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_request', 'id request', 'trim|required');
        $this->form_validation->set_rules('link_zoom', 'link zoom', 'trim|required');
        $this->form_validation->set_rules('jam', 'jam', 'trim|required');
        $this->form_validation->set_rules('tgl_meeting', 'tgl meeting', 'trim|required');
        // $this->form_validation->set_rules('waktu', 'waktu', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Jadwal_admin.php */
/* Location: ./application/controllers/Jadwal_admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-16 07:41:39 */
/* http://harviacode.com */
