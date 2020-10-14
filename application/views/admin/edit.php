<script>
      $(document).ready(function() 
      {     
            $('input[name="username"]').focus();

            $('tr.password').css('display','none');
            $('tr.repassword').css('display','none');

            $('input[name="ganti"]').click(function()
            {
              if ($(this).is(':checked')) 
              {
                  $('tr.password').show('fast');
                  $('tr.repassword').show('fast');
                  $('input[name="password"]').val('');
            } 
            else 
            {
                  $('tr.password').hide('fast');
                  // $('input[name="password"]').val('<?php echo $user->user_password?>');

            }
      });

            

      });	
</script>

<?php 
if (!$user->user_photo)

{
      $image = 'tidak ada foto';
}

else

{
      $image = img(array ( 'src' => base_url('assets/images/profile/'.$user->user_photo),'width' => '200', 'height' => '200'));
}
?>

<?php echo $this->session->flashdata("report"); ?>

<?php
$read = ($user->user_type == 2) ? 'readonly' : '' ;

?>
<h1>Ubah Data User</h1><hr>


<br>
<?php echo form_open_multipart('user/edit_post/'.$user->user_id, array('autocomplete' => 'off'));?>
<table class="noborder" width="100%">
      <tr>
            <td>Username</td> 
            <td><input type="text" name="username" placeholder="Username" value="<?php echo $user->user_username; ?>" <?=$read?>></td>
            <?php echo form_error('username'); ?>
      </tr>

      <tr>
            <td>Nama Lengkap</td>
            <td><input type="text" name="fullname" placeholder="Nama lengkap" value="<?php echo $user->user_fullname; ?>" <?=$read?>></td>
      </tr>

      <tr>
            <td valign="top">Foto</td>
            <td><?php echo $image;?><br><input type="file" name="userfile"></td>
      </tr>

      <tr>
            <td valign="top">Kecamatan</td>
            <td>

                  <?php

                  //Get Data Kabupaten
                  $curl = curl_init();    
                  curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=473",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                              "key:ac6852affd0729eb2a333ef9cca97586"
                        ),
                  ));
                  $response = curl_exec($curl);
                  $err = curl_error($curl);
                  curl_close($curl);
                  $selected = $user->user_id_kec;

                  echo "<select name='id_kec' id='id_kec' class='custom-select'  onchange='get_kec()' required> ";
                  echo "<option>Pilih Kecamatan Asal</option>";
                  $data = json_decode($response, true);
                  for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
                        $pilih = ($selected == $data['rajaongkir']['results'][$i]['subdistrict_id']) ? 'selected' : '' ;
                        echo "<option ".$pilih." value='".$data['rajaongkir']['results'][$i]['subdistrict_id']."'>".$data['rajaongkir']['results'][$i]['subdistrict_name']."</option>";
                  }
                  echo "</select><br><br>";
                  ?>
                  <input type="text" name="kecamatan" value="<?php echo $user->user_kec; ?>" style="display: none">
            </td>
            <?php echo form_error('address'); ?>
      </tr>

      <tr>
            <td valign="top">Alamat</td>
            <td> <textarea name="address" cols="40" rows="10" required><?php echo $user->user_address; ?></textarea></td>
            <?php echo form_error('address'); ?>
      </tr>

      <tr>
            <td>Nomer Telepon</td>
            <td><input type="text" name="phone" placeholder="Nomer Telepon" value="<?php echo $user->user_phone; ?>"></td>
            <?php echo form_error('phone'); ?>
      </tr>

      <tr>
            <td>Bank</td>
            <td><input type="text" name="bank" placeholder="Bank Rekening" value="<?php echo $user->user_bank; ?>" required></td>
            <?php echo form_error('bank'); ?>
      </tr>

      <tr>
            <td>No. Rek</td>
            <td><input type="text" name="rek_bank" placeholder="Bank Rekening" value="<?php echo $user->user_rek; ?>" required></td>
            <?php echo form_error('rek_bank'); ?>
      </tr>

      <tr>
            <td>Email</td>
            <td><input type="text" name="email" placeholder="Email" value="<?php echo $user->user_email; ?>" autocomplete="off"></td>
            <?php echo form_error('email'); ?>
      </tr>

      <tr>
            <td>Ganti Password</td>
            <td align="left"><input type="checkbox" name="ganti" value="1"></td>
      </tr>

      <tr class="password">
            <td>Password</td>
            <td><input type="password" name="password" placeholder="Password" autocomplete="off"></td>
            <?php echo form_error('password'); ?>
      </tr>
      <tr class="repassword">
            <td>Retype-Password</td>
            <td><input type="password" name="re_password" placeholder="Retype Password"  autocomplete="off"></td>
            <?php echo form_error('repassword'); ?>
      </tr>

      <?php
      echo '<tr><td>'.form_submit('update', 'Save').'</td></tr>';?>
</table>
<?php echo form_close();?>

<script type="text/javascript">
      function get_kec() {
            var e = document.getElementById("id_kec");
            var strUser = e.options[e.selectedIndex].text;
            $('input[name="kecamatan"]').val(strUser);
      };
</script>