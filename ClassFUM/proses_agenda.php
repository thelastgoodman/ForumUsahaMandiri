<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include"../Koneksi/Koneksi.php";
include"../ClassFUM/classAgenda.php";
 $obj_agenda = new Agenda;
include"../EditGambar/fungsi_tumbnail1.php";
include"../EditGambar/fungsi_tumbnail2.php";
if ($_GET['aksi']=='simpanagenda') {
  # code...
        $judul=$_POST['judul'];
		    $isi=$_POST['isi'];
        $tanggal=$_POST ['tgl'];



   $lokasi_file1    = $_FILES['fupload1']['tmp_name'];
    $tipe_file1      = $_FILES['fupload1']['type'];
    $nama_file1      = $_FILES['fupload1']['name'];
    $acak1           = rand(1,99);
    $nama_file_unik1 = $acak1.$nama_file1;


if ($tipe_file1!="image/jpeg" AND $tipe_file1!="image/pjpeg"){
  echo "<script> alert('Upload Gagal, file yang di upload harus bertipe JPG');location = '../daftar_anggotaukm.php'; </script>"; 
  echo "Upload Gagal, file yang di upload harus bertipe JPG";
}else{
  UploadImage1($nama_file_unik1);
              $obj_agenda->SimpanAgenda($judul,$isi,$nama_file_unik1);
                    }
               
}else if ($_GET['aksi']=='editagenda') {
     $id_agd   =$_POST['id'];
     $judul=$_POST['judul'];
        $isi=$_POST['isi'];
        $tanggal=$_POST['tgl'];
$contgl=date( "y-m-d", strtotime($tanggal) );

   $lokasi_file1    = $_FILES['fupload1']['tmp_name'];
    $tipe_file1      = $_FILES['fupload1']['type'];
    $nama_file1      = $_FILES['fupload1']['name'];
    $acak1           = rand(1,99);
    $nama_file_unik1 = $acak1.$nama_file1;

// Membuat nama file yang unik
$acak           = rand(1,99);
$nama_file_unik = $acak.$nama_file;

if ($tipe_file1!="image/jpeg" AND $tipe_file1!="image/pjpeg"){
  echo "<script> alert('Upload Gagal, file yang di upload harus bertipe JPG');  location = '../Admin/edit_agenda.php'; </script>";  
  echo "Upload Gagal, file yang di upload harus bertipe JPG";
}else{
 UploadImage1($nama_file_unik1);
         
 $obj_agenda->EditAgenda($id_agd,$judul,$isi,$contgl,$nama_file_unik1);
  
  }

}else if($_GET['aksi']=='hapusagenda'){
    $id_agd=$_GET['id'];
    $obj_agenda->HapusAgenda($id_agd);
}else if($_GET['aksi']=='hapusagenda2'){
    $id_agd=$_GET['id'];
    $obj_agenda->HapusAgenda2($id_agd);
}else if ($_GET['aksi']=='ubahstatagenda'){
    $id_agd=$_GET['id'];
    
    $obj_agenda->UbahAgenda($id_agd);
}

?>