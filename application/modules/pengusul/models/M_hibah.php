<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hibah extends CI_Model
{
    public function insert($data)
    {
        return ($this->db->insert('hibahs', $data)) ? true : false ;
    }

    public function revisi()
    {
        $this->db->where('tahun', $this->semester);
		$this->db->where('status_p', 2);
        $this->db->where('user_id', $this->id);
        $this->db->or_where('tahun', $this->semester);
        $this->db->where('status_p', 3);
        $this->db->where('user_id', $this->id);
        $this->db->or_where('tahun', $this->semester);
        $this->db->where('status_p', 4);
        $this->db->where('user_id', $this->id);
        $this->db->or_where('tahun', $this->semester);
        $this->db->where('status_p', 5);
        $this->db->where('user_id', $this->id);
        $data = $this->db->get('hibahs')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

    public function laporan()
    {
        $this->db->where('tahun', $this->semester);
        $this->db->where('status_p', 5);
        $this->db->where('user_id', $this->id);
        $data = $this->db->get('hibahs')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }
    
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('hibahs', $data);
        return ($update) ? true : false;
	}

}
