<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function anggotas()
    {
        $this->db->where('role', 'pengusul');
        $data = $this->db->get('users')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }

}
