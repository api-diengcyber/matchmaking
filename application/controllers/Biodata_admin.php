<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biodata_admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Biodata_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'biodata_admin/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'biodata_admin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'biodata_admin/index.html';
            $config['first_url'] = base_url() . 'biodata_admin/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Biodata_model->total_rows($q);
        $biodata_admin = $this->Biodata_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'biodata_admin_data' => $biodata_admin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('biodata_admin/biodata_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Biodata_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_user' => $row->id_user,
		'nama' => $row->nama,
		'tgl_lahir' => $row->tgl_lahir,
		'hobi' => $row->hobi,
		'pekerjaan' => $row->pekerjaan,
		'deskripsi_diri' => $row->deskripsi_diri,
		'kriteria_pasangan' => $row->kriteria_pasangan,
		'ig' => $row->ig,
		'fb' => $row->fb,
		'jenis_kelamin' => $row->jenis_kelamin,
		'foto' => $row->foto,
		'tgl_register' => $row->tgl_register,
	    );
            $this->load->view('biodata_admin/biodata_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodata_admin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('biodata_admin/create_action'),
	    'id' => set_value('id'),
	    'id_user' => set_value('id_user'),
	    'nama' => set_value('nama'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'hobi' => set_value('hobi'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'deskripsi_diri' => set_value('deskripsi_diri'),
	    'kriteria_pasangan' => set_value('kriteria_pasangan'),
	    'ig' => set_value('ig'),
	    'fb' => set_value('fb'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'foto' => set_value('foto'),
	    'tgl_register' => set_value('tgl_register'),
	);
        $this->load->view('biodata_admin/biodata_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'hobi' => $this->input->post('hobi',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'deskripsi_diri' => $this->input->post('deskripsi_diri',TRUE),
		'kriteria_pasangan' => $this->input->post('kriteria_pasangan',TRUE),
		'ig' => $this->input->post('ig',TRUE),
		'fb' => $this->input->post('fb',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'tgl_register' => $this->input->post('tgl_register',TRUE),
	    );

            $this->Biodata_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('biodata_admin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Biodata_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('biodata_admin/update_action'),
		'id' => set_value('id', $row->id),
		'id_user' => set_value('id_user', $row->id_user),
		'nama' => set_value('nama', $row->nama),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'hobi' => set_value('hobi', $row->hobi),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'deskripsi_diri' => set_value('deskripsi_diri', $row->deskripsi_diri),
		'kriteria_pasangan' => set_value('kriteria_pasangan', $row->kriteria_pasangan),
		'ig' => set_value('ig', $row->ig),
		'fb' => set_value('fb', $row->fb),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'foto' => set_value('foto', $row->foto),
		'tgl_register' => set_value('tgl_register', $row->tgl_register),
	    );
            $this->load->view('biodata_admin/biodata_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodata_admin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'hobi' => $this->input->post('hobi',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'deskripsi_diri' => $this->input->post('deskripsi_diri',TRUE),
		'kriteria_pasangan' => $this->input->post('kriteria_pasangan',TRUE),
		'ig' => $this->input->post('ig',TRUE),
		'fb' => $this->input->post('fb',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'tgl_register' => $this->input->post('tgl_register',TRUE),
	    );

            $this->Biodata_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('biodata_admin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Biodata_model->get_by_id($id);

        if ($row) {
            $this->Biodata_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('biodata_admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodata_admin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('hobi', 'hobi', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('deskripsi_diri', 'deskripsi diri', 'trim|required');
	$this->form_validation->set_rules('kriteria_pasangan', 'kriteria pasangan', 'trim|required');
	$this->form_validation->set_rules('ig', 'ig', 'trim|required');
	$this->form_validation->set_rules('fb', 'fb', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('tgl_register', 'tgl register', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Biodata_admin.php */
/* Location: ./application/controllers/Biodata_admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-16 07:41:19 */
/* http://harviacode.com */