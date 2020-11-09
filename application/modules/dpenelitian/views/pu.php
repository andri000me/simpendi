<div class="content">
    <div class="container-fluid">
    <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title">Data Perbaikan Usulan</h4>
                                    <p class="text-muted font-14 m-b-30">
                                        Data perbaikan usulan pendanaan institusi.
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Download</th>
                                            <th>Judul</th>
                                            <th>Ketua</th>
                                            <th>NIDN / NUPN</th>
                                            <th>Anggota</th>
                                            <th>Prodi</th>
                                            <th>Nominal</th>
                                            <th>Luaran</th>
                                            <th>Review</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php if ($hibahs != ''){
                                        foreach ($hibahs as $hibah) { ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo base_url('dpenelitian/Review/download?file='.$hibah->proposal);?>" class="btn btn-info btn-rounded waves-effect waves-light">
                                                <i class="fa fa-file-word-o"></i></a>
                                            </td>
                                            <td><?=$hibah->judul; ?></td>
                                            <td><?= $this->M_user->ketua($hibah->user_id)->name;?></td>
                                            <td><?= $this->M_user->ketua($hibah->user_id)->username;?></td>
                                            <td><?php
                                            foreach ($this->M_anggota->anggota($hibah->id) as $anggota){
                                                echo $this->M_user->anggota($anggota->user_id)->name.', ';
                                            }
                                            ?></td>
                                            <td><?= $hibah->prodi;?></td>
                                            <td>Rp. <?=number_format($hibah->nominal);?></td>
                                            <td><?=$hibah->luaran;?></td>
                                            <td>
                                            <?php if ($hibah->status_p != 5){?>
                                            <a href="#edit-modal-<?php echo $hibah->id; ?>-1" class="btn btn-warning btn-rounded waves-effect waves-light" 
                                                    data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                                    <i class="fa fa-edit"></i>
                                            </a>
                                            <?php } else {?>
                                            <a href="#" class="btn btn-success btn-rounded waves-effect waves-light">ACC</a>
                                            <?php } ?>
                                            </td>
                                            
                                            <!-- Modal set reviewer 1-->
                                            <div id="edit-modal-<?php echo $hibah->id; ?>-1" class="modal-demo">
                                                    <button type="button" class="close" onclick="Custombox.close();">
                                                        <span>&times;</span><span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="custom-modal-title">Review</h4>
                                                    <div class="custom-modal-text">
                                                        <form method="post" action="<?php echo base_url('dpenelitian/Review/perbaikan');?>" data-parsley-validate novalidate enctype="multipart/form-data">
                                                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                                            value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                                            <input type="hidden" name="id" value="<?php echo $hibah->id; ?>">
                                                            
                                                            <label for="comment" class="col-sm-12 col-form-label text-left"><strong>Comment</strong></label>
                                                            <div class="form-group row">
                                                                <textarea class="col-sm-12 float-left" name="comment" rows="6"></textarea>
                                                            </div>
                                                            <div class="form-group row">
                                                            <label for="comment" class="col-sm-2 col-form-label text-left"><strong>status</strong></label>
                                                            <select name="status" id="" class="form-control col-sm-10">
                                                                <option value="4">---</option>
                                                                <option value="4">Revisi ulang</option>
                                                                <option value="5">ACC</option>
                                                            </select>
                                                            </div>

                                                            <div class="form-group text-right m-b-0">
                                                                <button class="btn btn-primary btn-rounded waves-effect waves-light" type="submit">
                                                                    Submit
                                                                </button>
                                                                <button type="reset" class="btn btn-secondary btn-rounded waves-effect waves-light m-l-5">
                                                                    Cancel
                                                                </button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                                
                                        </tr>
                                        <?php } }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
        <!-- end row -->
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
            // Dropify
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
