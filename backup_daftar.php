<?php
include"ClassFK-PEL/classAnggota.php";
include"Koneksi/Koneksi.php";
  $obj_agt = new Anggota;?>

<html>
	<head>
		<title> Daftar Anggota </title>
		<link rel="stylesheet" href="assets2/css/bootstrap.css">
		<link rel="stylesheet" href="assets2/css/bootstrap.min.css">
	</head>

<script type="text/javascript">

function validasi() {
var nl = document.getElementById("nl").value;
var username = document.getElementById("username").value;
var email = document.getElementById("email").value;
var pass = document.getElementById("pass").value;
var confirm = document.getElementById("kp").value;
var nu = document.getElementById("nu").value;
var aw = document.getElementById("aw").value;
var tp = document.getElementById("tp").value;

var desk = document.getElementById("desk").value;

   var hitung_error = 0;
     
  if (nl == '') { //cek jika kosong
    document.getElementById("pesan_error_nl").innerHTML = "(Nama Lengkap Tidak Boleh Kosong)";
   document.daftar.nl.focus();
  
   return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_nl").innerHTML = ""; 
  }
  
 
  if (username == '') { //cek jika kosong
    document.getElementById("pesan_error_username").innerHTML = "(Username Tidak Boleh Kosong)";
    document.daftar.username.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_username").innerHTML = ""; 
  }
if (email == '') { //cek jika kosong
    document.getElementById("pesan_error_email").innerHTML = "(Email Tidak Boleh Kosong)";
    document.daftar.email.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_email").innerHTML = ""; 
  }
  if (pass == '') { //cek jika kosong
    document.getElementById("pesan_error_password").innerHTML = "(Password Tidak Boleh Kosong)";
    document.daftar.pass.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_password").innerHTML = ""; 
  }
   if (confirm == '') { //cek jika kosong
    document.getElementById("pesan_error_konfirmasi").innerHTML = "(Konfirmasi Password Tidak Boleh Kosong)";
    document.daftar.confirm.focus();

   return false;
  } else if(confirm != pass){
       document.getElementById("pesan_error_konfirmasi").innerHTML = "(Konfirmasi Password Tidak Sama)";
    document.daftar.kp.focus();
   return false;
  }else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_konfirmasi").innerHTML = ""; 
  }



  if (nu == '') { //cek jika kosong
    document.getElementById("pesan_error_namausaha").innerHTML = "(Nama Usaha Tidak Boleh Kosong)";
    document.daftar.nu.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_namausaha").innerHTML = ""; 
  }
  if (aw == '') { //cek jika kosong
    document.getElementById("pesan_error_awe").innerHTML = "(Alamat Workshop Tidak Boleh Kosong)";
    document.daftar.aw.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_awe").innerHTML = ""; 
  }
  if (tp == '') { //cek jika kosong
    document.getElementById("pesan_error_telp").innerHTML = "(No Telepon Tidak Boleh Kosong)";
    document.daftar.tp.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_telp").innerHTML = ""; 
  }

  if(!/^[0-9.]+$/.test(document.daftar.tp.value)) {
  daftar.tp.value = daftar.tp.value.substring(0,daftar.tp.value.length-1000);
  document.getElementById("pesan_error_telp").innerHTML = "(Hanya menggunakan Angka)";
  document.daftar.tp.focus();
  return false;
  }else{
  document.getElementById("pesan_error_telp").innerHTML = ""; 
  }
   if (desk == '') { //cek jika kosong
    document.getElementById("pesan_error_desk").innerHTML = "(Deskripsi Tidak Boleh Kosong)";
    document.daftar.desk.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_desk").innerHTML = ""; 
  }
}


function validAngka(a){
  var batas =12;
  if (a.value.length>batas) {
      a.value = a.value.substring(0,a.value.length>12);
      document.getElementById("pesan_error_telp").innerHTML = "(Maksimal hanya 12 digit)";
      return false;
    
  }else if(!/^[0-9.]+$/.test(a.value)) {
  a.value = a.value.substring(0,a.value.length-1000);
  document.getElementById("pesan_error_telp").innerHTML = "(Hanya menggunakan Angka)";
    return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_telp").innerHTML = ""; 
  }
}

function pilihanmu(){
  var val = 0;
   
  for( i = 0; i < document.daftar.user.length; i++ ){
    if( document.daftar.user[i].checked == true ){
      val = document.daftar.user[i].value;
      if(val=='2'){
        document.daftar.nu.disabled = true;   
        document.daftar.aw.disabled = true;
        document.daftar.tp.disabled = true;
        document.daftar.kategori.disabled = true;
        document.daftar.fp1.disabled = true;
        document.daftar.desk.disabled =true; 
        
      }else if (val=='1'){
        document.daftar.nu.disabled = false;   
        document.daftar.aw.disabled = false;
        document.daftar.tp.disabled = false;
        document.daftar.kategori.disabled = false;
        document.daftar.fp1.disabled = false;
        document.daftar.desk.disabled =false; 

      }
    }
  }
}
</script>
  </head>
  
      <!--Navigasi Bar -->
