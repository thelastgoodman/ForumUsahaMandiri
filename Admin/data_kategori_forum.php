<?php
include '../Koneksi/Koneksi.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FUM| Kategori Forum</title>
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kategori Forum Usaha Mandiri Kota Cimahi
       
      </h1>
     
    </section>
     <section class="content">
<div class="panel">
  <div class="panel-body">

<br><br>



<?php 

$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_forum_kategori");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
 
    <?php 
 if (isset($_GET['st'])) {
    if ($_GET['st']==1) {
     echo "<div class='alert alert-success fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Data Kategori berhasil di Update';
  echo "</div>";
    }elseif ($_GET['st']==2) {

        echo "<div class='alert alert-danger fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Data Kategori Berhasil Di Hapus';
  echo "</div>";

  
    }       
  }
  
 ?>
  <a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<!--  <table class="col-md-2">
    <tr>
      <td>Jumlah Record</td>    
      <td><?php echo $jum; ?></td>
    </tr>
   <tr>
      <td>Jumlah Halaman</td>    
      <td><?php echo $halaman; ?></td>
    </tr>
  </table> -->
<form action="cari_act7.php" method="get">
  <div class="input-group col-md-5 col-md-offset-7">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
    <input type="text" class="form-control" placeholder="Cari Nama kategori di sini .." aria-describedby="basic-addon1" name="cari"> 
  </div>
</form>
<br/>
<table class="table table-hover"  style="border-color:black;">
  <tr>
    <th>No</th>
    <th class="col-md-2">Nama User</th>
    <th>Kategori Forum</th>
  
    <th class="col-md-4">Deskripsi Forum</th>
    <th >Tanggal</th>
   
    <!-- <th class="col-md-1">Sisa</th>    -->
    <th class="col-md-2">Opsi</th>
  </tr>
  <?php 
  

  if(isset($_GET['cari'])){
    $cari=mysql_real_escape_string($_GET['cari']);

    $brg=mysql_query("select * from tb_forum_kategori where kat_nama_forum like '$cari'");
   }else if ($cari!='') {
    }else{
      $brg=mysql_query("select * from tb_forum_kategori inner join tb_user on tb_forum_kategori.user_id=tb_user.user_id order by kategori_id desc limit $start, $per_hal");
    }
    $cek=mysql_num_rows($brg);
    if ($cek<1) {
      echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Maaf Kategori Forum tidak ada</td></tr>";       
    }
  $no=1;
  while($b=mysql_fetch_array($brg)){
    $tanggal = $b ["tanggal_kategori"];
    
    ?>
    <tr>
       <td><?php echo $no++ ?></td>
       <td><?php echo $b['username'] ?></td>
       <td><?php echo $b['kat_nama_kategori'] ?></td>
	   <td><?php echo $b['kat_desk_kategori'] ?></td>
       <td><?php echo ''.date( "d-m-Y", strtotime($tanggal) ); ?></td>
      <td>
       

         <a href="edit_kategori_forum.php?id=<?php echo $b['kategori_id']; ?>" class="btn btn-warning" title="Edit"><span class="glyphicon glyphicon-edit"></a>
        <a onclick="return confirm('Apakah anda yakin menghapus data ini ?');" href="../ClassFUM/proses_forum.php?aksi=hapuskategori&id=<?php echo $b['kategori_id']; ?>" class="btn btn-danger"title="Hapus"><span class="glyphicon glyphicon-trash"></a>
      </td>
    </tr>   
    <?php 
  
}
  ?>
  
  
</table>
<ul class="pagination">     
      <?php 
      for($x=1;$x<=$halaman;$x++){
        ?>
        <li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
        <?php
      }
      ?>            
    </ul>
    <!-- modal input -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Kategori Baru</h4>
      </div>
      <div class="modal-body">
       <form  enctype= "multipart/form-data"  action="../ClassFUM/proses_forum.php?aksi=tambahkategori" method="post" name="forum" id="myform">
        
          <div class="form-group">
            <label><font color="red" ><p id='pesan_error_judul'></p></font></label>
            <input name="judul" type="text" id="judul" class="form-control" placeholder="Judul Agenda ..">
          </div>
          <div class="form-group">
			    <label for="exampleInputPassword1">Gambar Agenda<font color="red" >* (Harus Bertipe JPG)<p id='pesan_error_fp1'></p></font></label>
			    <input type="file" name="fupload1" id="fp1" required>
			  </div>
         <div class="form-group">
            <label>Isi Agenda<font color="red" ><p id='pesan_error_isi'></p></font></label>
            <input name="isi" type="text" id="isi" class="form-control" placeholder="Isi Agenda ..">
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

      
</section>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../dist/js/app.min.js"></script>
<script language="javascript">
function validasi(){ 

var judul = document.getElementById("judul").value;
var isi = document.getElementById("isi").value;


     
  if (judul == '') { //cek jika kosong
    document.getElementById("pesan_error_judul").innerHTML = "(Judul Agenda Tidak Boleh Kosong)";
   document.agenda.nama.focus();
  
   return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_judul").innerHTML = ""; 
  }
  
 
  if (isi == '') { //cek jika kosong
    document.getElementById("pesan_error_isi").innerHTML = "(Deskripsi Agenda Tidak Boleh Kosong)";
    document.agenda.isi.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_isi").innerHTML = ""; 
  }
}

 $("#myModal").on("hidden.bs.modal",function(){
   
myform.reset();
       
});
</script>

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
</div>
</div>
</body>
</html>