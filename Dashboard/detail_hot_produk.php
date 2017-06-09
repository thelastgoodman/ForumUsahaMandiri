<?php
session_start();
include '../koneksi/koneksi.php';
?>
<html>
	<head>
		<title> FUM| Detail Agenda </title>
		<link rel="stylesheet" type="text/css" href="../assets2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../assets2/css/bootstrap.min.css">
<link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
  
	</head>
<body>


 
<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Produk</h3>
<a class="btn" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<div class="col-md-6">
<?php

$id_prd=mysql_real_escape_string($_GET['id']);

	# code...


$det=mysql_query("SELECT * from tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk where id_info_produk='$id_prd'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	
		
	
  
     $sql_update_baca = mysql_query("UPDATE tb_info_produk set dibaca = dibaca+1 WHERE id_info_produk='$id_prd'");
     $sql = mysql_fetch_array( mysql_query("SELECT * from tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk where id_info_produk='$id_prd'" ) );
    	echo "<div class=\"panel panel-kostum\">";
   echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp;DETAIL INFORMASI PRODUK</div>";
  echo "</div>";
		echo "<h1>".$d['nama_produk']."</h1>";
	$tanggal = $d["tanggal"];
		echo "<i><p>Tanggal Post : ".date( "d-m-Y", strtotime($tanggal) )." | Dilihat : ".$sql['dibaca']." kali | Kategori : ".$d['nama_cat']." </p></i> ";
		$tampil = $d['foto_produk'];
	    echo"<img src=\"../files/thumb_$tampil\">";
	    echo"<br><br><br>";
	    echo "<div class=\"panel panel-kostum\">";
        echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Nama Usaha</div>";
	    echo"<div class=\"panel-body\">".$d['nama_produk']."</div>";
	    echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Alamat </div>";
	    echo"<div class=\"panel-body\">".$d['alamat_workshop']."</div>";
	    echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; No Telphone</div>";
	    echo"<div class=\"panel-body\">".$d['no_telp']."</div>";
	    // echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Deskripsi Produk</div>";
	    // echo"<div class=\"panel-body\">".$d['deskripsi_produk']."</div>";
    
}

?>
</div>
</body>
</html>