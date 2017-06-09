<?php
include '../Koneksi/Koneksi.php';
session_start();
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$foto=$_POST['foto'];


mysql_query("update tb_anggota set nama_lengkap='$nama', alamat='$alamat', foto_user='$foto' where user_id='".$_SESSION['user_id']."'");
header("location:index.php");


?>
