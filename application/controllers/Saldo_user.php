<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saldo_user extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Saldo_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
      
        $id = $this->session->userdata('id');

        $saldo = $this->Saldo_model->get_all_by_id($id);

        $data = [
            'saldo' => $saldo
        ];

        $this->load->view('user/layouts/header');
        $this->load->view('user/saldo', $data);
        $this->load->view('user/layouts/footer');
        // var_dump($saldo);

        // $this->load->view('saldo_admin/saldo_list', $data);
    }

    public function beli()
    {
        $this->form_validation->set_rules('menit', 'menit', 'required');

        if ($this->form_validation->run() == FALSE) {
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);
			$this->index();
		} else {
                $config['upload_path'] = 'assets/user/saldo'; // Path untuk menyimpan gambar, pastikan folder tersebut ada dan dapat ditulis
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
                }

                $nominal = $this->input->post('menit') * 1000;

                $data = [

                    'id_user' => $this->session->userdata('id'),
                    'nominal' => $nominal,
                    'jenis' => 'Pembelian',
                    'keterangan' => 'Beli saldo Request',
                    'saldo' => $this->input->post('menit',TRUE),
                    'status' => 'belum-validasi',
                    'bukti_bayar' =>$foto,
                    'tgl_update' => date('Y-m-d H:i:s'),
                ];
                $this->Saldo_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('saldo_user'));


        }

    }



    public function validasi($id)
    {
        $data = [
            'status' => 'validasi',
		    'tgl_update' => date('Y-m-d H:i:s'),
        ];
        $this->Saldo_model->update($id, $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('saldo_admin'));
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
            $this->load->view('saldo_admin/saldo/saldo_read', $data);
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