<?php
include '../Koneksi/Koneksi.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FUM | Detail Agenda</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php
include 'navbar.php'

?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper" style="background-color:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a class="btn" href="index.php">Kembali</a>
      <hr>
    </section>
     <section class="content">
     <?php

     $id_agenda = $_GET['id_agenda'];
     $sql_update_baca = mysql_query("UPDATE tb_agenda set dibaca = dibaca+1 WHERE id_agenda='$id_agenda'");
     $sql = mysql_fetch_array( mysql_query( "SELECT * FROM tb_agenda WHERE id_agenda='$id_agenda'" ) );
    	echo "<div class=\"panel panel-kostum\">";
   echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"55px\"> &nbsp; &nbsp; AGENDA FORUM KEMITRAAN PENGEMBANGAN EKONOMI LOKAL</div>";
  echo "</div>";
		echo "<h1>".$sql['judul_agenda']."</h1>";
	$tanggal = $sql["tanggal_agenda"];
		echo "<i><p>Tanggal : ".date( "d-m-Y", strtotime($tanggal) )." | Dilihat : ".$sql['dibaca']." kali </p></i>";
		$tampil = $sql['gambar'];
	    echo"<img src=\"../files/thumb_$tampil\">";
	    echo"<br><br><br>";
	    echo "<div class=\"panel panel-kostum\">";
    echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"55px\">&nbsp;&nbsp;DESKRIPSI AGENDA</div>";
   echo"<div class=\"panel-body\">".$sql['isi_agenda']."</div>";
   echo "</div>";
     ?>
     </section>

</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../dist/js/app.min.js"></script>
</body>
</html>