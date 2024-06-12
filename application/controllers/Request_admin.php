<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request_admin extends MY_Controller
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

        $cekJadwal = '';
        $text = '';

        $statusMeet = '';

        $tglSekarang = date('Y-m-d');
        $waktu_sekarang = date('H:i:s');

        $sort = 'DESC';
        $status = '';
        if ($this->input->post('cari') != null) {
            $cari = $this->input->post('cari');
        }
        if ($this->input->post('sort') != null) {
            $sort = $this->input->post('sort');
        }
        if ($this->input->post('status') != null) {
            $status = $this->input->post('status');
        }

        $request = $this->Request_model->get_all($sort, $status);

        foreach ($request as $cekRequest) {
            if ($cekRequest != null) {
                $cekJadwal = $this->Jadwal_model->get_by_id_request_jam($cekRequest->id_request);
                if ($cekJadwal == null) {

                } elseif ($tglSekarang < $cekJadwal->tgl_meeting) {
                    $text = 'ada';
                } elseif ($tglSekarang == $cekJadwal->tgl_meeting) {
                    $text = 'Hari ini';
                    $statusMeet = 1;
                    if ($waktu_sekarang <= $cekJadwal->jmm) {
                        $text = '<span class="badge mb-3 bg-warning rounded-pill">Meet Sekarang</span>';
                        $statusMeet = 2;
                    } elseif ($waktu_sekarang >= $cekJadwal->jmm && $waktu_sekarang <= $cekJadwal->jms) {
                        $text = '<span class="badge mb-3 bg-primary rounded-pill">Meet Sekarang</span>';
                        $statusMeet = 3;
                    } elseif ($waktu_sekarang >= $cekJadwal->jms) {
                        $text = '<span class="badge mb-3 bg-danger rounded-pill">Request masuk, meet expired</span>';
                        if ($cekRequest->status != 5) {

                            $data = [
                                'status' => 7,
                                'tgl_update' => date('Y-m-d H:i:s')
                            ];
                            $this->Request_model->update($cekRequest->id_request, $data);
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
                        $this->Request_model->update($cekRequest->id_request, $data);
                    }
                    $statusMeet = 4;
                }
            }



        }


        $jam = $this->Pil_jam_model->get_all();

        $data = array(
            'title' => 'request',
            'request_admin_data' => $request,
            'jam' => $jam,
            'sort' => $sort,
            'status' => $status,

        );

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/request/request_list', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function read($id)
    {
        $row = $this->Request_model->get_by_id($id);
        $jam = $this->Pil_jam_model->get_all();
        $jamset = $this->Pil_jam_model->get_by_id($row->id_jam);
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
                'tgl_meeting' => $row->tgl_meeting,
                'id_jam' => $row->id_jam,
                'link_zoom' => $row->link_zoom,
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
            $tglSekarang = date('Y-m-d');
            $waktuSekarang = date('H:i:s');
            $tglMeet = $this->input->post('tgl', TRUE);
            $jamMulai = $jam->jam_mulai;

            // Konversi tanggal dan waktu menjadi objek DateTime
            $inputDatetime = new DateTime("$tglMeet $jamMulai");
            $currentDatetime = new DateTime();

            if ($inputDatetime < $currentDatetime) {

                $this->session->set_flashdata('message', 'Tanggal dan waktu tidak boleh kurang dari sekarang');
                if ($this->input->post('id_req')) {
                    redirect(site_url('request_admin/read/' . $this->input->post('id_req')));

                } else {
                    $this->index();

                }
                ;
            } else {

                $jam = $this->Pil_jam_model->get_by_id($this->input->post('jam', TRUE));

                $jam_mulai = new DateTime($jam->jam_mulai);
                $jam_mulai_menit = $jam_mulai->format('H') * 60 + $jam_mulai->format('i');

                $jam_selesai = new DateTime($jam->jam_selesai);
                $jam_selesai_menit = $jam_selesai->format('H') * 60 + $jam_selesai->format('i');

                $selisih_menit = abs($jam_selesai_menit - $jam_mulai_menit);



                $data_jadwal = array(
                    'id_request' => $this->input->post('id_request', TRUE),
                    'id_jam' => $this->input->post('jam', TRUE),
                    'tgl_meeting' => $this->input->post('tgl', TRUE),
                    'link_zoom' => $this->input->post('link_zoom', TRUE),
                    'waktu' => $selisih_menit,
                    // 'id_user2' => $this->input->post('id_user2', TRUE),
                    // 'status' => $this->input->post('status', TRUE),
                    // 'tgl_update' => date('Y-m-d H:i:s'),
                );
                $this->Jadwal_model->insert($data_jadwal);
                $data = array(
                    'status' => 4,
                    'tgl_update' => date('Y-m-d H:i:s')
                );

                $this->Request_model->update($this->input->post('id_request', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                if ($this->input->post('id_req')) {
                    redirect(site_url('request_admin/read/' . $this->input->post('id_req')));

                } else {
                    redirect(site_url('request_admin'));

                }
                ;

            }

            // var_dump($tglSekarang,$this->input->post('tgl', TRUE));




            // $this->Request_model->insert($data);
            // $this->session->set_flashdata('message', 'Create Record Success');
            // redirect(site_url('request_admin'));
        }
    }
    public function update_request()
    {

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

            if ($this->input->post('id_req')) {
                redirect(site_url('request_admin/read/' . $this->input->post('id_req')));

            } else {
                $this->index();

            }
        } else {

            $jam = $this->Pil_jam_model->get_by_id($this->input->post('jam', TRUE));
            $tglSekarang = date('Y-m-d');
            $waktuSekarang = date('H:i:s');
            $tglMeet = $this->input->post('tgl', TRUE);
            $jamMulai = $jam->jam_mulai;

            // Konversi tanggal dan waktu menjadi objek DateTime
            $inputDatetime = new DateTime("$tglMeet $jamMulai");
            $currentDatetime = new DateTime();

            if ($inputDatetime < $currentDatetime) {

                $this->session->set_flashdata('message', 'Tanggal dan waktu tidak boleh kurang dari sekarang');
                if ($this->input->post('id_req')) {
                    redirect(site_url('request_admin/read/' . $this->input->post('id_req')));

                } else {
                    $this->index();

                }
            } else {

                $id = $this->input->post('id_request');

                $jadwal = $this->Jadwal_model->get_by_id_request($id);


                $jam = $this->Pil_jam_model->get_by_id($this->input->post('jam', TRUE));


                $jam_mulai = new DateTime($jam->jam_mulai);
                $jam_mulai_menit = $jam_mulai->format('H') * 60 + $jam_mulai->format('i');

                $jam_selesai = new DateTime($jam->jam_selesai);
                $jam_selesai_menit = $jam_selesai->format('H') * 60 + $jam_selesai->format('i');

                $selisih_menit = abs($jam_selesai_menit - $jam_mulai_menit);

                $data_jadwal = [
                    'id_jam' => $this->input->post('jam', TRUE),
                    'tgl_meeting' => $this->input->post('tgl', TRUE),
                    'link_zoom' => $this->input->post('link_zoom', TRUE),
                    'waktu' => $selisih_menit,
                ];
                $this->Jadwal_model->update($jadwal->id, $data_jadwal);
                $data = array(
                    'status' => 4,
                    'tgl_update' => date('Y-m-d H:i:s')
                );
                
                $this->Request_model->update($this->input->post('id_request', TRUE), $data);

                if ($this->input->post('id_req')) {
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('request_admin/read/' . $this->input->post('id_req')));

                } else {
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('request_admin'));

                }

               
            }

        }


    }
    public function selesai($id)
    {
        $jadwal = $this->Jadwal_model->get_by_id_request($id);

        $data_jadwal = [
            'status' => 3,
        ];
        $this->Jadwal_model->update($jadwal->id, $data_jadwal);

        $data = [
            'status' => 5,
            'tgl_update' => date('Y-m-d H:i:s')
        ];
        $this->Request_model->update($id, $data);



        echo json_encode($this->session->set_flashdata('message', 'Update Record Success'));
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
    public function update_status($id)
    {
        $row = $this->Request_model->get_by_id($id);


        $data = array(
            'status' => 6,
            'tgl_update' => date('Y-m-d H:i:s'),
        );
        $this->Request_model->update($id, $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('request_admin'));

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
