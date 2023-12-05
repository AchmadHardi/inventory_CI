<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function get_all()
    {
        // Fetch data from the 'kategori' table in the database
        return $this->db->get('dashboard')->result();
    }

    public function tambah($data)
    {
        return $this->db->table('dashboard')->insert($data);
    }

   
}
