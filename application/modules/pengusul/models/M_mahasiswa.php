<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{
    public function insert($data)
    {
        return ($this->db->insert_batch('mahasiswas', $data)) ? true : false ;
    }

    public function mahasiswa($id){
		$this->db->where('hibah_id', $id);
		$data = $this->db->get('mahasiswas')->result();
		return (count( (array)$data) > 0) ? $data : false;
	}

}
