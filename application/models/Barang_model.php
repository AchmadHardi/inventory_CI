<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{

    public function get_barang()
    {
        // Retrieve and return the barang data from the database
        $query = $this->db->get('barang');
        return $query->result();
    }

    public function get_all()
    {
        return $this->db->get('barang')->result();
    }

    public function tambah($data)
    {
        return $this->db->table('barang')->insert($data);
    }



    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function get_barang_by_id($id)
    {
        // Retrieve and return the details of the barang with the given $id
        $query = $this->db->get_where('barang', array('id_barang' => $id));
        return $query->row();
    }

    // public function update_barang($id, $data)
    // {
    //     // Update the details of the barang with the given $id
    //     $this->db->where('id_barang', $id);
    //     $this->db->update('barang', $data);
    // }



	public function update_barang($where, $data, $table) {
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    
}
