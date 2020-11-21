<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pejabat extends CI_Model
{
    public function all()
    {
        $data = $this->db->get('pejabats')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }
    
    public function kap3m()
    {
        $this->db->where('id', 1);
        $data = $this->db->get('pejabats')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

    public function direktur()
    {
        $this->db->where('id', 2);
        $data = $this->db->get('pejabats')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

    public function kaprodi($prodi)
    {
        $this->db->where('jabatan', $prodi);
        $data = $this->db->get('pejabats')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

}
