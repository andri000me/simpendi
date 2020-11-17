<div class="content">
    <div class="container-fluid">
    <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title">Data Usulan Baru</h4>
                                    <p class="text-muted font-14 m-b-30">
                                        Data usulan baru pendanaan institusi.
                                        <a href="#tambah-modal" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" 
                                         data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                        <i class="fa fa-user-plus"></i>&nbsp;Tambah</a>
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Unduh</th>
                                            <th>Tahun Publikasi</th>
                                            <th>Jenis Publikasi</th>
                                            <th>Judul</th>
                                            <th>Nama Jurnal</th>
                                            <th>ISSN</th>
                                            <th>Volume</th>
                                            <th>Nomor</th>
                                            <th>Halaman</th>
                                            <th>Penulis</th>
                                            <th>Url Artikel</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php if ($datas != ''){
                                        foreach ($datas as $data) { ?>
                                        <tr>
                                            <td><a href="<?php echo base_url('pengusul/Luaran/download?file='.$data->file);?>" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                <i class="fa fa-file-pdf-o"></i></a>
                                            </td>
                                            <td><?=$data->tahun; ?></td>
                                            <td><?=$data->jenis; ?></td>
                                            <td><?=$data->judul; ?></td>
                                            <td><?=$data->nama; ?></td>
                                            <td><?=$data->issn; ?></td>
                                            <td><?=$data->volume; ?></td>
                                            <td><?=$data->halaman; ?></td>
                                            <td><?= $this->M_user->ketuaj($hibah->user_id)->name;?>(
                                                <?= $this->M_user->ketuaj($hibah->user_id)->username;?>),&nbsp;
                                                <?php
                                                foreach ($this->M_anggota->anggotaj($hibah->id) as $anggota){
                                                    echo $this->M_user->anggotaj($anggota->user_id)->name.'('.
                                                        $this->M_user->anggotaj($anggota->user_id)->username.')';
                                                }
                                            ?></td>
                                            <td><?= $data->url;?></td>
                                            <td>
                                                <a href="#edit-modal-<?php echo $data->id; ?>" class="btn btn-warning waves-effect waves-light" 
                                                    data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                                    <i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url('pengusul/Jurnal/delete?id='.$data->id);?>" class="btn btn-danger waves-effect waves-light"
                                                onclick="return confirm('Beneran hapus <?php echo $data->judul; ?> ?')"><i class="fa fa-user-times"></i></a>
                                            </td>
                                            <!-- Modal -->
                                            <div id="edit-modal-<?php echo $data->id; ?>" class="modal-demo">
                                                    <button type="button" class="close" onclick="Custombox.close();">
                                                        <span>&times;</span><span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="custom-modal-title">Tambah User</h4>
                                                    <div class="custom-modal-text">
                                                        <form action="<?php echo base_url('pengusul/Jurnal/update');?>" data-parsley-validate novalidate method="post">
                                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                                        value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                                        <input type="hidden" name="id" value="<?php echo $data->id; ?>">

                                                            <div class="form-group text-left">
                                                                <label for="nama">Nama</label>
                                                                <input type="text" name="nama" parsley-trigger="change" required
                                                                    placeholder="Masukan Nama" class="form-control" value="<?=$data->name;?>">
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="username">Username</label>
                                                                <input type="text" name="username" parsley-trigger="change" required
                                                                    placeholder="Masukan Username" class="form-control" value="<?=$data->username;?>">
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="role">Role</label>
                                                                <select class="custom-select" name="role" >
                                                                    <option value="<?=$data->role;?>" selected > - Pilih Role - </option>
                                                                    <option value="administrasi">Administrasi</option>
                                                                    <option value="dpenelitian">Divisi Penelitian</option>
                                                                    <option value="dpengabdian">Divisi Pengabdian</option>
                                                                    <option value="kap3m">Ketua P3M</option>
                                                                    <option value="keuangan">Keuangan</option>
                                                                    <option value="operator">Operator</option>
                                                                    <option value="publikasi">Publikasi</option>
                                                                    <option value="reviewer">Reviewer</option>
                                                                    <option value="pengusul">Pengusul</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="prodi">Prodi / Unit</label>
                                                                <select class="custom-select" name="prodi" >
                                                                    <option value="<?=$data->prodi;?>" selected > - Pilih Prodi / Unit - </option>
                                                                    <option value="p3m">P3M</option>
                                                                    <option value="komputer">Komputer</option>
                                                                    <option value="farmasi">Farmasi</option>
                                                                    <option value="kebidanan">Kebidanan</option>
                                                                    <option value="akuntansi">Akuntansi</option>
                                                                    <option value="asp">ASP</option>
                                                                    <option value="informatika">Informatika</option>
                                                                    <option value="perhotelan">Perhotelan</option>
                                                                    <option value="mesin">Mesin</option>
                                                                    <option value="elektronika">Elektronika</option>
                                                                    <option value="dkv">DKV</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="password">Password</label>
                                                                <input type="password" placeholder="Password"
                                                                    class="form-control" name="password">
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="password2">Confirm Password</label>
                                                                <input data-parsley-equalto="#password" type="password"
                                                                    placeholder="Re-type Password" class="form-control" name="password2">
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
                                    <!-- Modal -->
                                    <div id="tambah-modal" class="modal-demo">
                                        <button type="button" class="close" onclick="Custombox.close();">
                                            <span>&times;</span><span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="custom-modal-title">Tambah Jurnal</h4>
                                        <div class="custom-modal-text">
                                            <form action="<?php echo base_url('pengusul/Jurnal/store');?>" data-parsley-validate novalidate method="post">
                                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                            value="<?=$this->security->get_csrf_hash();?>" style="display: none">

                                                <div class="form-group text-left">
                                                    <label for="tahun">Tahun publikasi</label>
                                                    <input type="number" name="tahun" parsley-trigger="change" required
                                                        placeholder="Masukan tahun publikasi" class="form-control" id="tahun">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="jenis">Jenis Publikasi</label>
                                                    <select class="custom-select" name="role" id="role">
                                                        <option selected > - Pilih Jenis Publikasi - </option>
                                                        <option value="internasional">Internasional</option>
                                                        <option value="nasional terakreditasi">Nasional Terakreditasi</option>
                                                        <option value="nasional tidak terakreditasi">Nasional Tidak Terakreditasi</option>
                                                    </select>
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="judul">Judul Artikel</label>
                                                    <input type="text" name="judul" parsley-trigger="change" required
                                                        placeholder="Masukan judul artikel" class="form-control" id="judul">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="nama">Nama Jurnal</label>
                                                    <input type="text" name="nama" parsley-trigger="change" required
                                                        placeholder="Masukan nama jurnal" class="form-control" id="nama">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="issn">ISSN Jurnal</label>
                                                    <input type="text" name="issn" parsley-trigger="change" required
                                                        placeholder="Masukan issn jurnal" class="form-control" id="issn">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="volume">Volume Jurnal</label>
                                                    <input type="number" name="volume" parsley-trigger="change" required
                                                        placeholder="Masukan volume jurnal" class="form-control" id="volume">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="nomor">Nomor Jurnal</label>
                                                    <input type="number" name="nomor" parsley-trigger="change" required
                                                        placeholder="Masukan nomor jurnal" class="form-control" id="nomor">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="halaman">Halaman Artikel</label>
                                                    <input type="number" name="halamana" parsley-trigger="change" required
                                                         class="form-control" id="halamana">
                                                    <input type="number" name="halamanz" parsley-trigger="change" required
                                                         class="form-control" id="halamanz">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="name">Nama Penulis 1</label>
                                                    <input type="text" parsley-trigger="change" readonly
                                                        value="<?=$this->name;?>" class="form-control" >
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="nidn">NIDN Penulis 1</label>
                                                    <input type="text" parsley-trigger="change" readonly
                                                        value="<?=$this->username;?>" class="form-control" >
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="halaman">Co Author</label>
                                                    <input type="number" name="penulis2" parsley-trigger="change" required
                                                        placeholder="NIDN" class="form-control" id="penulis2">
                                                    <input type="number" name="penulis3" parsley-trigger="change" required
                                                        placeholder="NIDN" class="form-control" id="penulis3">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="url">Url Artikel</label>
                                                    <input type="text" name="url" parsley-trigger="change" required
                                                        placeholder="http://" class="form-control" id="url">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="url">File Artikel ( pdf )</label>
                                                    <input type="file" data-height="300" name="file"/>
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
