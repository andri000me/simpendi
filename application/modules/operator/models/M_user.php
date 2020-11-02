<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function all()
    {
        $data = $this->db->get('users')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }

    public function ketua($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('users')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

    public function anggota($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('users')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

    public function reviewer($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('users')->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

    public function reviewers()
    {
        $this->db->where('role', 'reviewer');
        $data = $this->db->get('users')->result();
        return (count( (array)$data) > 0) ? $data : false; 
    }

    public function insert($data)
    {
        return ($this->db->insert('users', $data)) ? true : false ;
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('users', $data);
        return ($update) ? true : false;
    }

    public function delete($id)
    {
        return ($this->db->where('id', $id)->delete('users')) ? true : false ;
    }

    public function getOne($where, $tabel)
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $data = $this->db->get($tabel)->row();
        return (count( (array)$data) > 0) ? $data : false;
    }

    public function getMulti($where, $tabel)
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $data = $this->db->get($tabel)->result();
        return (count( (array)$data) > 0) ? $data : false;
    }
	
	// custom enkripsi
	public function enkrip($string){
		global $bumbu_racikan;
		$bumbu = md5(str_replace("=", "", base64_encode("bunghasta.com")));
		$katakata = false;
		$metodeenkrip = "AES-256-CBC";
		$kunci = hash('sha256', $bumbu);
		$kodeiv = substr(hash('sha256', $bumbu), 0, 16);
		
		$katakata = str_replace("=", "", openssl_encrypt($string, $metodeenkrip, $kunci, 0, $kodeiv));
		$katakata = str_replace("=", "", base64_encode($katakata));
		
		return $katakata;
	}

	public function dekrip($string){
		global $bumbu_racikan;
		$bumbu = md5(str_replace("=", "", base64_encode("bunghasta.com")));
		$katakata = false;
		$metodeenkrip = "AES-256-CBC";
		$kunci = hash('sha256', $bumbu);
		$kodeiv = substr(hash('sha256', $bumbu), 0, 16);
		
		$katakata = openssl_decrypt(base64_decode($string), $metodeenkrip, $kunci, 0, $kodeiv);
		return $katakata;
	}
}
