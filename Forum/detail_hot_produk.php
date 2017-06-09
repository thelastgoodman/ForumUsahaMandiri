<?php
session_start();
include '../koneksi/koneksi.php';
?>
<html>
	<head>
		<title> FUM | Data Produk  </title>
	<link rel="stylesheet" href="../assets2/css/bootstrap.css">
		<link rel="stylesheet" href="../assets2/css/bootstrap.min.css">
<link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
<link rel="stylesheet" href="../assets2/css/styles1.css">
       <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
    <script type="text/javascript" src="../assets2/js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	</head>

<body>
<div class="container">
	<div class="row">
      <?php
      include 'other_navbar.php'
    ?>

 <br><br><br><br><br>

<div class="col-md-6">
<?php

$id_prd=mysql_real_escape_string($_GET['id']);

	# code...


$det=mysql_query("SELECT * from tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_user on tb_info_produk.user_id = tb_user.user_id INNER JOIN tb_anggota on tb_anggota.user_id = tb_user.user_id where id_info_produk='$id_prd'")or die(mysql_error());
while($d=mysql_fetch_array($det)){

		
	
  
     $sql_update_baca = mysql_query("UPDATE tb_info_produk set dibaca =dibaca+1 WHERE id_info_produk='$id_prd'");
     $sql = mysql_fetch_array( mysql_query("SELECT * from tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk where id_info_produk='$id_prd'" ) );
    	echo "<div class=\"panel panel-kostum\">";
   echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp;DETAIL INFORMASI PRODUK</div>";
  echo "</div>";
		echo "<h1>".$d['nama_produk']."</h1>";
	$tanggal = $d["tanggal"];
		echo "<i><p><i class=\"fa fa-calendar\"> ".date( "d-m-Y", strtotime($tanggal) )." </i> | Dilihat : ".$sql['dibaca']." kali | Kategori : ".$d['nama_cat']." </p></i> ";
		$tampil = $d['foto_produk'];
	    echo"<img src=\"../files/thumb_$tampil\">";
	     echo"<br><br>";
	    echo "<a href=\"index.php\" class=\"btn btn-danger\">Kembali</a>";
	    echo "</div>";
	    	echo "<div class=\"col-md-6\">";
	    echo "<div class=\"panel panel-kostum\">";
	    echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Nama Pemilik</div>";
	    echo"<div class=\"panel-body\">".$d['nama_lengkap']."</div>";
        echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Nama Usaha</div>";
	    echo"<div class=\"panel-body\">".$d['nama_produk']."</div>";
	    echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Alamat </div>";
	    echo"<div class=\"panel-body\">".$d['alamat_workshop']."</div>";
	      echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Kecamatan</div>";
	    echo"<div class=\"panel-body\">".$d['kecamatan']."</div>";
	    echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Kelurahan</div>";
	    echo"<div class=\"panel-body\">".$d['kelurahan']."</div>";
	    echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Klasifikasi Usaha</div>";
	   echo"<div class=\"panel-body\"><span style=\"line-height:30px\">".$d['klasifikasi']."</span></div>";
    	echo "</div>";
	    echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Kegiatan Utama</div>";
	    echo"<div class=\"panel-body\">".$d['deskripsi_produk']."</div>";
	    echo "</div>";
    
}

?>
</div>
</body>
</html>
