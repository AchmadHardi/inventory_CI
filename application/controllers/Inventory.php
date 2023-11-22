<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('inventory_model');
    }

    public function index() {
        $data['products'] = $this->inventory_model->get_products();
        $this->load->view('inventory/index', $data);
    }

    public function view_history($product_id) {
        $data['product'] = $this->inventory_model->get_product($product_id);
        $data['history'] = $this->inventory_model->get_history($product_id);
        $this->load->view('inventory/view_history', $data);
    }
}