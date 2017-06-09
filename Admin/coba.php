<?php
session_start();
include '../Koneksi/Koneksi.php'
?>
<html>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" href="../assets2/css/bootstrap.css">
		<link rel="stylesheet" href="../assets2/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets2/css/styles1.css">
    <script type="text/javascript" src="../assets2/js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>

<body>
<?php
          $prd=mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Belum' ORDER BY id_info_produk DESC ");
          while ($data=mysql_fetch_array($prd)) {
            $tanggal=$data['tanggal'];
            
          
        ?>
       
<a data-toggle="modal" data-nama="<?php echo $data['nama_produk']?>" data-id="<?php echo $data['id_info_produk']?>" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a>



<div id="addBookDialog"" class="modal fade in " data-backdrop="static"  aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="text-center">Detail Produk</h3>
      </div>
      <div class="modal-body">
       <div class="form-group">
        <p>some content</p>
        <input type="text" name="bookId" id="bookId" value=""/>
        </div>
         <div class="form-group">
            <label>Nama Produk<font color="red" ><p id='pesan_error_nama'></p></font></label>
            <input name="napro" type="text" id="napro" class="form-control" value=""/>
          </div>
    </div>
</div>
</div>
</div>
<?php
}
?>
</body>
</html>
<script type="text/javascript">
	$(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     var myNapro= $(this).data('nama');
     $(".modal-body #bookId").val( myBookId );
      $(".modal-body #napro").val( myNapro );
});

</script>