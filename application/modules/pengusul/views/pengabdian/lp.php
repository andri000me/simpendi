<div class="content">
    <div class="container-fluid">
    <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title">Laporan pendahuluan</h4>
                                    <p class="text-muted font-14 m-b-30">
                                        Data laporan pendahuluan pengabdian kepada masyarakat pendanaan institusi.
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <?php if ($hibah != ''){?>
                                        <tr>
                                            <th><?php if($hibah->status_l == 5) {echo 'Lembar Pengesahan';} else {echo 'Upload laporan';}?></th>
                                            <th>Judul</th>
                                            <th>Ketua</th>
                                            <th>Anggota</th>
                                            <th>Nominal</th>
                                            <th>Luaran</th>
                                            <th>Reviewer 1</th>
                                            <th>Reviewer 2</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                        
                                            <td><?php if($hibah->status_l == '' || $hibah->status_l == 0 ) {?>
                                                <form action="<?php echo base_url('pengusul/Pengabdian/laporan');?>" method="post" enctype="multipart/form-data" >
                                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                                <input type="hidden" name="id" value="<?php echo $hibah->id; ?>">
                                                <input type="file" class="dropify" data-height="90" name="laporan"/>
                                                <button type="submit" class="btn btn-primary " style="width:100%;">Submit</button>
                                                </form><?php } else {?>
                                                <div class="card card-body"><strong>Sudah upload</strong></div><?php } ?>
                                            </td>
                                            <td><?php if($hibah->status_l == 5){ ?> <a href="<?php echo base_url('pengusul/Pengabdian/download2?file='.$hibah->laporan);?>"><?=$hibah->judul; ?></a>
                                            <?php } else { echo $hibah->judul;}?></td>
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
<!-- file uploads js -->
<script src="<?php echo base_url() ?>assets/adminto/assets/plugins/fileuploads/js/dropify.min.js"></script>

<script type="text/javascript">
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                },
                error: {
                    'fileSize': 'The file size is too big (1M max).'
                }
            });
            
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
