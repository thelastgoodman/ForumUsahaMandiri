<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include"../Koneksi/Koneksi.php";
include"../ClassFUM/classReplyForum.php";
 $obj_reply = new ReplyForum;
 $obj_replyforum = new ReplyForum;
include"../EditGambar/fungsi_tumbnail1.php";
include"../EditGambar/fungsi_tumbnail2.php";
if ($_GET['aksi']=='replytopik') {
	$topik_id=$_POST['topik_id'];
	$reply=$_POST['reply'];
	$obj_reply->save_topic_reply($topik_id,$reply);
}
?>