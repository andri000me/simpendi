<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hibah extends CI_Model
{
    public function insert($data)
    {
        return ($this->db->insert('hibahs', $data)) ? true : false ;
    }

}
