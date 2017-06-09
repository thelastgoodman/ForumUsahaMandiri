<?php
session_start();
include '../Koneksi/Koneksi.php';
date_default_timezone_set("Asia/Jakarta");
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

	$judul=$_POST['judul'];
	$isitopik=$_POST['isi'];
	$user_id=$_POST['user_id'];
	$contgl=date("F j, Y, g:i A");
		mysql_query( "INSERT INTO tb_forum_topik VALUES('$hasilkode','".$_POST['kat_id']."','$user_id',
  '$judul', '$isitopik','0','".date('Y-m-d')."')" );
	
	
	header( "Location: ".SITE_URL."/detail_kategori_forum.php?kat_id=".$_POST['kat_id']."#comment" );


	?>