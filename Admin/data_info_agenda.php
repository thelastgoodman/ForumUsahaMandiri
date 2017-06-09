<?php
include '../Koneksi/Koneksi.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FUM| Agenda</title>
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
        Data Agenda Forum Usaha Mandiri Kota Cimahi
       
      </h1>
     
    </section>
     <section class="content">
<div class="panel">
  <div class="panel-body">
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Agenda</button>
<br><br>



<?php 

$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_agenda where terlaksana='belum'");
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
    echo '<strong>Sukses!</strong> Agenda Berhasil Di Tambahkan';
  echo "</div>";
    }elseif ($_GET['st']==2) {

        echo "<div class='alert alert-danger fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Data Agenda Berhasil Di Hapus';
  echo "</div>";
    }elseif ($_GET['st']==3) {

        echo "<div class='alert alert-info fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Status Agenda Berhasil Di Update';
  echo "</div>";
    } elseif ($_GET['st']==4) {

        echo "<div class='alert alert-success fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Data Agenda Berhasil Di Update';
  echo "</div>";
    }       
  }
  
 ?>
  <a style="margin-bottom:10px" href="Laporan/lap_info_agenda.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
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
<form action="cari_act2.php" method="get">
  <div class="input-group col-md-5 col-md-offset-7">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
    <input type="text" class="form-control" placeholder="Cari Agenda di sini .." aria-describedby="basic-addon1" name="cari"> 
  </div>
</form>
<br/>
<table class="table table-hover"  style="border-color:black;">
  <tr>
    <th>No</th>
    <th class="col-md-2">Judul</th>
    <th>Tanggal</th>
  
    <th class="col-md-4">Isi Agenda</th>
    <th >Gambar</th>
    <th >Dilihat</th>
    <th >Terlaksana</th>
    <!-- <th class="col-md-1">Sisa</th>    -->
    <th class="col-md-2">Opsi</th>
  </tr>
  <?php 
  

  if(isset($_GET['cari'])){
    $cari=mysql_real_escape_string($_GET['cari']);

    $brg=mysql_query("select * from tb_agenda where judul_agenda like '%$cari%'");
   }else if ($cari!='') {
    }else{
      $brg=mysql_query("select * from tb_agenda order by id_agenda desc limit $start, $per_hal");
    }
    $cek=mysql_num_rows($brg);
    if ($cek<1) {
      echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Maaf Data Agenda tidak ada</td></tr>";       
    }
  $no=1;
  while($b=mysql_fetch_array($brg)){
    $tanggal = $b ["tanggal_agenda"];
    if ($b['terlaksana']=='belum') {
      # code...
    
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $b['judul_agenda'] ?></td>
	  <td><?php echo ''.date( "d-m-Y", strtotime($tanggal) ); ?></td>
	  <td><?php echo $b['isi_agenda'] ?></td>
      <td><img src="../files/thumb_<?php echo $b['gambar']; ?>" width="120px" class="img-thumbnail"></td>
    <td><?php echo $b['dibaca'] ?> kali</td>
      <td><?php echo $b['terlaksana'] ?></td>
      <td>
       
        <a onclick="return confirm('Ubah Status ?')" href="../ClassFUM/proses_agenda.php?aksi=ubahstatagenda&id=<?php echo $b['id_agenda']; ?>" class="btn btn-info" title="Ubah Status"><span class="glyphicon glyphicon-ok"></a>
         <a href="edit_agenda.php?id=<?php echo $b['id_agenda']; ?>" class="btn btn-warning" title="Edit"><span class="glyphicon glyphicon-edit"></a>
        <a onclick="return confirm('Apakah anda yakin menghapus agenda ini ?');" href="../ClassFUM/proses_agenda.php?aksi=hapusagenda&id=<?php echo $b['id_agenda']; ?>" class="btn btn-danger"title="Hapus"><span class="glyphicon glyphicon-trash"></a>
      </td>
    </tr>   
    <?php 
  }
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
<div id="myModal" class="modal fade" data-backdrop="static"  aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-center">Tambah Agenda Baru</h4>
      </div>
      <div class="modal-body">
       <form  enctype= "multipart/form-data"  action="../ClassFUM/proses_agenda.php?aksi=simpanagenda" method="post" name="agenda" id="myform">
        
          <div class="form-group">
            <label>Judul Agenda<font color="red" ><p id='pesan_error_judul'></p></font></label>
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

      <table><center>
<a href="Laporan/lap_info_agenda_xls.php"><button type="button" class="btn btn-warning">Eksport Excel</button></a> || 
<a href="Laporan/lap_info_agenda.php"><button type="button" class="btn btn-danger">Eksport PDF</button></a> ||
<a href="Laporan/lap_info_agenda_doc.php"><button type="button" class="btn btn-info">Eksport Word</button></a>
    </table></center>
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
     $(".modal-body #bookId").val( myBookId );
     $(".modal-body #napem").val( myNapem );
     $(".modal-body #napro").val( myNapro );
     $(".modal-body #kat").val( myKategori );
     $(".modal-body #foto").val( myFoto );
     $("#foto").attr("src", myFoto);    
      $(".modal-body #desk").val( myDeskripsi );
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