<body>
<?php
 if (isset($_GET['st'])) {
    if ($_GET['st']==1) {
     echo "<div class='alert alert-success fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong>Data Produk Berhasil Di Tambahkan';
  echo "</div>";
    }elseif ($_GET['st']==2) {

        echo "<div class='alert alert-danger fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Perhatian!</strong> Email Sudah Terdaftar Sebelumnya';
  echo "</div>";
}elseif ($_GET['st']==3) {

        echo "<div class='alert alert-danger fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Perhatian!</strong> Username Sudah Terdaftar Sebelumnya';
  echo "</div>";
}
}
?>
 <div class="container" style="padding-top:20px;">
    <div class="row">
      <div class="col-md-3 ">
          <div class="panel-heading" style="background:#f44238; color:white; font-size:20px;"><strong>Daftar Anggota FK-PEL</strong>
          </div>
          <br>
          Harap inputkan data secara benar terhadap Form isian di samping.<br><hr>

          Email dan Username bersifat unik, artinya satu email dan username untuk satu akun.<br><hr>

          <font color="red">*</font>) Harus diisi
          <a class="btn" href="login.php"><span class="glyphicon glyphicon-arrow-left" style="margin-top:-5px; margin-right:-300px" ></span></a><hr>
     </div>
        <div class="col-md-8">
           <div class="panel panel-default" >

                     <div class="panel-body">
                        <form  enctype= "multipart/form-data"  action="ClassFK-PEL/proses_anggota.php?aksi=simpananggota" method="post" name="daftar">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap <font color="red" >* <p id='pesan_error_nl'></p></font></label>
                                <input type="username" class="form-control"  placeholder="Nama Lengkap" name="NL" id="nl"> 
                          </div>
  
                        <div class="form-group">
                                <label for="exampleInputEmail1">Username <font color="red" >* <p id='pesan_error_username'></p></font></label>
                                <input type="username" class="form-control"  placeholder="Username" name="username" id="username">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Email <font color="red" >* <p id='pesan_error_email'></p></font></label>
                                <input type="email" class="form-control" placeholder="FK-PEL@gmail.com" name="email" id="email">
                        </div>
  
                        <div class="form-group">
                                <label for="exampleInputPassword1">Password <font color="red" >* <p id='pesan_error_password'></p></font></label>
                                <input type="password" class="form-control"  placeholder="Password" name="pass" id="pass"><p ></p>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Konfirmasi Password <font color="red" >* <p id='pesan_error_konfirmasi'></p></font></label>
                                <input type="password" class="form-control"  placeholder="Konfirmasi Password" name="konfirmPass" id="kp">
                        </div>
                        <div class="form-group">
                                <label for="exampleTextarea">Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap" id="alamat lengkap" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kategori <font color="red" >* <p name='pesan_error_user'></p></font></label>
                              <div class="radio">
                                <label><input type="radio" name="user" value='1' onclick="return pilihanmu()" id="check">Pengusaha</label> &nbsp;
                                 <label><input type="radio" name="user" value='2' onclick="return pilihanmu()"  id="check">Umum</label>
                              </div>
                             
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Nama Usaha <font color="red" >* <p id='pesan_error_namausaha'></p></font></label>
                                <input type="text" class="form-control"  placeholder="Nama Usaha" disabled="" name="namausaha" id="nu">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Alamat Workshop <font color="red" >* <p id='pesan_error_awe'></p></font></label>
                                 <textarea class="form-control" placeholder="Alamat Lengkap" disabled name="alamatwork" id="aw" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Telepon/HP <font color="red" >* <p id='pesan_error_telp'></p></font></label>
                                <input type="text" class="form-control" disabled placeholder="Telepon atau HP" onkeyup="validAngka(this)" name="notelp" id="tp">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Kategori Usaha <font color="red" >* </font></p></label>
                                   <?php $obj_agt->ComboBox1() ?>      
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Gambar Produk<font color="red" >* (Harus Bertipe JPG)<p id='pesan_error_fp1'></p></font></label>
                                <input type="file" name="fupload1" id="fp1" disabled required>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi Produk <font color="red" >* <p id='pesan_error_desk'></p></font></label>
                                <textarea class="form-control" placeholder="Deskripsi Produk" disabled name="desk" id="desk" rows="5"></textarea>
                        </div>
  

  <button type="submit" class="btn btn-danger2" width="40px" onclick="return validasi()">Submit</button>
  <button type="reset" class="btn btn-danger2">Reset</button>
                         </form>
              </div>
           </div>
    </div>

  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets2/js/bootstrap.min.js"></script>
  </body>
</html>
