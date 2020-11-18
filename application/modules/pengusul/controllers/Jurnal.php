<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jurnal extends CI_Controller
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
        if (empty($this->login) && ($this->role != 'pengusul')) {
            redirect('Login', 'refresh');
        }
        $this->logout  = base_url('Login/logout');
        $this->u3		= $this->uri->segment(3);
        $this->u4		= $this->uri->segment(4);
        $this->u5		= $this->uri->segment(5);
        $this->u6		= $this->uri->segment(6);
        $this->load->model('M_Universal');
        $this->load->model('M_jurnal');
        $this->load->model('M_user');
        $data = $this->M_Universal->getOne(array("id_adm" => 1), "admin");
        if (file_exists('upload/profil/'.$data->foto_adm)) {
            $this->foto = base_url('upload/profil/'.$data->foto_adm);
        } else {
            $this->foto = base_url('assets/adminto/assets/images/users/avatar-1.jpg');
        }
        $this->load->helper(array('file', 'resize'));
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = $this->M_jurnal->all();
        $params = array(
            'title'	=> 'Jurnal',
            'datas' => $data,
            'page'	=> 'luaran/jurnal');
        $this->template($params);
    }

    public function store()
    {
        $config_rules = array(
            array(
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'jenis',
                'label' => 'Jenis',
                'rules' => 'required'
            ),
            array(
                'field' => 'judul',
                'label' => 'Judul',
                'rules' => 'required'

            ),
            array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ),
            array(
                'field' => 'issn',
                'label' => 'ISSN',
                'rules' => 'required'
            ),
            array(
                'field' => 'volume',
                'label' => 'Volume',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'nomor',
                'label' => 'Nomor',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'halamana',
                'label' => 'HalamanA',
                'rules' => 'required'
            ),
            array(
                'field' => 'halamanz',
                'label' => 'HalamanZ',
                'rules' => 'required'
            ),
            array(
                'field' => 'penulis2',
                'label' => 'Penulis2',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'url',
                'label' => 'Url',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            if ($_FILES['file']['size'] > 0) {
                $config['upload_path']		= './upload/jurnal/';
                $config['allowed_types']	= 'pdf';
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $file 			= $this->upload->data();
                    $data['file']	= $file['file_name'];
                    $data['tahun']	=	$this->input->post('tahun', true);
                    $data['jenis']	=	$this->input->post('jenis', true);
                    $data['judul']	=	$this->input->post('judul', true);
                    $data['nama']	=	$this->input->post('nama', true);
                    $data['issn']	=	$this->input->post('issn', true);
                    $data['url']	=	$this->input->post('url', true);
                    $data['volume']	=	$this->input->post('volume', true);
                    $data['nomor']	=	$this->input->post('nomor', true);
                    $data['halaman']=	$this->input->post('halamana', true).'-'.$this->input->post('halamanz', true);
                    $data['user_id']=	$this->id;
                    $data['user_id2']=	$this->input->post('penulis2', true);
                    $data['user_id3']=	$this->input->post('penulis3', true);

                    if ($this->M_jurnal->insert($data, $id)) {
                        
                        $this->notifikasi->suksesAdd();

                        $this->index();
                    } else {
                        $this->notifikasi->gagalAdd();

                        $this->index();
                    }
                    
                } else {
                    $this->notifikasi->gagalAdd('file gagal upload');

                    $this->index();
                }
            } else {
                $this->notifikasi->gagalAdd('file kosong');

                $this->index();
            }

        } else {
            $this->notifikasi->valdasiError(validation_errors());

            $this->index();
        }
    }

    public function update()
    {
        $id = $this->input->post('id', true);
        if($this->input->post('password', true) != null){
            $config_rules = array(
                array(
                    'field' => 'nama',
                    'label' => 'Nama',
                    'rules' => 'required|min_length[6]'
                ),
    
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required|min_length[6]'
                ),
    
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required|min_length[6]'
    
                ),
    
                array(
                    'field' => 'password2',
                    'label' => 'Confirm Password',
                    'rules' => 'required|matches[password]'
                )
            );
            $this->form_validation->set_rules($config_rules);
            if ($this->form_validation->run() == true) {
                $data['name']	    =	$this->input->post('nama', true);
                $data['username']	=	$this->input->post('username', true);
                $data['role']	    =	$this->input->post('role', true);
                $data['prodi']	    =	$this->input->post('prodi', true);
                $pass           	=	$this->input->post('password', true);
                $data['password']	=   password_hash($pass, PASSWORD_BCRYPT);

                if ($this->M_user->update($data, $id)) {
                    $this->notifikasi->suksesEdit();

                    $this->index();
                } else {
                    $this->notifikasi->gagalEdit();

                    $this->index();
                }
            } else {
                $this->notifikasi->valdasiError(validation_errors());

                $this->index();
            }
        } else {
            $config_rules = array(
                array(
                    'field' => 'nama',
                    'label' => 'Nama',
                    'rules' => 'required|min_length[6]'
                ),
    
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required|min_length[6]'
                )
            );
            $this->form_validation->set_rules($config_rules);
            if ($this->form_validation->run() == true) {
                $data['name']	    =	$this->input->post('nama', true);
                $data['username']	=	$this->input->post('username', true);
                $data['role']	    =	$this->input->post('role', true);
                $data['prodi']	    =	$this->input->post('prodi', true);

                if ($this->M_user->update($data, $id)) {
                    $this->notifikasi->suksesEdit();

                    $this->index();
                } else {
                    $this->notifikasi->gagalEdit();

                    $this->index();
                }
            } else {
                $this->notifikasi->valdasiError(validation_errors());

                $this->index();
            }
        }
    }

    public function delete()
    {
        $id = $this->input->get("id", true);
        $delete = $this->M_user->delete($id);
        ($delete) ? $this->notifikasi->suksesHapus() : $this->notifikasi->gagalHapus();
        $this->index();
    }

    public function template($params = array())
    {
        if (count( (array)$params) > 0) {
            if ($this->role == 'pengusul') {
                $params['menu']	= 'menu/menu';
            } else {
                redirect('warning', 'refresh');
            }
            $this->load->view('template', $params);
        } else {
            redirect('warning', 'refresh');
        }
    }

}