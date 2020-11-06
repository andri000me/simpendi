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
        if (empty($this->login) && ($this->role != 'reviewer')) {
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

    public function penilaian()
    {
        $config_rules = array(
            array(
                'field' => 'a',
                'label' => 'a',
                'rules' => 'required|less_than[8]'
            ),
            array(
                'field' => 'b',
                'label' => 'b',
                'rules' => 'required|less_than[8]'
            ),
            array(
                'field' => 'c',
                'label' => 'c',
                'rules' => 'required|less_than[8]'
            ),
            array(
                'field' => 'd',
                'label' => 'd',
                'rules' => 'required|less_than[8]'
            ),
            array(
                'field' => 'e',
                'label' => 'e',
                'rules' => 'required|less_than[8]'
            ),
            array(
                'field' => 'f',
                'label' => 'f',
                'rules' => 'required|less_than[8]'
            ),
            array(
                'field' => 'g',
                'label' => 'g',
                'rules' => 'required|less_than[8]'
            ),
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
            if ($_FILES['proposal']['size'] > 0) {
                $config['upload_path']		= './upload/penelitian/proposal/';
                $config['allowed_types']	= 'pdf';
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('proposal')) {
                    $proposal      = $this->upload->data();
                    $a	   = $this->input->post('a', true);
                    $b	   = $this->input->post('b', true);
                    $c	   = $this->input->post('c', true);
                    $d	   = $this->input->post('d', true);
                    $e	   = $this->input->post('e', true);
                    $f	   = $this->input->post('f', true);
                    $g	   = $this->input->post('g', true);
                    $comment = $this->input->post('comment', true);
                    $id    = $this->input->post('id', true);

                    $total = ((15*(float)$a)+(20*(float)$b)+(15*(float)$c)+(10*(float)$d)+(15*(float)$e)+(15*(float)$f)+(10*(float)$g))/100;
                    $data = array();
                    $hibah = $this->M_hibah->getOne($id);
                    if ($hibah->reviewer1_id == $this->id){
                        $data['nilai1'] = $total;
                        $data['proposal_review1'] = $proposal['file_name'];
                    } else if ($hibah->reviewer2_id == $this->id){
                        $data['nilai2'] = $total;
                        $data['proposal_review2'] = $proposal['file_name'];
                    }
                    $data['comment'] = $hibah->comment.' '.$this->name.' => '.$comment.'.<br>';
                    if ($this->M_hibah->update($data, $id)) {
                        $this->notifikasi->suksesEdit('nilai telah berhasil diberikan');
                        $nilai['hibah_id']    =  $id; 
                        $nilai['reviewer_id'] =  $this->id; 
                        $nilai['a']    =  $a;
                        $nilai['b']    =  $b;
                        $nilai['c']    =  $c;
                        $nilai['d']    =  $d;
                        $nilai['e']    =  $e;
                        $nilai['f']    =  $f;
                        $nilai['g']    =  $g;

                        $cek = $this->M_penilaian->cek($id, $this->id);
                        if(!$cek){
                            $this->M_penilaian->insert($nilai);
                        } else {
                            $this->M_penilaian->update($nilai, $id, $this->id);
                        }                
                        $this->index();
                    } else {
                        $this->notifikasi->gagalEdit();

                        $this->index();
                    }
                } else {
                    $this->notifikasi->gagalAdd('proposal gagal upload');

                    $this->index();
                }

            } else {
                $this->notifikasi->gagalAdd('proposal kosong');

                $this->index();
            }
        } else {
            $this->notifikasi->valdasiError(validation_errors());

            $this->index();
        }
    }

    public function download()
    {
        $nama_file = $this->input->get('file', true);
        force_download('./upload/penelitian/proposal/'.$nama_file, NULL);
    }

    public function template($params = array())
    {
        if (count( (array)$params) > 0) {
            if ($this->role == 'reviewer') {
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
/* End of file Belakang.php */
/* Location: ./application/controllers/Belakang.php */
