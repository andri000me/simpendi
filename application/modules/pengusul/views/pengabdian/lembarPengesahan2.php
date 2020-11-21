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
<p style="text-align: center;"><strong>HALAMAN PENGESAHAN<br>LAPORAN PENGABDIAN KEPADA MASYARAKAT</strong><strong>&nbsp;</strong></p>
<table style="width: 679px; height: 924px;">
<tbody>
<tr>
<td style="width: 236px;">1. Judul</td>
<td style="width: 10px;">:</td>
<td style="width: 443px; "><?=ucwords($hibah->judul);?></td>
</tr>
<tr>
<td style="width: 236px;">2. Jenis Pengabdian</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;">Iptek bagi Masyarakat (IbM)</td>
</tr>
<tr>
<td style="width: 236px;">3. Ketua Tim Pengusul</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; a. Nama Lengkap</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->name;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; b. NIPY</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->nipy;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; c. NIDN</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->nidn;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; d. Disiplin ilmu</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->disiplin_ilmu;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; e. Pangkat / Golongan</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->pangkat_golongan;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; f. Jabatan Fungsional</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->jabatan_fungsional;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; g. Jabatan Struktural</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->jabatan_struktural;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; h. Program Studi</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->prodi;?></td>
</tr>
<tr>
<td style="width: 236px;"><em>&nbsp; &nbsp; i. Contact Person</em></td>
<td style="width: 10px;"><em>:</em></td>
<td style="width: 443px;"><?=$this->M_user->ketua($hibah->user_id)->kontak;?></td>
</tr>
<tr>
<td style="width: 236px;">4. Jumlah Angota</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=count($anggotas);?>&nbsp;orang</td>
</tr>
<?php $i = 1; foreach ($anggotas as $anggota) { ?>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; - Nama anggota <?=$i++;?>&nbsp;</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->anggota($anggota->user_id)->name;?></td>
</tr>
<?php } ?>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; - Mahasiswa yang terlibat</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?= ($mahasiswas != '') ? count($mahasiswas) : 0; ?> orang</td>
</tr>
<tr>
<td style="width: 236px;">5. Lokasi Kegiatan</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=ucwords($hibah->lokasi);?></td>
</tr>
<tr>
<td style="width: 236px;">6. Jangka Waktu Pelaksanaan</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$hibah->waktu;?></td>
</tr>
<tr>
<td style="width: 236px;">7. Jumlah dana yang diusulkan</td>
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