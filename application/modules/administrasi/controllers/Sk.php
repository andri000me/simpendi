<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sk extends CI_Controller
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
        if (empty($this->login) && ($this->role != 'administrasi')) {
            redirect('Login', 'refresh');
        }
        $this->logout  = base_url('Login/logout');
        $this->u3		= $this->uri->segment(3);
        $this->u4		= $this->uri->segment(4);
        $this->u5		= $this->uri->segment(5);
        $this->u6		= $this->uri->segment(6);
        $this->load->model('M_Universal');
        $this->load->model('M_tahun');
        $this->load->model('M_Sk');
        $this->load->model('M_kontrol');
        $this->semester = $this->M_kontrol->all()->semester_aktif;
        $data = $this->M_Universal->getOne(array("id_adm" => 1), "admin");
        if (file_exists('upload/profil/'.$data->foto_adm)) {
            $this->foto = base_url('upload/profil/'.$data->foto_adm);
        } else {
            $this->foto = base_url('assets/adminto/assets/images/users/avatar-1.jpg');
        }
        $this->load->helper(array('file', 'resize', 'download'));
    }
    public function index()
    {
        $tahun = $this->M_tahun->all();
        $params = array(
            'title'	    => 'Upload SK',
            'tahuns'    => $tahun,
            'page'	    => 'sk/upload');
        $this->template($params);
    }

    public function upload_sk()
    {
        $config_rules = array(
            
            array(
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'required'

            ),
            array(
                'field' => 'nomor',
                'label' => 'Nomor',
                'rules' => 'required'
            ),
            array(
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            if ($_FILES['sk']['size'] > 0) {
                $config['upload_path']		= './upload/sk/';
                $config['allowed_types']	= 'pdf';
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('sk')) {
                    $sk 			    =   $this->upload->data();
                    $data['sk']	        =   $sk['file_name'];
                    $data['tahun']	    =	$this->input->post('tahun', true);
                    $data['nomor']	    =	$this->input->post('nomor', true);
                    $data['tanggal']	=	$this->input->post('tanggal', true);

                    if ($this->M_Sk->insert($data)) {
                        $this->notifikasi->suksesAdd();

                        $this->index();
                    } else {
                        $this->notifikasi->gagalAdd();

                        $this->index();
                    }
                    
                } else {
                    $this->notifikasi->gagalAdd('sk gagal upload');

                    $this->index();
                }
            } else {
                $this->notifikasi->gagalAdd('sk kosong');

                $this->index();
            }

        } else {
            $this->notifikasi->valdasiError(validation_errors());

            $this->index();
        }
    }

    public function daftar_sk()
    {
        $sk = $this->M_Sk->all();
        $tahun = $this->M_tahun->all();
        $params = array(
            'title'	    => 'Daftar SK',
            'sk'        => $sk,
            'tahuns'    => $tahun,
            'page'	    => 'sk/daftar');
        $this->template($params);
    }

    public function edit_sk()
    {
        $config_rules = array(
            array(
                'field' => 'id',
                'label' => 'id',
                'rules' => 'required'
            ),
            array(
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'required'
            ),
            array(
                'field' => 'nomor',
                'label' => 'Nomor',
                'rules' => 'required'
            ),
            array(
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            if ($_FILES['sk']['size'] > 0) {
                $config['upload_path']		= './upload/sk/';
                $config['allowed_types']	= 'pdf';
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('sk')) {
                    $sk 			    =   $this->upload->data();
                    $data['sk']	        =   $sk['file_name'];
                    $id                 =   $this->input->post('id', true);
                    $data['tahun']	    =	$this->input->post('tahun', true);
                    $data['nomor']	    =	$this->input->post('nomor', true);
                    $data['tanggal']	=	$this->input->post('tanggal', true);

                    $fileSblumnya = $this->M_Sk->getOne($id);
                    @unlink('./upload/sk/'.$fileSblumnya->sk);

                    if ($this->M_Sk->update($data, $id)) {
                        $this->notifikasi->suksesEdit();

                        $this->daftar_sk();
                    } else {
                        $this->notifikasi->gagalEdit();

                        $this->daftar_sk();
                    }
                    
                } else {
                    $this->notifikasi->gagalEdit('sk gagal upload');

                    $this->daftar_sk();
                }
            } else {
                $id                 =   $this->input->post('id', true);
                $data['tahun']	    =	$this->input->post('tahun', true);
                $data['nomor']	    =	$this->input->post('nomor', true);
                $data['tanggal']	=	$this->input->post('tanggal', true);

                if ($this->M_Sk->update($data, $id)) {
                    $this->notifikasi->suksesEdit();

                    $this->daftar_sk();
                } else {
                    $this->notifikasi->gagalEdit();

                    $this->daftar_sk();
                }
            }

        } else {
            $this->notifikasi->valdasiError(validation_errors());

            $this->daftar_sk();
        }
    }

    public function download()
    {
        $nama_file = $this->input->get('file', true);
        force_download('./upload/sk/'.$nama_file, NULL);
    }

    public function delete()
    {
        $id = $this->input->get("id", true);
        $fileSblumnya = $this->M_Sk->getOne($id);
        @unlink('./upload/sk/'.$fileSblumnya->sk);
        
        $delete = $this->M_Sk->delete($id);
        ($delete) ? $this->notifikasi->suksesHapus() : $this->notifikasi->gagalHapus();
        $this->daftar_sk();
    }

    public function template($params = array())
    {
        if (count( (array)$params) > 0) {
            if ($this->role == 'administrasi') {
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
/* End of file Belakang.php */
/* Location: ./application/controllers/Belakang.php */
