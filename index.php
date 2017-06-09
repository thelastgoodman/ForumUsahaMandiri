<?php
session_start();
include '/Koneksi/Koneksi.php'
?>
<html>
	<head>
		<title> FUM | Forum Usaha Mandiri </title>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/bootstrap.css">
            
            <link href="assets/css/qos.css" rel="stylesheet">
            <link href="assets/css/font-awesome.min.css" rel="stylesheet">
            <link href="assets/css/font-awesome.css" rel="stylesheet">
            <link href="assets/css/testi.css" rel="stylesheet">
            <link href="assets/css/footer.css" rel="stylesheet">
              <link rel="icon" type="assets2/images/png" href="assets2/images/logobar.png">
           <!--  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css"> -->
   
	</head>
  <style>
    div#page {
      max-width: 900px;
      margin-left: auto;
      margin-right: auto;
      padding: 20px;
    }
    
    .back-to-top {
      position: fixed;
      bottom: 2em;
      right: 3em;
      text-decoration: none;
     /*
      color: #000000;
      background-color: rgba(235, 235, 235, 0.80);*/
      font-size: 12px;
      padding: 1em;
      display: none;
    }
/*
    .back-to-top:hover {  
      background-color: rgba(238, 50,50,50);

    } 
    */
  </style>
<body>
<?php
include 'navbar.php'
?>
      
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                   
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div> <!-- /intro-header -->
<a href="#" class="back-to-top"><img src="img/scroll.png" width="40" height="40"></a>

    <div class="container">
               <div class="pendahuluan">
               <h3>Selamat Datang</h3>
               <hr class="divider bgletdown">
               <h2>
              
               </h2>





               </div>




              <div class="alasan">
                  <h5> KENAPA MEMILIH KAMI </h5>
              </div>
                <section class="mvxxxl">
              
                 <div class="row">
                            <div class="col-sm-5">
            
                                <div class="media">
                                    <div class="media-left media-top">
                                        <span class="fa-stack fa-3x">
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                      <h4 class="media-heading">Memberikan Solusi</h4>
                                       <span style="font-weight:normal;font-family:HelveticaNeue; font-size:17px; text-align:left;">Menjadi partner bagi masyarakat dalam menjalankan bisnis nya </span>
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-5 col-sm-offset-1">
           
                                <div class="media">
                                    <div class="media-left media-top">
                                        
                                            <span class="fa-stack fa-3x">
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i class="fa fa-certificate fa-stack-1x fa-inverse"></i>
                                            </span>
                                       
                                    </div>
                                    <div class="media-body">
                                      <h4 class="media-heading">Mudah Di Gunakan</h4>
                                       <span style="font-weight:normal;font-family:HelveticaNeue; font-size:17px;">Mudah Di Gunakan</span>
                                    </div>
                                </div>
                            </div>
                  </div>

             
                <div class="row als">
                          <div class="col-sm-5">
         
                              <div class="media">
                                  <div class="media-left media-top">
                                       <span class="fa-stack fa-3x">
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                                       </span>
                                  </div>
                                  <div class="media-body">
                                    <h4 class="media-heading">Terpercaya</h4>
                                    <span style="font-weight:normal;font-family:HelveticaNeue; font-size:17px; text-align:left;">Membantu promosi usaha kecil maupun menengah masyarakat kota cimahi</p>
                                  </div>
                              </div>
                          </div>

                           <div class="col-sm-5 col-sm-offset-1">
         
                              <div class="media">
                                  <div class="media-left media-top">
                                      <span class="fa-stack fa-3x">
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i class="fa fa-commenting fa-stack-1x fa-inverse"></i>
                                      </span>
                                  </div>
                                  <div class="media-body">
                                    <h4 class="media-heading">Fasilitas Diskusi</h4>
                                    <span style="font-weight:normal;font-family:HelveticaNeue; font-size:17px; text-align:left;">Adanya fasilitas forum yang disediakan memungkinkan anda dapat berkomunikasi dengan pebisnis lainya</span>
                                  </div>
                              </div>
                          </div>
                  </div>
                 
             </section>

