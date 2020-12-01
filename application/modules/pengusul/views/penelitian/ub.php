<div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Form Usulan Baru</h4>
                                    <p class="text-muted m-b-30 font-14">
                                        Usulan pengajuan penelitian pendanaan institusi
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form class="form-horizontal row" role="form" action="<?php echo base_url('pengusul/Penelitian/store');?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                                    <div class="col-9">
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Tahun Akademik</label>
                                                            <div class="col-10">
                                                                <select class="form-control" name="tahun">
                                                                    <option>---</option>
                                                                    <?php foreach ($tahuns as $tahun) { ?>
                                                                    <option value="<?=$tahun->tahun;?>"><?=$tahun->tahun;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
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
                                                            <label class="col-2 col-form-label">Anggota</label>
                                                            <div class="col-10">
                                                            <select class="select2 select2-multiple" multiple="multiple" multiple data-placeholder=" Pilih Anggota" name="anggotas[]" >
                                                                <optgroup label="Dosen">
                                                                    <?php foreach ($anggotas as $anggota) { ?>
                                                                    <option value="<?=$anggota->id;?>"><?=$anggota->name;?></option>
                                                                    <?php } ?>
                                                                </optgroup>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Mahasiswa 1</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" placeholder="nama mahasiswa" name="mahasiswa1">
                                                                <span class="help-block"><small>*Isi jika penelitian melibatkan mahasiswa</small></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Mahasiswa 2</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" placeholder="nama mahasiswa" name="mahasiswa2">
                                                                <span class="help-block"><small>*Isi jika penelitian melibatkan mahasiswa.</small></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Judul</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" placeholder="Judul" name="judul">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Bidang Keilmuan</label>
                                                            <div class="col-10">
                                                                <select class="form-control" name="keilmuan">
                                                                    <option>---</option>
                                                                    <option value="teknik">Teknik</option>
                                                                    <option value="ekonomi">Ekonomi</option>
                                                                    <option value="kesehatan">Kesehatan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Nominal</label>
                                                            <div class="col-10">
                                                                <input type="number" class="form-control" placeholder="Rp. " name="nominal">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Luaran</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" placeholder="luaran" name="luaran">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label"></label>
                                                            <div class="col-10">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 float-right">
                                                    <h4 class="header-title m-t-0 m-b-30">Proposal</h4>
                                                    <p class="text-muted m-b-30 font-14">
                                                        file word [doc | docx | rtf]
                                                    </p>
                                                    <input type="file" class="dropify" data-height="300" name="proposal"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                        
                    </div>
                    <script type="text/javascript" src="<?php echo base_url() ?>assets/adminto/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
                    <script src="<?php echo base_url() ?>assets/adminto/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
                    <!-- file uploads js -->
                    <script src="<?php echo base_url() ?>assets/adminto/assets/plugins/fileuploads/js/dropify.min.js"></script>
                    <script>
                        jQuery(document).ready(function() {
                            // Select2
                            $(".select2").select2();
                        });

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
                    </script>