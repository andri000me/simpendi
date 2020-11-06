<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hibah extends CI_Model
{
    public function all()
    {
        $data = $this->db->get('hibahs')->result();
        return (count( (array)$data) > 0) ? $data : false;
	}
	
    public function penelitianBaru()
    {
		$this->db->where('kategori', 'penelitian');
        $data = $this->db->get('hibahs')->result();
        return (count( (array)$data) > 0) ? $data : false;
	}

    public function pengabdianBaru()
    {
		$this->db->where('kategori', 'pengabdian');
        $data = $this->db->get('hibahs')->result();
        return (count( (array)$data) > 0) ? $data : false;
	}
	
	public function update($data, $id)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('hibahs', $data);
        return ($update) ? true : false;
	}
	
	public function getOne($id)
	{
		$this->db->where('id', $id);
		$data = $this->db->get('hibahs')->row();
		return (count( (array)$data) >0) ? $data : false;
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
