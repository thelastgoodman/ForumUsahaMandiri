<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include"../Koneksi/Koneksi.php";
include'../ClassFUM/classAnggota.php';
include"../EditGambar/fungsi_tumbnail1.php";
include"../EditGambar/fungsi_tumbnail2.php";
 $obj_anggota = new Anggota;
if ($_GET['aksi']=='simpananggota') {

        $NL = $_POST['NL'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $konfirPass = $_POST['konfirmPass'];
        $alamat = $_POST['alamat'];
    		$nu=$_POST['namausaha'];
    		$aw=$_POST['alamatwork'];
        $kec=$_POST['kecamatan'];
        $kel=$_POST['cari'];
    		$tlp=$_POST['notelp'];
    		$kategori=$_POST['kategori'];
    		$user=$_POST['user'];
        $desk=$_POST['desk'];
        $klasifikasi=$_POST['klasifikasi'];
        $userq="Pengusaha";
        $kosong ="kosong.jpg";
        $siup=$_POST['siup'];
        $nopos=$_POST['nopos'];
       
    // $lokasi_file    = $_FILES['fupload']['tmp_name'];
    // $tipe_file      = $_FILES['fupload']['type'];
    // $nama_file      = $_FILES['fupload']['name'];
    // $acak           = rand(1,99);
    // $nama_file_unik = $acak.$nama_file;

    $lokasi_file1    = $_FILES['fupload1']['tmp_name'];
    $tipe_file1      = $_FILES['fupload1']['type'];
    $nama_file1      = $_FILES['fupload1']['name'];
    $acak1           = rand(1,99);
    $nama_file_unik1 = $acak1.$nama_file1;

if($user=='1'){
 
    $sql2 = mysql_query("select * from tb_user where username = '$username' ") or die(mysql_error());

    $cek2 = mysql_num_rows($sql2);
    if ($cek2 >= 1) {

     header("location:../daftar_anggotaukm.php?st=3");
}else {
if ($tipe_file1!="image/jpeg" AND $tipe_file1!="image/pjpeg"){
  echo "<script> alert('Upload Gagal, file yang di upload harus bertipe JPG');location = '../daftar_anggotaukm.php'; </script>"; 
  echo "Upload Gagal, file yang di upload harus bertipe JPG";
}else{
  UploadImage1($nama_file_unik1);
              $obj_anggota->AddAnggotaUKM($username,$pass,$email,$NL,$kosong,$alamat,$kategori,$nu,$desk,$nama_file_unik1,$tlp,$aw,$kec,$kel,$klasifikasi,$siup,$nopos);
                    }
               }
}else if($user=='2'){

    $sql2 = mysql_query("select * from tb_user where username = '$username' ") or die(mysql_error());

    $cek2 = mysql_num_rows($sql2);
  if ($cek2 >= 1) {

     header("location:../daftar_anggotaukm.php?st=3");      
               }else{
                $obj_anggota->NONAnggotaUKM($username,$pass,$email,$NL,$kosong,$alamat);
         
}
}
}else if ($_GET['aksi']=='hapususer'){
    $id_hapus1=$_GET['id_hapus'];
    $obj_anggota->HapusUser($id_hapus1);
}else if ($_GET['aksi']=='tambahadmin'){
    $email=$_POST['email'];
    $username=$_POST['user'];
    $pass=$_POST['pass'];

    $obj_anggota->SimpanAdmin($email,$username,$pass);
}else if ($_GET['aksi']=='info_anggota'){
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $id=$_POST ['id'];
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
$tipe_file      = $_FILES['fupload']['type'];
$nama_file      = $_FILES['fupload']['name'];

// Membuat nama file yang unik
$acak           = rand(1,99);
$nama_file_unik = $acak.$nama_file;


if ($tipe_file!="image/jpeg" AND $tipe_file!="image/pjpeg"){
  echo "<script> alert('Upload Gagal, file yang di upload harus bertipe JPG');location = '../Dashboard/edit_informasi.php'; </script>"; 
  echo "Upload Gagal, file yang di upload harus bertipe JPG";
}else{
  UploadImage($nama_file_unik);
              $obj_anggota->edit_anggotaukm($id,$nama,$alamat,$nama_file_unik);
                    }
 }else if ($_GET['aksi']=='ubahpassword'){
  $email=$_POST['email'];
  $pass1=$_POST['pass_lama'];
  $pass2=$_POST['pass_baru'];
  $pass3=$_POST['pass_ulang'];

  $obj_anggota->UbahPassword($email,$pass1,$pass2,$pass3);
 }else if ($_GET['aksi']=='anggota_setuju'){
  $idagt=$_GET['id'];
 $obj_anggota->setujui($idagt);
 }else if ($_GET['aksi']=='anggota_tolak'){
  $idagt=$_GET['id'];
 $obj_anggota->tolak($idagt);
            
}
?>