<?php
@session_start();
if (@$_SESSION['Admin'] || @$_SESSION['AnggotaUKM'] || @$_SESSION['NONAnggotaUKM']) {
  # code...

include '../Koneksi/Koneksi.php'
?>
<html>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" href="../assets2/css/bootstrap.css">
		<link rel="stylesheet" href="../assets2/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets2/css/styles1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
        <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>
<style>
body{
  background-color:#faf9f9;
}

#testing a {
  color:#545454;
  font-size:14px;
  font-weight: 500px;
}
#testing a:hover {
  color :#f44238;
}
</style>
<body>
<div class="container">
 	 <div class="row">
      <?php
        include 'other_navbar.php'
      ?>
<br><br><br><br>

<div class="col-md-12">

<div class="col-md-3" style="padding-top:50px;">


<?php
	$sql=mysql_query("SELECT * FROM tb_forum_kategori INNER JOIN tb_user on tb_forum_kategori.user_id=tb_user.user_id ORDER BY kategori_id DESC ");
	$cek=mysql_num_rows($sql);
	
	echo "<div class=\"panel panel-kostum\">";
    echo "<div class=\"panel-heading\"style='background:#ebebeb; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"8px\" height=\"30px\"><span style=\"font-weight:bold;\"> &nbsp; Forum</div></span>  ";
 echo "<ul class=\"list-group\"> ";
    $no=1;
    	if( mysql_num_rows( $sql ) == 0 ) { 
    		echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Maaf Forum Belum Tersedia saat ini....</td></tr>"; 
    }else{
	while ($data=mysql_fetch_array($sql)) {

		$tanggal=$data['tanggal_kategori'];
	echo "<li class=\"list-group-item\">
		<div class=\"media\">
		 <div class=\"media-left media-middle\">

   <img class=\"media-object\" src=\"../files/thumb_{$data['gambar']}\" width=\"45px\" height=\"45px\" alt=\"...\"></div>
			<div class=\"media-body\">
   		 
			 <h5 class=\"media-heading\"><a title=\"{$data['kat_nama_kategori']}\"style=\"text-decoration:none;\" href=\"detail_kategori_forum.php?kat_id={$data['kategori_id']}\">
			{$data['kat_nama_kategori']}</a> </span><br><span style=\"font-size: 11px; font-style: italic; color:grey; line-height: 1.3em;\">
			<i> {$data['kat_desk_kategori']} </i>  ";
			
			$no++;
			echo "</div>";
		  echo "</div>";

		}

		   echo "</div>";	
	echo "<br>";


	
	if ($_SESSION['Admin']) {
		echo"<button style=\"margin-bottom:20px\" data-toggle=\"modal\" data-target=\"#myModal\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-plus\"></span>Tambah Kategori</button>";
		echo"<a href=\"../Admin/index.php\" style=\"margin-bottom:20px\" class=\"btn btn-default\">Kembali</a>";
	
}
	}
?>
                
	 </div>
	 <div class="col-md-4" style="padding-top:50px;">
<?php
	$sql=mysql_query("SELECT * FROM tb_forum_topik WHERE dilihat >= 5 ORDER BY id_topik DESC LIMIT 0,10 ");
	$cek=mysql_num_rows($sql);
	
	echo "<div class=\"panel panel-kostum\">";
    echo "<div class=\"panel-heading\"style='background:#ebebeb; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"8px\" height=\"30px\"> <span style=\"font-weight:bold;\"> &nbsp; Topik Populer</div></span>  ";
    echo "<ul class=\"list-group\"> ";
    $no=1;
    	if( mysql_num_rows( $sql ) == 0 ) { 
    		echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Maaf Forum Belum Tersedia saat ini....</td></tr>"; 
    }else{
	while ($data=mysql_fetch_array($sql)) {

		$tanggal=$data['tanggal_kategori'];
   		 echo "<li class=\"list-group-item\">
       <div id=\"testing\">
			<span><a title=\"{$data['judul_topik']}\" style=\"text-decoration:none; \" href=\"".SITE_URL."/detail_topik_forum.php?option=view-topik&topik_id={$data['id_topik']}  \">
			{$data['judul_topik']} </a></span></div>";
			
			$no++;
		}	
	
		 echo "</div>";
	
	}
?>
	 </div>

