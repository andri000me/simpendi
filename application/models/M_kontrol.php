<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kontrol extends CI_Model
{
    public function all()
    {
        $data = $this->db->get('kontrol')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }
}
