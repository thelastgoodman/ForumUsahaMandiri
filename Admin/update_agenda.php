<?php 
include '../koneksi/koneksi.php';
$id=$_POST['id'];
$judul=$_POST['judul'];
$isi=$_POST['isi'];
$tg=$_POST['tgl'];
$foto=$_POST['foto'];
$contgl=date( "y-m-d", strtotime($tg) );

mysql_query("update tb_agenda set judul_agenda='$judul', tanggal_agenda='$contgl',gambar='$foto',isi_agenda='$isi' where id_agenda='$id'");
header("location:data_info_agenda.php");

?>
