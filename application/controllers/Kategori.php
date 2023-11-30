<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model'); // Load the model here
    }

    public function index()
    {
        // Load the model to fetch data from the database
        $data = [
            'judul' => 'Data Barang',
            'kategori' => $this->Kategori_model->get_all()
        ];

        // Load views
        $this->load->view('_template/v_header', $data);
        $this->load->view('_template/v_sidebar', $data);
        $this->load->view('_template/v_topbar', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('_template/v_footer', $data);
    }

    public function tambah()
    {
        $nama_kategori = $this->input->post('nama_kategori');
        $data = array(
            'nama_kategori' => $nama_kategori,
        );
        $success = $this->Kategori_model->input_data($data, 'kategori');

        if ($success) {
            exit('success');
        } else {
            exit("error");
        }
    }


    public function edit($id)
    {
        $data['kategori'] = $this->Kategori_model->get_kategori_by_id($id);
        $this->load->view('_template/v_header', $data);
        $this->load->view('_template/v_sidebar', $data);
        $this->load->view('_template/v_topbar', $data);
        $this->load->view('kategori/edit', $data);
        $this->load->view('_template/v_footer', $data);
    }

    public function update()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');

        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
        );

        $where = array(
            'id_kategori' => $id_kategori
        );

        $this->Kategori_model->update_kategori($where, $data, 'kategori');
        redirect('kategori/index', $data);
    }


    public function hapus($id)
    {
        $where = array('id_kategori' => $id);
        $this->Kategori_model->hapus_data($where, 'kategori');
        redirect('kategori/index');
    }
}