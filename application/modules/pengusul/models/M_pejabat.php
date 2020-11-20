<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pejabat extends CI_Model
{
    public function all()
    {
        $data = $this->db->get('pejabats')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }
    

}
