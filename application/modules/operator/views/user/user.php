<div class="content">
    <div class="container-fluid">
    <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title">Data User</h4>
                                    <p class="text-muted font-14 m-b-30">
                                        Data Akun yang memiliki akses kedalam sistem.
                                        <a href="#tambah-modal" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" 
                                         data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                        <i class="fa fa-user-plus"></i>&nbsp;Tambah</a>
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Unit</th>
                                            <th>Role</th>
                                            <th>NIPY</th>
                                            <th>NIDN</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php foreach ($datas as $data) { ?>
                                        <tr>
                                            <td><?php echo $data->username; ?></td>
                                            <td><?php echo $data->name; ?></td>
                                            <td><?php echo $data->prodi; ?></td>
                                            <td><?php echo $data->role; ?></td>
                                            <td><?php echo $data->nipy; ?></td>
                                            <td><?php echo $data->nidn; ?></td>
                                            <td><a href="#edit-modal-<?php echo $data->id; ?>" class="btn btn-warning btn-rounded waves-effect waves-light" 
                                                    data-animation="door" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">
                                                    <i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url('operator/User/delete?id='.$data->id);?>" class="btn btn-rounded btn-danger waves-effect waves-light"
                                                onclick="return confirm('Beneran hapus <?php echo $data->name; ?> ?')"><i class="fa fa-user-times"></i></a>
                                                
                                                <!-- Modal -->
                                                <div id="edit-modal-<?php echo $data->id; ?>" class="modal-demo">
                                                    <button type="button" class="close" onclick="Custombox.close();">
                                                        <span>&times;</span><span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="custom-modal-title">Edit User</h4>
                                                    <div class="custom-modal-text">
                                                        <form action="<?php echo base_url('operator/User/update');?>" data-parsley-validate novalidate method="post">
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
                                                                <label for="nama">NIPY</label>
                                                                <input type="text" name="nipy" parsley-trigger="change" required
                                                                     class="form-control" value="<?=$data->nipy;?>">
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">NIDN</label>
                                                                <input type="text" name="nidn" parsley-trigger="change" required
                                                                     class="form-control" value="<?=$data->nidn;?>">
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">Disiplin Ilmu</label>
                                                                <input type="text" name="disiplin_ilmu" parsley-trigger="change" required
                                                                     class="form-control" value="<?=$data->disiplin_ilmu;?>">
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">Pangkat / Golongan</label>
                                                                <input type="text" name="pangkat_golongan" parsley-trigger="change" required
                                                                     class="form-control" value="<?=$data->pangkat_golongan;?>">
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">Jabatan Fungsional</label>
                                                                <input type="text" name="jabatan_fungsional" parsley-trigger="change" required
                                                                     class="form-control" value="<?=$data->jabatan_fungsional;?>">
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">Jabatan Struktural</label>
                                                                <input type="text" name="jabatan_struktural" parsley-trigger="change" required
                                                                     class="form-control" value="<?=$data->jabatan_struktural;?>">
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">Kontak</label>
                                                                <input type="text" name="kontak" parsley-trigger="change" required
                                                                     class="form-control" value="<?=$data->kontak;?>">
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
                                            </td>
                                        </tr>
                                        <?php } ?>
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
                                        <h4 class="custom-modal-title">Tambah User</h4>
                                        <div class="custom-modal-text">
                                            <form action="<?php echo base_url('operator/User/store');?>" data-parsley-validate novalidate method="post">
                                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                            value="<?=$this->security->get_csrf_hash();?>" style="display: none">

                                                <div class="form-group text-left">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" name="nama" parsley-trigger="change" required
                                                        placeholder="Masukan Nama" class="form-control" id="nama">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" parsley-trigger="change" required
                                                        placeholder="Masukan Username" class="form-control" id="username">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="role">Role</label>
                                                    <select class="custom-select" name="role" id="role">
                                                        <option selected > - Pilih Role - </option>
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
                                                    <select class="custom-select" name="prodi" id="prodi">
                                                        <option selected > - Pilih Prodi / Unit - </option>
                                                        <option value="p3m">P3M</option>
                                                        <option value="DIII Teknik Komputer">Komputer</option>
                                                        <option value="DIII Farmasi">Farmasi</option>
                                                        <option value="DIII Kebidanan">Kebidanan</option>
                                                        <option value="DIII Aakuntansi">Akuntansi</option>
                                                        <option value="DIV Akuntansi Sektor Publik">ASP</option>
                                                        <option value="DIV Teknik Informatika">Informatika</option>
                                                        <option value="DIII Perhotelan">Perhotelan</option>
                                                        <option value="DIII Teknik Mesin">Mesin</option>
                                                        <option value="DIII Teknik Elektronika">Elektronika</option>
                                                        <option value="DIII Desain Komunikasi Visual">DKV</option>
                                                    </select>
                                                </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">NIPY</label>
                                                                <input type="text" name="nipy" parsley-trigger="change" required
                                                                    placeholder="masukan nipy" class="form-control" >
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">NIDN</label>
                                                                <input type="text" name="nidn" parsley-trigger="change" required
                                                                    placeholder="masukan nidn" class="form-control" >
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">Disiplin Ilmu</label>
                                                                <input type="text" name="disiplin_ilmu" parsley-trigger="change" required
                                                                    placeholder="masukan disiplin ilmu" class="form-control" >
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">Pangkat / Golongan</label>
                                                                <input type="text" name="pangkat_golongan" parsley-trigger="change" required
                                                                    placeholder="masukan pangkat / golongan" class="form-control" >
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">Jabatan Fungsional</label>
                                                                <input type="text" name="jabatan_fungsional" parsley-trigger="change" required
                                                                    placeholder="masukan jabatan fungsional" class="form-control" >
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">Jabatan Struktural</label>
                                                                <input type="text" name="jabatan_struktural" parsley-trigger="change" required
                                                                    placeholder="masukan jabatan struktural" class="form-control">
                                                            </div>
                                                            <div class="form-group text-left">
                                                                <label for="nama">Kontak</label>
                                                                <input type="text" name="kontak" parsley-trigger="change" required
                                                                    placeholder="masukan kontak yang bisa dihubungi" class="form-control" >
                                                            </div>
                                                <div class="form-group text-left">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="password" placeholder="Password" required
                                                        class="form-control" name="password">
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="password2">Confirm Password</label>
                                                    <input data-parsley-equalto="#password" type="password" required
                                                        placeholder="Re-type Password" class="form-control" id="password2" name="password2">
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
