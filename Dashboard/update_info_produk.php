<?php 
include '../Koneksi/Koneksi.php';

$id=$_POST['id'];
$nama=$_POST['napro'];
$kt=$_POST['kategori'];
$desk=$_POST['desk'];
$ft=$_POST['foto'];
$tlp=$_POST['tlp'];
$tg=$_POST['tanggal'];
$contgl=date( "y-m-d", strtotime($tg) );
mysql_query("update tb_info_produk set id_cat_produk ='$kt',nama_produk='$nama' , deskripsi_produk='$desk',foto_produk='$ft', tanggal='$contgl', notelp='$tlp' where id_info_produk='$id'");
header("location:data_info_produk.php");

?>