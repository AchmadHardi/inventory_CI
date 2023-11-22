<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model {

    public function get_products() {
        return $this->db->get('products')->result();
    }

    public function get_product($product_id) {
        return $this->db->get_where('products', array('id' => $product_id))->row();
    }

    public function get_history($product_id) {
        $this->db->where('product_id', $product_id);
        return $this->db->get('history')->result();
    }

    public function update_stock($product_id, $quantity_change) {
        // Update stock in the products table
        $this->db->where('id', $product_id);
        $this->db->set('stock', 'stock + ' . $quantity_change, FALSE);
        $this->db->update('products');

        // Log the change in the history table
        $this->db->insert('history', array(
            'product_id' => $product_id,
            'quantity_change' => $quantity_change,
            'timestamp' => date('Y-m-d H:i:s')
        ));
    }
}