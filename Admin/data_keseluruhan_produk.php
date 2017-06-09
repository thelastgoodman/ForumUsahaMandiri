<?php
include '../Koneksi/Koneksi.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FUM | Rekap Produk</title>
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
        Data Info Produk Forum Usaha Mandiri Kota Cimahi
       
      </h1>
    </section>
     <section class="content">
<div class="panel">
  <div class="panel-body">

<?php 

$per_hal=20;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_info_produk ");


   

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
    echo '<strong>Sukses!</strong> Data Produk Berhasil Di Hapus';
  echo "</div>";
    }elseif ($_GET['st']==3) {

        echo "<div class='alert alert-success fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Produk Telah di Setujui ';
  echo "</div>";
    } elseif ($_GET['st']==4) {

        echo "<div class='alert alert-success fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Data Agenda Berhasil Di Update';
  echo "</div>";
    } elseif ($_GET['st']==5) {

        echo "<div class='alert alert-danger fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Produk telah di tolak';
  echo "</div>";
    }     
  }
  
 ?>
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
  <a style="margin-bottom:10px" data-target="#myModal1" data-toggle="modal" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>

 <div class="col-md-5 col-md-offset-3" style="margin-top:-8px;">
 <?php
echo"<form class=\"navbar-form navbar-right\" role=\"search\" action=\"\" method=\"post\">";          
    echo"<div class=\"form-group\">";
   echo "<select class='input-large form-control' <select name=\"search\">";
   echo" <option>---- Urutkan Berdasarkan Kategori Produk ----</option>";
    
   
    $sql = mysql_query("SELECT * FROM tb_cat_produk ORDER BY nama_cat ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_array($sql)){
            echo '<option>'.$data['nama_cat'].'</option>';
        }
    }
   
echo"</select>";
    echo"</div>";
    echo"<button type=\"submit\" name=\"button\"class=\"btn btn-primary\">Urutkan</button>";
    echo"</form>";
  ?>
    
      </div>

<form action="cari_act9.php" method="get">
  <div class="input-group col-md-4 col-md-offset-8">
  <form class="navbar-form navbar-right" role="search" action="" method="post">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
    <input type="text" class="form-control" placeholder="Cari Produk di sini .." aria-describedby="basic-addon1" name="cari"> 
    </form>
  </div>
