<?php
include '../Koneksi/Koneksi.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FUM | User</title>
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
 <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User Forum Usaha Mandiri Kota Cimahi
       
      </h1>
    </section>
     <section class="content">
<div class="panel">
  <div class="panel-body">
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Admin Baru</button>
<br/>
<br/>


<?php 

$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_user");
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
    echo '<strong>Sukses!</strong> Data Admin Berhasil di Tambahkan';
  echo "</div>";
} else if ($_GET['st']==2) {
     echo "<div class='alert alert-success fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Member berhasil di verifikasi';
  echo "</div>";
} else  if ($_GET['st']==3) {
     echo "<div class='alert alert-danger fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Member tidak di verifikasi';
  echo "</div>";
}
}
?>

  

</div>
<!--   <table class="col-md-2">
    <tr>
      <td>Jumlah Record</td>    
      <td><?php echo $jum; ?></td>
    </tr>
     <tr>
      <td>Jumlah Halaman</td>    
      <td><?php echo $halaman; ?></td>
    </tr>
  </table> -->
<form action="cari_act3.php" method="get">
  <div class="input-group col-md-5 col-md-offset-7">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
    <input type="text" class="form-control" placeholder="Cari User di sini .." aria-describedby="basic-addon1" name="cari"> 
  </div>
</form>
<br/>
<table class="table table-hover"  style="border-color:black;">
  <tr>
    <th class="col-md-1">No</th>
    <th class="col-md-2">Username</th>
   <!--  <th class="col-md-2">Password</th> -->
  
    <th class="col-md-3">Email</th>
    <th class="col-md-2">Tanggal</th>
    <th class="col-md-1">Status</th>
    
    <!-- <th class="col-md-1">Sisa</th>    -->
    <th class="col-md-1">Opsi</th>
  </tr>
  <?php 
  

  if(isset($_GET['cari'])){
    $cari=mysql_real_escape_string($_GET['cari']);

    $usr=mysql_query("select * from tb_user where username like '%$cari%'");
   }else if ($cari!='') {
    }else{
      $usr=mysql_query("select * from tb_user ORDER BY user_id desc limit $start, $per_hal");
    }
    $cek=mysql_num_rows($usr);
    if ($cek<1) {
      echo "<tr height=\"40\"><td colspan=\"12\" align=\"center\">Maaf Data User tidak ada</td></tr>";       
    }
  $no=1;
  while($b=mysql_fetch_array($usr)){
    $tanggal = $b ["member_date"];
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $b['username'] ?></td>
     
      <td><?php echo $b['email'] ?></td>
     <td><?php echo ''.date( "d-m-Y", strtotime($tanggal) ); ?></td>
      <td><?php echo $b['status'] ?></td>
      
      <td>
    
        <a onclick=" return confirm('Apakah anda yakin ingin menghapus data ini ??');" href="../ClassFUM/proses_anggota.php?aksi=hapususer&id_hapus=<?php echo $b['user_id']; ?>" class="btn btn-danger" title="Hapus"><span class="glyphicon glyphicon-trash"></a>
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
<div id="myModal" class="modal fade" data-backdrop="static"  aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-center">Tambah Admin Baru</h4>
      </div>
      <div class="modal-body">
           <form  enctype= "multipart/form-data"  action="../ClassFUM/proses_anggota.php?aksi=tambahadmin" method="post" name="tbluser" id="myform">
        <div class="form-group">
            <label>Email<font color="red" ><p id='pesan_error_email'></p></font></label>
            <input name="email" type="text" id="email" class="form-control" placeholder="FUM@gmail.com">
          </div>
          <div class="form-group">
            <label>Username<font color="red" ><p id='pesan_error_user'></p></font></label>
            <input name="user" type="text" id="user" class="form-control" placeholder="Username ..">
          </div>
          <div class="form-group">
            <label>Password<font color="red" ><p id='pesan_error_passlama'></p></font></label>
            <input name="pass" type="password" id="passlila" class="form-control" placeholder="Masukan Password ..">
          </div>
           <div class="form-group">
            <label>Konfirmasi Password<font color="red" ><p id='pesan_error_passbaru'></p></font></label>
            <input name="pass1" type="password" id="passanyar" class="form-control" placeholder="Masukan Konfirmasi Password ..">
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
</div>
</div>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../dist/js/app.min.js"></script>

<script language="javascript">
function validasi(){ 

var email = document.getElementById("email").value;
var user = document.getElementById("user").value;
var passlila = document.getElementById("passlila").value;
var passanyar= document.getElementById("passanyar").value;

     
  if (email == '') { //cek jika kosong
    document.getElementById("pesan_error_email").innerHTML = "(Email Tidak Boleh Kosong)";
   document.tbluser.email.focus();
  
   return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_email").innerHTML = ""; 
  }
  
  if (user == '') { //cek jika kosong
    document.getElementById("pesan_error_user").innerHTML = "(Username Tidak Boleh Kosong)";
    document.tbluser.user.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_user").innerHTML = ""; 
  }
   if (passlila == '') { //cek jika kosong
    document.getElementById("pesan_error_passlama").innerHTML = "(Password Tidak Boleh Kosong)";
    document.tbluser.passlila.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_passlama").innerHTML = ""; 
  }
  if (passanyar == '') { //cek jika kosong
    document.getElementById("pesan_error_passbaru").innerHTML = "(Konfirmasi Password Tidak Boleh Kosong)";
    document.tbluser.passanyar.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_passbaru").innerHTML = ""; 

 
  }
    if (passlila != passanyar) { //cek jika kosong
    document.getElementById("pesan_error_passbaru").innerHTML = "(Konfirmasi Password Tidak Sama)";
    document.tbluser.passanyar.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_passbaru").innerHTML = ""; 

 
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
</body>
</html>