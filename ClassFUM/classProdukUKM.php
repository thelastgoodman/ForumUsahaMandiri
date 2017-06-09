<?php
session_start();
class ProdukUKM{
	public function comboBox1(){

	  echo "<select class='form-control' name='kategori' id='kategori'>";
	   echo" <option>---- Kategori Usaha ----</option>";
	    $sql=mysql_query("SELECT * FROM tb_cat_produk ORDER BY nama_cat ASC");
		    if(mysql_num_rows($sql) != 0){
		        while($data = mysql_fetch_array($sql)){
		            echo "<option value=$data[id_cat_produk]>$data[nama_cat]</option>";   
	        }
	    } echo "</select>";
	}

function AddProduk($napro,$alamat,$tlp,$kec,$pos,$kel,$kategori,$nama_file_unik1,$desk,$klasifikasi,$siup){


	$sql_simpan="INSERT INTO tb_info_produk
			VALUES ('','$kategori','$napro','$desk','$nama_file_unik1','".date('Y-m-d')."','0','Belum','$tlp','$alamat','$kec','$pos','$kel','$klasifikasi','$siup','".$_SESSION['user_id']."')";
	mysql_query($sql_simpan) 
		or die ("Memasukan data info produk gagal".mysql_error());
	
	header("location:../Dashboard/data_info_produk.php?st=1");
	}

public function EditProdukUKM($id_prd,$nama,$alamat,$kec,$kel,$desk,$kategori,$nama_file_unik,$tlp,$tg){
	$sql_update="UPDATE tb_info_produk SET 
				id_cat_produk   ='$kategori',
				nama_produk  ='$nama',
				deskripsi_produk  ='$desk',
				foto_produk = '$nama_file_unik',
				tanggal='$tg',
				no_telp='$tlp',
				alamat_workshop='$alamat',
				kecamatan='$kec',
				kelurahan='$kel'
			  WHERE id_info_produk='$id_prd'";
	mysql_query($sql_update) 
		or die ("Update info Produk gagal".mysql_error());
	
		header("location:../Dashboard/data_info_produk.php?st=2")	;
}

function UbahStatProduk($id_prdk){
	$sql_ubahstat="UPDATE tb_info_produk SET disetujui='Ya' WHERE id_info_produk='$id_prdk'";

	mysql_query($sql_ubahstat) 
		or die ("Vertifikasi Produk gagal".mysql_error());
	
	header("location:../Admin/data_info_produk.php?st=3");	
}
function TolakStatProduk($id_prdk){
	$sql_hapus="UPDATE tb_info_produk SET disetujui='Tidak' WHERE id_info_produk='$id_prdk'";

	mysql_query($sql_hapus) 
		or die ("Vertifikasi Produk gagal".mysql_error());
	
	header("location:../Admin/data_info_produk.php?st=5");	
}
function HapusInfoProduk2($id_prdk){
	$sql_hapus="DELETE FROM  tb_info_produk WHERE id_info_produk='$id_prdk'";

	mysql_query($sql_hapus) 
		or die ("Data info Produk gagal di hapus".mysql_error());
	
		header("location:../Admin/data_info_produk.php?st=2");	
}
function HapusInfoProdukUser($id_prdk){
	$sql_hapus="DELETE FROM  tb_info_produk WHERE id_info_produk='$id_prdk'";

	mysql_query($sql_hapus) 
		or die ("Data info Produk gagal di hapus".mysql_error());
	
		header("location:../Dashboard/data_info_produk.php?st=3");	
}
}


?>