<?php
session_start();
	include"../Koneksi/Koneksi.php";
				$act = $_GET['act'];
	switch($act){
	
	case "select1":
			$sql = mysql_query("SELECT * FROM tb_info_produk WHERE user_id='".$_SESSION['user_id']."'");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;
	
	case "select2":
			$sql = mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Belum' and user_id='".$_SESSION['user_id']."'");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;

		case "select3":
			$sql = mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Ya' and user_id='".$_SESSION['user_id']."'");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;
		case "select4":
			$sql = mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Tidak' and user_id='".$_SESSION['user_id']."'");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;
		case "select5":
			$sql = mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Ya' and user_id='".$_SESSION['user_id']."'");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;
	case "update":
			$sql = mysql_query("UPDATE FROM tb_user SET username='s' WHERE user_id='".$_SESSION['user_id']."'");
			$array = mysql_num_rows($sql);
			echo json_encode($array);
	break;
	
}
		?>