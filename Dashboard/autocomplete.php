<?php
include "../Koneksi/Koneksi.php";
session_start();
$q = $_GET['term'];
$sql = "select * from tb_info_produk where user_id='".$_SESSION['user_id']."' AND  nama_produk like '%$q%'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['nama_produk'],
		'value' => $rs['nama_produk'],
		'id_produk' => $rs['id_info_produk']
		
	);
}
header("Content-Type: application/json");
echo json_encode($json);
?>