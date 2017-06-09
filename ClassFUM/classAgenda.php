
<?php

class Agenda {


function SimpanAgenda($judul,$isi,$nama_file_unik1){
	$sql_simpan="INSERT INTO tb_agenda
			VALUES ('','$judul','".date('Y-m-d')."','$isi','$nama_file_unik1','0','belum')";
	mysql_query($sql_simpan) 
		or die ("Memasukan data agenda gagal".mysql_error());
	header("location:../Admin/data_info_agenda.php?st=1");
	}

function EditAgenda($id_agd,$judul,$isi,$contgl,$nama_file_unik1){
				$sql_ubah="UPDATE tb_agenda SET 
				judul_agenda  ='$judul',
				isi_agenda  ='$isi',
				tanggal_agenda='$contgl',
				gambar = '$nama_file_unik1'
			  WHERE id_agenda='$id_agd'";

	mysql_query($sql_ubah) 
			or die ("Perubahan data gagal".mysql_error());
			
header("location:../Admin/data_info_agenda.php?st=4");	 
	}

function HapusAgenda($id_agd){
	
		  $sql_hapus="DELETE FROM tb_agenda WHERE id_agenda='$id_agd'";
		  mysql_query($sql_hapus)
		    or die ("Gagal perintah hapus".mysql_error());  
		header("location:../Admin/data_info_agenda.php?st=2")	;
		
}
function HapusAgenda2($id_agd){
	
		  $sql_hapus="DELETE FROM tb_agenda WHERE id_agenda='$id_agd'";
		  mysql_query($sql_hapus)
		    or die ("Gagal perintah hapus".mysql_error());  
		 		header("location:../Admin/data_info_agenda.php?st=2")	;
		
}
function UbahAgenda($id_agd){
	$sql_ubah_stat="UPDATE tb_agenda SET terlaksana='sudah' WHERE id_agenda='$id_agd'";
	mysql_query($sql_ubah_stat)
	 or die ("Gagal Merubah Status".mysql_error());  
		 	header("location:../Admin/data_info_agenda.php?st=3");
}

}
?>