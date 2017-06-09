<?php 
include '../koneksi/koneksi.php';
$id=$_POST['id'];
$nama=$_POST['nama'];
$ds=$_POST['deskripsi'];
$tg=$_POST['tanggal'];
$contgl=date( "y-m-d", strtotime($tg) );


$sql_update="update tb_cat_produk set nama_cat='$nama', deskripsi_cat_produk='$ds' , tanggal_cat='$contgl' where id_cat_produk='$id'";
mysql_query($sql_update)
or die ("Update Data Kategori Produk gagal".mysql_error());
	
header("location:kategori_produk.php?st=4");


?>