</div>
             <div class="jumbotron" style="background: url('assets2/images/bgmeeting.png') no-repeat fixed center; width:100%; height:80%; color:white; background-size:cover;">
                  <div class="pendahuluan">
                      <?php
                          include 'testi.php'
                      ?>
                  </div>
             </div>



 
      <div class="container">
        <div class="row">
            <!-- <div class="jumbotron" style="height:300px; width:950px; margin-top:-140px;background-color:#ec2c22;">
                

            </div> -->
              <div class="detailproduk" >
                 <h3>Direktori UMKM Kota Bandung</h3>
                 <hr class="divider bgletdown">
    
                        <?php
                            $sql=mysql_query("SELECT * FROM tb_info_produk inner join tb_user on tb_user.user_id = tb_info_produk.user_id inner join tb_anggota on tb_user.user_id=tb_anggota.user_id WHERE tb_info_produk.disetujui='Ya' ORDER BY id_info_produk DESC LIMIT 0,9 ");
                            while ($data =mysql_fetch_array($sql)) {
                              

                        ?>
                         <div class="col-md-4">
                              <div class="thumbnail" style="border:none;">
                                 <img class="media-object" src="files/thumb_<?php echo $data['foto_produk']?>" width="300" height ="150" alt="...">
                                        <div class="caption">
                                                <?php
                                                if ($data['dibaca']>=50) {
                                                    echo "<h4 class=\"text-left media-heading\" style=\"color:#f44238;margin-top:7px;\"><img src=\"assets2/images/gold.png\" width=\"15\" height=\"15\" style=\"margin-top:-5\"> <a title=\"Lihat Detail\"style=\"text-decoration:none; color:#f44238;\" href=\"get_detail_produk.php?id={$data['id_info_produk']}\">{$data['nama_produk']} </h4></a>";
                                                }else {
                                                   echo "<h4 class=\"text-left media-heading\" style=\"color:#f44238;margin-top:7px;\"><a title=\"Lihat Detail\"style=\"text-decoration:none; color:#f44238;\" href=\"get_detail_produk.php?id={$data['id_info_produk']}\">{$data['nama_produk']}</h4></a>";
                                                }
                                              ?>
                                            
                                              <p style="font-size:1em; font-family:Helvetica;font-weight:normal; line-height:25px;">Di Posting oleh : <?php echo $data['nama_lengkap']?></p>
                                        </div>
                                        
                              </div>


                </div>  

                          <?php
                            }
                          ?>
                          <section class="error-wrapper text-center">
                                <h5><a class="back-btn" href="produk_fum.php" style="text-decoration:none fixed center;  ">Lihat Produk Lainya</a></h5>
                          </section>          
     </div>
         
