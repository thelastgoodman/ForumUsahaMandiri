<?php
include '../Koneksi/Koneksi.php'

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FUM | Backup dan Restore DB</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php
include 'navbar.php'

?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper" style="background-color:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Backup dan Restore Database
       
      </h1>
      <hr>
    </section>
     <section class="content">
<form action="" method="post" name="postform">
	<div align="center">
	  <p><em><strong><a href="index.php">backup</a></strong> dan <strong><a href="recovery_data.php">restore</a></strong></em></p>
	  <p>
	    <input type="submit" name="backup"  onClick="return confirm('Backup Database?')"value="Proses Backup" />
	  </p>
  </div>
</form>
</p>
<?php
if(isset($_POST['backup'])){

	//membuat nama file
	$file=date("DdMY").'FUM'.time().'.sql';
	
	//panggil fungsi dengan memberi parameter untuk koneksi dan nama file untuk backup
	backup_tables("localhost","root","","ukm_db",$file);
	
	?>
	<p align="center">&nbsp;</p>
	<p align="center"><a style="cursor:pointer" onclick="location.href='download_backup_data.php?nama_file=<?php echo $file;?>'" title="Download"><font color="green">Backup database telah selesai.</font><font color="#0066FF">Download file database</font></a>
</p>
	<?php
}else{
	unset($_POST['backup']);
}

/*
untuk memanggil nama fungsi :: jika anda ingin membackup semua tabel yang ada didalam database, biarkan tanda BINTANG (*) pada variabel $tables = '*'
jika hanya tabel-table tertentu, masukan nama table dipisahkan dengan tanda KOMA (,) 
*/
function backup_tables($host,$user,$pass,$name,$nama_file,$tables = '*')
{
	//untuk koneksi database
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}else{
		//jika hanya table-table tertentu
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//looping dulu ah
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		//menyisipkan query drop table untuk nanti hapus table yang lama
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				//menyisipkan query Insert. untuk nanti memasukan data yang lama ketable yang baru dibuat. so toy mode : ON
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					//akan menelusuri setiap baris query didalam
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//simpan file di folder yang anda tentukan sendiri. kalo saya sech folder "DATA"
	$nama_file;
	
	$handle = fopen('./backup/'.$nama_file,'w+');
	fwrite($handle,$return);
	fclose($handle);
}
?>
</section>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../dist/js/app.min.js"></script>
<script>

/////NOTIFIKASI NAVIGASI BAR
 function AmbilProduk_nav(){
  $.ajax({
        type: "POST",
        url: "aksi_pesan.php?act=select4",
        dataType:'json',
        success: function(response){
          $("#jumlah_ygbelumdisetujui").text(" "+response+"");
          timer = setTimeout("AmbilProduk_nav()",5000);
        }
      });   
}
$(document).ready(function(){
  AmbilProduk_nav();
});
 function AmbilProduk_nav2(){
  $.ajax({
        type: "POST",
        url: "aksi_pesan.php?act=select4",
        dataType:'json',
        success: function(response){
          $("#jumlah_ygbelumdisetujui2").text(" "+response+"");
          timer = setTimeout("AmbilProduk_nav2()",5000);
        }
      });   
}
$(document).ready(function(){
  AmbilProduk_nav2();
});

/////NOTIFIKASI NAVIGASI BAR
 function ambil(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select",
        dataType:'json',
        success: function(response){
          $("#jumlah_info_produk").text(" "+response+"");
          timer = setTimeout("ambil()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil();
});
 function ambiltotal(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select1",
        dataType:'json',
        success: function(response){
          $("#jumlah_total_produk").text(" "+response+"");
          timer = setTimeout("ambiltotal()",5000);
        }
      });   
}
$(document).ready(function(){
  ambiltotal();
});

 function ambil2(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select2",
        dataType:'json',
        success: function(response){
          $("#jumlah_info_produk2").text(" "+response+"");
          timer = setTimeout("ambil2()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil2();
});

 function ambil3(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select3",
        dataType:'json',
        success: function(response){
          $("#jumlah_info_anggota").text(" "+response+"");
          timer = setTimeout("ambil3()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil3();
});


</script>
<script type="text/javascript">
  $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     var myNapem = $(this).data('napem');
     var myNapro= $(this).data('nama');
     var myKategori = $(this).data('kategori');
     var myFoto = $(this).data('foto');
     var myDeskripsi= $(this).data('deskripsi');
     var myDeskripsi2 = $(this).data('deskripsi2');
     $(".modal-body #bookId").val( myBookId );
     $(".modal-body #napem").val( myNapem );
     $(".modal-body #napro").val( myNapro );
     $(".modal-body #kat").val( myKategori );
      $(".modal-body #foto").val( myFoto );
     $("#foto").attr("src", myFoto);
    
     $(".modal-body #desk").val( myDeskripsi );
      $(".modal-body #desk2").val( myDeskripsi2 );
});

$('.trash').click(function(){
    var id=$(this).data('id');
     $('#modalsetujui').attr('href','../ClassFUM/proses_produk.php?aksi=verifikasi_setuju&id='+id);
     $('#modaltolak').attr('href','../ClassFUM/proses_produk.php?aksi=verifikasi_tolak&id='+id);
})
</script>
</body>
</html>

