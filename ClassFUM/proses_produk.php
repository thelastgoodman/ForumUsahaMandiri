<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include"../Koneksi/Koneksi.php";
include"../ClassFUM/classProdukUKM.php";
 $obj_dataproduk = new ProdukUKM;
include"../EditGambar/fungsi_tumbnail1.php";
include"../EditGambar/fungsi_tumbnail2.php";

if ($_GET['aksi']=='simpanproduk') {
  # code...
        $napro = $_POST['napro'];
        $alamat = $_POST['alamat'];
        $kec = $_POST['kecamatan'];
        $kel = $_POST ['kelurahan'];
        $tlp = $_POST['tlp'];
        $kategori = $_POST['kategori'];	
        $klasifikasi = $_POST['klasifikasi'];
        $desk=$_POST['desk'];
        $userq="Pengusaha";
        $kosong ="kosong.png";
        $pos=$_POST['nopos'];
        $siup=$_POST['siup'];

    $lokasi_file1    = $_FILES['fupload1']['tmp_name'];
    $tipe_file1      = $_FILES['fupload1']['type'];
    $nama_file1      = $_FILES['fupload1']['name'];
    $acak1           = rand(1,99);
    $nama_file_unik1 = $acak1.$nama_file1;
   $sql = mysql_query("select * from tb_info_produk where nama_produk = '".$_POST['napro']."'") or die(mysql_error());
    $cek = mysql_num_rows($sql);
    if($cek >= 1) {
    header("location:../Dashboard/data_info_produk.php?st=4");
 }else {
if ($tipe_file1!="image/jpeg" AND $tipe_file1!="image/pjpeg"){
  echo "<script> alert('Upload Gagal, file yang di upload harus bertipe JPG');location = '../Dashboard/data_info_produk.php'; </script>"; 
  echo "Upload Gagal, file yang di upload harus bertipe JPG";
}else{
  UploadImage1($nama_file_unik1);
              $obj_dataproduk->AddProduk($napro,$alamat,$tlp,$kec,$pos,$kel,$kategori,$nama_file_unik1,$desk,$klasifikasi,$siup);
  }
    }           
}else if ($_GET['aksi']=='editproduk') {
        $id_prd  =$_POST['id'];
         $id_prd2  =$_GET['id'];
        $nama=$_POST['napro'];
        $alamat = $_POST['alamat'];
        $kec = $_POST['kecamatan'];
        $kel = $_POST['kelurahan'];
        $desk = $_POST['desk'];
        $tlp=$_POST['tlp'];
        $tg=$_POST['tanggal'];
        $contgl=date( "y-m-d", strtotime($tg) );
        $kategori = $_POST['kategori']; 
$contgl=date( "y-m-d", strtotime($tanggal) );
$lokasi_file    = $_FILES['fupload1']['tmp_name'];
$tipe_file      = $_FILES['fupload1']['type'];
$nama_file      = $_FILES['fupload1']['name'];

// Membuat nama file yang unik
$acak           = rand(1,99);
$nama_file_unik = $acak.$nama_file;

if ($tipe_file!="image/jpeg" AND $tipe_file!="image/pjpeg"){
  echo "<script> alert('Upload Gagal, file yang di upload harus bertipe JPG');  location = '../Dashboard/edit_info_produk.php?id=$id_prd'; </script>";  
  echo "Upload Gagal, file yang di upload harus bertipe JPG";
}else{
 UploadImage1($nama_file_unik);
         
 $obj_dataproduk->EditProdukUKM($id_prd,$nama,$alamat,$kec,$kel,$desk,$kategori,$nama_file_unik,$tlp,$tg);
}
}else if ($_GET['aksi']=='verifikasi_setuju'){

  $id_prdk =$_GET['id'];
  $obj_dataproduk->UbahStatProduk($id_prdk);
}else if ($_GET['aksi']=='verifikasi_tolak'){
  $id_prdk=$_GET ['id'];
   $obj_dataproduk->TolakStatProduk($id_prdk);
}else if ($_GET['aksi']=='hapusproduk2'){
  $id_prdk=$_GET ['id'];
   $obj_dataproduk->HapusInfoProduk2($id_prdk);
}elseif ($_GET['aksi']=='hapusprodukuser') {
    $id_prdk=$_GET ['id'];
    $obj_dataproduk->HapusInfoProdukUser($id_prdk);
}
?>