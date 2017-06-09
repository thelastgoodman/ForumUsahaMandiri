<?php
include "Koneksi/Koneksi.php";
$q = $_GET['term'];
$sql = "select * from tb_info_produk where nama_produk like '%$q%' and disetujui='Ya'";
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