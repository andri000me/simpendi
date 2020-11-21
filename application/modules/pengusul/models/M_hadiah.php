<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hadiah extends CI_Model
{
    public function all()
    {
        $data = $this->db->get('hadiah')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }
    
    public function insert($data)
    {
        return ($this->db->insert('hadiah', $data)) ? true : false ;
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('hadiah', $data);
        return ($update) ? true : false;
    }

    public function delete($id)
    {
        return ($this->db->where('id', $id)->delete('hadiah')) ? true : false ;
    }

    public function getOne($kategori)
    {
        $this->db->where('kategori', $kategori);
        $data = $this->db->get('hadiah')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

}
