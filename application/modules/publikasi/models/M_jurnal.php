<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jurnal extends CI_Model
{
    public function all()
    {
        $data = $this->db->get('jurnals')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }

    public function jurnal()
    {   $this->db->where('user_id', $this->id);
        $data = $this->db->get('jurnals')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }
    
    public function insert($data)
    {
        return ($this->db->insert('jurnals', $data)) ? true : false ;
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('jurnals', $data);
        return ($update) ? true : false;
    }

    public function delete($id)
    {
        return ($this->db->where('id', $id)->delete('jurnals')) ? true : false ;
    }

    public function getOne($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('jurnals')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

}
