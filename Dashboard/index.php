<?php
@session_start();
if (@$_SESSION['AnggotaUKM'] || @$_SESSION['NONAnggotaUKM']) {


include '../Koneksi/Koneksi.php'
?>
<html>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" href="../assets2/css/bootstrap.css">
		<link rel="stylesheet" href="../assets2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
<link rel="stylesheet" href="../assets2/css/styles1.css">
<link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
       <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
    <script type="text/javascript" src="../assets2/js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>
<style>
body{
  background-color:#faf9f9;
}
</style>
<body>
<div class="container">
  <div class="row">
<?php
include 'navbar.php'

?>

<div class="col-md-9">
 <?php 
  if (isset($_GET['st'])) {
    if ($_GET['st']==1) {
     echo "<div class='alert alert-danger fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong>Data Produk Berhasil Di Hapus';
  echo "</div>";
   
}
}
    ?>
<div class="back-produk">
<div class="col-md-4" >
        <div class="info-produk">
        <div class="media">
          <div class="media-left media-middle">
            <a href="data_info_produk.php">
              <img class="media-object" src="../assets2/images/icon1.png" width="60" height="60" alt="...">
            </a>
          </div>
          <div class="media-body">
            <h3 class="media-heading"><center><span id="jumlah_postingan"></span></center></h3>
            <center><b><font color="#59bcdc">POSTING PRODUK </b></font></center>
          </div>
        </div>
        </div>
</div>
<div class="col-md-4" >
        <div class="info-produk">
        <div class="media">
          <div class="media-left media-middle">
          
       
              <img class="media-object" src="../assets2/images/icon2.png" width="60" height="60" alt="...">
            
          </div>
          <div class="media-body">
            <h3 class="media-heading"><center><span id="jumlah_disetujui"></span></center></h3>
            <center> <b><font color="#6dc7be"> PRODUK DISETUJUI</b></font></center>
          </div>
        </div>
        </div>
</div>
<div class="col-md-4" >
        <div class="info-produk">
        <div class="media">
               <div class="media-left media-middle">
                <a href="../forum/index.php">
              <img class="media-object" src="../assets2/images/icon3.png" width="60" height="60" alt="..."></a>
        
          
            
          </div>
          <div class="media-body">
            <h3 class="media-heading"><center><span id="jumlah_ygbelumdisetujui"></span></center></h3>
            <center> <b><font color="#ff8762">BELUM DISETUJUI</b></font></center>
          </div>
        </div>
        </div>
</div>
</div>


<?php 

$per_hal=2;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_info_produk where disetujui='Belum' and user_id='".$_SESSION['user_id']."'");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<!-- <table class="col-md-2">
    <tr>
      <td>Jumlah Record</td>    
      <td><?php echo $jum; ?></td>
    </tr>
     <tr>
      <td>Jumlah Halaman</td>    
      <td><?php echo $halaman; ?></td>
    </tr>
  </table> -->
<div class="panel-produk">
  <div class="col-md-8">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border" >
              <h3 class="box-title">Produk Anda</h3>

            
            </div>
            <div class="box-body chart-responsive" >
              <div class="chart" id="revenue-chart"  >
          
                <?php
                 $no=1;
                 $kode = $_SESSION['user_id'];
               
                 $prd2=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk ON tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk WHERE tb_info_produk.user_id='".$_SESSION['user_id']."' AND disetujui='Belum' ORDER BY id_info_produk DESC  limit $start, $per_hal ");
                 $cek=mysql_num_rows($prd2);
                 if ($cek<1) {
                      echo "<tr height=\"40\"><td colspan=\"5\" align=\"center\">Belum ada produk saat ini </td></tr>"; 
                 }
                 while ($data=mysql_fetch_array($prd2)) {
                  if($data['disetujui']=='Belum'){
                   if ($data["user_id"]==$_SESSION["user_id"]) {
                    $tanggal=$data ['tanggal'];
                 ?>
                 
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src="../files/thumb_<?php echo $data['foto_produk']; ?>" width="60px" height="40px" alt="...">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a style="text-decoration:none;" href ="detail_info_produk2.php?id=<?php echo $data['id_info_produk'];?>"><?php echo $data['nama_produk'];?></a></h4>
   <i> Tanggal Post: <?php echo ''.date('d-m-Y', strtotime($tanggal) ); ?></i>
  </div>
 
</div>
       <hr>              
                  <?php     
                  
                }
                 
}
}
                  ?>

   <ul class="pagination" style="margin-top:-10px;">     
      <?php 
      for($x=1;$x<=$halaman;$x++){
        ?>
        <li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
        <?php
      }
      ?>            
    </ul>
  </div>
  <?php
  $cek=mysql_query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."'");
  while ($data=mysql_fetch_array($cek)) {
   
    echo"<input hidden=\"text\" id=\"cek\" value=\"{$data['username']}\"";
    
  }
?>
      
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
</div>
</div>
</div>
</div>
          


<script type="text/javascript">

// $(window).load(function(){
//         $('#welcomeuser').modal('show');
//     });

 function ambil1(){
  $.ajax({
        type: "POST",
        url: "aksi_pesan.php?act=select1",
        dataType:'json',
        success: function(response){
          $("#jumlah_postingan").text(" "+response+"");
          timer = setTimeout("ambil1()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil1();
});
 function update(){
  $.ajax({
        type: "POST",
        url: "aksi_pesan.php?act=update",
        dataType:'json',
        success: function(response){
          $("#cek").text(" "+response+"");
          timer = setTimeout("update()",5000);
        }
      });   
}
$(document).ready(function(){
  update();
});
 function ambil2(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select2",
        dataType:'json',
        success: function(response){
          $("#jumlah_ygbelumdisetujui").text(" "+response+"");
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
          $("#jumlah_disetujui").text(" "+response+"");
          timer = setTimeout("ambil3()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil3();
});

 function ambil4(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select4",
        dataType:'json',
        success: function(response){
          $("#jumlah_ditolak").text(" "+response+"");
          timer = setTimeout("ambil4()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil4();
});
 function ambil5(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select5",
        dataType:'json',
        success: function(response){
          $("#jumlah_disetujui2").text(" "+response+"");
          timer = setTimeout("ambil5()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil5();
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
     $(".modal-body #napem").val( myNapem );
     $(".modal-body #napro").val( myNapro );
     $(".modal-body #kat").val( myKategori );
     $(".modal-body #foto").val( myFoto );
     $("#foto").attr("src", myFoto);    
     $(".modal-body #desk").val( myDeskripsi );
     $(".modal-body #desk2").val( myDeskripsi2 );

});

$('.trash2').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','hapus_detail_produk.php?id='+id);
})

</script>

</body>
</html>
<?php
}else{
  header("location: ../login.php");
}
?>
