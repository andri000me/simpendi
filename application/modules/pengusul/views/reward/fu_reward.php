<style type="text/css">
    td {
        font-size : 17px;
        font-family : 'times new roman';
        vertical-align: top;  
    }
    p {
        font-size : 14px;
        font-family : 'times new roman';
    }
</style>
<p style="text-align: center;"><strong>FORM PENGAJUAN<br>PENGHARGAAN PUBLIKASI KARYA ILMIAH<br>BAGI DOSEN POLITEKNIK HARAPAN BERSAMA</strong><strong>&nbsp;</strong></p>
<table style="width: 679px; height: 924px;">
<tbody>
<tr>
<td style="width: 236px;"><strong>I. Identitas Penulis</strong></td>
<td style="width: 10px;"></td>
<td style="width: 443px; "></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; a. Penulis Pertama</td>
<td style="width: 10px;"></td>
<td style="width: 443px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; &nbsp; &nbsp; - Nama Lengkap</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($jurnal->user_id)->name;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; &nbsp; &nbsp; - NIDN/NUPN</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($jurnal->user_id)->nidn;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; &nbsp; &nbsp; - Program Studi</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($jurnal->user_id)->prodi;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; b. Penulis Kedua</td>
<td style="width: 10px;"></td>
<td style="width: 443px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; &nbsp; &nbsp; - Nama Lengkap</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($jurnal->user_id2)->name;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; &nbsp; &nbsp; - NIDN/NUPN</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($jurnal->user_id2)->nidn;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; &nbsp; &nbsp; - Program Studi</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($jurnal->user_id2)->prodi;?></td>
</tr>
<?php if ($jurnal->user_id3 != ''){?>

    <tr>
<td style="width: 236px;">&nbsp; &nbsp; c. Penulis Ketiga</td>
<td style="width: 10px;"></td>
<td style="width: 443px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; &nbsp; &nbsp; - Nama Lengkap</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($jurnal->user_id3)->name;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; &nbsp; &nbsp; - NIDN/NUPN</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($jurnal->user_id3)->nidn;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; &nbsp; &nbsp; - Program Studi</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$this->M_user->ketua($jurnal->user_id3)->prodi;?></td>
</tr>
<?php } ?>
</tbody>
</table>
<table style="width: 679px; height: 924px;">
<tbody>
<tr>
<td ><strong>II. Identitas Publikasi Karya Ilmiah</strong></td>
<td ></td>
<td ></td>
</tr>
</tbody>
</table>
<table style="width: 679px; height: 924px;">
<tbody>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; A. Judul Karya Ilmiah</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$jurnal->judul;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; B. Nama Jurnal/Publikasi</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$jurnal->nama;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; C. Penerbit</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$data->penerbit;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; D. Tanggal Terbit</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$data->tanggal;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; E. Alamat Url</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$jurnal->url;?></td>
</tr>
</tbody>
</table>

<table style="width: 679px; height: 924px;">
<tbody>
<tr>
<td ><strong>III. Kategori Karya Ilmiah</strong></td>
<td ></td>
<td ></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; - Rangking</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;"><?=$data->kategori;?></td>
</tr>
<tr>
<td style="width: 236px;">&nbsp; &nbsp; - Reward</td>
<td style="width: 10px;">:</td>
<td style="width: 443px;">Rp. <?=number_format($this->M_hadiah->getOne($data->kategori)->reward);?></td>
</tr>
</tbody>
</table>
<br>
<P><em>Tanggal pengajuan : <?= date('d M Y'); ?></em></P>
<P><em>*Untuk International Conference akan diberikan 50% (sebelah conference) dan 50% (setelah terbit prosiding)<br>
*Syarat minimal author 1 dari PHB, jika semua dari PHB maka lebih baik</em></P>

<table style="height: 142px; width: 680px;">
<tbody>
<tr style="height: 18px;">
<td style="width: 296px; height: 18px;">Mengetahui,</td>
<td style="width: 149px; height: 18px;">&nbsp;</td>
<td style="width: 213px; height: 18px;">Yang mengajukan,</td>
</tr>
<tr style="height: 18px;">
<td style="width: 296px; height: 18px;">Ketua P3M</td>
<td style="width: 149px; height: 18px;">&nbsp;</td>
<td style="width: 213px; height: 18px;"></td>
</tr>
<tr style="height: 9px;">
<td style="width: 296px; height: 9px;">Politeknik Harapan Bersama</td>
<td style="width: 149px; height: 9px;">&nbsp;</td>
<td style="width: 213px; height: 9px;"></td>
</tr>
<tr style="height: 50px;">
<td style="width: 296px; height: 50px;">&nbsp;</td>
<td style="width: 149px; height: 50px;">&nbsp;</td>
<td style="width: 213px; height: 50px;">&nbsp;</td>
</tr>
<tr style="height: 18px;">
<td style="width: 296px; height: 18px;"><u><?=$this->M_pejabat->kap3m()->nama;?></u></td>
<td style="width: 149px; height: 18px;">&nbsp;</td>
<td style="width: 213px; height: 18px;"><u><?=$this->M_user->ketua($jurnal->user_id)->name;?></u></td>
</tr>
<tr style="height: 18px;">
<td style="width: 296px; height: 18px;">NIPY. <?=$this->M_pejabat->kap3m()->nipy;?></td>
<td style="width: 149px; height: 18px;">&nbsp;</td>
<td style="width: 213px; height: 18px;">NIPY. <?=$this->M_user->ketua($jurnal->user_id)->nipy;?></td>
</tr>
</tbody>
</table>