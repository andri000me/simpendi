<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Review extends CI_Controller
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
        if (empty($this->login) && ($this->role != 'dpenelitian')) {
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
        $this->load->model('M_penilaian');
        $this->load->model('M_kontrol');
        $this->semester = $this->M_kontrol->all()->semester_aktif;
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
        $reviewer = $this->M_user->reviewers();
        $hibahs = $this->M_hibah->usulanBaru();
        $params = array(
            'title'	    => 'Usulan Baru',
            'reviewers' => $reviewer,
            'hibahs'    => $hibahs,
            'page'	    => 'ub');
        $this->template($params);
    }

    public function set_reviewer()
    {
        $config_rules = array(
            array(
                'field' => 'reviewer1',
                'label' => 'Reviewer 1',
                'rules' => 'required'
            ),
            array(
                'field' => 'reviewer2',
                'label' => 'Reviewer 2',
                'rules' => 'required'
            ),
            array(
                'field' => 'id',
                'label' => 'id',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            $data['reviewer1_id']	    =	$this->input->post('reviewer1', true);
            $data['reviewer2_id']	    =	$this->input->post('reviewer2', true);
            $id                         = $this->input->post('id', true);

            if ($this->M_hibah->update($data, $id)) {
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

    public function penilaian()
    {
        $config_rules = array(
            array(
                'field' => 'comment',
                'label' => 'Comment',
                'rules' => 'required'
            ),
            array(
                'field' => 'id',
                'label' => 'id',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            $comment = $this->input->post('comment', true);
            $id    = $this->input->post('id', true);

            $hibah = $this->M_hibah->getOne($id);
            $data['comment'] = $hibah->comment.' '.$this->name.' => '.$comment.'.<br>';
            if ($this->M_hibah->update($data, $id)) {
                $this->notifikasi->suksesEdit('comment berhasil diberikan');

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

    public function pu()
    {
        $reviewer = $this->M_user->reviewers();
        $hibahs = $this->M_hibah->perbaikanUsulan();
        $params = array(
            'title'	    => 'Perbaikan Usulan',
            'reviewers' => $reviewer,
            'hibahs'    => $hibahs,
            'page'	    => 'pu');
        $this->template($params);
    }

    public function perbaikan()
    {
        $config_rules = array(
            array(
                'field' => 'comment',
                'label' => 'Comment',
                'rules' => ''
            ),
            array(
                'field' => 'status',
                'label' => 'status',
                'rules' => 'required'
            ),
            array(
                'field' => 'id',
                'label' => 'id',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            $data['status_p'] = $this->input->post('status', true);
            $data['date_proposal'] = '';
            if ($data['status_p'] == 5){ 
                $data['date_proposal'] = $this->tanggal();
            }
            $comment = $this->input->post('comment', true);
            $id    = $this->input->post('id', true);

            $hibah = $this->M_hibah->getOne($id);
            $data['comment'] = $hibah->comment.' ------- Catatan revisi ulang -------<br>'.$this->name.' => '.$comment.'.<br>';
            if ($this->M_hibah->update($data, $id)) {
                $this->notifikasi->suksesEdit('');

                $this->pu();
            } else {
                $this->notifikasi->gagalEdit();

                $this->pu();
            }
        } else {
            $this->notifikasi->valdasiError(validation_errors());

            $this->pu();
        }
    }

    public function lp()
    {
        $reviewer = $this->M_user->reviewers();
        $hibahs = $this->M_hibah->laporanPendahuluan();
        $params = array(
            'title'	    => 'Laporan pendahuluan',
            'reviewers' => $reviewer,
            'hibahs'    => $hibahs,
            'page'	    => 'lp');
        $this->template($params);
    }

    public function review_laporan()
    {
        $config_rules = array(
            array(
                'field' => 'comment',
                'label' => 'Comment',
                'rules' => ''
            ),
            array(
                'field' => 'status',
                'label' => 'status',
                'rules' => 'required'
            ),
            array(
                'field' => 'id',
                'label' => 'id',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            $data['status_l'] = $this->input->post('status', true);
            $data['date_laporan'] = '';
            if ($data['status_l'] == 5){ 
                $data['date_laporan'] = $this->tanggal();
            }
            $comment = $this->input->post('comment', true);
            $id    = $this->input->post('id', true);

            $hibah = $this->M_hibah->getOne($id);
            $data['comment'] = $hibah->comment.' ------- Catatan revisi laporan -------<br>'.$this->name.' => '.$comment.'.<br>';
            if ($this->M_hibah->update($data, $id)) {
                $this->notifikasi->suksesEdit('');

                $this->lp();
            } else {
                $this->notifikasi->gagalEdit();

                $this->lp();
            }
        } else {
            $this->notifikasi->valdasiError(validation_errors());

            $this->lp();
        }
    }

    public function pl()
    {
        $reviewer = $this->M_user->reviewers();
        $hibahs = $this->M_hibah->laporanPerbaikan();
        $params = array(
            'title'	    => 'Perbaikan Laporan',
            'reviewers' => $reviewer,
            'hibahs'    => $hibahs,
            'page'	    => 'pl');
        $this->template($params);
    }

    public function perbaikan_laporan()
    {
        $config_rules = array(
            array(
                'field' => 'comment',
                'label' => 'Comment',
                'rules' => ''
            ),
            array(
                'field' => 'status',
                'label' => 'status',
                'rules' => 'required'
            ),
            array(
                'field' => 'id',
                'label' => 'id',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            $data['status_l'] = $this->input->post('status', true);
            $data['date_laporan'] = '';
            if ($data['status_l'] == 5){ 
                $data['date_laporan'] = $this->tanggal();
            }
            $comment = $this->input->post('comment', true);
            $id    = $this->input->post('id', true);

            $hibah = $this->M_hibah->getOne($id);
            $data['comment'] = $hibah->comment.' ------- Catatan revisi ulang laporan -------<br>'.$this->name.' => '.$comment.'.<br>';
            if ($this->M_hibah->update($data, $id)) {
                $this->notifikasi->suksesEdit('');

                $this->pl();
            } else {
                $this->notifikasi->gagalEdit();

                $this->pl();
            }
        } else {
            $this->notifikasi->valdasiError(validation_errors());

            $this->pl();
        }
    }

    public function download()
    {
        $nama_file = $this->input->get('file', true);
        force_download('./upload/penelitian/proposal/'.$nama_file, NULL);
    }

    public function tanggal()
    {
        $tanggal = '';
        date_default_timezone_set('Asia/Jakarta');
        switch (date('M')){
            case 'Jan':
                $tanggal = 'Januari '.date('Y');
                break;
            case 'Feb':
                $tanggal = 'Februari '.date('Y');
                break;
            case 'Mar':
                $tanggal = 'Maret '.date('Y');
                break;
            case 'Apr':
                $tanggal = 'April '.date('Y');
                break;
            case 'May':
                $tanggal = 'Mei '.date('Y');
                break;
            case 'Jun':
                $tanggal = 'Juni '.date('Y');
                break;
            case 'Jul':
                $tanggal = 'Juli '.date('Y');
                break;
            case 'Aug':
                $tanggal = 'Agustus '.date('Y');
                break;
            case 'Sep':
                $tanggal = 'September '.date('Y');
                break;
            case 'Oct':
                $tanggal = 'Oktober '.date('Y');
                break;
            case 'Nov':
                $tanggal = 'November '.date('Y');
                break;
            case 'Dec':
                $tanggal = 'Desember '.date('Y');
                break;
            default:
                $tanggal = date('M Y');
                break;
        }
        return $tanggal;
    }

    public function template($params = array())
    {
        if (count( (array)$params) > 0) {
            if ($this->role == 'dpenelitian') {
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
