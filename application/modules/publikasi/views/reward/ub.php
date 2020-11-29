<div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Form Usulan Reward</h4>
                                    <p class="text-muted m-b-30 font-14">
                                        Usulan reward publikasi ilmiah jurnal nasional terakreditasi S1, S2, S3, S4, jurnal Internasional Q1, Q2, Q3, Q4, International Conference
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form class="form-horizontal row" role="form" action="<?php echo base_url('publikasi/Reward/store');?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                                    <div class="col-9">
                                                        
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Nama</label>
                                                            <div class="col-10">
                                                            <select class="form-control" name="user_id">
                                                                    <option>---</option>
                                                                    <?php if ($users != ''){
                                                                    foreach ($users as $user) { ?>
                                                                    <option value="<?=$user->id;?>"><?=$user->name;?></option>
                                                                    <?php } }?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Judul Karya Ilmiah</label>
                                                            <div class="col-10">
                                                                <select class="form-control" name="jurnal_id">
                                                                    <option>---</option>
                                                                    <?php if ($datas != ''){
                                                                    foreach ($datas as $data) { ?>
                                                                    <option value="<?=$data->id;?>"><?=$data->judul;?></option>
                                                                    <?php } }?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Penerbit</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" placeholder="instansi penerbit" name="penerbit">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Tanggal Terbit</label>
                                                            <div class="col-10">
                                                                <input type="date" class="form-control" name="tanggal">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Kategori Karya Ilmiah</label>
                                                            <div class="col-10">
                                                                <select class="form-control" name="kategori">
                                                                    <option>---</option>
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
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">URL SJR / Laman SINTA</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" name="url_laman">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label"></label>
                                                            <div class="col-10">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
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