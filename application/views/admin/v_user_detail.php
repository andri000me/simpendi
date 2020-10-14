<!-- form Uploads -->
<link href="<?php echo base_url()?>assets/adminto/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
<!-- Start content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 " >
      <div class="bg-picture card-box" id="detail">
        <h4 class="text-info m-t-0 header-title">Detail Akun</h4>
        <hr>
        <div class="profile-info-name">
          <img src="<?php
          if($a = file_exists('upload/profil/'.$data->foto_adm)){
            $gambar = base_url('upload/profil/'.$data->foto_adm);
            } else {
              $gambar = base_url('assets/adminto/assets/images/users/avatar-1.jpg');
            }
            echo $gambar;?>"
            class="img-thumbnail" alt="profile image" >
            <div class="profile-info-detail">
              <h4 class="m-0">
                <i class="fa fa-user"></i> <?php echo $data->nama_adm;?>
              </h4>
              <hr>
              <div class="form-group row">
                <label class="col-2 col-form-label">Username</label>
                <div class="col-10">
                  <input type="text" class="form-control" value="<?php echo $data->username_adm; ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-2 col-form-label">Phone</label>
                <div class="col-10">
                  <input type="text" name="phone" class="form-control" value="<?php echo $data->cp_adm; ?>" >
                </div>
              </div>
              <div class="form-group row">
                <label class="col-2 col-form-label">Email</label>
                <div class="col-10">
                  <input type="text" name="email" class="form-control" value="<?php echo $data->email_adm; ?>" >
                </div>
              </div>
              <div class="form-group row">
                <label class="col-2 col-form-label">Alamat </label>
                <div class="col-10">
                  <textarea class="form-control" rows="5" name="alamat"><?php echo $data->alamat_adm; ?></textarea>
                </div>
              </div>
              <button type="button" class=" mt-4 btn btn-block btn btn-secondary float-right btn-info" id="klik">Click To Update</button>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="card-box d-none" id="edit" >
          <h4 class="text-info m-t-0 header-title">Data Profil</h4>
          <div  class="bg-picture card-box ">
            <div class="">
              <?php echo form_open_multipart(base_url('Belakang/profil/update_post'), array('autocomplete' => 'off', 'class' =>'form-horizontal', 'role' =>'form'));?>
              <div class="row">
                <div class="col-4 mt-4">
                  <center>
                    <label>Foto</label>
                  </center>
                  <input type="file" name="userfile" accept="image/*" class="dropify " data-max-file-size="5M" />
                </div>
                <div class="col-8 mt-4">
                  <center>
                    <label>Data Profil</label>
                  </center>
                  <div class="form-group row">
                    <label class="col-2 col-form-label">Username</label>
                    <div class="col-10">
                      <input type="text" class="form-control" value="<?php echo $data->username_adm; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-2 col-form-label">Nama</label>
                    <div class="col-10">
                      <input type="text" id="fullname" name="nama" class="form-control" value="<?php echo $data->nama_adm; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-2 col-form-label">Phone</label>
                    <div class="col-10">
                      <input type="text" name="phone" class="form-control" value="<?php echo $data->cp_adm; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                      <input type="email" name="email" class="form-control" value="<?php echo $data->email_adm; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-2 col-form-label">Alamat </label>
                    <div class="col-10">
                      <textarea class="form-control" rows="5" name="alamat"><?php echo $data->alamat_adm; ?></textarea>
                    </div>
                  </div>
                </div>
                <button type="submit" class=" mt-4 btn btn-block btn btn-warning">Update</button>
              </div>
              <br>
            </form>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!--/ meta -->
    </form>
  </div>
</div>
</div>
<!-- end row -->
</div> <!-- end card-box -->
<!-- end col -->
</div>
</div>
</div> <!-- container -->
</div> <!-- content -->
<!-- file uploads js -->
<script src="<?php echo base_url()?>assets/adminto/assets/plugins/fileuploads/js/dropify.min.js"></script>
<script type="text/javascript">
  $('.dropify').dropify({
    messages: {
      'default': 'Drag and drop a file here or click',
      'replace': 'Drag and drop or click to replace',
      'remove': 'Remove',
      'error': 'Ooops, something wrong appended.'
    },
    error: {
      'fileSize': 'The file size is too big (5M max).'
    }
  });
</script>
<script>
  $(document).ready(function()
  {
    $("#klik").click(function(){
      $( "#edit" ).removeClass( "d-none" );
      $("#detail").addClass("d-none");
    });
  });
</script>
