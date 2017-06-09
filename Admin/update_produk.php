<?php
include '../Koneksi/Koneksi.php'
mysql_query("update tb_info_produk set dilihat='Sudah' where dilihat='Belum
header("location:petugas.php");

?>