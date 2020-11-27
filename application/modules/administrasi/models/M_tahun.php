<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tahun extends CI_Model
{
    public function all()
    {
        $data = $this->db->get('tahuns')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }

}
