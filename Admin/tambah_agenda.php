<?php
include "../Koneksi/Koneksi.php";
include"../EditGambar/fungsi_tumbnail1.php";


// Membuat nama file yang unik

UploadImage1($nama_file_unik1);

mysql_query("insert into tb_agenda values('','$judul','$contgl','$isi','$nama_file_unik1','0','belum')");
header("location:data_info_agenda.php");

?>