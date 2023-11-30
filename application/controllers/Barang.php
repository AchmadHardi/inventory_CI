<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model'); // Adjust the model name based on your actual model file
    }

    // Barang.php (Controller)
    public function index()
    {
        $data = [
            'judul' => 'Data Barang',
            'barang' => $this->barang_model->get_all()
        ];

        $this->load->view('_template/v_header', $data);
        $this->load->view('_template/v_sidebar', $data);
        $this->load->view('_template/v_topbar', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('_template/v_footer', $data);
    }

    // public function tambah()
    // {
    //     if ($this->input->post('submit')) {
    //         $data = array(
    //             'nama_barang' => $this->input->post('nama_barang'),
    //             'stok' => $this->input->post('stok'),
    //         );

    //         $this->barang_model->tambah($data);

    //         return redirect()->to(base_url('barang/index'));
    //     }
    // }
    // Barang.php (Controller)
    public function tambah()
    {
        $nama_barang = $this->input->post('nama_barang');
        $stok = $this->input->post('stok');

        $data = array(
            'nama_barang' => $nama_barang,
            'stok' => $stok
        );
        $success = $this->barang_model->input_data($data, 'barang');

        if ($success) {
            exit('success');
        } else {
            exit("error");
        }
        // Redirect to the index page
        // redirect('barang/index');
    }




    public function edit($id)
    {
        $data['barang'] = $this->barang_model->get_barang_by_id($id);
        $this->load->view('_template/v_header', $data);
        $this->load->view('_template/v_sidebar', $data);
        $this->load->view('_template/v_topbar', $data);
        $this->load->view('barang/edit', $data); // Load the edit view with the barang details
        $this->load->view('_template/v_footer', $data);
    }

    public function update()
    {

        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $stok = $this->input->post('stok');

        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'stok' => $this->input->post('stok'),
            // 'kategori' => $this->input->post('kategori')
            // // Add other fields as needed
        );

        $where = array(
            'id_barang' => $id_barang
        );

        $this->barang_model->update_barang($where, $data, 'barang');

        // Redirect to the index page or show a success message
        redirect('barang/index', $data);

        // $this->load->view('_template/v_header', $data);
        // $this->load->view('_template/v_sidebar', $data);
        // $this->load->view('_template/v_topbar', $data);
        // $this->load->view('barang/index', $data);
        // $this->load->view('_template/v_footer', $data);
    }


    public function hapus($id)
    {
        $where = array('id_barang' => $id);
        $this->barang_model->hapus_data($where, 'barang');
        redirect('barang/index');
    }
}
