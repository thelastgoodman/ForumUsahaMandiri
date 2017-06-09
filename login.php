<?php 
session_start();
if(empty($_SESSION)){
 ?>

<!DOCTYPE html>
<html>
      <head>
      <title>FUM | Halaman login</title>
<link rel="icon" type="image/png" href="image/logobar.png">
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
   <script type="text/javascript" src="assets2/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>
   <link href="assets/css/landing-page.css" rel="stylesheet">
   <link rel="icon" type="assets2/images/png" href="assets2/images/logobar.png">


    <script type="text/javascript">
  function validasi() {
 var nama = document.getElementById("nama").value;
 var password = document.getElementById("password").value;
 var hitung_error = 0;
    
  //validasi nama
  if (nama == '') { //cek jika kosong
    document.getElementById("pesan_error_nama").innerHTML = "Username tidak boleh kosong";
    hitung_error += 1;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_nama").innerHTML = ""; 
  }
 
  //validasi password
  if (password == '') { //cek jika kosong
    document.getElementById("pesan_error_password").innerHTML = "Password tidak boleh kosong";
    hitung_error += 1;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_password").innerHTML = "";
  }
 
  //cek jumlah error
  if (hitung_error > 0) {
    return false;
  } else {
    return true;
  }
}
</script>
<style type="text/css">
  #pesan_error_nama{
    color:red;
  }
 
  #pesan_error_password{
    color:red;
  }
  </style>
  <style type="text/css">
  .kotak{ 
    margin-top: 150px;
  }

  .kotak .input-group{
    margin-bottom: 20px;
  }
  
 
</style>
      </head>
      <body>
      <div class="container">
    <?php 
    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "gagal"){
        echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</div>";
      }
    }
    ?>
    <div class="panel panel-default">
      <form action="vertifikasi.php" method="post">
        <div class="col-md-4 col-md-offset-4 kotak">
          <h3><center><img src="assets2/images/fumlogbdg.png" height="120"></center></h3>
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" id="nama" name="username" placeholder="Username" class="form-control"><p id='pesan_error_nama'></p>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" id="password" name="pass" placeholder="Password" class="form-control"><p id='pesan_error_password'></p>
          </div>
          <p><a href="daftar_anggotaukm.php">Daftar Baru? Klik </a></p>
          <div class="input-group">     
            <input type="submit" class="btn btn-primary" name="login" id="login" value="Masuk" onclick="return validasi() "> &nbsp;
            <a href="index.php" class="btn btn-primary"> Kembali </a>   
           
          </div>
        </div>
      </form>
    </div>
  </div>
      </body>
</html>
<?php
}else  if($_SESSION['Admin'] ) {
  header("Location: Admin/index.php");
}else  if($_SESSION['AnggotaUKM'] ) {
  header("Location: Dashboard/index.php");
}else if ($_SESSION['NONAnggotaUKM']) {
  header("Location:Dashboard/index.php");
}
?>



