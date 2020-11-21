<style type="text/css">
    td {
        font-size : 16px;
        font-family : 'times new roman';
        vertical-align: top;  
    }
    p {
        font-size : 14px;
        font-family : 'times new roman';
    }
</style>
<p style="text-align: center;"><strong>HALAMAN PENGESAHAN<br>LAPORAN PENELITIAN</strong><strong>&nbsp;</strong></p>
<table style="width: 679px; height: 924px;">
<tbody>
<tr>
<td style="width: 236px;"><strong>Judul</strong></td>
<td style="width: 10px;">:</td>
<td style="width: 443px; "><?=ucwords($hibah->judul);?></td>
</tr>
<tr>
<td style="width: 236px;"><strong>Ketua Peneliti</strong></td>
<td style="width: 10px;"></td>
<td style="width: 443px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; a. Nama Lengkap</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->name;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; b. NIDN</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->nidn;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; c. Jabatan Fungsional</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->jabatan_fungsional;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; d. Program Studi</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->prodi;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; e. Nomor HP</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->kontak;?></td>
</tr>
<tr>
<td style="width: 236px;"><em>&nbsp; &nbsp; f. E mail</em></td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->email;?></td>
</tr>
<?php $i = 1; foreach ($anggotas as $anggota) { ?>
<tr>
<td style="width: 236px;"><strong>Anggota Peneliti (<?=$i++;?>)</strong>&nbsp;</td>
<td style="width: 10px;"></td>
<td style="width: 443px;"></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; Nama Lengkap&nbsp;</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->anggota($anggota->user_id)->name;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; NIDN / NUPY&nbsp;</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->anggota($anggota->user_id)->nidn;?></td>
</tr>
<?php } ?>
<tr>
<td style="width: 236px;"><strong>Biaya Penelitian</strong></td>
<td style="width: 10px;">:</td>
<td style="width: 443px;">&nbsp;Rp. <?= number_format($hibah->nominal);?></td>
</tr>
</tbody>
</table>
<p style="text-align: right;">Tegal,&nbsp;&nbsp;&nbsp;&nbsp;<?=$hibah->date_laporan;?></p>
<table style="height: 41px; width: 680px;">
<tbody>
<tr style="height: 18px;">
<td style="width: 297px; height: 18px;"><em>Reviewer 1&nbsp;</em></td>
<td style="width: 149px; height: 18px;">&nbsp;</td>
<td style="width: 212px; height: 18px;"><em>Reviewer 2</em></td>
</tr>
<tr style="height: 39px;">
<td style="width: 297px; height: 39px;">&nbsp;</td>
<td style="width: 149px; height: 39px;">&nbsp;</td>
<td style="width: 212px; height: 39px;">&nbsp;</td>
</tr>
<tr style="height: 25px;">
<td style="width: 297px; height: 25px;"><u><?=$this->M_user->reviewer($hibah->reviewer1_id)->name;?></u></td>
<td style="width: 149px; height: 25px;">&nbsp;</td>
<td style="width: 212px; height: 25px;"><u><?=$this->M_user->reviewer($hibah->reviewer2_id)->name;?></u></td>
</tr>
<tr style="height: 18px;">
<td style="width: 297px; height: 18px;">NIPY. <?=$this->M_user->reviewer($hibah->reviewer1_id)->nipy;?></td>
<td style="width: 149px; height: 18px;">&nbsp;</td>
<td style="width: 212px; height: 18px;">NIPY. <?=$this->M_user->reviewer($hibah->reviewer2_id)->nipy;?></td>
</tr>
</tbody>
</table>
<table style="height: 110px; width: 681px;">
<tbody>
<tr style="height: 18px;">
<td style="width: 297px; height: 18px;">&nbsp;<em>Menyetujui,</em></td>
<td style="width: 148px; height: 18px;">&nbsp;</td>
<td style="width: 214px; height: 18px;">&nbsp;</td>
</tr>
<tr style="height: 18px;">
<td style="width: 297px; height: 18px;">Ketua Prodi <?=$hibah->prodi;?></td>
<td style="width: 148px; height: 18px;">&nbsp;</td>
<td style="width: 214px; height: 18px;">Ketua Tim Pelaksana</td>
</tr>
<tr style="height: 18px;">
<td style="width: 297px; height: 18px;">Politeknik Harapan Bersama</td>
<td style="width: 148px; height: 18px;">&nbsp;</td>
<td style="width: 214px; height: 18px;">Pengabdian Masyarakat</td>
</tr>
<tr style="height: 41px;">
<td style="width: 297px; height: 41px;">&nbsp;</td>
<td style="width: 148px; height: 41px;">&nbsp;</td>
<td style="width: 214px; height: 41px;">&nbsp;</td>
</tr>
<tr style="height: 18px;">
<td style="width: 297px; height: 18px;"><u><?=$this->M_pejabat->kaprodi($hibah->prodi)->nama;?></u></td>
<td style="width: 148px; height: 18px;">&nbsp;</td>
<td style="width: 214px; height: 18px;"><u><?=$this->M_user->ketua($hibah->user_id)->name;?></u></td>
</tr>
<tr style="height: 18px;">
<td style="width: 297px; height: 18px;">NIPY. <?=$this->M_pejabat->kaprodi($hibah->prodi)->nipy;?></td>
<td style="width: 148px; height: 18px;">&nbsp;</td>
<td style="width: 214px; height: 18px;">NIPY. <?=$this->M_user->ketua($hibah->user_id)->nipy;?></td>
</tr>
</tbody>
</table>
<table style="height: 142px; width: 680px;">
<tbody>
<tr style="height: 18px;">
<td style="width: 296px; height: 18px;">Mengesahkan,</td>
<td style="width: 149px; height: 18px;">&nbsp;</td>
<td style="width: 213px; height: 18px;">Mengetahui,</td>
</tr>
<tr style="height: 18px;">
<td style="width: 296px; height: 18px;">Ketua P3M</td>
<td style="width: 149px; height: 18px;">&nbsp;</td>
<td style="width: 213px; height: 18px;">Direktur</td>
</tr>
<tr style="height: 9px;">
<td style="width: 296px; height: 9px;">Politeknik Harapan Bersama</td>
<td style="width: 149px; height: 9px;">&nbsp;</td>
<td style="width: 213px; height: 9px;">Politeknik Harapan Bersama</td>
</tr>
<tr style="height: 50px;">
<td style="width: 296px; height: 50px;">&nbsp;</td>
<td style="width: 149px; height: 50px;">&nbsp;</td>
<td style="width: 213px; height: 50px;">&nbsp;</td>
</tr>
<tr style="height: 18px;">
<td style="width: 296px; height: 18px;"><u><?=$this->M_pejabat->kap3m()->nama;?></u></td>
<td style="width: 149px; height: 18px;">&nbsp;</td>
<td style="width: 213px; height: 18px;"><u><?=$this->M_pejabat->direktur()->nama;?></u></td>
</tr>
<tr style="height: 18px;">
<td style="width: 296px; height: 18px;">NIPY. <?=$this->M_pejabat->kap3m()->nipy;?></td>
<td style="width: 149px; height: 18px;">&nbsp;</td>
<td style="width: 213px; height: 18px;">NIPY. <?=$this->M_pejabat->direktur()->nipy;?></td>
</tr>
</tbody>
</table>