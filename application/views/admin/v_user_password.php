<!-- form Uploads -->
<link href="<?php echo base_url()?>assets/adminto/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- Start content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="bg-picture card-box" id="hasil">
     <?php echo form_open_multipart(base_url('Belakang/profil/password/post'), array('autocomplete' => 'off', 'class' =>'form-horizontal', 'role' =>'form'));?>
            <h4 class="text-info m-t-0 header-title">Data Password</h4>
            <hr>
            
            <div class="form-group row" id="oldpassword">
              <label class="col-2 col-form-label"> Password Lama</label>
              <div class="col-9 ">
                <input type="password" name="oldpassword" placeholder="Old Password" autocomplete="off" class="form-control" id="old_password">
              </div>
            </div>
            <div class="form-group row" id="password">
              <label class="col-2 col-form-label"> Password Baru</label>
              <div class="col-9 ">
                <input type="password" name="password" placeholder="New Password" autocomplete="off" class="form-control">
              </div>
            </div>
            <div class="form-group row" id="re_password">
              <label class="col-2 col-form-label"> Retype Password</label>
              <div class="col-9 ">
                <input type="password" name="re_password" placeholder="Retype Password" autocomplete="off" class="form-control">
              </div>
            </div>
            <div class="form-group mb-0 justify-content-end row d-none" id="bt">
              <div class="col-9">
                <button type="submit" class=" mt-4 btn btn-block btn btn-warning">Update</button>
              </div>
            </div>
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

<script>
  $(document).ready(function()
  {
    $('input[name="oldpassword"],input[name="password"],input[name="re_password"]').val('');
    
$('#old_password').change(function(){
  var pass = $(this).val();
  $.ajax
  ({
    url: '<?php echo base_url('Belakang/cek_password');?>',
    data: {
      'password' :  pass
    },
    type: 'post',
    success: function(hasil)
    {
      if(hasil != 1){
        $('input[type="password"]').val('');
        $('input[name="password"],input[name="re_password"]').prop('readonly', true);
        swal ( "Oops" ,  "Password incorect!" ,  "error" );
        $( "#bt" ).addClass( "d-none" );
      } else {
        $('input[name="password"],input[name="re_password"]').removeAttr("readonly");
        $( "#bt" ).removeClass( "d-none" );
      }
    }
  });
});
});
</script>
