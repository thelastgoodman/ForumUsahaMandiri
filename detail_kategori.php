<?php
session_start();
?>
<html>
	<head>
		<title> s </title>
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
  <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>  
	</head>
<body>

<?php 
include 'navbar.php';
include '../koneksi/koneksi.php';

?>
 
 
<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Kategori</h3>
<a class="btn" href="kategori.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php

$id_brg=mysql_real_escape_string($_GET['id']);

$det=mysql_query("select * from tb_cat_produk where id_cat_produk='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	$tanggal = $d ['tanggal_cat'];
	?>					
	<table class="table">
		<tr>
			<td>Nama Kategori</td>
			<td><?php echo $d['nama_cat'] ?></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td><?php echo $d['deskripsi_cat_produk'] ?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td><?php echo ''.date( "d-m-Y", strtotime($tanggal) ); ?></td>
		</tr>
	</table>
	<?php 
}
?>
</body>
</html>