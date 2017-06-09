<?php
include "Koneksi/Koneksi.php";
$q = $_GET['term'];
$sql = "select * from kelurahan where nama_kel like '%$q%'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['nama_kel'],
		'value' => $rs['nama_kel'],
		'id_produk' => $rs['id_kel']
		
		
	);
}
header("Content-Type: application/json");
echo json_encode($json);
?>