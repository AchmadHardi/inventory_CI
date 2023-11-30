<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function get_all()
    {
        // Fetch data from the 'kategori' table in the database
        return $this->db->get('kategori')->result();
    }

    public function tambah($data)
    {
        return $this->db->table('kategori')->insert($data);
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function get_kategori_by_id($id)
    {

        $query = $this->db->get_where('kategori', array('id_kategori' => $id));
        return $query->row();
    }

    function update_kategori($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}