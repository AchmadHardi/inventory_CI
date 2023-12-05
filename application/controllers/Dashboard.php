<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model'); // Load the model
        $this->simple_login->cek_login();
    }

    // Load Halaman dashboard
    public function index()
    {
        $data = [
            'judul' => 'Data Barang',
            'dashboard' => $this->Dashboard_model->get_all()
        ];

		$this->load->view('_template/v_header', $data);
		$this->load->view('_template/v_sidebar', $data);
		$this->load->view('_template/v_topbar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('_template/v_footer', $data);
    }
}

