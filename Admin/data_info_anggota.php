<?php
include '../Koneksi/Koneksi.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FUM | Anggota</title>
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

 <div class="content-wrapper" style="background-color:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User Forum Usaha Mandiri Kota Cimahi
       
      </h1>
      <hr>
    </section>
     <section class="content">

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
  <table class="col-md-2">
    <tr>
      <td>Jumlah Record</td>    
      <td><?php echo $jum; ?></td>
    </tr>
     <tr>
      <td>Jumlah Halaman</td>    
      <td><?php echo $halaman; ?></td>
    </tr>
  </table>
  <a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
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
    <th class="col-md-2">Password</th>
  
    <th class="col-md-3">Email</th>
    <th class="col-md-1">Tanggal</th>
    <th class="col-md-1">Status</th>
    
    <!-- <th class="col-md-1">Sisa</th>    -->
    <th class="col-md-3">Opsi</th>
  </tr>
  <?php 
  

  if(isset($_GET['cari'])){
    $cari=mysql_real_escape_string($_GET['cari']);

    $usr=mysql_query("select * from tb_user where username like '$cari'");
   }else if ($cari!='') {
    }else{
      $usr=mysql_query("select * from tb_user limit $start, $per_hal");
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
      <td><?php echo $b['password'] ?></td>
      <td><?php echo $b['email'] ?></td>
     <td><?php echo ''.date( "d-m-Y", strtotime($tanggal) ); ?></td>
      <td><?php echo $b['status'] ?></td>
      
      <td>
      
        <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='../ClassFUM/proses_anggota.php?aksi=hapususer&id_hapus=<?php echo $b['user_id']; ?>' }" class="btn btn-danger">Hapus</a>
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
        <h4 class="modal-title">Tambah Admin Baru</h4>
      </div>
      <div class="modal-body">
           <form  enctype= "multipart/form-data"  action="../ClassFUM/proses_anggota.php?aksi=tambahadmin" method="post" name="daftar" id="myform">
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" id="email" class="form-control" placeholder="FK-PEL@gmail.com">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input name="user" type="text" id="user" class="form-control" placeholder="Username ..">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="pass1" type="password" id="pass" class="form-control" placeholder="Masukan Password ..">
          </div>
           <div class="form-group">
            <label>Konfirmasi Password</label>
            <input name="pass2" type="password" id="pass1" class="form-control" placeholder="Masukan Password ..">
          </div>                         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>

      
</section>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../dist/js/app.min.js"></script>

<script>

 $("#myModal").on("hidden.bs.modal",function(){
        myform.reset();
});
</script>
</body>
</html>