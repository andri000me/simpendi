<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_login extends CI_Model
{
    public function validasi_adm($username, $password)
    {
        $data		= $this->db->get_where('users', array('username like binary' => $username))->result();

        if (count($data) === 1) {
            if (password_verify($password, $data[0]->password)) {
                return $dt		=	array(
                    'is_logged_in'	=> true,
                    'username'	=>	$username,
                    'name'	    =>	$data[0]->name,
                    'role'		=>	$data[0]->role,
                    'prodi'		=>	$data[0]->prodi,
                    'id'		=>	$data[0]->id
                );
            } else {
                return 0;
            }
        }
    }


    public function get_by_cookie($cookie)
    {
        $this->db->where('cookie', $cookie);
        return $this->db->get('users');
    }
}
/* End of file M_login.php */
/* Location: ./application/models/M_login.php */
