<div class="content">
    <div class="container-fluid">
    <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title">Data SK</h4>
                                    <p class="text-muted font-14 m-b-30">
                                        Data sk hibah institusi.
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Download</th>
                                            <th>Nomor</th>
                                            <th>Tanggal</th>
                                            <th>Semester</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php if ($sk != ''){
                                        foreach ($sk as $sk) { ?>
                                        <tr>
                                            <td><a href="<?php echo base_url('operator/Sk/download?file='.$sk->sk);?>" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                <i class="fa fa-file-pdf-o"></i></a>
                                            </td>
                                            <td><?=$sk->nomor; ?></td>
                                            <td><?=$sk->tanggal; ?></td>
                                            <td><?=$sk->tahun; ?></td>
                                            <td>
                                            <a href="#edit-modal-<?php echo $sk->id; ?>-1" class="btn btn-warning btn-rounded waves-effect waves-light" 
                                                    data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                                    <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url('operator/Sk/delete?id='.$sk->id);?>" class="btn btn-danger btn-rounded waves-effect waves-light"
                                                onclick="return confirm('Serius hapus SK <?php echo $sk->tahun; ?> ?')"><i class="fa fa-times"></i></a>
                                            </td>
                                            
                                            
                                                <!-- Modal set reviewer 1-->
                                                <div id="edit-modal-<?php echo $sk->id; ?>-1" class="modal-demo">
                                                    <button type="button" class="close" onclick="Custombox.close();">
                                                        <span>&times;</span><span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="custom-modal-title">Edit SK</h4>
                                                    <div class="custom-modal-text">
                                                        <form action="<?php echo base_url('operator/Sk/edit_sk');?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                                        value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                                        <input type="hidden" name="id" value="<?php echo $sk->id; ?>">

                                                            
                                                            <div class="form-group text-left">
                                                                <label for="kontrak">No. SK</label>
                                                                <input type="text" class="form-control" placeholder="input nomor kontrak" name="nomor" value="<?=$sk->nomor;?>">
                                                            </div>

                                                            <div class="form-group text-left">
                                                                <label for="kontrak">Tanggal SK</label>
                                                                <input type="text" class="form-control" placeholder="input nomor kontrak" name="tanggal" value="<?=$sk->tanggal;?>">
                                                            </div>
                                                            
                                                            <div class="form-group text-left">
                                                                <label for="kontrak">Semester</label>
                                                                <select class="form-control" name="tahun">
                                                                    <option value="<?=$sk->tahun;?>"><?=$sk->tahun;?></option>
                                                                    <?php foreach ($tahuns as $tahun) { ?>
                                                                    <option value="<?=$tahun->tahun;?>"><?=$tahun->tahun;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group text-left">
                                                                <label for="kontrak">File SK (pdf)</label>
                                                                <input type="file" data-height="150" name="sk"/>
                                                            </div>

                                                            <div class="form-group text-right m-b-0">
                                                                <button class="btn btn-primary waves-effect btn-rounded waves-light" type="submit">
                                                                    Submit
                                                                </button>
                                                                <button type="reset" class="btn btn-secondary btn-rounded waves-effect waves-light m-l-5">
                                                                    Cancel
                                                                </button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- Modal set reviewer 2-->
                                            
                                                
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
