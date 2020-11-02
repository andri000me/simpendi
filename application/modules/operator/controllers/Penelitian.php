<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penelitian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->login 	= $this->session->userdata('log_in')['is_logged_in'];
        $this->id		= $this->session->userdata('log_in')['id'];
        $this->name		= $this->session->userdata('log_in')['name'];
        $this->role	    = $this->session->userdata('log_in')['role'];
        $this->prodi	= $this->session->userdata('log_in')['prodi'];
        $this->username	= $this->session->userdata('log_in')['username'];
        if (empty($this->login) && ($this->role != 'operator')) {
            redirect('Login', 'refresh');
        }
        $this->logout  = base_url('Login/logout');
        $this->u3		= $this->uri->segment(3);
        $this->u4		= $this->uri->segment(4);
        $this->u5		= $this->uri->segment(5);
        $this->u6		= $this->uri->segment(6);
        $this->load->model('M_Universal');
        $this->load->model('M_hibah');
        $this->load->model('M_anggota');
        $this->load->model('M_user');
        $data = $this->M_Universal->getOne(array("id_adm" => $this->id), "admin");
        if (file_exists('upload/profil/'.$data->foto_adm)) {
            $this->foto = base_url('upload/profil/'.$data->foto_adm);
        } else {
            $this->foto = base_url('assets/adminto/assets/images/users/avatar-1.jpg');
        }
        $this->load->helper(array('file', 'resize'));
    }
    public function index()
    {
        $hibahs = $this->M_hibah->usulanBaru();
        $params = array(
            'title'	    => 'Usulan Baru',
            'hibahs'    => $hibahs,
            'page'	    => 'penelitian/ub');
        $this->template($params);
    }
    public function template($params = array())
    {
        if (count( (array)$params) > 0) {
            if ($this->role == 'operator') {
                $params['menu']	= 'menu/menu';
            } else {
                redirect('warning', 'refresh');
            }
            $this->load->view('template', $params);
        } else {
            redirect('warning', 'refresh');
        }
    }
    public function profil()
    {
        if ($this->u3 == 'update_post') {
            $data['nama_adm']				= $this->input->post('nama');
            $data['alamat_adm']				= $this->input->post('alamat');
            $data['email_adm']				= trim($this->input->post('email'));
            $data['cp_adm']					= trim($this->input->post('phone'));
            if ($_FILES['userfile']['size'] > 0) {
                $config['upload_path']		= './upload/profil/';
                $config['allowed_types']	= 'gif|jpg|png|bmp';
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('userfile')) {
                    $photo 			= $this->upload->data();
                    $data['foto_adm']	= $photo['file_name'];
                    $fileSblumnya   = $this->M_Universal->getOne(array("id_adm" => $this->id), "admin");
                    @unlink('./upload/profil/'.$fileSblumnya->foto_adm);
                    $sukses =	$this->notifikasi->suksesEdit("Dengan Foto");
                } else {
                    $gagal =$this->notifikasi->gagalEdit("Kesalahan Pada Saat Upload File");
                }
            } else {
                $sukes = $this->notifikasi->suksesEdit("Tanpa Foto");
            }
            $this->db->where('id_adm', $this->id);
            $update = $this->db->update('admin', $data);
            ($update) ? $sukes : $gagal ;
            redirect(base_url('Belakang/profil'));
        } elseif ($this->u3 == 'password') {
            if ($this->u4 =='post') {
                $this->form_validation->set_rules('password', 'password', 'required|matches[re_password]|min_length[6]');
                $this->form_validation->set_rules('re_password', 'Retype password', 'required');
                $pass =$this->input->post('password');
                $data['pass_adm']	= password_hash($pass, PASSWORD_BCRYPT);
                if ($this->form_validation->run()) {
                    $this->M_Universal->update($data, array("id_adm" => $this->id), 'admin');
                    $this->notifikasi->suksesEdit();
                    redirect('Belakang/profil/password');
                } else {
                    $this->notifikasi->gagalEdit(validation_errors());
                    redirect('Belakang/profil/password');
                }
            } else {
                $data = $this->M_Universal->getOne(array('id_adm' => $this->id), 'admin');
                $params = array(
                    'title'	=> 'Password Akun',
                    'data' => $data,
                    'page'	=> 'user/v_user_password'
                );
                $this->template($params);
            }
        } else {
            $data = $this->M_Universal->getOne(array('id' => $this->id), 'users');
            $params = array(
                'title'	=> 'Akun',
                'data' => $data,
                'page'	=> 'user/v_user_detail'
            );
            $this->template($params);
        }
    }
    public function check_username($str)
    {
        if ($this->user_model->check_username($str) == 0) {
            return true;
        } else {
            $this->form_validation->set_message('check_username', 'Username sudah terpakai');
            return false;
        }
    }
    public function cek_password()
    {
        $pass = $this->input->post('password');
        echo $this->get_login($this->username, $pass, null);
    }
    public function get_login($arg, $arg2, $typ)
    {
        $data     = $this->db->get_where('users', array('username like binary' => $arg))->result();
        if (count( (array)$data) === 1) {
            if (password_verify($arg2, $data[0]->pass_adm)) {
                return 1;
            } else {
                return 0;
            }
            return 0;
        }
    }
}
/* End of file Belakang.php */
/* Location: ./application/controllers/Belakang.php */
