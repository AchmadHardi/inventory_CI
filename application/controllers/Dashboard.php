<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
        
    }

    //Load Halaman dashboard
    public function index()
    {
        $this->load->view('_template/v_header');
        $this->load->view('_template/v_sidebar');
        $this->load->view('_template/v_topbar');
        $this->load->view('_template/index');
        $this->load->view('_template/v_footer');
    }
}