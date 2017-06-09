<?php
@session_start();
if (@$_SESSION['Admin']) {
  # code...

include '../Koneksi/Koneksi.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Admin</title>
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
 <div class="wrapper">
 <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1>
        Dashboard FK-PEL
        <small>Forum Kemitraan Pengembangan Ekonomi Lokal</small>
        
      </h1>
      

    </section>




 
    <!-- Main content -->
    <section class="content">

  <div class="row">
  <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><span id="jumlah_total_produk"></h3></span>

              <p>Total Produk UKM</p>
          </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="data_keseluruhan_produk.php" class="small-box-footer">Lihat Detail &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
          </div>
  </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><span id="jumlah_info_produk"></h3></span>

              <p>Produk belum di setujui</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="data_info_produk.php" class="small-box-footer">Lihat Detail &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><span id="jumlah_info_produk2"></h3></span>

              <p>Produk sudah di setujui</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="data_rekap_produk.php" class="small-box-footer">Lihat Detail &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><span id="jumlah_info_anggota"></h3></span>

              <p>Total Anggota UKM</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="data_info_anggotaukm.php" class="small-box-footer">Lihat Detail &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
</h3>
</div>


<div class="row">
          <div class="col-md-7">
          <!-- AREA CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <div id="mygraph"></div>
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
          </div>
<div class="row">
          <div class="col-md-7">
          <!-- AREA CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <div id="mygraph2"></div>
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
          </div>
          </div>
</div>

    </section>


   
  </div>
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
         </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">FUM |  Almsaeed Studio </a>.</strong> All rights reserved.
  </footer>
        <!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->

<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"> </script>
<script src="../assets2/highcharts/highcharts.js"></script>


<script type="text/javascript">
var chart; 
    $(document).ready(function() {
        chart = new Highcharts.Chart(
        {
          
         chart: {
          renderTo: 'mygraph',
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false
         },   
         title: {
          text: 'Cluster Direktori UMKM Kota Cimahi  '
         },
         tooltip: {
          formatter: function() {
            return '<b>'+
            this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
          }
         },
         
        
         plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: true,
              color: '#000000',
              connectorColor: 'green',
              formatter: function() 
              {
                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
              }
            }
          }
         },
       
          series: [{
          type: 'pie',
          name: 'Browser share',
          data: [
          <?php
              include "../Koneksi/Koneksi.php";
            $query = mysql_query("SELECT nama_cat, COUNT( tb_info_produk.id_cat_produk ) AS TotalProduk
FROM tb_info_produk
INNER JOIN tb_cat_produk ON tb_info_produk.id_cat_produk = tb_cat_produk.id_cat_produk WHERE disetujui='Ya'
GROUP BY tb_cat_produk.nama_cat");
           
            while ($row = mysql_fetch_array($query)) {
              $clustername = $row['nama_cat'];
             
              $data = mysql_fetch_array(mysql_query("SELECT nama_cat, COUNT( tb_info_produk.id_cat_produk ) AS TotalProduk
FROM tb_info_produk
INNER JOIN tb_cat_produk ON tb_info_produk.id_cat_produk = tb_cat_produk.id_cat_produk where nama_cat='$clustername'"));
              $jumlah = $data['TotalProduk'];
              ?>
              [ 
                '<?php echo $clustername ?>', <?php echo $jumlah; ?>
              ],
              <?php
            }
            ?>
       
          ]
        }]
        });
    }); 
</script> 
  <script type="text/javascript">
var chart; 
    $(document).ready(function() {
        chart = new Highcharts.Chart(
        {
          
         chart: {
          renderTo: 'mygraph2',
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false
         },   
         title: {
          text: ' Direktori UMKM Kota Cimahi Per Kecamatan '
         },
         tooltip: {
          formatter: function() {
            return '<b>'+
            this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
          }
         },
         
        
         plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: true,
              color: '#000000',
              connectorColor: 'green',
              formatter: function() 
              {
                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
              }
            }
          }
         },
       
          series: [{
          type: 'pie',
          name: 'Browser share',
          data: [
          <?php
              include "../Koneksi/Koneksi.php";
            $query = mysql_query("SELECT kecamatan, COUNT( tb_info_produk.kecamatan ) AS TotalProduk
FROM tb_info_produk WHERE disetujui='Ya'
GROUP BY tb_info_produk.kecamatan");
           
            while ($row = mysql_fetch_array($query)) {
              $clustername = $row['kecamatan'];
             
              $data = mysql_fetch_array(mysql_query("SELECT kecamatan, COUNT( tb_info_produk.kecamatan ) AS TotalProduk
FROM tb_info_produk where kecamatan='$clustername'"));
              $jumlah = $data['TotalProduk'];
              ?>
              [ 
                '<?php echo $clustername ?>', <?php echo $jumlah; ?>
              ],
              <?php
            }
            ?>
       
          ]
        }]
        });
    }); 
</script> 
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

 function member(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select5",
        dataType:'json',
        success: function(response){
          $("#jumlah_member").text(" "+response+"");
          timer = setTimeout("member()",5000);
        }
      });   
}
$(document).ready(function(){
  member();
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

<script type="text/javascript">
  $(document).on("click", ".open-AddBookDialog2", function () {
     var myBookId1 = $(this).data('iduser');
     var myNauser = $(this).data('namauser');
     var myalamat= $(this).data('alamat');
     var mystatus = $(this).data('status');

    
     $(".modal-body #nauser").val( myNauser );
     $(".modal-body #alamatuser").val( myalamat );
     $(".modal-body #status").val( mystatus );
    
     
});


$('.trash').click(function(){
    var ids=$(this).data('iduser');
     $('#modalsetujui2').attr('href','../ClassFUM/proses_anggota.php?aksi=anggota_setuju&id='+ids);
     $('#modaltolak2').attr('href','../ClassFUM/proses_anggota.php?aksi=anggota_tolak&id='+ids);
})
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
<?php
}else{
  header("location:../login.php");
}
?>