<div class="col-md-5" style="padding-top:50px;">
	 <div class="panel panel-kostum">
 		 <div class="panel-heading" style='background:#ebebeb; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width="8px" height="30px"><span style="font-weight:bold;"> &nbsp; Produk Usaha Popoler</div></span> 
 		 </div>
    
 	<?php
	$sql=mysql_query("SELECT * FROM tb_info_produk WHERE dibaca >=50 AND disetujui='Ya' ORDER BY id_info_produk DESC LIMIT 0,6")or die(mysql_error());
	while ($data=mysql_fetch_array($sql)) {
?>
 
      
          <div class="col-md-4">


            <div class="thumbnail" >
              <img src="../files/thumb_<?php echo $data['foto_produk']?>" width="300" height ="100"alt="...">
                 <div class="caption">         
                  <p style="font-size:12px;line-height:1.3em; "><?php echo $data['nama_produk'];?></p>
                  
 	               </div>
 	             <center><a title="<?php echo $data['nama_produk']?>" href="detail_hot_produk.php?id=<?php echo $data['id_info_produk']; ?>" class="btn btn-danger" >Lihat</a></center>
             </div>
  

        </div>
    
              
<?php
}
?>
  </div>      
</div>


<!-- !--/PRODUK Lainya  -->
<div class="col-lg-12" style="padding-top:50px;">
	 <div class="panel panel-kostum">
 		 <div class="panel-heading" style='background:#ebebeb; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width="8px" height="30px"><span style="font-weight:bold;"> &nbsp; Produk Usaha lainya </div></span> 
 		 </div>
    
 	<?php
	$sql=mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Ya' ORDER BY id_info_produk DESC LIMIT 0,12")or die(mysql_error());
	while ($data=mysql_fetch_array($sql)) {
?>
 
      
          <div class="col-sm-3">


            <div class="thumbnail" >
              <img src="../files/thumb_<?php echo $data['foto_produk']?>" width="300" height ="100"alt="...">
                 <div class="text-center caption">         
                  <p style="font-size:15px;line-height:1.3em; "><?php echo $data['nama_produk'];?></p>
                  
 	              </div>
 	             <h5><center><a title="<?php echo $data['nama_produk']?>" class="back-btn" href="detail_hot_produk.php?id=<?php echo $data['id_info_produk']?>" style="text-decoration:none;">Lihat Produk </a></center></h5>
            </div>
  

        </div>
    
              
<?php
}
?>
  </div>      
  
<div id="myModal" class="modal fade in " data-backdrop="static"  aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Kategori Forum</h4>
      </div>
      <div class="modal-body">
       <form  enctype= "multipart/form-data"  action="../ClassFK-PEL/proses_forum.php?aksi=tambah_kategori" method="post" name="forum" id="myform">
 
           <div class="form-group">
            <label>Nama Forum<font color="red" ><p id='pesan_error_nama'></p></font></label>
            <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Forum">
<input name="user_id" type="hidden" id="user_id" value ="<?php echo "".$_SESSION['user_id'] ?>" class="form-control" placeholder="Judul Topik">
<?php
echo "<input name=\"user_id\" type=\"hidden\" id=\"user_id\" value =\"".$_SESSION['user_id']."\" class=\"form-control\" placeholder=\"Judul Topik\"> ";
?>
          </div>
         <div class="form-group">
            <label>Deskripsi<font color="red" ><p id='pesan_error_desk'></p></font></label>
           <textarea class="form-control" placeholder="Deskripsi" name="desk" id="desk" rows="5"></textarea>
          </div>
          <div class="form-group">
			    <label for="exampleInputPassword1">Gambar Forum<font color="red" >* (Harus Bertipe JPG)<p id='pesan_error_fp1'></p></font></label>
			    <input type="file" name="fupload1" id="fp1" required>
		</div>
                                    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-primary" onclick="return validasi()" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>

</body>
</html>
<script type="text/javascript">
  function validasi (){
    var nama = document.getElementById("nama").value;
    var desk = document.getElementById("desk").value;


  if (nama == '') { //cek jika kosong
        document.getElementById("pesan_error_nama").innerHTML = "(Nama Forum Tidak Boleh Kosong)";
        document.forum.nama.focus();
  
        return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
        document.getElementById("pesan_error_nama").innerHTML = ""; 
  }

  if (desk == '') { //cek jika kosong
        document.getElementById("pesan_error_desk").innerHTML = "(Deskripsi Tidak Boleh Kosong)";
        document.forum.desk.focus();
  
        return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
        document.getElementById("pesan_error_desk").innerHTML = ""; 

  }
}

  $("#myModal").on("hidden.bs.modal",function(){
   
   myform.reset();
       
   });

</script>
<?php
}else{
header("location: ../login.php");
}
?>

