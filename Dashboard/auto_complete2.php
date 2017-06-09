<?php
include "../Koneksi/Koneksi.php";
session_start();
$q = $_GET['term'];
$sql = "SELECT deskripsi_produk,klasifikasi,kelurahan,nopos,siup,kecamatan,alamat_workshop,no_telp FROM tb_info_produk where user_id='".$_SESSION['user_id']."'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['alamat_workshop'],
		'value' => $rs['alamat_workshop'],
		'id_produk' => $rs['id_info_produk']
		
	);
}
header("Content-Type: application/json");
echo json_encode($json);
?>