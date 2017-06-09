<?php
include '../Koneksi/Koneksi.php';
$id_topik=$_GET['id_topik'];

mysql_query("DELETE FROM tb_forum_topik WHERE id_topik='$id_topik'");
	header( "Location: ".SITE_URL."/detail_kategori_forum.php?kat_id=".$_GET['kat_id']."");

?>