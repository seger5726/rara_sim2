<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Kategori_model extends CI_Model{
    
    Private $table ='kategori';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
}