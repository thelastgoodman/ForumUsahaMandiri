<?php
session_start();
include 'koneksi/koneksi.php';
?>
<html>
  <head>
    <title> FUM | Data Produk  </title>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/bootstrap.css">
            <script src="assets/js/jquery.js"></script>
            <link href="assets/css/landing-page.css" rel="stylesheet">
            <link href="assets/css/font-awesome.min.css" rel="stylesheet">
            <link href="assets/css/font-awesome.css" rel="stylesheet">
            <link href="assets/css/testi.css" rel="stylesheet">
  
  </head>

<body>
<div class="container-fluid">
  <div class="row">
      <?php
      include 'navbar.php'
    ?>

<br><br><br><br>

<div class="col-md-7">
<?php

$id_prd=mysql_real_escape_string($_GET['id']);

  # code...


$det=mysql_query("SELECT * from tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_user on tb_info_produk.user_id = tb_user.user_id INNER JOIN tb_anggota on tb_anggota.user_id = tb_user.user_id where id_info_produk='$id_prd'")or die(mysql_error());
while($d=mysql_fetch_array($det)){

    
  
  
     $sql_update_baca = mysql_query("UPDATE tb_info_produk set dibaca =dibaca+1 WHERE id_info_produk='$id_prd'");
     $sql = mysql_fetch_array( mysql_query("SELECT * from tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk where id_info_produk='$id_prd'" ) );
      echo "<div class=\"panel panel-kostum\">";
    echo "<div class=\"panel-heading\"style='background:#f8f8f8; color:Gray;font-family:Helvetica; font-size:16px;' ><img src='assets2/images/bgpinggir.png' width=\"8px\" height=\"30px\"> &nbsp; Detail Informasi Produk</div>  ";
  echo "</div>";
    echo "<h1>".$d['nama_produk']."</h1>";
  $tanggal = $d["tanggal"];
    echo "<i><p>Tanggal Post : ".date( "d-m-Y", strtotime($tanggal) )." | Dilihat : ".$sql['dibaca']." kali | Kategori : ".$d['nama_cat']." </p></i> ";
    $tampil = $d['foto_produk'];
      echo"<img src=\"files/thumb_$tampil\" width=\"620\" >";
       echo"<br><br><br><br>";
      
     
        
      echo "<div class=\"panel panel-kostum\">";
      echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;font-family:Helvetica; font-size:14px;' ><img src='assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Nama Pemilik</div>";
      echo"<span style=\"line-height:25px;font-family:Helvetica; font-size:13px; text-align:justify;\"><div class=\"panel-body\">".$d['nama_lengkap']."</div></span>";

        echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;font-family:Helvetica; font-size:14px;' ><img src='assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Nama Usaha</div>";
      echo"<span style=\"line-height:25px;font-family:Helvetica; font-size:13px; text-align:justify;\"><div class=\"panel-body\">".$d['nama_produk']."</div></span>";


      echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;font-family:Helvetica; font-size:14px;' ><img src='assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Alamat Workshop </div>";
      echo"<span style=\"line-height:25px;font-family:Helvetica; font-size:13px; text-align:justify;\"><div class=\"panel-body\">".$d['alamat_workshop']."</div></span>";


      echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Kecamatan</div>";
      echo"<div class=\"panel-body\">".$d['kecamatan']."</div>";
      echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;' ><img src='assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Kelurahan</div>";
      echo"<div class=\"panel-body\">".$d['kelurahan']."</div>";


      echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;font-family:Helvetica; font-size:14px;' ><img src='assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Klasifikasi Usaha</div>";
      echo"<span style=\"line-height:25px;font-family:Helvetica; font-size:13px; text-align:justify;\"><div class=\"panel-body\">".$d['klasifikasi']."</div></span>";
      
      echo "<div class=\"panel-heading\"style='background:#f7f7f7; color:Gray;font-family:Helvetica; font-size:14px;' ><img src='assets2/images/bgpinggir.png' width=\"10px\" height=\"35px\"> &nbsp; Kegiatan Utama</div>";
      echo"<span style=\"line-height:25px;font-family:Helvetica; font-size:13px; text-align:justify;\"><div class=\"panel-body\">".$d['deskripsi_produk']."</div></span>";


     
     
      echo "</div>";
    
}

?>
</div>
      <div class="col-md-5">
      <?php
              $sql=mysql_query("SELECT * FROM tb_info_produk  WHERE disetujui='Ya' ORDER BY id_info_produk DESC LIMIT 0,10");
  $cek=mysql_num_rows($sql);
  
  echo "<div class=\"panel panel-kostum\">";
    echo "<div class=\"panel-heading\"style='background:#f8f8f8; color:Gray;font-family:Helvetica; font-size:16px;' ><img src='assets2/images/bgpinggir.png' width=\"8px\" height=\"30px\"> &nbsp; Produk Lainya</div>  ";
    echo "<ul class=\"list-group\"> ";
    $no=1;
      if( mysql_num_rows( $sql ) == 0 ) { 
        echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Maaf Produk Belum Tersedia saat ini....</td></tr>"; 
    }else{
  while ($data=mysql_fetch_array($sql)) {

    $tanggal=$data['tanggal'];
  ?>
      <li class="list-group-item">
          <div class="media">
            <div class="media-left media-middle">

                 <img class="media-object" src="files/thumb_<?php echo $data['foto_produk']?>" width="67px" height="60px" alt="...">
            </div>

            <div class="media-body">
        <?php
                 echo"<p class=\"media-heading\"><a style=\"text-decoration:none;font-size:15px;\" href=\"ads_detail_produk.php?id={$data['id_info_produk']}\">";
        ?>


      <?php echo $data['nama_produk']?></a><br><span style="font-size: 11px; font-style: italic; color:grey; line-height: 1.3em;">
      <i><span style="color:grey;font-family:Helvetica;font-weight:normal;"> <?php echo ''.date('j-F-Y', strtotime($tanggal) ) ?></span> </i>
        </div>
     <?php
    } 
  
 echo "</div>";
  }
?>


</div>

      </div>
</body>
</html>
