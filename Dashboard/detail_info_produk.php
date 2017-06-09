<?php
session_start();
include '../koneksi/koneksi.php';
?>
<html>
	<head>
		<title> FUM| Data Produk  </title>
		<link rel="stylesheet" type="text/css" href="../assets2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../assets2/css/bootstrap.min.css">
<link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
  
	</head>
<body>
<div class="container">
	<div class="row">
		<?php
			include 'navbar_produk.php'
		?>

<br><br><br><br><br>

<div class="col-md-6">
<?php

$id_prd=mysql_real_escape_string($_GET['id']);

	# code...


$det=mysql_query("SELECT * from tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_user on tb_info_produk.user_id = tb_user.user_id INNER JOIN tb_anggota on tb_anggota.user_id = tb_user.user_id where id_info_produk='$id_prd'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	if ($d['user_id']==$_SESSION['user_id']) {
		
	
  
   
     $sql = mysql_fetch_array( mysql_query("SELECT * from tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk where id_info_produk='$id_prd'" ) );
    	echo "<div class=\"panel panel-kostum\">";
   echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp;DETAIL INFORMASI PRODUK</div>";
  echo "</div>";
		echo "<h1>".$d['nama_produk']."</h1>";
	$tanggal = $d["tanggal"];
		echo "<i><p>Tanggal Post : ".date( "d-m-Y", strtotime($tanggal) )." | Dilihat : ".$sql['dibaca']." kali | Kategori : ".$d['nama_cat']." </p></i> ";
		$tampil = $d['foto_produk'];
	    echo"<img class=\"img-responsive\"src=\"../files/thumb_$tampil\" width=\"550\">";
	    echo"<br>";
	    echo "<a href=\"data_info_produk.php\" class=\"btn btn-danger\">Kembali</a>";
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
	   echo"<div class=\"panel-body\"><span style=\"line-height:30px\">".$d['deskripsi_produk']."</span></div>";
    	echo "</div>";
    	 echo"</div>";
	
}
}
?>
</div>
</div>
</div>
</body>
</html>