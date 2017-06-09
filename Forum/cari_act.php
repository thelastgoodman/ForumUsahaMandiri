<?php 
include '../Koneksi/Koneksi.php';
	$cari = mysql_real_escape_string( $_POST['cari'] );
$reply =$_POST['kate_id'] ;
header("location:detail_kategori_forum.php?kat_id=$reply&cari=$cari");
?>