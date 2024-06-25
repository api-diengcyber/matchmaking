<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request_model extends CI_Model
{
    public $table = 'request';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // get all
    function get_all($sort,$status)
    {
        $this->db->select('r.status, r.tgl_update, r.id as id_request,j.tgl_meeting,j.link_zoom,j.id_jam, b1.nama as nama_user1, b2.nama as nama_user2,j.id_jam,j.link_zoom,j.tgl_meeting,j.waktu');
        $this->db->from('request r');
        $this->db->join('biodata b1', 'b1.id_user = r.id_user1', 'left');
        $this->db->join('biodata b2', 'b2.id_user = r.id_user2', 'left');
        $this->db->join('jadwal j', 'j.id_request = r.id', 'left');
        if($status!=null){
            $this->db->where('r.status', $status);

        }
        if($sort!=null){
            $this->db->order_by('r.tgl_update', $sort);

        }
        $query = $this->db->get();
        return $query->result();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }

    function get_by_status()
    {
        $this->db->select('r.id as idRequest,r.status, r.tgl_update, r.id as id_request, b1.nama as nama_user1, b2.nama as nama_user2');
        $this->db->from('request r');
        $this->db->join('biodata b1', 'b1.id_user = r.id_user1', 'left');
        $this->db->join('biodata b2', 'b2.id_user = r.id_user2', 'left');
        $this->db->where('r.status', 0);
        $query = $this->db->get();
        return $query->result();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }
    function get_my_request_out($cari,$sort,$status,$id)
    {
        $this->db->select('r.id as idRequest,r.status, r.tgl_update, r.id as id_request, b1.nama as nama_user1,r.id_user2 as id_user_2, b2.nama as nama_user2,r.tgl_update,b2.foto as foto');
        $this->db->from('request r');
        $this->db->join('biodata b1', 'b1.id_user = r.id_user1', 'left');
        $this->db->join('biodata b2', 'b2.id_user = r.id_user2', 'left');
        $this->db->where('r.id_user1', $this->session->userdata('id'));
        if($status!=null){
            $this->db->where('r.status', $status);
        }
        if($cari!=null){
            $this->db->like('b2.nama', $cari);
        }
        if($sort!=null){
            $this->db->order_by('b2.nama', $sort);
        }
        if($id=null){
            $this->db->order_by('r.idRequest', $id);
        }
        $query = $this->db->get();
        return $query->result();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }
    function get_my_request_in($cari,$sort,$status,$id)
    {
        $this->db->select('r.id as idRequest,r.status, r.tgl_update, r.id as id_request, b1.nama as nama_user1,r.id_user1 as id_user_1, b2.nama as nama_user2,r.tgl_update,b1.foto as foto');
        $this->db->from('request r');
        $this->db->join('biodata b1', 'b1.id_user = r.id_user1', 'left');
        $this->db->join('biodata b2', 'b2.id_user = r.id_user2', 'left');
        $this->db->where('r.id_user2', $this->session->userdata('id'));
        if($status!=null){
            $this->db->where('r.status', $status);
        }
        if($cari!=null){
            $this->db->like('b2.nama', $cari);
        }
        if($sort!=null){
            $this->db->order_by('b2.nama', $sort);
        }
        if($id=null){
            $this->db->order_by('r.idRequest', $id);
        }
        $query = $this->db->get();
        return $query->result();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }
    function get_my_request_in_wait()
    {
        $this->db->select('r.status, r.tgl_update, r.id as id_request, b1.nama as nama_user1,r.id_user1 as id_user_1, b2.nama as nama,r.tgl_update,b2.foto as foto');
        $this->db->from('request r');
        $this->db->join('biodata b1', 'b1.id_user = r.id_user1', 'left');
        $this->db->join('biodata b2', 'b2.id_user = r.id_user2', 'left');
        $this->db->where('r.id_user2', $this->session->userdata('id'));
        $this->db->where('r.status', 1);
       
        $query = $this->db->get();
        return $query->result();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('r.status, r.tgl_update, r.id as id_request, j.tgl_meeting,j.link_zoom,j.id_jam,
        
        b1.nama as nama_user1, 
        b1.tgl_lahir as tgl_lahir_user1, 
        b1.alamat as alamat_user1, 
        b1.hobi as hobi_user1, 
        b1.pekerjaan as pekerjaan_user1, 
        b1.deskripsi_diri as deskripsi_diri_user1, 
        b1.kriteria_pasangan as kriteria_pasangan_user1, 
        b1.ig as ig_user1, 
        b1.fb as fb_user1, 
        b1.jenis_kelamin as jenis_kelamin_user1, 
        b1.foto as foto_user1, 
        b1.tgl_register as tgl_register_user1, 
        b1.kabupaten as kabupaten_user1, 
        b1.provinsi as provinsi_user1, 
        
        , b2.nama as nama_user2, 
        b2.tgl_lahir as tgl_lahir_user2, 
        b2.alamat as alamat_user2, 
        b2.hobi as hobi_user2, 
        b2.pekerjaan as pekerjaan_user2, 
        b2.deskripsi_diri as deskripsi_diri_user2, 
        b2.kriteria_pasangan as kriteria_pasangan_user2, 
        b2.ig as ig_user2, 
        b2.fb as fb_user2, 
        b2.jenis_kelamin as jenis_kelamin_user2, 
        b2.foto as foto_user2, 
        b2.tgl_register as tgl_register_user2, 
        b2.kabupaten as kabupaten_user2, 
        b2.provinsi as provinsi_user2,
        ');
        $this->db->from('request r');
        $this->db->join('biodata b1', 'b1.id_user = r.id_user1', 'left');
        $this->db->join('biodata b2', 'b2.id_user = r.id_user2', 'left');
        $this->db->join('jadwal j', 'j.id_request = r.id', 'left');
        $this->db->where('r.id', $id);
        $query = $this->db->get();
        return $query->row();

        // $this->db->where($this->id, $id);
        // return $this->db->get($this->table)->row();
    }
    function get_jam_req_by_id($id)
    {
        $this->db->select('r.status, r.tgl_update, r.id as id_request, j.tgl_meeting,j.link_zoom,j.id_jam,jm.jam_mulai,jm.jam_selesai
         ');
        $this->db->from('request r');
        $this->db->join('jadwal j', 'j.id_request = r.id', 'left');
        $this->db->join('pil_jam jm', 'jm.id = j.id_jam', 'left');
        $this->db->where('r.id', $id);
        $query = $this->db->get();
        return $query->row();

        // $this->db->where($this->id, $id);
        // return $this->db->get($this->table)->row();
    }
    function cek_request_id_user($id)
    {
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('id_user1', $id);
        $query = $this->db->get();
        return $query->result();

    }
    function get_request_id($id)
    {
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('id_user1', $this->session->userdata('id'));
        $this->db->where('id_user2', $id);
        $query = $this->db->get();
        return $query->row();

    }
    // function get_by_id_users($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('request');
    //     $this->db->where('id_user1', $id);
    //     $this->db->or_where('id_user2', $id);
    //     $query = $this->db->get();
    //     return $query->row();

    // }


    function get_by_masuk($id,$status)
    {
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('id_user1', $id);
        $this->db->where('id_user2', $this->session->userdata('id'));
        $this->db->where('status', $status);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row();

    }
  
    function get_by_keluar($id,$status)
    {
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('id_user1', $this->session->userdata('id'));
        $this->db->where('id_user2', $id);
        $this->db->where('status', $status);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row();

    }

    public function cek($id)
    {
        $this->db->select('r.*');
        $this->db->from('request r');       
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result(); 
    }

    public function get_by_user($id)
    {
        $this->db->select('r.*,b.nama');
        $this->db->from('request r');
        $this->db->join('biodata b','b.id_user=r.id_user1');
      
        
        $this->db->group_start();
        $this->db->where('id_user1', $id);
        $this->db->or_where('id_user1', $this->session->userdata('id'));
        $this->db->group_end();

        $this->db->group_start();
        $this->db->where('id_user2', $id);
        $this->db->or_where('id_user2', $this->session->userdata('id'));
        $this->db->group_end();


        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row(); 
    }
    



    public function get_by_req_masuk($id)
    {
        $this->db->select('r.*,b.nama');
        $this->db->from('request r');
        $this->db->join('biodata b','b.id_user=r.id_user1');
        $this->db->where('id_user1', $id);
        $this->db->where('id_user2', $this->session->userdata('id'));
        
        // $this->db->group_start();
        // $this->db->where('status', 1);
        // $this->db->or_where('status', 2);
        // $this->db->or_where('status', 4);
        // $this->db->group_end();
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row(); 
    }
    function get_by_req_keluar($id)
    {
        $this->db->select('r.*,b.nama');
        $this->db->from('request r');
        $this->db->join('biodata b','b.id_user=r.id_user2');
        $this->db->where('id_user1', $this->session->userdata('id'));
        $this->db->where('id_user2', $id);
        
        // $this->db->group_start();
        // $this->db->where('status', 1);
        // $this->db->or_where('status', 2);
        // $this->db->or_where('status', 4);
        // $this->db->group_end();
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row();

    }
    function get_request_id_m($id)
    {
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('id_user1', $id );
        $this->db->where('id_user2', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->row();

    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('id_user1', $q);
        $this->db->or_like('id_user2', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('tgl_update', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('id_user1', $q);
        $this->db->or_like('id_user2', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('tgl_update', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    //_status data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
    function update_status($id, $data,$status)
    {
        $row = $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $this->db->where('status!=', 5);
       
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Request_model.php */
/* Location: ./application/models/Request_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-16 07:42:18 */
/* http://harviacode.com */
