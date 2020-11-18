<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_reward extends CI_Model
{
    public function all()
    {
        $data = $this->db->get('rewards')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }

    public function reward()
    {   $this->db->where('user_id', $this->id);
        $data = $this->db->get('rewards')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }
    
    public function insert($data)
    {
        return ($this->db->insert('rewards', $data)) ? true : false ;
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('rewards', $data);
        return ($update) ? true : false;
    }

    public function delete($id)
    {
        return ($this->db->where('id', $id)->delete('rewards')) ? true : false ;
    }

    public function getOne($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('rewards')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

}
