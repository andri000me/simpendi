<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengabdian extends CI_Controller
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
        $this->load->model('M_tahun');
        $this->load->model('M_user');
        $this->load->model('M_hibah');
        $this->load->model('M_anggota');
        $this->load->model('M_mahasiswa');
        $this->load->model('M_kontrol');
        $this->load->model('M_pejabat');
        $this->semester = $this->M_kontrol->all()->semester_aktif;
        $data = $this->M_Universal->getOne(array("id_adm" => 1), "admin");
        if (file_exists('upload/profil/'.$data->foto_adm)) {
            $this->foto = base_url('upload/profil/'.$data->foto_adm);
        } else {
            $this->foto = base_url('assets/adminto/assets/images/users/avatar-1.jpg');
        }
        $this->load->helper(array('file', 'resize','download'));
        $this->load->library(array('form_validation', 'm_pdf'));
    }
    public function index()
    {
        $tahun = $this->M_tahun->all();
        $anggota = $this->M_user->anggotas($this->id);
        $params = array(
            'title'	    => 'Usulan Pengabdian',
            'anggotas'  => $anggota,
            'tahuns'    => $tahun,
            'page'	    => 'pengabdian/ub');
        $this->template($params);
    }

    public function store()
    {
        $config_rules = array(
            array(
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'required'
            ),
            array(
                'field' => 'anggotas[]',
                'label' => 'Anggota',
                'rules' => 'required'
            ),
            array(
                'field' => 'keilmuan',
                'label' => 'Keilmuan',
                'rules' => 'required'

            ),
            array(
                'field' => 'nominal',
                'label' => 'Nominal',
                'rules' => 'required|numeric'

            ),
            array(
                'field' => 'judul',
                'label' => 'Judul',
                'rules' => 'required'
            ),
            array(
                'field' => 'luaran',
                'label' => 'Luaran',
                'rules' => 'required'
            ),
            array(
                'field' => 'lokasi',
                'label' => 'Lokasi',
                'rules' => 'required'
            ),
            array(
                'field' => 'waktu',
                'label' => 'Waktu',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            if ($_FILES['proposal']['size'] > 0) {
                $config['upload_path']		= './upload/pengabdian/proposal/';
                $config['allowed_types']	= 'doc|docx|rtf';
                $config['max_size']	        = 5000;
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('proposal')) {
                    $proposal 			= $this->upload->data();
                    $data['proposal']	= $proposal['file_name'];
                    $data['user_id']	=	$this->id;
                    $data['prodi']	    =	$this->prodi;
                    $data['kategori']	=	'pengabdian';
                    $data['judul']	    =	$this->input->post('judul', true);
                    $data['tahun']	    =	$this->input->post('tahun', true);
                    $data['nominal']	=	$this->input->post('nominal', true);
                    $data['keilmuan']	=	$this->input->post('keilmuan', true);
                    $data['luaran']	    =	$this->input->post('luaran', true);
                    $data['lokasi']	    =	$this->input->post('lokasi', true);
                    $data['waktu']	    =	$this->input->post('waktu', true);
                    $data['status_p']	=	1;

                    if ($this->M_hibah->insert($data)) {
                        $anggotas = $this->input->post('anggotas', true);
                        foreach ($anggotas as $anggota){
                            $item[] = [
                                'hibah_id' => $this->db->insert_id(),
                                'user_id'  => $anggota
                            ];
                        }
                        if ($this->M_anggota->insert($item)) {
                            $this->notifikasi->suksesAdd('dengan anggota');

                            $this->index();
                        }
                        $this->notifikasi->suksesAdd('tanpa anggota');

                        $this->index();
                    } else {
                        $this->notifikasi->gagalAdd();

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

    public function pu()
    {
        $anggota = $this->M_user->anggotas($this->id);
        $reviewer = $this->M_user->reviewers();
        $hibah = $this->M_hibah->revisi2();
        if ($hibah != ''){if ($hibah->status_p == 2 || $hibah->status_p == 4){$this->notifikasi->comment($hibah->comment);}}
        $params = array(
            'title'	    => 'Perbaikan Usulan',
            'hibah'    => $hibah,
            'reviewers' => $reviewer,
            'anggotas'  => $anggota,
            'page'	    => 'pengabdian/pu');
        $this->template($params);
    }

    public function lp()
    {
        $anggota = $this->M_user->anggotas($this->id);
        $reviewer = $this->M_user->reviewers();
        $hibah = $this->M_hibah->laporan2();
        $params = array(
            'title'	    => 'Laporan pendahuluan',
            'hibah'    => $hibah,
            'reviewers' => $reviewer,
            'anggotas'  => $anggota,
            'page'	    => 'pengabdian/lp');
        $this->template($params);
    }

    public function perbaikan()
    {
        $config_rules = array(
            array(
                'field' => 'keilmuan',
                'label' => 'Keilmuan',
                'rules' => 'required'

            ),
            array(
                'field' => 'keilmuan',
                'label' => 'keilmuan',
                'rules' => 'required'

            ),
            array(
                'field' => 'judul',
                'label' => 'Judul',
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
                $config['upload_path']		= './upload/pengabdian/proposal/';
                $config['allowed_types']	= 'docx|doc|rtf';
                $config['max_size']	        = 5000;
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('proposal')) {
                    $proposal 			= $this->upload->data();
                    $data['proposal']	= $proposal['file_name'];
                    $id     	        =   $this->input->post('id', true);
                    $data['judul']	    =	$this->input->post('judul', true);
                    $data['keilmuan']	=	$this->input->post('keilmuan', true);
                    $data['luaran']	    =	$this->input->post('luaran', true);
                    $data['status_p']	=	3;

                    $fileSblumnya = $this->M_hibah->revisi2();
                    @unlink('./upload/pengabdian/proposal/'.$fileSblumnya->proposal);

                    if ($this->M_hibah->update($data, $id)) {
                        
                        $this->notifikasi->suksesEdit();

                        $this->pu();
                    } else {
                        $this->notifikasi->gagalEdit();

                        $this->pu();
                    }
                    
                } else {
                    $this->notifikasi->gagalAdd('proposal gagal upload');

                    $this->pu();
                }
            } else {
                $this->notifikasi->gagalAdd('proposal kosong');

                $this->pu();
            }

        } else {
            $this->notifikasi->valdasiError(validation_errors());

            $this->pu();
        }
    }

    public function laporan()
    {
        $config_rules = array(
            array(
                'field' => 'id',
                'label' => 'id',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            if ($_FILES['laporan']['size'] > 0) {
                $config['upload_path']		= './upload/pengabdian/laporan/';
                $config['allowed_types']	= 'docx|doc|rtf';
                $config['max_size']	        = 5000;
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('laporan')) {
                    $laporan 			= $this->upload->data();
                    $data['laporan']	= $laporan['file_name'];
                    $id     	        =   $this->input->post('id', true);
                    $data['status_l']	=	1;

                    if ($this->M_hibah->update($data, $id)) {
                        
                        $this->notifikasi->suksesEdit('laporan berhasil upload');

                        $this->lp();
                    } else {
                        $this->notifikasi->gagalEdit();

                        $this->lp();
                    }
                    
                } else {
                    $this->notifikasi->gagalAdd('laporan gagal upload');

                    $this->lp();
                }
            } else {
                $this->notifikasi->gagalAdd('laporan kosong');

                $this->lp();
            }

        } else {
            $this->notifikasi->valdasiError(validation_errors());

            $this->lp();
        }
    }

    public function pl()
    {
        $anggota = $this->M_user->anggotas($this->id);
        $reviewer = $this->M_user->reviewers();
        $hibah = $this->M_hibah->revisi_laporan2();
        if ($hibah != ''){if ($hibah->status_l == 2){$this->notifikasi->comment($hibah->comment);}}
        $params = array(
            'title'	    => 'Perbaikan Laporan',
            'hibah'    => $hibah,
            'reviewers' => $reviewer,
            'anggotas'  => $anggota,
            'page'	    => 'pengabdian/pl');
        $this->template($params);

    }

    public function rev_laporan()
    {
        $config_rules = array(
            array(
                'field' => 'id',
                'label' => 'id',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config_rules);
        if ($this->form_validation->run() == true) {
            if ($_FILES['laporan']['size'] > 0) {
                $config['upload_path']		= './upload/pengabdian/laporan/';
                $config['allowed_types']	= 'docx|doc|rtf';
                $config['max_size']	        = 5000;
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('laporan')) {
                    $laporan 			= $this->upload->data();
                    $data['laporan']	= $laporan['file_name'];
                    $id     	        =   $this->input->post('id', true);
                    $data['status_l']	=	3;

                    $fileSblumnya = $this->M_hibah->revisi_laporan2();
                    @unlink('./upload/pengabdian/laporan/'.$fileSblumnya->laporan);

                    if ($this->M_hibah->update($data, $id)) {
                        
                        $this->notifikasi->suksesEdit('laporan berhasil upload');

                        $this->pl();
                    } else {
                        $this->notifikasi->gagalEdit();

                        $this->pl();
                    }
                    
                } else {
                    $this->notifikasi->gagalAdd('laporan gagal upload');

                    $this->pl();
                }
            } else {
                $this->notifikasi->gagalAdd('laporan kosong');

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
        force_download('./upload/pengabdian/proposal/'.$nama_file, NULL);
    }

    public function pengesahan()
    {
        $tahun = $this->M_tahun->all();
        $reviewer = $this->M_user->reviewers();
        $hibah = $this->M_hibah->revisi2();
        $anggota = $this->M_anggota->anggota($hibah->id);
        $mahasiswa = $this->M_mahasiswa->mahasiswa($hibah->id);
        $params = array(
            'title'	    => 'Perbaikan Usulan',
            'hibah'    => $hibah,
            'reviewers' => $reviewer,
            'anggotas'  => $anggota,
            'mahasiswas'  => $mahasiswa,
            'tahuns'    => $tahun,
            'page'	    => 'pengabdian/pu');
        require_once APPPATH.'../application/third_party/vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage("P","","","","","30","30","30","30","","","","","","","","","","","","A4");
        $data = $this->load->view('pengabdian/lembarPengesahan', $params, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function pengesahan2()
    {
        $tahun = $this->M_tahun->all();
        $reviewer = $this->M_user->reviewers();
        $hibah = $this->M_hibah->revisi2();
        $anggota = $this->M_anggota->anggota($hibah->id);
        $mahasiswa = $this->M_mahasiswa->mahasiswa($hibah->id);
        $params = array(
            'title'	    => 'Perbaikan Usulan',
            'hibah'    => $hibah,
            'reviewers' => $reviewer,
            'anggotas'  => $anggota,
            'mahasiswas'  => $mahasiswa,
            'tahuns'    => $tahun,
            'page'	    => 'pengabdian/pu');
        require_once APPPATH.'../application/third_party/vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage("P","","","","","30","30","30","30","","","","","","","","","","","","A4");
        $data = $this->load->view('pengabdian/lembarPengesahan2', $params, TRUE);
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