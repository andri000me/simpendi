<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penilaian extends CI_Model
{
    public function all()
    {
        $data = $this->db->get('penilaian')->result();
        return (count( (array)$data) > 0) ? $data : false;
    }
    
    public function insert($data)
    {
        return ($this->db->insert('penilaian', $data)) ? true : false ;
    }
	
	public function update($data, $hibah_id, $reviewer_id)
    {
        $this->db->where('hibah_id', $hibah_id);
        $this->db->where('reviewer_id', $reviewer_id);
        $update = $this->db->update('penilaian', $data);
        return ($update) ? true : false;
	}
	
	public function cek($hibah_id, $reviewer_id)
	{
		$this->db->where('hibah_id', $hibah_id);
		$this->db->where('reviewer_id', $reviewer_id);
		$data = $this->db->get('penilaian')->row();
		return (count( (array)$data) >0) ? true : false;
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
