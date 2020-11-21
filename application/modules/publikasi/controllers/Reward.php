<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Reward extends CI_Controller
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
        $this->load->model('M_reward');
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
        $jurnals = $this->M_jurnal->jurnal();
        $data = $this->M_reward->all();
        $params = array(
            'title'	    => 'Reward',
            'datas'     => $data,
            'jurnals'   => $jurnals,
            'users'     => $users,
            'page'	    => 'reward/daftar');
        $this->template($params);
    }

    public function insert()
    {
        $users = $this->M_user->anggotas();
        $data = $this->M_jurnal->all();
        $params = array(
            'title'	=> 'Usulan Reward',
            'datas' => $data,
            'users' => $users,
            'page'	=> 'reward/ub');
        $this->template($params);
    }

    public function store()
    {
        $config_rules = array(
            array(
                'field' => 'jurnal_id',
                'label' => 'Jurnal ID',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'penerbit',
                'label' => 'Penerbit',
                'rules' => 'required'
            ),
            array(
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'

            ),
            array(
                'field' => 'kategori',
                'label' => 'Kategori',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            $data['jurnal_id']	=	$this->input->post('jurnal_id', true);
            $data['user_id']	=	$this->id;
            $data['penerbit']	=	$this->input->post('penerbit', true);
            $data['tanggal']	=	$this->input->post('tanggal', true);
            $data['kategori']	=	$this->input->post('kategori', true);

            if ($this->M_reward->insert($data)) {
                        
                $this->notifikasi->suksesAdd();

                $this->index();
            } else {
                $this->notifikasi->gagalAdd();

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
                'field' => 'jurnal_id',
                'label' => 'Jurnal ID',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'penerbit',
                'label' => 'Penerbit',
                'rules' => 'required'
            ),
            array(
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'

            ),
            array(
                'field' => 'kategori',
                'label' => 'Kategori',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            $data['jurnal_id']	=	$this->input->post('jurnal_id', true);
            $data['user_id']	=	$this->input->post('user_id', true);
            $data['penerbit']	=	$this->input->post('penerbit', true);
            $data['tanggal']	=	$this->input->post('tanggal', true);
            $data['kategori']	=	$this->input->post('kategori', true);
            $id                 =   $this->input->post('id', true);

            if ($this->M_reward->update($data, $id)) {
                        
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

    public function delete()
    {
        $id = $this->input->get("id", true);
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
                redirect('warning', 'refresh');
            }
            $this->load->view('template', $params);
        } else {
            redirect('warning', 'refresh');
        }
    }

}