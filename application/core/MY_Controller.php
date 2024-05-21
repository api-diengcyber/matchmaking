<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        // $this->header = $this->load->view('admin/layouts/header');
        // $this->footer = $this->load->view('admin/layouts/footer');
    }
}
