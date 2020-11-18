<div class="content">
    <div class="container-fluid">
    <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title">Data Usulan Reward</h4>
                                    <p class="text-muted font-14 m-b-30">
                                        Data reward yang diusulkan oleh dosen. Unduh formulir Pengajuan reward, tanda tangani kemudian serahkan ke divisi publikasi P3M.
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Unduh</th>
                                            <th>Judul</th>
                                            <th>Nama Jurnal</th>
                                            <th>Penerbit</th>
                                            <th>Tanggal diterbitkan</th>
                                            <th>Url</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php if ($datas != ''){
                                        foreach ($datas as $data) { $jurnal = $this->M_jurnal->getOne($data->jurnal_id);?>
                                        <tr>
                                            <td><a href="<?php echo base_url('publikasi/Reward/download?file='.$jurnal->file);?>" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                <i class="fa fa-file-pdf-o"></i></a>
                                            </td>
                                            <td><?=$jurnal->judul; ?></td>
                                            <td><?=$jurnal->nama; ?></td>
                                            <td><?=$data->penerbit; ?></td>
                                            <td><?=$data->tanggal; ?></td>
                                            <td><?=$jurnal->url; ?></td>
                                            <td><?=$data->kategori; ?></td>
                                            <td>
                                                <a href="#edit-modal-<?php echo $data->id; ?>" class="btn btn-warning btn-rounded waves-effect waves-light" 
                                                    data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                                    <i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url('publikasi/Reward/delete?id='.$data->id);?>" class="btn btn-danger btn-rounded waves-effect waves-light"
                                                onclick="return confirm('Beneran hapus <?php echo $jurnal->judul; ?> ?')"><i class="fa fa-user-times"></i></a>
                                            </td>
                                            <!-- Modal -->
                                            <div id="edit-modal-<?php echo $data->id; ?>" class="modal-demo">
                                                    <button type="button" class="close" onclick="Custombox.close();">
                                                        <span>&times;</span><span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="custom-modal-title">Edit Usulan Reward</h4>
                                                    <div class="custom-modal-text">
                                                        <form action="<?php echo base_url('publikasi/Reward/update');?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                                        value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                                        <input type="hidden" name="id" value="<?php echo $data->id; ?>">

                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Nama</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" value="<?= $this->name;?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">NIDN/NIPY</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" value="<?= $this->username;?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Judul Karya Ilmiah</label>
                                                            <div class="col-10">
                                                                <select class="form-control" name="jurnal_id">
                                                                    <option value="<?=$jurnal->id;?>"><?=$jurnal->judul;?></option>
                                                                    <?php if ($datas != ''){
                                                                    foreach ($jurnals as $jurnal) { ?>
                                                                    <option value="<?=$jurnal->id;?>"><?=$jurnal->judul;?></option>
                                                                    <?php } }?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Penerbit</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" value="<?=$data->penerbit;?>" name="penerbit">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Tanggal Terbit</label>
                                                            <div class="col-10">
                                                                <input type="date" class="form-control" value="<?=$data->tanggal;?>" name="tanggal">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Kategori Karya Ilmiah</label>
                                                            <div class="col-10">
                                                                <select class="form-control" name="kategori">
                                                                    <option value="<?=$data->kategori;?>" selected><?=$data->kategori;?></option>
                                                                    <option value="Q1">Q1</option>
                                                                    <option value="Q2">Q2</option>
                                                                    <option value="Q3">Q3</option>
                                                                    <option value="Q4">Q4</option>
                                                                    <option value="conference">Conference</option>
                                                                    <option value="S1">S1</option>
                                                                    <option value="S2">S2</option>
                                                                    <option value="S3">S3</option>
                                                                    <option value="S4">S4</option>
                                                                </select>
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
