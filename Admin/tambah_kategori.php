<?php 
include '../Koneksi/Koneksi.php';

$nama=$_POST['nama'];
$kategori=$_POST['kategori'];
$tgl=$_POST['tanggal'];
$contgl=date('y-m-d');

$sql_simpan="insert into tb_cat_produk values('','$nama','$kategori','$contgl')";
mysql_query($sql_simpan)
or die ("Memasukan Data Kategori Produk gagal".mysql_error());
	
header("location:kategori_produk.php?st=1")		

 ?>