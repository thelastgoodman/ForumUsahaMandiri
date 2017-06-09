<?php
include '../Koneksi/Koneksi.php';
$id_reply=$_GET['id_reply'];

mysql_query("DELETE FROM tb_forum_reply WHERE id_reply='$id_reply'");
	header( "Location: ".SITE_URL."/detail_topik_forum.php?option=view-topic&topik_id=".$_GET['topik_id']."");

?>