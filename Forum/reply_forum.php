<?php
session_start();
include '../Koneksi/Koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$carikode = mysql_query("select max(id_reply) as idMaks from tb_forum_reply") or die (mysql_error());
                          // menjadikannya array
                          $datakode = mysql_fetch_array($carikode);
                          // jika $datakode
                          
                           // membuat variabel baru untuk mengambil kode barang mulai dari 1
                           $nilaikode = $datakode['idMaks'];
                           // menjadikan $nilaikode ( int )
                           $hasilkode = (int) substr($nilaikode,0, 3);
                           // setiap $kode di tambah 1
                           $hasilkode ++;

	$reply =$_POST['reply'];
	$contgl=date("j F Y, g:i A");
		mysql_query( "INSERT INTO tb_forum_reply VALUES( '$hasilkode', '".$_POST['topik_id']."', '".$_SESSION['user_id']."', '$contgl', '$reply' )" );
	
	
	header( "Location: ".SITE_URL."/detail_topik_forum.php?option=view-topic&topik_id=".$_POST['topik_id']."#comment" );


	?>
