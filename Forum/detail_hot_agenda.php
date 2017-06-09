<?php
session_start();
include '../koneksi/koneksi.php';
?>
<html>
	<head>
		<title> FUM | Detail Produk </title>
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

$id_agenda =mysql_real_escape_string($_GET['id']);

     $sql_update_baca = mysql_query("UPDATE tb_agenda set dibaca = dibaca+1 WHERE id_agenda='$id_agenda'");
     $sql = mysql_fetch_array( mysql_query( "SELECT * FROM tb_agenda WHERE terlaksana='belum' AND id_agenda='$id_agenda' ORDER BY id_agenda DESC" ) );
      echo "<div class=\"panel panel-kostum\">";
   echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; DETAIL INFORMASI AGENDA</div>";
  echo "</div>";
    echo "<h1>".$sql['judul_agenda']."</h1>";
  $tanggal = $sql["tanggal_agenda"];
    echo "<i><p>Tanggal Pelaksanaan : ".date( "d-m-Y", strtotime($tanggal) )." | Dilihat : ".$sql['dibaca']." kali </p></i>";
    $tampil = $sql['gambar'];
      echo"<img src=\"../files/thumb_$tampil\" width=\"550\">";
      echo"<br><br>";
	  echo"<a class=\"btn btn-danger\" href=\"detail_kategori_forum.php?kat_id=".$_GET['kat_id']."\">Kembali</a>";
      echo "</div>";
      echo "<div class=\"col-md-6\">";
      echo "<div class=\"panel panel-kostum\">";
   echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Deskripsi Agenda</div>";
  echo "</div>";
   echo"<div class=\"panel-body\">".$sql['isi_agenda']."</div>";
   echo "</div>";
     ?>
</div>
</div>
</div>
</body>
</html>

