<?php
include '../Koneksi/Koneksi.php';
include '../ClassFUM/classForum.php';
include '../EditGambar/fungsi_tumbnail4.php';
$obj_forum = new ForumUKM;

if ($_GET['aksi']=='editkategoriforum') {
	$kat_id=$_POST['id'];
	$kategori=$_POST['namakat'];
	$desk=$_POST['deskkat'];
	$user_id=$_POST['user'];
	$obj_forum->edit_kategori_forum($kat_id,$kategori,$desk,$user_id);
}else if ($_GET['aksi']=='hapuskategori') {
	$kat_id=$_GET['id'];
	$obj_forum->hapus_kategori_forum($kat_id);
}else if ($_GET['aksi']=='edittopikforum') {
	$topik_id=$_POST['id'];
	$judul=$_POST['judultopik'];
	$desk=$_POST['desk'];
	$obj_forum->edittopik($topik_id,$judul,$desk);
}else if ($_GET['aksi']=='hapustopik') {
	$topik_id=$_GET['id'];
	$obj_forum->hapustopik($topik_id);
}else if ($_GET['aksi']=='tambahtopik') {
	$judul=$_POST['judul'];
	$isitopik=$_POST['isi'];
	$user_id=$_POST['user_id'];
	$kat=$_POST['kat_id'];
	$obj_forum->TambahTopik($judul,$isitopik,$user_id,$kat);

}else if ($_GET['aksi']=='tambah_kategori') {
	 $nama=$_POST['nama'];
	 $desk=$_POST['desk'];
	 $user_id=$_POST['user_id'];
	 $lokasi_file    = $_FILES['fupload1']['tmp_name'];
	 $tipe_file      = $_FILES['fupload1']['type'];
	 $nama_file      = $_FILES['fupload1']['name'];

// Membuat nama file yang unik
$acak           = rand(1,99);
$nama_file_unik = $acak.$nama_file;

if ($tipe_file!="image/jpeg" AND $tipe_file!="image/pjpeg"){
  echo "<script> alert('Upload Gagal, file yang di upload harus bertipe JPG');  location = '../Forum/index.php?' </script>";  
  echo "Upload Gagal, file yang di upload harus bertipe JPG";
}else{
 UploadImage1($nama_file_unik);
     
	 $obj_forum->TambahKategori($nama,$desk,$user_id,$nama_file_unik);
 }
}

?>