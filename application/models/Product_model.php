<?php
class Product_model extends CI_Model {

    public function get_products() {
        return $this->db->get('products')->result();
    }

    public function get_transaction_history($product_id) {
        $this->db->where('product_id', $product_id);
        return $this->db->get('transactions')->result();
    }

    public function add_transaction($data) {
        return $this->db->insert('transactions', $data);
    }

}
?>