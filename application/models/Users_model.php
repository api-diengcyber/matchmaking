<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public $table = 'users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $users = $this
            ->db
            ->select('b.id_user,s.company,s.active,b.*,s.email,s.phone')
            ->from('biodata b')
            ->join('users s', 's.id=b.id_user')
            ->where('s.company', NULL)
            ->order_by('s.id', 'DESC')
            ->get();
        return $users->result();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }
// 
public function get_all_users($nama, $limit, $offset,$sort)
{
    $this->db->select('b.*,s.company');
    $this->db->from('biodata b');
    $this->db->join('users s', 's.id=b.id_user');
    $this->db->where('s.company', NULL);
    $this->db->where('s.id !=', $this->session->userdata('id'));

    if ($nama) {
        $this->db->like('b.nama', $nama);
    }

    $this->db->order_by('s.id', $sort);
    $this->db->limit($limit, $offset);  // Add limit and offset for pagination

    $query = $this->db->get();
    return $query->result();
}
public function search_users($nama,$order,$limit)
{
    $this->db->select('b.*,s.company');
    $this->db->from('biodata b');
    $this->db->join('users s', 's.id=b.id_user');
    $this->db->where('s.company', NULL);
    $this->db->where('s.id !=', $this->session->userdata('id'));

    if ($nama!=null) {
        $this->db->like('b.nama', $nama);
    }
    if ($order) {
        $this->db->order_by('s.id', $order);
    }
    if($limit!=null){
        $this->db->limit($limit);
    }


    $query = $this->db->get();
    return $query->result();
}

public function get_users_count($nama,$sort)
{
    $this->db->select('b.*,s.company');
    $this->db->from('biodata b');
    $this->db->join('users s', 's.id=b.id_user');
    $this->db->where('s.company', NULL);
    $this->db->where('s.id !=', $this->session->userdata('id'));

    if ($nama) {
        $this->db->like('b.nama', $nama);
    }
      
    

    return $this->db->count_all_results();
}

// 
    function get_detail_users($id)
    {
        $this->db->select('b.*,s.*');
        $this->db->from('biodata b');
        $this->db->join('users s', 's.id=b.id_user');
        $this->db->where('s.company', NULL);
        $this->db->where('s.id', $id);
        
        $query = $this->db->get();
        return $query->row();
    }





    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
 

    // get by gender

    function get_by_gender($g)
    {
        $users = $this
            ->db
            ->select('b.*')
            ->from('biodata b')
            ->join('users s', 's.id=b.id_user')
            ->where('b.jenis_kelamin', $g)
            ->get();
        return $users->result();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('ip_address', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('activation_selector', $q);
        $this->db->or_like('activation_code', $q);
        $this->db->or_like('forgotten_password_selector', $q);
        $this->db->or_like('forgotten_password_code', $q);
        $this->db->or_like('forgotten_password_time', $q);
        $this->db->or_like('remember_selector', $q);
        $this->db->or_like('remember_code', $q);
        $this->db->or_like('created_on', $q);
        $this->db->or_like('last_login', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('first_name', $q);
        $this->db->or_like('last_name', $q);
        $this->db->or_like('company', $q);
        $this->db->or_like('phone', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('ip_address', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('activation_selector', $q);
        $this->db->or_like('activation_code', $q);
        $this->db->or_like('forgotten_password_selector', $q);
        $this->db->or_like('forgotten_password_code', $q);
        $this->db->or_like('forgotten_password_time', $q);
        $this->db->or_like('remember_selector', $q);
        $this->db->or_like('remember_code', $q);
        $this->db->or_like('created_on', $q);
        $this->db->or_like('last_login', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('first_name', $q);
        $this->db->or_like('last_name', $q);
        $this->db->or_like('company', $q);
        $this->db->or_like('phone', $q);
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

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-17 06:10:52 */
/* http://harviacode.com */
