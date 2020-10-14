<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('string', 'cookie'));
        $this->load->model('M_Universal');
    }

    private $cookie = "qOaHm9J9lN4DvuC5hg7uJbmVuMLSeeWt";
    
    public function index()
    {
        $cookie = get_cookie($this->cookie);
        if ($this->session->userdata('log_admin')) {
            redirect('Belakang');
        } elseif ($cookie <> '') {
            $this->load->model('M_login');
            $row = $this->M_login->get_by_cookie($cookie)->row();
            if ($row) {
                $this->_daftarkan_session($row);
            } else {
                $data = array(
                    'username' => set_value('username'),
                    'password' => set_value('password'),
                    'remember' => set_value('remember')
                );
                $this->load->view('admin/login', $data);
            }
        } else {
            $data = array(
                'username' => set_value('username'),
                'password' => set_value('password'),
                'remember' => set_value('remember')
            );
            $this->load->view('admin/login', $data);
        }
    }

    public function proses()
    {
        $username 	= addslashes(trim($this->input->post('username', true)));
        $password 	= addslashes(trim($this->input->post('password', true)));
        $remember = $this->input->post('remember');
        $this->load->model('M_login');
        $row = $this->M_login->validasi_adm($username, $password);

        if ($row != null) {
            if ($remember) {
                $key = random_string('alnum', 64);
                set_cookie($this->cookie, $key, 3600*24*30);
                $update_key = array(
                    'cookie_adm' => $key
                );

                $this->M_Universal->update($update_key, array('id_adm' => $row['id']), 'admin');
            }
            $this->_daftarkan_session($row);
        } else {
            $this->notifikasi->failLogin();
            redirect('Admin_login', 'refresh');
        }
    }

    public function _daftarkan_session($row)
    {
        array_merge($row, array('is_logged_in' =>true));
        $this->session->set_userdata('log_admin', $row);
        redirect('Belakang');
    }
    public function logout()
    {
        delete_cookie($this->cookie);
        $this->session->sess_destroy();
        redirect('Admin_login');
    }
}
