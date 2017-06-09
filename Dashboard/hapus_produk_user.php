<?php 
include '../Koneksi/Koneksi.php';
session_start();

$id=$_GET['id'];
mysql_query("delete from tb_info_produk where id_info_produk='$id' and user_id='".$_SESSION['user_id']."'");
	header("location:../Dashboard/data_info_produk.php?st=3");	

?>