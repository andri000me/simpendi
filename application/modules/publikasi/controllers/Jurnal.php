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
        if (empty($this->login) && ($this->role != 'publikasi')) {
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
        $this->load->helper(array('file', 'resize','download'));
        $this->load->library('form_validation');
    }
    public function index()
    {
        $users = $this->M_user->anggotas();
        $data = $this->M_jurnal->all();
        $params = array(
            'title'	=> 'Jurnal',
            'datas' => $data,
            'users' => $users,
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

                    if ($this->M_jurnal->insert($data)) {
                        
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
        $config_rules = array(
            array(
                'field' => 'user_id',
                'label' => 'User ID',
                'rules' => 'required|numeric'
            ),
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
                    $data['user_id']=	$this->input->post('user_id', true);
                    $data['user_id2']=	$this->input->post('penulis2', true);
                    $data['user_id3']=	$this->input->post('penulis3', true);
                    $id              =  $this->input->post('id', true);

                    $file_sebelumnya = $this->M_jurnal->getOne($id);
                    @unlink('./upload/jurnal/'.$fileSblumnya->file);

                    if ($this->M_jurnal->update($data, $id)) {
                        
                        $this->notifikasi->suksesEdit('dengan file');

                        $this->index();
                    } else {
                        $this->notifikasi->gagalEdit('dengan file');

                        $this->index();
                    }
                    
                } else {
                    $this->notifikasi->gagalAdd('file gagal upload');

                    $this->index();
                }
            } else {
                $data['tahun']	=	$this->input->post('tahun', true);
                $data['jenis']	=	$this->input->post('jenis', true);
                $data['judul']	=	$this->input->post('judul', true);
                $data['nama']	=	$this->input->post('nama', true);
                $data['issn']	=	$this->input->post('issn', true);
                $data['url']	=	$this->input->post('url', true);
                $data['volume']	=	$this->input->post('volume', true);
                $data['nomor']	=	$this->input->post('nomor', true);
                $data['halaman']=	$this->input->post('halamana', true).'-'.$this->input->post('halamanz', true);
                $data['user_id']=	$this->input->post('user_id', true);
                $data['user_id2']=	$this->input->post('penulis2', true);
                $data['user_id3']=	$this->input->post('penulis3', true);
                $id              =  $this->input->post('id', true);

                if ($this->M_jurnal->update($data, $id)) {
                        
                    $this->notifikasi->suksesEdit('tanpa file');

                    $this->index();
                } else {
                    $this->notifikasi->gagalEdit('tanpa file');

                    $this->index();
                }
            }

        } else {
            $this->notifikasi->valdasiError(validation_errors());

            $this->index();
        }
    }

    public function delete()
    {
        $id = $this->input->get("id", true);
        $file_sebelumnya = $this->M_jurnal->getOne($id);
        @unlink('./upload/jurnal/'.$fileSblumnya->file);

        $delete = $this->M_jurnal->delete($id);
        ($delete) ? $this->notifikasi->suksesHapus() : $this->notifikasi->gagalHapus();
        $this->index();
    }

    public function download()
    {
        $nama_file = $this->input->get('file', true);
        force_download('./upload/jurnal/'.$nama_file, NULL);
    }

    public function template($params = array())
    {
        if (count( (array)$params) > 0) {
            if ($this->role == 'publikasi') {
                $params['menu']	= 'menu/menu';
            } else {
                redirect('Login', 'refresh');
            }
            $this->load->view('template', $params);
        } else {
            redirect('Login', 'refresh');
        }
    }

}