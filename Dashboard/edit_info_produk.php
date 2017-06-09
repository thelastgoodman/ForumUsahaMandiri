<?php
session_start();
include '../Koneksi/Koneksi.php';
?>
<html>
	<head>
		<title> FUM | Edit Produk  </title>
		  <link rel="stylesheet" type="text/css" href="../assets2/css/bootstrap.css">
		  <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
		  <link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
		  <link rel="stylesheet" type="text/css" href="../assets2/js/jquery-ui/jquery-ui.css">
		  <script type="text/javascript" src="../assets2/js/jquery.js"></script>
		  <script type="text/javascript" src="../assets2/js/jquery.js"></script>
		  <script type="text/javascript" src="../assets2/js/bootstrap.js"></script>
		  <script type="text/javascript" src="../assets2/js/jquery-ui/jquery-ui.js"></script>  
	</head>
	<style>
body{
  background-color:#faf9f9;
}
</style>
<body>
<div class="container">
<?php

	include 'navbar_produk.php'
?>
<br><br><br><br><br>
	<div class="row">
<div class="col-md-8">

<?php

$id_brg=mysql_real_escape_string($_GET['id']);

$det =mysql_query(" SELECT * from tb_info_produk where id_info_produk='$id_brg'");
while($d=mysql_fetch_array($det)) {
	$kategori=$d['id_cat_produk'];
	$tanggal =$d['tanggal'];
	if ($d["user_id"]==$_SESSION["user_id"]) {
		# code...
?>					
		<form  enctype= "multipart/form-data"  action="../ClassFUM/proses_produk.php?aksi=editproduk" method="post" name="daftar" id="myform">
		<table class="table">
			
			<tr>
			
				<td>Nama Kategori</td>
				<td><select class='form-control' name='kategori'>";
	
	  <?php
	    $sql=mysql_query("SELECT * FROM tb_cat_produk ORDER BY nama_cat ASC");
		    if(mysql_num_rows($sql) != 0){
		        while($data = mysql_fetch_array($sql)){

		        	if ($kategori==$data['id_cat_produk']) {
		        		# code...
		        	 echo "<option value=$data[id_cat_produk] selected >$data[nama_cat]</option>";  
		            } 
		             echo "<option value=$data[id_cat_produk]>$data[nama_cat]</option>";
	        }
	    } 

?>
</select>
	    </td>
			</tr>
			<tr>
				<td>Nama Produk</td>
				<td><input type="hidden" class="form-control" name="id" id="id" value="<?php echo $d['id_info_produk'] ?>">
				<input type="text" class="form-control" name="napro" id="nama" value="<?php echo $d['nama_produk'] ?>"></td>
			</tr>
			<tr>
			<tr><td>Gambar Produk </td><td><img src="../files/thumb_<?php echo $d['foto_produk']?>"> </td></tr>
			<td></td><td><input type=file name="fupload1" id="foto" required> </td>
			</tr>
			<tr>
				<td>No Telp / Handphone</td>
				<td><input type="text" onkeyup="validAngka(this)" class="form-control" name="tlp" id="tlp" value="<?php echo $d['no_telp'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat Workshop</td>
				<td><input type="hidden" class="form-control" name="tanggal" id="tanggal" value="<?php echo $d['tanggal']?>">
				<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $d['alamat_workshop'] ?>"></td>
			</tr>
			<tr>
				<td>Kecamatan</td>
				<td><input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?php echo $d['kecamatan'] ?>"></td>
			</tr>
			<tr>
				<td>Kelurahan</td>
				<td><input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?php echo $d['kelurahan'] ?>"></td>
			</tr>
			
			

				<td></td>
				<td><input type="submit" class="btn btn-danger" value="Simpan">
				<a class="btn btn-default" href="data_info_produk.php">Kembali</td>
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
<script>
function validAngka(a){
  if(!/^[0-9.]+$/.test(a.value)) {
  a.value = a.value.substring(0,a.value.length-1000);
  document.getElementById("pesan_error_tlp").innerHTML = "(Hanya menggunakan Angka)";
    return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_tlp").innerHTML = ""; 
  }
}
function clearform()
{ 

   document.getElementById("myForm2").reset();

}
</script>
</body>
</html>

<!-- //MODAL NOTIF HAPUS -->
<script type="text/javascript">
  $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     var myNapem = $(this).data('napem');
     var myNapro= $(this).data('nama');
     var myKategori = $(this).data('kategori');
     var myFoto = $(this).data('foto');
     var myDeskripsi= $(this).data('deskripsi');
 
     $(".modal-body #napem").val( myNapem );
     $(".modal-body #naproo").val( myNapro );
     $(".modal-body #kat").val( myKategori );
     $(".modal-body #foto").val( myFoto );
     $("#foto").attr("src", myFoto);    
      $(".modal-body #deskk").val( myDeskripsi );

});

</script>
<!-- //MODAL NOTIF HAPUS -->
<script type="text/javascript">
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
<!-- //MODAL HAPUS -->