<?php
include '../Koneksi/Koneksi.php'

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FUM | Ganti Password</title>
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
      <h1>
        Ganti Password Forum Usaha Mandiri Kota Cimahi
       
      </h1>
      <hr>
    </section>
     <section class="content">
<?php 
if(isset($_GET['pesan'])){
	$pesan=mysql_real_escape_string($_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger'>Password gagal di ganti !!     Periksa Kembali Password yang anda masukkan !!</div>";
	}else if($pesan=="tdksama"){
		echo "<div class='alert alert-warning'>Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div>";
	}else if($pesan=="oke"){
		echo "<div class='alert alert-success'>Password Berhasil di ubah </div>";
	}
}
?>

<br/>
<div class="container">
<div class="col-md-5 col-md-offset-3">
	<form  enctype= "multipart/form-data"  action="../ClassFUM/proses_anggota.php?aksi=ubahpassword" method="post" name="daftar" id="myform">
		<div class="form-group">
			<input name="email" type="hidden" value="<?php echo $_SESSION['email']; ?>">
		</div>
	
		<div class="form-group">
			<label>Password Lama</label>
			<input name="pass_lama" type="password" class="form-control" placeholder="Password Lama ..">
		</div>
		<div class="form-group">
			<label>Password Baru</label>
			<input name="pass_baru" type="password" class="form-control" placeholder="Password Baru ..">
		</div>
		<div class="form-group">
			<label>Ulangi Password</label>
			<input name="pass_ulang" type="password" class="form-control" placeholder="Ulangi Password ..">
		</div>	
		<div class="form-group">
			<label></label>
			<input type="submit" class="btn btn-info" value="Simpan">
			<input type="reset" class="btn btn-danger" value="Reset">
		</div>																	
	</form>
</div>
</div>
</section>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../dist/js/app.min.js"></script>

<script>

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

/////NOTIFIKASI NAVIGASI BAR
 function ambil(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select",
        dataType:'json',
        success: function(response){
          $("#jumlah_info_produk").text(" "+response+"");
          timer = setTimeout("ambil()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil();
});
 function ambiltotal(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select1",
        dataType:'json',
        success: function(response){
          $("#jumlah_total_produk").text(" "+response+"");
          timer = setTimeout("ambiltotal()",5000);
        }
      });   
}
$(document).ready(function(){
  ambiltotal();
});

 function ambil2(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select2",
        dataType:'json',
        success: function(response){
          $("#jumlah_info_produk2").text(" "+response+"");
          timer = setTimeout("ambil2()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil2();
});

 function ambil3(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select3",
        dataType:'json',
        success: function(response){
          $("#jumlah_info_anggota").text(" "+response+"");
          timer = setTimeout("ambil3()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil3();
});


</script>
<script type="text/javascript">
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

$('.trash').click(function(){
    var id=$(this).data('id');
     $('#modalsetujui').attr('href','../ClassFUM/proses_produk.php?aksi=verifikasi_setuju&id='+id);
     $('#modaltolak').attr('href','../ClassFUM/proses_produk.php?aksi=verifikasi_tolak&id='+id);
})
</script>
</body>
</html>