<?php

#Koneksi ke database dan deklarasi variable konstanta
date_default_timezone_set("Asia/Jakarta");
define( 'SITE_URL', 'http://localhost/FUM-Salman/Forum' );
$user_name = "root";
$password = "";
$database = "ukm_db";
$host_name = "localhost"; 
 
mysql_connect($host_name, $user_name, $password);
mysql_select_db($database);
error_reporting(0);

$option = isset( $_GET['option'] ) ? $_GET['option'] : '';
$action = isset( $_POST['action'] ) ? $_POST['action'] : '';
 
?>