<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saldo_admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Saldo_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'saldo_admin/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'saldo_admin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'saldo_admin/index.html';
            $config['first_url'] = base_url() . 'saldo_admin/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Saldo_model->total_rows($q);
        $saldo_admin = $this->Saldo_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'saldo_admin_data' => $saldo_admin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('saldo_admin/saldo_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Saldo_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_user' => $row->id_user,
		'nominal' => $row->nominal,
		'jenis' => $row->jenis,
		'keterangan' => $row->keterangan,
		'saldo' => $row->saldo,
		'tgl_update' => $row->tgl_update,
	    );
            $this->load->view('saldo_admin/saldo_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saldo_admin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('saldo_admin/create_action'),
	    'id' => set_value('id'),
	    'id_user' => set_value('id_user'),
	    'nominal' => set_value('nominal'),
	    'jenis' => set_value('jenis'),
	    'keterangan' => set_value('keterangan'),
	    'saldo' => set_value('saldo'),
	    'tgl_update' => set_value('tgl_update'),
	);
        $this->load->view('saldo_admin/saldo_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'saldo' => $this->input->post('saldo',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
	    );

            $this->Saldo_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('saldo_admin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Saldo_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('saldo_admin/update_action'),
		'id' => set_value('id', $row->id),
		'id_user' => set_value('id_user', $row->id_user),
		'nominal' => set_value('nominal', $row->nominal),
		'jenis' => set_value('jenis', $row->jenis),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'saldo' => set_value('saldo', $row->saldo),
		'tgl_update' => set_value('tgl_update', $row->tgl_update),
	    );
            $this->load->view('saldo_admin/saldo_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saldo_admin'));
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
		'nominal' => $this->input->post('nominal',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'saldo' => $this->input->post('saldo',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
	    );

            $this->Saldo_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('saldo_admin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Saldo_model->get_by_id($id);

        if ($row) {
            $this->Saldo_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('saldo_admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saldo_admin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('saldo', 'saldo', 'trim|required|numeric');
	$this->form_validation->set_rules('tgl_update', 'tgl update', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Saldo_admin.php */
/* Location: ./application/controllers/Saldo_admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-16 07:42:30 */
/* http://harviacode.com */