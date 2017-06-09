<?php
include '../Koneksi/Koneksi.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FUM | Rekap Agenda</title>
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

 <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Anggota UKM di Forum Usaha Mandiri Kota Cimahi
       
      </h1>
    </section>
     <section class="content">
     <div class="panel">
      <div class="panel-body">
<a class="btn" href="data_info_anggotaukm.php">Kembali</a>
<br><br>

<?php

$id_agt=mysql_real_escape_string($_GET['id']);


$det=mysql_query("SELECT * FROM tb_anggota where id_anggota='$id_agt'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
  $tanggal=$d['tanggal'];
  ?>          
  <table class="table">
   <tr>
      <td>Foto</td>
      <td><img src="../files/thumb_<?php echo $d['foto_user']; ?>" width="80px" class="img-thumbnail"></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td><?php echo $d['nama_lengkap'] ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?php echo $d['alamat'] ?></td>
    </tr>
     <tr>
      <td>Email</td>
      <td><?php echo $d['email'] ?></td>
    </tr>
    <tr>
      <td>Tanggal Bergabung</td>
      <td><?php echo ''.date( "d-m-Y", strtotime($tanggal) ); ?></td>
    </tr>
   
    
  </table>
  <?php 
}
?>
      
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
</div>
</div>
</body>
</html>