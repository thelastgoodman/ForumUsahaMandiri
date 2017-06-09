<?php
include '../Koneksi/Koneksi.php';
class ForumUKM {
	function edit_kategori_forum($kat_id,$kategori,$desk,$user_id){
		  $sql_edit_kategori_forum="UPDATE tb_forum_kategori SET kat_nama_kategori='$kategori', kat_desk_kategori='$desk' WHERE kategori_id='$kat_id'";
  mysql_query($sql_edit_kategori_forum) 
    or die ("Hapus Data Kategori Gagal".mysql_error());
  
  header("location:../Admin/data_kategori_forum.php?st=1"); 
  }
	
	function hapus_kategori_forum($kat_id){
 $sql_hapus_kategori_forum="DELETE FROM tb_forum_kategori WHERE kategori_id='$kat_id'";
  mysql_query($sql_hapus_kategori_forum) 
    or die ("Hapus Data Kategori Gagal".mysql_error());
  
  header("location:../Admin/data_kategori_forum.php?st=2"); 
	}
	function edittopik($topik_id,$judul,$desk){
    $sql_edit_topik_forum="UPDATE tb_forum_topik SET judul_topik='$judul', isi_topik='$desk' WHERE id_topik='$topik_id'";
  mysql_query($sql_edit_topik_forum) 
    or die ("Hapus Data Topik Gagal".mysql_error());
  
  header("location:../Admin/data_topik_forum.php?st=1"); 
	}
	function hapustopik($topik_id){
		 $sql_hapus_topik_forum="DELETE FROM tb_forum_topik WHERE id_topik='$topik_id'";
  mysql_query($sql_hapus_topik_forum) 
    or die ("Hapus Data Topik Gagal".mysql_error());
  
  header("location:../Admin/data_topik_forum.php?st=2"); 

	}

  function TambahTopik($judul,$isitopik,$user_id,$kat){
    $carikode = mysql_query("select max(id_topik) as idMaks from tb_forum_topik") or die (mysql_error());
                          // menjadikannya array
                          $datakode = mysql_fetch_array($carikode);
                          // jika $datakode
                          
                           // membuat variabel baru untuk mengambil kode barang mulai dari 1
                           $nilaikode = $datakode['idMaks'];
                           // menjadikan $nilaikode ( int )
                           $hasilkode = (int) substr($nilaikode,0, 3);
                           // setiap $kode di tambah 1
                           $hasilkode ++;

  $sql_tambah_topik="INSERT INTO tb_forum_topik VALUES('$hasilkode','$kat','$user_id',
  '$judul', '$isitopik','0','".date('Y-m-d')."')";
   mysql_query($sql_tambah_topik) 
   
   or die ("Hapus Data Topik Gagal".mysql_error());
   header( "Location: ".SITE_URL."/detail_kategori_forum.php?kat_id=".$GET['kat_id']." " );
  }

  function TambahKategori($nama,$desk,$user_id,$nama_file_unik){
     $carikode = mysql_query("select max(kategori_id) as idMaks from tb_forum_kategori") or die (mysql_error());
                          // menjadikannya array
                          $datakode = mysql_fetch_array($carikode);
                          // jika $datakode
                          
                           // membuat variabel baru untuk mengambil kode barang mulai dari 1
                           $nilaikode = $datakode['idMaks'];
                           // menjadikan $nilaikode ( int )
                           $hasilkode = (int) substr($nilaikode,0, 3);
                           // setiap $kode di tambah 1
                           $hasilkode ++;

      $sql_tambah_kategori="INSERT INTO tb_forum_kategori VALUES('$hasilkode','$user_id','$nama','$desk','$nama_file_unik','".date('Y-m-d')."')";
        mysql_query($sql_tambah_kategori) 
   
   or die ("Tambah Data Kategori Gagal".mysql_error());
   header( "Location:../Forum/index.php" );
  }
}


?>