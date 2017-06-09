<?php
session_start();
include '../koneksi/koneksi.php';
?>
<html>
	<head>
		<title> FUM| Data Produk  </title>
		<link rel="stylesheet" href="../assets2/css/bootstrap.css">
		<link rel="stylesheet" href="../assets2/css/bootstrap.min.css">

<link rel="stylesheet" href="../assets2/css/styles1.css">
<link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
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
<script type="text/javascript">

// $(window).load(function(){
//         $('#welcomeuser').modal('show');
//     });

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
 
     $(".modal-body #napem").val( myNapem );
     $(".modal-body #napro").val( myNapro );
     $(".modal-body #kat").val( myKategori );
     $(".modal-body #foto").val( myFoto );
     $("#foto").attr("src", myFoto);    
      $(".modal-body #desk").val( myDeskripsi );


});

$('.trash2').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','hapus_detail_produk.php?id='+id);
})

</script>