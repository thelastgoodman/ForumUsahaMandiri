<?php
include "../Koneksi/Koneksi.php";
$q = $_GET['term'];
$reply = $_GET['kat_id'];
$sql= "SELECT * FROM tb_forum_kategori, tb_user, tb_forum_topik  WHERE  tb_forum_topik.user_id=tb_user.user_id AND tb_forum_kategori.kategori_id=tb_forum_topik.kategori_id AND tb_forum_kategori.kategori_id='$reply' AND tb_forum_topik.judul_topik like '%$q%'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['judul_topik'],
		'value' => $rs['judul_topik'],
		'kate_id' => $rs['kategori_id']
		
	);
}
header("Content-Type: application/json");
echo json_encode($json);
?>