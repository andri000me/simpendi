<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kamus extends CI_Controller
{
    public function password()
    {
        if ($this->u3 == 'proses') {
            $config_rules = array(
                array(
                    'field' => 'pass_lama',

                    'label' => 'Password lama',

                    'rules' => 'required'
                ),

                array(

                    'field' => 'pass_baru',

                    'label' => 'Password',

                    'rules' => 'required|min_length[6]'

                ),

                array(

                    'field' => 'pass_konfir',

                    'label' => 'Possword Konfirmasi',

                    'rules' => 'required|matches[pass_baru]'

                )

            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config_rules);

            if ($this->form_validation->run() == true) {
                $data['password_lama']	=	$this->input->post('pass_lama', true);

                $data['password_baru']	=	$this->input->post('pass_baru', true);

                if ($this->M_admin->update_password($data)) {
                    $this->notifikasi->suksesEdit();

                    redirect('Panel/password/', 'refresh');
                } else {
                    $this->notifikasi->gagalEdit();

                    redirect('Panel/password/', 'refresh');
                }
            } else {
                $this->notifikasi->valdasiError(validation_errors());

                redirect('Panel/password/', 'refresh');
            }
        } else {
            $params = array(
                    'title'	=> 'Update Password',
                    'page'	=> 'admin/f_password'
                    
                );
            $this->template($params);
        }
    }
    public function download()
    {
        if ($this->u3 == "edit") {
            if ($this->u4 == "act_edit") {
                $error_upload = "";
                $config['upload_path']    = './assets/upload/download';
                $config['allowed_types']  = 'jpg|jpeg|png|pdf|zip|rar|doc|docx|txt|xls|xlsx';
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if (!empty($_FILES['file']['tmp_name'])) {
                    if (! $this->upload->do_upload('file')) {
                        $error_upload 	= $this->upload->display_errors();
                        $this->notifikasi->gagalEdit($error_upload);
                        redirect('Panel/download', 'refresh');
                    } else {
                        $up_data        = $this->upload->data();
                        $data['file_down'] 	= $this->upload->data('file_name');
                        $fileSblumnya   = $this->M_Universal->getOne(array("id_down" => $this->u5), "download");
                        @unlink('./assets/upload/download/'.$fileSblumnya->file_down);
                    }
                }

                $data['nama_down']	 = addslashes($this->input->post('nama', true));
                $update			 = $this->M_Universal->update($data, array('id_down' => $this->u5), 'download');
                ($update) ?  $this->notifikasi->suksesEdit($error_upload) : $this->notifikasi->gagalEdit($error_upload);
                
                redirect('Panel/download', 'refresh');
            } else {
                $params = array(
                    'title'	=> 'Edit File Download',
                    'page'	=> 'admin/f_download',
                    'data'	=> $this->M_Universal->getOne(array("id_down" => $this->u4), "download")
                );
                (!$params['data']) ? redirect('warning', 'refresh') : $this->template($params);
            }
        } elseif ($this->u3 == "delete") {
            $fileSblumnya = $this->M_Universal->getOne(array('id_down' => $this->u4), 'download');
            $delete = $this->M_Universal->delete(array("id_down" => $this->u4 ), "download");
            ($delete) ? $this->notifikasi->suksesHapus() : $this->notifikasi->gagalHapus();
            @unlink('./assets/upload/download/'.$fileSblumnya->file_down);
            redirect('Panel/download', 'refresh');
        } elseif ($this->u3 == "tambah") {
            if ($this->u4 == "act_add") {
                $error_upload = "";
                $config['upload_path']    = './assets/upload/download';
                $config['allowed_types']  = 'jpg|jpeg|png|pdf|zip|rar|doc|docx|xlsx|txt|xlx';
                $config['detect_mime']	  = true;
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if (!empty($_FILES['file']['tmp_name'])) {
                    if (! $this->upload->do_upload('file')) {
                        $error_upload 	= $this->upload->display_errors();
                        $this->notifikasi->gagalAdd($error_upload);
                        redirect('Panel/download', 'refresh');
                    } else {
                        $data['file_down'] 	= $this->upload->data('file_name');
                    }
                }

                $data['nama_down']	 = $this->input->post('nama', true);
                $insert			 = $this->M_Universal->insert($data, 'download');
                ($insert) ?  $this->notifikasi->suksesAdd($error_upload) : $this->notifikasi->gagalAdd($error_upload);
                
                redirect('Panel/download', 'refresh');
            } else {
                $params = array(
                    'title'	=> 'Edit File Download',
                    'page'	=> 'admin/f_download',
                );
                $this->template($params);
            }
        } else {
            $params = array(
                'title'	=> 'File Download',
                'page'	=> 'admin/v_download',
                'data'  => $this->M_Universal->getMulti(array(), 'download')
            );
            $this->template($params);
        }
    }


    public function peserta()
    {
        //datatbel
        if ($this->u3 == 'req_data') {
            $list = $this->M_peserta->get_datatables($this->id);

            $data = array();
            $no = $_POST['start'];
            foreach ($list as $al) {
                $tolak = base_url('Panel/peserta/tolak?id='.$al->id_verif);
                
                $no++;
                $row = array();
                $row[] = $no++;
                $row[] = $al->nim_peserta;
                $row[] = $al->nama_peserta;
                $row[] = '<a class="btn btn-info" href="'.base_url().'Panel/peserta/detail?id='.$al->id_peserta.'" target="_blank">Lihat</a>
				<a class="btn btn-success" style="display:'.$diterima.'" href="'.base_url().'Panel/peserta/verifikasi?id='.$al->id_verif.'" onclick="return confirm(\'Yakin verifikasi ?\')">Verifikasi</a>
				<a class="btn btn-danger" href="#" style="display:'.$disabled.'" onclick="showModalTolak(\''.$al->nim_peserta.'\',\''.$tolak.'\')" >Tolak</a>';
                $data[] = $row;
            }
            $output = array(
                "draw" => (!isset($_POST['draw']))? 1:$_POST['draw'],
                "recordsTotal" => $this->M_admin->count_all($this->id),
                "recordsFiltered" => $this->M_admin->count_filtered($this->id),
                "data" => $data
            );
            echo json_encode($output);
        }  elseif ($this->u3 == 'detail') {
            $id = $this->input->get("id", true);
            $data = $this->M_admin->detail_peserta($id);
            $params = array(
                'title'	=> 'Detail Data Peserta',
                'page'	=> 'admin/v_peserta_detail',
                'data'  => $data
            );
            $this->template($params);
        } else {
            $params = array(
                'title'	=> 'Data Peserta',
                'page'	=> 'admin/v_peserta'
            );
            $this->template($params);
        }
    }

    


    public function adm()
    {
        if ($this->u3 == 'tambah') {
            $cabor = $this->M_Universal->getMulti(array(), 'cabor');
            $params = array(
                'title'	=> 'Tambah Admin',
                'page'	=> 'admin/f_adm',
                'cabor' => $cabor
            );
            if ($this->u4 == 'proses') {
                $post = array(
                    'username_adm' => $this->input->post("username", true),
                    'pass_adm' => password_hash($this->input->post("username", true), PASSWORD_BCRYPT),
                    'nama_adm' => $this->input->post("nama", true),
                    'level_adm' => $this->input->post("level", true)
                );
                $insert			 = $this->M_Universal->insert($post, 'admin');
                ($insert) ?  $this->notifikasi->suksesAdd("tambah data baru") : $this->notifikasi->gagalAdd();
                redirect(base_url('Panel/adm'), 'refresh');
            }
        } elseif ($this->u3 == 'edit') {
            $id = $this->input->get("id", true);
            $data = $this->M_Universal->getOne(array('id_adm' => $id), 'admin');
            $params = array(
                'title'	=> 'Update Admin',
                'page'	=> 'admin/f_adm',
                'data'  => $data
            );
            if ($this->u4 == 'proses') {
                $edit = array(
                    'username_adm' => $this->input->post("username", true),
                    'nama_adm' => $this->input->post("nama", true),
                    'level_adm' => $this->input->post("level", true)
                );
                $where 	= array( 'id_adm' => (int)$id  );
                $update = $this->M_Universal->update($edit, $where, 'admin');
                ($update) ?  $this->notifikasi->suksesEdit() : $this->notifikasi->gagalEdit();
                redirect(base_url('Panel/adm'), 'refresh');
            }
        } elseif ($this->u3 =='delete') {
            $id = $this->input->get("id", true);
            $delete = $this->M_Universal->delete(array("id_adm" => $id ), "admin");
            ($delete) ? $this->notifikasi->suksesHapus() : $this->notifikasi->gagalHapus();
            redirect(base_url('Panel/adm'), 'refresh');
        } elseif ($this->u3 =='lihat') {
            $id = $this->input->get("id", true);
            $data = $this->M_admin->getDetail($id);
            $ow = explode("-", $data->id_cabor_kat);
            $kategori = "";
            foreach ($ow as $os) {
                if ($os != "" || $os != null) {
                    $kategori .= ($this->M_admin->get_kat_cab($os) != false || $this->M_admin->get_kat_cab($os)) ?
                    "<button class='btn  btn-xs'>".$this->M_admin->get_kat_cab($os)."</button> " : "";
                }
            }
            $params = array(
                'title'	=> 'Detail Admin',
                'page'	=> 'admin/v_adm_detail',
                'data'  => $data,
                "kategori"	=> $kategori
            );
        } else {
            $data = $this->M_Universal->getMulti(array('level_adm !=' => 3, 'level_adm !=' => 4), 'admin');
            $params = array(
                'title'	=> 'Data Admin',
                'page'	=> 'admin/v_adm',
                'data' => $data
            );
        }
        $this->template($params);
    }
}
/* End of file Panel.php */
/* Location: ./application/controllers/Panel.php */
