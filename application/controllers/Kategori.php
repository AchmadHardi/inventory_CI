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
		$success = $this->db->insert('kategori', $data);

		if ($success) {
			echo json_encode(['icon' => 'success', 'title' => 'Data berhasil ditambahkan!']);
		} else {
			echo json_encode(['icon' => 'error', 'title' => 'Data gagal ditambahkan!']);
		}
		exit;
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

        $success = $this->db->where($where)->update('kategori', $data);
		// $success = $this->barang_model->update_barang($where, $data, 'barang');
		if ($success) {
			echo json_encode(['icon' => 'success', 'title' => 'Data berhasil Diubah!']);
		} else {
			echo json_encode(['icon' => 'error', 'title' => 'Data gagal Diubah!']);
		}
		exit;
    }


    public function hapus($id)
	{
		// Check if it's an AJAX request
		if ($this->input->is_ajax_request()) {
			$where = array('id_kategori' => $id);

			// Delete the data
			$this->Kategori_model->hapus_data($where, 'kategori');

			// Send a JSON response indicating success
			$response = array('status' => 'success', 'message' => 'Data berhasil dihapus!');
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// Redirect for non-AJAX requests (you might want to handle this differently)
			redirect('kategori/index');
		}
	}
}