</form>
<br/>
<table class="table table-hover"  style="border-color:black; ">
  <tr>
    <th>No</th>
    <th>Nama Produk</th>
    <th>Pemilik</th>
  
    <th>Kategori</th>
    <th >Gambar</th>
    <th class="col-md-1">Tanggal</th>
    <th class="col-md-3">Deskripsi</th>
     <th>Alamat </th>
    <th>Disetujui</th>
    <!-- <th class="col-md-1">Sisa</th>    -->
   
  </tr>
  <?php 
  if (isset($_POST['button'])) {
   $search = $_POST['search']; 
  
    $brg=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_anggota ON tb_info_produk.user_id=tb_anggota.user_id where nama_cat like '%$search%'");
    }elseif (isset($_GET['cari'])){
    $cari=mysql_real_escape_string($_GET['cari']);
    $brg=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_anggota ON tb_info_produk.user_id=tb_anggota.user_id where nama_produk like '%$cari%' ");
     
    }else{
     $brg=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_anggota ON tb_info_produk.user_id=tb_anggota.user_id ORDER BY id_info_produk DESC limit $start, $per_hal ");}
     
    $cek=mysql_num_rows($brg);
    if ($cek<1){
         echo "<tr height=\"40\"><td colspan=\"12\" align=\"center\">Maaf Data Produk tidak ada</td></tr>";   
    }
  $no=1;
  while($b=mysql_fetch_array($brg)){
    $tanggal = $b ["tanggal"];
  ?>

    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $b['nama_produk'] ?></td>
      <td><?php echo $b['nama_lengkap'] ?></td>
       <td><?php echo $b['nama_cat'] ?></td>
      <td><img src="../files/thumb_<?php echo $b['foto_produk']; ?>" width="120px" class="img-thumbnail"></td>
       <td><?php echo ''.date( "d-m-Y", strtotime($tanggal) ); ?></td>
	  <td><?php echo ''.substr($b['deskripsi_produk'],0,150)."..";?></td>
      <td><?php echo $b['alamat_workshop'] ?></td>
      <td><?php echo $b['disetujui'] ?></td>
    
    </tr>   
    <?php 
  
}

  ?>
  <div class="modal small fade" id="tolak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h3 id="myModalLabel">Konfirmasi Persetujuan</h3>

            </div>
            <div class="modal-body">
                <p class="error-text"><i class="fa fa-warning modal-icon"></i> Apakah anda yakin menolak produk ini?
                   
            </div>
            <div class="modal-footer">
               <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button> <a href="#" class="btn btn-danger"  id="modalDelete" >Tolak Produk</a>

            </div>
        </div>
    </div>
</div>
  
   <div class="modal small fade" id="setujui" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h3 id="myModalLabel">Konfirmasi Persetujuan</h3>

            </div>
            <div class="modal-body">
                <p class="error-text"><i class="fa fa-warning modal-icon"></i> Apakah anda yakin menyetujui produk ini?
                   
            </div>
            <div class="modal-footer">
               <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button> <a href="#" class="btn btn-success"  id="modalDelete2" >Setujui Produk</a>

            </div>
        </div>
    </div>
</div>
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
   

<table><center>
<a href="Laporan/lap_kes_produk_xls.php"><button type="button" class="btn btn-warning">Eksport Excel</button></a> || 
<a href="Laporan/lap_kes_produk.php"><button type="button" class="btn btn-danger">Eksport PDF</button></a> ||
<a href="Laporan/lap_kes_produk_doc.php"><button type="button" class="btn btn-info">Eksport Word</button></a>
    </table></center>
      
</section>
</div>
</div>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../dist/js/app.min.js"></script>

<script>

 $("#myModal").on("hidden.bs.modal",function(){
        myform.reset();
});

 $('.trash').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','../ClassFK-PEL/proses_produk.php?aksi=verifikasi_tolak&id='+id);
    $('#modalDelete2').attr('href','../ClassFK-PEL/proses_produk.php?aksi=verifikasi_setuju&id='+id);
})

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

</script>
<script type="text/javascript">
  function validasi(){
var tglAwal = document.getElementById("tglAwal").value;
var tglKe = document.getElementById("tglKe").value;
if (tglAwal=='') {
   document.getElementById("pesan_error_tgl").innerHTML = "(Harap Memilih Tanggal)";
   document.daftar.tglAwal.focus();
  
   return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_tgl").innerHTML = ""; 
}

if (tglKe=='') {
   document.getElementById("pesan_error_tgl").innerHTML = "(Harap Memilih Tanggal)";
   document.daftar.tglKe.focus();
  
   return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_tgl").innerHTML = ""; 
}
  }
</script>
  <div id="myModal1" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Produk Per Tanggal</h4>
              </div>
              <form action="Laporan/lap_kes_produktgl.php" method="GET" name="daftar" id="daftar">
              <div class="modal-body">
                 <div class="form-group">
                   <label >Dari tanggal<font color="red" >* <p id='pesan_error_tgl'></p></font></label>
                   <input type="date"  id="tglAwal" name="tglAwal" class="form-control ng-invalid ng-invalid-required" ng-model="model.date" >
            
                </div>
                <div class="form-group">
                   <label >Ke tanggal<font color="red" >* <p id='pesan_error_tgl'></p></font></label>
                   <input type="date"  id="tglKe" name="tglKe" class="form-control ng-invalid ng-invalid-required" ng-model="model.date" >
          
                                
              </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-primary" width="40px" onclick="return validasi()">Cetak</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
              </form>
            </div>
          </div>
        </div> <!-- /.Tutup Modal -->
</body>
</html>