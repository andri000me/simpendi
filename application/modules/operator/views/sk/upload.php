<div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Form unggah SK</h4>
                                    <p class="text-muted m-b-30 font-14">
                                        SK yang diunggah akan secara otomatis dihubungkan dengan hibah institusi
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form class="form-horizontal row" role="form" action="<?php echo base_url('operator/Sk/upload_sk');?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                                    <div class="col-9">
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Semester</label>
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
                                                            <label class="col-2 col-form-label">Nomor SK</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" placeholder="Judul" name="nomor">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Tanggal SK</label>
                                                            <div class="col-10">
                                                                <input type="date" class="form-control" placeholder="tanggal SK" name="tanggal">
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
                                                    <input type="file" class="dropify" data-height="150" name="sk"/>
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
                                'default': 'Drag and drop a file here or click (-pdf-)',
                                'replace': 'Drag and drop or click to replace',
                                'remove': 'Remove',
                                'error': 'Ooops, something wrong appended.'
                            },
                            error: {
                                'fileSize': 'The file size is too big (1M max).'
                            }
                        });
                    </script>