<?php
session_start();
include '../Koneksi/Koneksi.php'
?>
<html>
	<head>
		<title>FUM| Ganti Password </title>
		<link rel="stylesheet" href="../assets2/css/bootstrap.css">
		<link rel="stylesheet" href="../assets2/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets2/css/styles1.css">
    <link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
      <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>
<style>
body{
  background-color:#faf9f9;
}
</style>
<body>
<div class="container">
  <div class="row">
<?php
include 'navbar.php'
?>

<br><br><br><br><br>
<div class="col-md-7">
<?php 
if(isset($_GET['pesan'])){
	$pesan=mysql_real_escape_string($_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger fade in'>";
		echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
		echo "Password gagal di ganti !!Periksa Kembali Password yang anda masukkan !!</div>";
	}else if($pesan=="tdksama"){
		echo "<div class='alert alert-warning fade in'>";
		echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
		echo "Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div>";
	}else if($pesan=="oke"){
		echo "<div class='alert alert-success fade in '>";
		echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
		echo" <strong>Sukses!</strong>Password Berhasil di ubah </div>";
	}
}
?>
</div>
<br/>
<div class="col-md-5 ">
<hr>
	<form action="ganti_pass_act.php" method="post">
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
			<input type="reset" class="btn btn-danger" value="Batal">
		</div>																	
	</form>
</div>
</div>
</div>
</body>
</html>
<script type="text/javascript">


 function ambil1(){
  $.ajax({
        type: "POST",
        url: "aksi_pesan.php?act=select1",
        dataType:'json',
        success: function(response){
          $("#jumlah_postingan").text(" "+response+"");
          timer = setTimeout("ambil1()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil1();
});
 function update(){
  $.ajax({
        type: "POST",
        url: "aksi_pesan.php?act=update",
        dataType:'json',
        success: function(response){
          $("#cek").text(" "+response+"");
          timer = setTimeout("update()",5000);
        }
      });   
}
$(document).ready(function(){
  update();
});
 function ambil2(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select2",
        dataType:'json',
        success: function(response){
          $("#jumlah_ygbelumdisetujui").text(" "+response+"");
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
          $("#jumlah_disetujui").text(" "+response+"");
          timer = setTimeout("ambil3()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil3();
});

 function ambil4(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select4",
        dataType:'json',
        success: function(response){
          $("#jumlah_ditolak").text(" "+response+"");
          timer = setTimeout("ambil4()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil4();
});
 function ambil5(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select5",
        dataType:'json',
        success: function(response){
          $("#jumlah_disetujui2").text(" "+response+"");
          timer = setTimeout("ambil5()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil5();
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
     $(".modal-body #napem").val( myNapem );
     $(".modal-body #napro").val( myNapro );
     $(".modal-body #kat").val( myKategori );
     $(".modal-body #foto").val( myFoto );
     $("#foto").attr("src", myFoto);    
     $(".modal-body #desk").val( myDeskripsi );
     $(".modal-body #desk2").val( myDeskripsi2 );

});

</script>