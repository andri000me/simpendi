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
        $this->load->model('M_hadiah');
        $this->load->model('M_reward');
        $this->load->model('M_pejabat');
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
        $data = $this->M_reward->reward();
        $params = array(
            'title'	    => 'Reward',
            'datas'     => $data,
            'page'	    => 'reward/daftar');
        $this->template($params);
    }

    public function insert()
    {
        $data = $this->M_jurnal->jurnal();
        $params = array(
            'title'	=> 'Usulan Reward',
            'datas' => $data,
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

    public function formulir()
    {
        $id   = $this->input->get("id", true);
        $data = $this->M_reward->getOne($id);
        $jurnal = $this->M_jurnal->getOne($data->jurnal_id);
        $params = array(
            'title'	    => 'Formulir Reward',
            'data'     => $data,
            'jurnal'   => $jurnal,
            'page'	    => 'reward/fu_reward');
        require_once APPPATH.'../application/third_party/vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHTMLHeader('
            <img src="'.base_url('upload/kop.png').'" >');
        $mpdf->AddPage("P","","","","","30","30","42","30","","","","","","","","","","","","A4");
        $data = $this->load->view('reward/fu_reward', $params, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function template($params = array())
    {
        if (count( (array)$params) > 0) {
            if ($this->role == 'pengusul') {
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