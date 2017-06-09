<?php
include"../Koneksi/Koneksi.php";
class ReplyForum{
	function save_topic_reply() {
	$err = array();
	$reply = mysql_real_escape_string( $_POST['reply'] );
	if( empty( $reply ) ) { $err[] = '- Mohon untuk mengisi keterangan jawaban Anda terhadap topik ini'; }
	if( !count( $err ) ) {
		mysql_query( "INSERT INTO tb_forum_reply VALUES( '$reply_id', '".$_GET['topik_id']."', '".$_SESSION['user_id']."', '".time()."', '$reply' )" );
	}
	if( count( $err ) ) { $_SESSION['msg-err-reply']['empty-field'] = implode( '<br>', $err ); }
	header( "Location: ".SITE_URL."/topic.php?option=view-topic&topicid=".$_GET['topik_id']."#comment" );
	exit;
}
function add_new_reply() {
	$err = array();
	$reply = mysql_real_escape_string( $_POST['reply'] );
	if( empty( $reply ) ) { $err[] = '- Maaf, mohon untuk mengisi jawaban Anda'; }
	if( !count( $err ) ) {
		mysql_query( "INSERT INTO ".TABLE_REPLY." VALUES( '$reply_id', '".$_GET['topic_id']."', '".$_SESSION['user_id']."', '".time()."', '$reply' )" );
	}
	if( count( $err ) ) { $_SESSION['msg-error-reply']['reply-err'] = implode( '<br>', $err ); }
	if( count( $err ) ) { header( "Location: ".SITE_URL."/reply.php?option=create-reply&topicid=".$_GET['topic_id'] ); }
	else { header( "Location: ".SITE_URL."/topic.php?option=view-topic&topicid=".$_GET['topic_id'] ); }
	exit;
}
}
?>