<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Flow extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function masuk()
    {
        $data = [
            'judul' => 'Flow Barang Masuk',
            'barang'=> $this->db->get('barang')->result(),
        ];
        $this->load->view('_template/v_header', $data);
        $this->load->view('_template/v_sidebar', $data);
        $this->load->view('_template/v_topbar', $data);
        $this->load->view('flow/masuk', $data);
        $this->load->view('_template/v_footer', $data);
    }
    public function keluar()
    {
        $data = [
            'judul' => 'Flow Barang Keluar',
            'barang'=> $this->db->get('barang')->result(),
        ];
        $this->load->view('_template/v_header', $data);
        $this->load->view('_template/v_sidebar', $data);
        $this->load->view('_template/v_topbar', $data);
        $this->load->view('flow/keluar', $data);
        $this->load->view('_template/v_footer', $data);
    }
    public function riwayat()
    {
        $data = [
            'judul'     => 'Riwayat Flow Barang',
            'stockflow' => $this->db->select('*')->from('stockflow')->join('barang', 'barang.id_barang = stockflow.id_barang')->order_by('stockflow.id', 'DESC')->get()->result()
        ];
        $this->load->view('_template/v_header', $data);
        $this->load->view('_template/v_sidebar', $data);
        $this->load->view('_template/v_topbar', $data);
        $this->load->view('flow/riwayat', $data);
        $this->load->view('_template/v_footer', $data);
    }
    public function store()
    {
        $flow = $_GET['flow'];
        if (isset($flow)) {
            $id_barang  = $this->input->post('id_barang');
            $qty        = $this->input->post('qty');
            $barang = $this->db->get_where('barang', array('id_barang' => $id_barang))->row();
            if ($flow == 'masuk') {
                $update = [
                    'stok' => $barang->stok + $qty,
                ];
            }elseif ($flow == 'keluar') {
                $update = [
                    'stok' => $barang->stok - $qty,
                ];
            }
            if (isset($update)) {
                $this->db->where(['id_barang' => $id_barang])->update('barang', $update);
                $insert = [
                    'flow'          => $flow,
                    'id_barang'     => $id_barang,
                    'qty'           => $qty,
                    'stock_before'  => $barang->stok,
                    'stock_after'   => $update['stok'],
                    'created_at'    => date('Y-m-d H:i:s'),
                ];
                $this->db->insert('stockflow', $insert);
            }
        }
        redirect('flow/riwayat');
    }
}