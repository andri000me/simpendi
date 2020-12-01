<div class="content">
    <div class="container-fluid">
    <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title">Perbaikan Usulan</h4>
                                    <p class="text-muted font-14 m-b-30">
                                        Data usulan baru pengabdian kepada masyarakat pendanaan institusi yang perlu perbaikan.
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Download</th>
                                            <th>Judul</th>
                                            <th>Ketua</th>
                                            <th>Anggota</th>
                                            <th>Nominal</th>
                                            <th>Luaran</th>
                                            <th>Reviewer 1</th>
                                            <th>Reviewer 2</th>
                                            <th>aksi</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php if ($hibah != ''){?>
                                        <tr>
                                        
                                            <td><?php if($hibah->status_p != 5) { ?>
                                                <a href="<?php echo base_url('pengusul/Pengabdian/download?file='.$hibah->proposal_review1);?>" class="btn btn-info btn-rounded waves-effect waves-light">
                                                <i class="fa fa-file-word-o"> 1</i></a>
                                                <a href="<?php echo base_url('pengusul/Pengabdian/download?file='.$hibah->proposal_review2);?>" class="btn btn-info btn-rounded waves-effect waves-light">
                                                <i class="fa fa-file-word-o"> 2</i></a>
                                                <?php } else { ?>
                                                <a href="<?php echo base_url('pengusul/Pengabdian/download?file='.$hibah->proposal);?>" class="btn btn-info btn-rounded waves-effect waves-light">
                                                <i class="fa fa-file-word-o"></i></a>
                                                <?php } ?>
                                            </td>
                                            <td><?=$hibah->judul; ?></td>
                                            <td><?= $this->M_user->ketua($hibah->user_id)->name;?></td>
                                            <td><?php
                                            foreach ($this->M_anggota->anggota($hibah->id) as $anggota){
                                                echo $this->M_user->anggota($anggota->user_id)->name.', ';
                                            }
                                            ?></td>
                                            <td>Rp. <?=number_format($hibah->nominal);?></td>
                                            <td><?=$hibah->luaran;?></td>
                                            <td><?php if ($hibah->reviewer1_id != ''){
                                                echo $this->M_user->reviewer($hibah->reviewer1_id)->name;
                                            } else {
                                                echo '';
                                            }?>
                                            </td>
                                            <td><?php if ($hibah->reviewer2_id != ''){
                                                echo $this->M_user->reviewer($hibah->reviewer2_id)->name;
                                            } else {
                                                echo '';
                                            }?>
                                            </td>
                                            <td>
                                            <?php if ($hibah->status_p != 5) {$color = ''; if ($hibah->status_p == 2 || $hibah->status_p == 4){$color='warning';} 
                                            else if ($hibah->status_p == 3 || $hibah->status_p == 5){ $color = 'danger';}?>
                                            <a href="#edit-modal-<?php echo $hibah->id; ?>" class="btn btn-<?=$color;?> btn-rounded waves-effect waves-light" 
                                                    data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                                    <i class="fa fa-edit"></i>
                                            </a>
                                            <?php } else { ?>
                                            <a href="<?php echo base_url('pengusul/Pengabdian/pengesahan');?>" class="btn btn-success btn-rounded waves-effect waves-light">ACC</a>
                                            <?php } ?>
                                            </td>
                                            <!-- Modal set reviewer 1-->
                                            <div id="edit-modal-<?php echo $hibah->id; ?>" class="modal-demo">
                                                    <button type="button" class="close" onclick="Custombox.close();">
                                                        <span>&times;</span><span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="custom-modal-title">Perbaiki Usulan</h4>
                                                    <div class="custom-modal-text">
                                                        <form action="<?php echo base_url('pengusul/Pengabdian/perbaikan');?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                                        value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                                        <input type="hidden" name="id" value="<?php echo $hibah->id; ?>">
                                                           
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Judul</label>
                                                                <div class="col-10">
                                                                    <textarea name="judul" id="" cols="62" rows="3" ><?=$hibah->judul;?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Bidang Keilmuan</label>
                                                                <div class="col-10">
                                                                    <select class="form-control" name="keilmuan">
                                                                        <option value="<?=$hibah->keilmuan;?>"><?=$hibah->keilmuan;?></option>
                                                                        <option value="teknik">Teknik</option>
                                                                        <option value="ekonomi">Ekonomi</option>
                                                                        <option value="kesehatan">Kesehatan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Lokasi</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control"  name="lokasi" value="<?=$hibah->lokasi;?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Waktu Pelaksanaan</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" value="<?=$hibah->waktu;?>" name="waktu">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Mahasiswa 1</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" value="<?=$hibah->mahasiswa1;?>" name="mahasiswa1">
                                                                    <span class="help-block"><small>*Isi jika pkm melibatkan mahasiswa</small></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Mahasiswa 2</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" value="<?=$hibah->mahasiswa2;?>" name="mahasiswa2">
                                                                    <span class="help-block"><small>*Isi jika pkm melibatkan mahasiswa</small></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Luaran</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" placeholder="luaran" name="luaran" value="<?=$hibah->luaran;?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-12 col-form-label text-left">Proposah sudah perbaikan (word)</label><br>
                                                                <div class="col-7 float-left">
                                                                <input type="file" data-height="100" name="proposal"/>
                                                                </div>
                                                            </div>

                                                            <div class="form-group text-right m-b-0">
                                                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                                    Submit
                                                                </button>
                                                                <button type="reset" class="btn btn-secondary waves-effect waves-light m-l-5">
                                                                    Cancel
                                                                </button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>

                                               
                                                
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
         </div>
        <!-- end row -->
                           
                            <!-- end col -->
    </div> <!-- container -->
</div>

<!-- Required datatable js -->
<script src="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/buttons.print.min.js"></script>

<script type="text/javascript">
            
            $(document).ready(function () {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            });
            
        </script>
