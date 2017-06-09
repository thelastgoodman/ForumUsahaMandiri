<?php
include"ClassFUM/classAnggota.php";
include"Koneksi/Koneksi.php";
  $obj_agt = new Anggota;?>

<html>
  <head>
    <title> FUM | Daftar Anggota </title>
   <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/font-awesome.min.css">
    <link rel="icon" type="assets2/images/png" href="assets2/images/logobar.png">
      
<link href="assets2/js/jquery-ui/jquery-ui.css" rel="stylesheet">
            
    
  </head>

<script type="text/javascript">

function validasi() {
var nl = document.getElementById("nl").value;
var username = document.getElementById("username").value;
var pass = document.getElementById("pass").value;
var confirm = document.getElementById("kp").value;
var nu = document.getElementById("nu").value;
var aw = document.getElementById("aw").value;
var tp = document.getElementById("tp").value;
var desk = document.getElementById("desk").value;
var frm = document.daftar;



var hitung_error = 0;
function cekuser(a) {
re = /^[A-Za-z ]+$/;
return re.test(a);
}

     
  if (nl == '') { //cek jika kosong
    document.getElementById("pesan_error_nl").innerHTML = "(Nama Lengkap Tidak Boleh Kosong)";
   document.daftar.nl.focus();
  
   return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_nl").innerHTML = ""; 
  }
   if (!cekuser(nl)) { //cek jika kosong
    document.getElementById("pesan_error_nl").innerHTML = "(Nama Hanya Mengandung Karakter)";
   
   document.daftar.nl.focus();

   return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_nl").innerHTML = ""; 
  }
    if (!cekuser(username)) { //cek jika kosong
    document.getElementById("pesan_error_username").innerHTML = "(Nama Hanya Mengandung Karakter)";
   
   document.daftar.username.focus();

   return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_username").innerHTML = ""; 
  }
 
  if (username == '') { //cek jika kosong
    document.getElementById("pesan_error_username").innerHTML = "(Username Tidak Boleh Kosong)";
    document.daftar.username.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_username").innerHTML = ""; 
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

  if (agreement == false) {
    alert("Mohon setujui License Agreement ");
    return false;
  }


  // if (nu == '') { //cek jika kosong
  //   document.getElementById("pesan_error_namausaha").innerHTML = "(Nama Usaha Tidak Boleh Kosong)";
  //   document.daftar.nu.focus();

  //  return false;
  // } else {
  //   //kosongkan pesan error jika sudah benar semua
  //   document.getElementById("pesan_error_namausaha").innerHTML = ""; 
  // }
  // if (aw == '') { //cek jika kosong
  //   document.getElementById("pesan_error_awe").innerHTML = "(Alamat Workshop Tidak Boleh Kosong)";
  //   document.daftar.aw.focus();

  //  return false;
  // } else {
  //   //kosongkan pesan error jika sudah benar semua
  //   document.getElementById("pesan_error_awe").innerHTML = ""; 
  // }
  // if (tp == '') { //cek jika kosong
  //   document.getElementById("pesan_error_telp").innerHTML = "(No Telepon Tidak Boleh Kosong)";
  //   document.daftar.tp.focus();

  //  return false;
  // } else {
  //   //kosongkan pesan error jika sudah benar semua
  //   document.getElementById("pesan_error_telp").innerHTML = ""; 
  // }

  // if(!=(!/^[0-9.]+$/.test(document.daftar.tp.value))) {
  // daftar.tp.value = daftar.tp.value.substring(0,daftar.tp.value.length-1000);
  // document.getElementById("pesan_error_telp").innerHTML = "(Hanya menggunakan Angka)";
  // document.daftar.tp.focus();
  // return false;
  // }else{
  // document.getElementById("pesan_error_telp").innerHTML = ""; 
  // }
  //  if (desk == '') { //cek jika kosong
  //   document.getElementById("pesan_error_desk").innerHTML = "(Deskripsi Tidak Boleh Kosong)";
  //   document.daftar.desk.focus();

  //  return false;
  // } else {
  //   //kosongkan pesan error jika sudah benar semua
  //   document.getElementById("pesan_error_desk").innerHTML = ""; 
  // }
}


function validAngka(a){
if(!/^[0-9.]+$/.test(a.value)) {
  a.value = a.value.substring(0,a.value.length-5000);
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
        document.daftar.siup.disabled = true;
        document.daftar.kategori.disabled = true;
        document.daftar.klasifikasi.disabled = true;
        document.daftar.fp1.disabled = true;
        document.daftar.desk.disabled =true; 
        document.daftar.cari.disabled = true;
               document.daftar.nopos.disabled =true; 
         document.daftar.kecamatan.disabled =true;
        document.daftar.nu.value = '';   
        document.daftar.aw.value = '';
        document.daftar.tp.value = '';
        document.daftar.desk.value = '';

      }else if (val=='1'){
        document.daftar.nu.disabled = false;   
        document.daftar.aw.disabled = false;
        document.daftar.tp.disabled = false;
        document.daftar.siup.disabled = false;
        document.daftar.cari.disabled = false;
        document.daftar.klasifikasi.disabled = false;
        document.daftar.kategori.disabled = false;
        document.daftar.fp1.disabled = false;
        document.daftar.desk.disabled =false; 
        document.daftar.kecamatan.disabled =false; 
        document.daftar.nopos.disabled =false; 
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
      <div class="col-lg-6 col-sm-6" >
                          
                          <h2 class="section-heading">Daftar Akun  Forum Kemitraan Pengembangan Ekonomi Lokal</h2>
                          <p class="lead"><font color="#f44238"></font>Username dan Email bersifat Unik artinya 1 akun hanya mempunyai satu username dan email.  <font color="#f44238">*)</font> Wajib Di isi</p>  <a class="btn" href="login.php"><span class="glyphicon glyphicon-arrow-left" style="margin-top:-5px;"></span></a><hr>
    </div>
        <div class="col-md-8">
           <div class="panel panel-default" >

                     <div class="panel-body">
                        <form  enctype= "multipart/form-data"  action="ClassFUM/proses_anggota.php?aksi=simpananggota" method="post" name="daftar">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap <font color="red" >* <p id='pesan_error_nl'></p></font></label>
                                <input type="username" class="form-control"  placeholder="Nama Lengkap" name="NL" id="nl"> 
                          </div>
  
                        <div class="form-group">
                                <label for="exampleInputEmail1">Username <font color="red" >* <p id='pesan_error_username'></p></font></label>
                                <input type="username" class="form-control"  placeholder="Username" name="username" id="username">
                        </div>
                        <div class="form-group">
                                
                                <input type="hidden" class="form-control" placeholder="FUM@gmail.com" name="email" id="email">
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
                               <label><input type="radio" name="user" id="umum" value='2' onclick="return pilihanmu()"  id="check" checked="">Umum</label>
                                <label><input type="radio" name="user" id="pengusaha" value='1' onclick="return pilihanmu()" id="check">Pengusaha</label> &nbsp;
                                
                              </div>
                             
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Nama Usaha <font color="red" >* <p id='pesan_error_namausaha'></p></font></label>
                                <input type="text" class="form-control"  required placeholder="Nama Usaha" disabled="" name="namausaha" id="nu">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Alamat Workshop <font color="red" >* <p id='pesan_error_awe'></p></font></label>
                                 <textarea class="form-control" placeholder="Alamat Usaha" required disabled name="alamatwork" id="aw" rows="3"></textarea>
                        </div>
                         <div class="form-group">
                                <label for="exampleInputPassword1">Kecamatan <font color="red" >* <p id='pesan_error_kec'></p></font></label>
                                 <?php $obj_agt->ComboBox3() ?> 
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Kelurahan <font color="red" >* <p id='pesan_error_kel'></p></font></label>
                                <input type="text" class="form-control"  required placeholder="Kelurahan" disabled="" name="cari" id="cari" required="">
                                <input type="hidden" class="form-control" id="id_produk" name="id_produk"> 
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Telepon/HP <font color="red" >* <p id='pesan_error_telp'></p></font></label>
                                <input type="text" class="form-control" disabled required placeholder="No Telepon atau HP" onkeyup="validAngka(this)" name="notelp" id="tp">
                        </div>
                       <div class="form-group">
                                <label for="exampleInputPassword1">No Pos <font color="red" >* <p id='pesan_error_awe'></p></font></label>
                                 <input type="text" class="form-control" placeholder="No Pos" required disabled name="nopos" id="nopos" ></textarea>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Kategori Usaha <font color="red" >* </font></p></label>
                                   <?php $obj_agt->ComboBox1() ?>      
                        </div>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Klasifikasi Usaha <font color="red" >* </font></p></label>
                                   <?php $obj_agt->ComboBox2() ?>      
                        </div>
                         <div class="form-group">
                                <label for="exampleInputPassword1">Surat Ijin Usaha Perdagangan<font color="red" >* <p id='pesan_error_desk'></p></font></label>
                                <input type="text" class="form-control" placeholder="Surat Ijin Usaha Perdagangan" required disabled name="siup" id="siup">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Gambar <font color="red" >* <p id='pesan_error_fp1'></p></font></label>
                                <input type="file" name="fupload1" id="fp1" disabled required>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Kegiatan Utama <font color="red" >* <p id='pesan_error_desk'></p></font></label>
                                <input type="text" class="form-control" placeholder="Kegiatan Utama Usaha anda" required disabled name="desk" id="desk">
                        </div>

                        <div class="form-group">
                                <input type="checkbox" name="agreement" value="1" required> Setujui |  <a href="#" data-target="#agreement" data-toggle="modal"><font color="red"> License Agreement </font></a> <br/>
                        </div>
  

  <button type="submit" class="btn btn-danger2" width="40px" onclick="return validasi()">Simpan</button>
  <button type="reset" class="btn btn-danger2">Batal</button>
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
<div class="modal small fade" data-backdrop="static" data-keyboard="false" id="agreement" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h3 class="text-center">License Agreement</h3>

            </div>
            <div class="modal-body">
                <h4><b> Informasi Umum </b></h4>
                <i class="fa fa-caret-right"></i> Forum Usaha Mandiri sebagai sarana penunjang bisnis berusaha menyediakan berbagai fitur dan layanan untuk menjamin keamanan dan kenyamanan para penggunanya.
                <p><i class="fa fa-caret-right"></i> Forum Usaha Mandiri hanya sebagai perantara antara Pengunjung dan Pemohon.
                <p><i class="fa fa-caret-right"></i> Forum Usaha Mandiri memiliki kewenangan mengambil tindakan yang di anggap perlu
                <p><i class="fa fa-caret-right"></i> Hati-hati terhadap penipuan yang mengatasnamakan Forum Usaha Mandiri.

                <h4><b> Produk </b></h4>
            
                <p><i class="fa fa-caret-right"></i> Pengguna wajib mengisi nama perusahaan / usaha dengan jelas, 
                <p><i class="fa fa-caret-right"></i> Pengguna wajib menempatkan Produk usaha sesuai dengan klaster dan kategorinya
                <p><i class="fa fa-caret-right"></i> Deskripsi usaha hanya menjelaskan kegiatan utama dari usaha yang bersangkutan.
                </p>
            </div>
            <div class="modal-footer">
               <button class="btn btn-default" data-dismiss="modal">Tutup</button>

            </div>
        </div>
    </div>
    <script src="assets2/js/jquery.min.js"></script>
<script src="assets2/js/jquery-ui/jquery-ui.js"></script>
            <script src="assets2/js/bootstrap.min.js"></script>
  </body>
</html>
<script type="text/javascript">
  $(function() {
          $( "#cari" ).autocomplete({
              source: "kec_complete.php",
              minLength: 3,
              select: function( event, ui ) {
          $('#id_produk').val(ui.item.id_kel);
              }
          });
      });
</script>