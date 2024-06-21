<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    public $table = 'jadwal';
    public $id = 'id';
    public $idRequest = 'id_request';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('j.*,r.status, pj.jam_mulai as jmm,jam_selesai as jms, b1.nama as nama_user1, b2.nama as nama_user2,b1.foto as foto_user1,b2.foto as foto_user2');
        $this->db->from('jadwal j');
        $this->db->join('request r', 'j.id_request=r.id');
        $this->db->join('biodata b1', 'b1.id_user = r.id_user1', 'left');
        $this->db->join('biodata b2', 'b2.id_user = r.id_user2', 'left');
        $this->db->join('pil_jam pj', 'pj.id = j.id_jam', 'left');
        $query = $this->db->get();
        return $query->result();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }
    function get_all_by_id($id,$id_req,$cari,$sort)
    {
        $this->db->select('j.*,r.id as id_request,r.status as status_req, pj.jam_mulai as jmm,jam_selesai as jms, b1.nama as nama_user1, 
        b2.nama as nama_user2,b1.id_user as id_user1,b2.id_user as id_user2,b1.foto as foto_user1,b2.foto as foto_user2');
        $this->db->from('jadwal j');
        $this->db->join('request r', 'j.id_request=r.id');
        $this->db->join('biodata b1', 'b1.id_user = r.id_user1', 'left');
        $this->db->join('biodata b2', 'b2.id_user = r.id_user2', 'left');
        $this->db->join('pil_jam pj', 'pj.id = j.id_jam', 'left');
        if($id_req!=null){
            $this->db->where('j.id_request',$id_req);

        }
        if($cari!=null){
            $this->db->like('b2.nama',$cari);

        }
        $this->db->where('r.id_user1',$id);
        $this->db->or_where('r.id_user2',$id);
        if($sort!=null){
            $this->db->order_by('b2.nama',$sort);

        }
        // $this->db->where('j.status!=',2);
        $query = $this->db->get();
        return $query->result();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('j.*,r.status, pj.jam_mulai as jmm,jam_selesai as jms, 
        b1.nama as nama_user1, 
        b2.nama as nama_user2,
        b1.jenis_kelamin as jenis_kelamin_user1, 
        b2.jenis_kelamin as jenis_kelamin_user2
        
        ');
        $this->db->from('jadwal j');
        $this->db->join('request r', 'j.id_request=r.id');
        $this->db->join('biodata b1', 'b1.id_user = r.id_user1', 'left');
        $this->db->join('biodata b2', 'b2.id_user = r.id_user2', 'left');
        $this->db->join('pil_jam pj', 'pj.id = j.id_jam', 'left');
        $this->db->where('j.id', $id);
        $query = $this->db->get();
        return $query->row();
        // $this->db->where($this->id, $id);
        // return $this->db->get($this->table)->row();
    }

    function get_by_id_request($id)
    {
        $this->db->where($this->idRequest, $id);
        return $this->db->get($this->table)->row();
    }
    function get_by_id_request_jam($id)
    {
        $this->db->select('j.*,r.status as status_req, pj.jam_mulai as jmm,jam_selesai as jms,r.id as req_id
       
        
        ');
        $this->db->from('jadwal j');
        $this->db->join('request r', 'j.id_request=r.id');        
        $this->db->join('pil_jam pj', 'pj.id = j.id_jam', 'left');
        $this->db->where('j.id_request', $id);
        $query = $this->db->get();
        return $query->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('id_request', $q);
        $this->db->or_like('link_zoom', $q);
        $this->db->or_like('tgl_meeting', $q);
        $this->db->or_like('waktu', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('id_request', $q);
        $this->db->or_like('link_zoom', $q);
        $this->db->or_like('tgl_meeting', $q);
        $this->db->or_like('waktu', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Jadwal_model.php */
/* Location: ./application/models/Jadwal_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-16 07:41:39 */
/* http://harviacode.com */