</div>
  
      
        
       

    
</div>

      </div> 
 <div class="content-section-a">
            <div class="container">
                   <div class="row">

                      <div class="col-lg-5 col-sm-6" >
                          <hr class="section-heading-spacer">
                          <div class="clearfix"></div>
                          <h2 class="section-heading">Mini Gathering FK-PEL<br>2017</h2>
                          <p class="lead"><font color="#f44238">Gathering</font> ini di tunjukan sebagai kegiatan untuk mempererat tali silahturahmi antara sesama pelaku usaha ukm maupun non ukm</p>
                      </div>
                      <div class="col-lg-5 col-lg-offset-2 col-sm-6" >
                          <img class="img-responsive" src="assets2/images/5.jpg" alt="">
                      </div>
               
 
                   </div>

             </div>
               
    </div>
         <br>
    <div class="container">

        <div class="row">

            <div class="detailproduk" >
                 <h3>Agenda Forum </h3>
                 <hr class="divider bgletdown">
                      <div class="col-sm-12">
                          <?php

                            $sql=mysql_query("SELECT * FROM tb_agenda WHERE terlaksana ='belum' ORDER BY id_agenda DESC LIMIT 0,6");
                            $cek=mysql_num_rows($sql);
                            
                            echo "<div class=\"panel panel-kostum\">";
                             
                              echo "<ul class=\"list-group\"> ";
                              $no=1;
                                if( mysql_num_rows( $sql ) == 0 ) { 
                                  echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Maaf Data Agenda Belum Tersedia saat ini....</td></tr>"; 
                              }else{
                                   while ($data=mysql_fetch_array($sql)) {

                                   $tanggal=$data['tanggal_agenda'];
                                    ?><br>
                                      <li class="list-group-item">
                                          <div class="media">
                                                  <div class="media-left media-top">
                                                      <a href="#addBookDialog" class="open-AddBookDialog" title="Lihat detail" data-toggle="modal" data-deskripsi="<?php echo $data['isi_agenda']?>" data-agenda="<?php echo $data['judul_agenda']?>" data-gbr="files/thumb_<?php echo $data['gambar']?>">
                                                       <img class="media-object" src="files/thumb_<?php echo $data['gambar']?>" width="120px" height="90px" alt="...">
                                                      </a>
                                                  </div>

                                                   <div class="media-body">
                                                         <h5 class="media-heading"><span style="color:#f44238;text-decoration:none; font-size:15px;"><?php echo $data['judul_agenda']?></span>
                                                          <p style="font-size:15px; font-family:Helvetica;font-weight:normal; line-height:25px;"><?php echo ''.substr($data['isi_agenda'],0,400)."..."?></p>
                                                          <i><span style="font-size: 11px;color:grey;font-family:Helvetica;font-weight:normal;"><?php echo ''.date('j-F-Y', strtotime($tanggal) ) ?></span></i>
                                                   </div>
                           <?php
                           } 
                        
                             echo "</div>";
                              }
                          ?>

                                          </div>

              </div>

              </div>


     </div>
</div>
   
    
<p>.</p>
<p>.</p>

<?php
include 'footer.php'
?>
</body>
</html>



















<div id="addBookDialog" class="modal fade in " data-backdrop="static"  aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
      <td></td>
      <td><img id="gambar" src="#" width="500" height="300"></td>
    </tr>
    <tr>
      <td>Agenda</td>
      <td><input name="napem" type="text" id="napem" class="form-control" readonly value=""/></td>
    </tr>
    <tr>
      <td>Deksripsi Agenda</td>
      <td><textarea name="desk" type="text" id="desk" class="form-control" rows="5" readonly value=""></textarea></td>
    </tr>
  </table>
      
    </div>
</div>
</div>
</div>
</body>
</html>

<script type="text/javascript">
 $(document).on("click", ".open-AddBookDialog", function () {
     var myGambar = $(this).data('gbr');
     var myNapem = $(this).data('agenda');
     var myNapro= $(this).data('nama');
     var myKategori = $(this).data('kategori');
     var myFoto = $(this).data('foto');
     var myDeskripsi= $(this).data('deskripsi');
     
     $(".modal-body #napem").val( myNapem );
     $(".modal-body #napro").val( myNapro );
     $(".modal-body #kat").val( myKategori );
     $(".modal-body #gambar").val( myGambar  );
     $("#gambar").attr("src", myGambar );    
     $(".modal-body #desk").val( myDeskripsi );
});

</script>
 <script>            
      jQuery(document).ready(function() {
        var offset = 450;
        var duration = 500;
        jQuery(window).scroll(function() {
          if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
          } else {
            jQuery('.back-to-top').fadeOut(duration);
          }
        });
        
        jQuery('.back-to-top').click(function(event) {
          event.preventDefault();
          jQuery('html, body').animate({scrollTop: 0}, duration);
          return false;
        })
      });
    </script>
