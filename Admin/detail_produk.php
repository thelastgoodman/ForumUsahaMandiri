<?php
include '../Koneksi/Koneksi.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FUM| Detail Produk</title>
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

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori Produk
       
      </h1>
    
    </section>
     <section class="content">
     <div class="panel">
  <div class="panel-body">
<a class="btn" href="data_info_produk.php">Kembali</a>

<?php

$id_prd=mysql_real_escape_string($_GET['id']);


$det=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_anggota ON tb_info_produk.user_id=tb_anggota.user_id WHERE id_info_produk='$id_prd'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
  $tanggal=$d['tanggal'];
  ?>          
  <table class="table">
    <tr>
      <td class="col-md-2">Nama Produk</td>
      <td><?php echo $d['nama_produk'] ?></td>
    </tr>
    <tr>
      <td>Pemilik</td>
      <td><?php echo $d['nama_lengkap'] ?></td>
    </tr>
     <tr>
      <td>Kategori</td>
      <td><?php echo $d['nama_cat'] ?></td>
    </tr>
    <tr>
      <td>Klasifikasi Usaha</td>
      <td><?php echo $d['klasifikasi'] ?></td>
    </tr>
     <tr>
      <td>Gambar</td>
     <td><img src="../files/thumb_<?php echo $d['foto_produk']?>"> </td>
    </tr>
     <tr>
      <td>Tanggal</td>
      <td><?php echo ''.date( "d-m-Y", strtotime($tanggal) ); ?></td>
    </tr>
   
   
     <tr>
      <td>Alamat Workshop</td>
      <td><?php echo $d['alamat_workshop'] ?></td>
    </tr>
     <tr>
      <td>Kecamatan</td>
      <td><?php echo $d['kecamatan'] ?></td>
    </tr>
     <tr>
      <td>Kelurahan</td>
      <td><?php echo $d['kelurahan'] ?></td>
    </tr>
     <tr>
      <td>No Telp/HP</td>
      <td><?php echo $d['no_telp'] ?></td>
    </tr>
     <tr>
      <td>Disetujui</td>
      <td><?php echo $d['disetujui'] ?></td>
    </tr>
  </table>
  <?php 
}
?>
      
</section>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../dist/js/app.min.js"></script>

<script>

 $("#myModal").on("hidden.bs.modal",function(){
        myform.reset();
});
</script>
</div>
</div>
</body>
</html>
<script type="text/javascript">

/////NOTIFIKASI NAVIGASI BAR
 function AmbilProduk_nav(){
  $.ajax({
        type: "POST",
        url: "aksi_pesan.php?act=select4",
        dataType:'json',
        success: function(response){
          $("#jumlah_ygbelumdisetujui").text(" "+response+"");
          timer = setTimeout("AmbilProduk_nav()",5000);
        }
      });   
}
$(document).ready(function(){
  AmbilProduk_nav();
});
 function AmbilProduk_nav2(){
  $.ajax({
        type: "POST",
        url: "aksi_pesan.php?act=select4",
        dataType:'json',
        success: function(response){
          $("#jumlah_ygbelumdisetujui2").text(" "+response+"");
          timer = setTimeout("AmbilProduk_nav2()",5000);
        }
      });   
}
$(document).ready(function(){
  AmbilProduk_nav2();
});

  $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     var myNapem = $(this).data('napem');
     var myNapro= $(this).data('nama');
     var myKategori = $(this).data('kategori');
     var myFoto = $(this).data('foto');
     var myDeskripsi= $(this).data('deskripsi');
     var myDeskripsi2 = $(this).data('deskripsi2');
     $(".modal-body #bookId").val( myBookId );
     $(".modal-body #napem").val( myNapem );
     $(".modal-body #napro").val( myNapro );
     $(".modal-body #kat").val( myKategori );
      $(".modal-body #foto").val( myFoto );
     $("#foto").attr("src", myFoto);
    
     $(".modal-body #desk").val( myDeskripsi );
      $(".modal-body #desk2").val( myDeskripsi2 );
});
/////NOTIFIKASI NAVIGASI BAR
</script>