<?php
session_start();
include '../Koneksi/Koneksi.php'
?>
<html>
	<head>
		<title>FUM | Edit Informasi </title>
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
include 'navbar.php';
?>
<br><br><br><br><br><br><br>
<div class="col-md-7">
  
<?php 
  if (isset($_GET['st'])) {
    if ($_GET['st']==1) {
     echo "<div class='alert alert-success fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Informasi Anda Berhasil Di Update';
  echo "</div>";
    }
}
?>

<?php

$id_brg=mysql_real_escape_string($_GET['id']);

$det =mysql_query(" SELECT * FROM tb_user INNER JOIN tb_anggota on tb_user.user_id=tb_anggota.user_id");
while($d=mysql_fetch_array($det)) {
	if ($d["user_id"]==$_SESSION["user_id"]) {
		# code...
?>					
	<form enctype= "multipart/form-data"  action="../ClassFUM/proses_anggota.php?aksi=info_anggota" method="post" name="updateinfo" id="myform">
		
		<table class="table">
		
			<tr>

				<td>Nama Lengkap</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama_lengkap'] ?>">
					<input type="hidden" class="form-control" name="id" value="<?php echo $d['id_anggota'] ?>"
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>"></td>
			</tr>
			<tr>
			<tr><td>Foto </td><td><img class="img-circle" width="100" height="100"  src="../files/thumb_<?php echo $d['foto_user']?>"> </td></tr>
			<td></td><td><input type="file" name="fupload" required> </td>
			</tr>
			

				<td></td>
				<td><input type="submit" class="btn btn-danger2" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
}
?>
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