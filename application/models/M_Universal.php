<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Universal extends CI_Model
{
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
    
    public function update($data, $where, $tabel)
    {
        $this->db->where($where);
        $update = $this->db->update($tabel, $data);
        return ($update) ? true : false;
    }

    public function insert($data, $tabel)
    {
        return ($this->db->insert($tabel, $data)) ? true : false ;
    }

    public function delete($where, $tabel)
    {
        return ($this->db->where($where)->delete($tabel)) ? true : false ;
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
