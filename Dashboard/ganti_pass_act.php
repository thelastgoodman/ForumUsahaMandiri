<?php 
include '../koneksi/koneksi.php';
$email=$_POST['email'];
$lama=$_POST['pass_lama'];
$baru=$_POST['pass_baru'];
$ulang=$_POST['pass_ulang'];

$cek=mysql_query("select * from tb_user where password='$lama' and email='$email'");
if(mysql_num_rows($cek)==1){
	if($baru==$ulang){
		$b = $baru;
		mysql_query("update tb_user set password='$b' where email='$email'");
		header("location:ganti_pass.php?pesan=oke");
	}else{
		header("location:ganti_pass.php?pesan=tdksama");
	}
}else{
	header("location:ganti_pass.php?pesan=gagal");
}

 ?>