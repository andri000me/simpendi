<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_anggota extends CI_Model
{
    public function insert($data)
    {
        return ($this->db->insert_batch('anggotas', $data)) ? true : false ;
    }

}
