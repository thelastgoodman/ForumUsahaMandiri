<?php 
include '../koneksi/koneksi.php';
$id=$_GET['id'];

$sql_hapus="delete from tb_cat_produk where id_cat_produk='$id'";
mysql_query($sql_hapus)
or die ("Hapus Data Kategori Produk gagal".mysql_error());
header("location:kategori_produk.php?st=2");

?>