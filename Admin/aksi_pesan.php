<?php
session_start();
	include"../Koneksi/Koneksi.php";
	$act = $_GET['act'];
	switch($act){
	
	case "select":
			$sql = mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Belum'");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;


	case "select1":
			$sql = mysql_query("SELECT * FROM tb_info_produk WHERE user_id ");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;


	case "select2":
			$sql = mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Ya'");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;

	case "select3":
			$sql = mysql_query("SELECT * FROM tb_anggota WHERE id_anggota ");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;

	case "select4":
			$sql = mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Belum'");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;

    case "select5":
			$sql = mysql_query("SELECT * FROM tb_user WHERE terverifikasi='Belum'");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;
	}
?>