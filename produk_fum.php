<?php
session_start();
include 'koneksi/koneksi.php';
?>
<html>
<head>
  <title> FUM | Data Produk  </title>
  <script src="assets2/js/jquery.min.js"></script>
  
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  
  <link href="assets/css/landing-page.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <link href="assets/css/testi.css" rel="stylesheet">
  <link href="assets/css/footer.css" rel="stylesheet">
  <link rel="icon" type="assets2/images/png" href="assets2/images/logobar.png">
  <link href="assets2/js/jquery-ui/jquery-ui.css" rel="stylesheet">
  <script src="assets2/js/jquery-ui/jquery-ui.js"></script>
  <script src="assets2/js/bootstrap.min.js"></script>
  
</head>

<body>

  <?php
  include 'navbar.php'
  ?>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-6" >
        
        <h2 class="section-heading">Profil Produk Forum Kemitraan Pengembangan Ekonomi Lokal</h2>
        <p class="lead"><font color="#f44238">Halaman ini</font> merupakan direktori profil usaha mereka, yang telah mendaftarkan produknya. Jika anda mencari suatu produk anda bisa menggunakan fitur pencarian produk berdasarkan kategori produk maupun fitur pencarian yang telah kami sediakan. <font color="grey">Happy searching!</font> </p>
      </div>
    </div>
  </div>
  <hr>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6" style="margin-top:-8px;" >
        <?php
        echo"<form class=\"navbar-form navbar-right\" role=\"search\" action=\"\" method=\"post\">";          
        echo"<div class=\"form-group\">";
        
        echo"</div>";
        echo"<div class=\"form-group\">";
        echo "<select class='input-large form-control' <select name=\"search\">";
        echo" <option>---- Urutkan Berdasarkan Kategori Produk ----</option>";
        
        
        $sql = mysql_query("SELECT * FROM tb_cat_produk ORDER BY nama_cat ASC");
        if(mysql_num_rows($sql) != 0){
          while($data = mysql_fetch_array($sql)){
            echo '<option>'.$data['nama_cat'].'</option>';
          }
        }
        
        echo"</select>";
        echo"</div>";
        echo"<button type=\"submit\" name=\"button\"class=\"btn btn-danger\">Urutkan</button>";
        echo"</form>";
        ?>
      </div>
      
      <div class="col-md-4">
        <form action="cari_act.php" method="get">
          <div class="input-group">
            <form class="navbar-form navbar-right" role="search" action="" method="post">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
              <input type="text" class="form-control" placeholder="Cari Nama Produk di sini" aria-describedby="basic-addon1" name="cari" id="cari">
              <input type="hidden" class="form-control" id="id_produk" name="id_produk"> 
            </form>
          </div>
        </form>
      </div>

      
      <?php 
      $per_hal=12;
      $jumlah_record=mysql_query("SELECT COUNT(*) from tb_info_produk where disetujui='Ya'");
      $jum=mysql_result($jumlah_record, 0);
      $halaman=ceil($jum / $per_hal);
      $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
      $start = ($page - 1) * $per_hal;
      ?>
      <div class="col-lg-12" style="padding-top:40px;">
       
        <?php
        if (isset($_POST['button'])) {
         
          $search = $_POST ['search'];
          $sql=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk ON tb_cat_produk.id_cat_produk = tb_info_produk.id_cat_produk INNER JOIN tb_user ON tb_info_produk.user_id = tb_user.user_id INNER JOIN tb_anggota ON tb_user.user_id = tb_anggota.user_id WHERE disetujui='Ya' AND nama_cat like '%$search%' ORDER BY id_info_produk DESC");
          
        }elseif (isset($_GET['cari'])) {
          $cari=mysql_real_escape_string($_GET['cari']);
          $sql=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk ON tb_cat_produk.id_cat_produk = tb_info_produk.id_cat_produk INNER JOIN tb_user ON tb_info_produk.user_id = tb_user.user_id INNER JOIN tb_anggota ON tb_user.user_id = tb_anggota.user_id  WHERE  disetujui='Ya' AND nama_produk like '%$cari%' ORDER BY id_info_produk DESC");
        }else{
          $sql=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk ON tb_cat_produk.id_cat_produk = tb_info_produk.id_cat_produk INNER JOIN tb_user ON tb_info_produk.user_id = tb_user.user_id INNER JOIN tb_anggota ON tb_user.user_id = tb_anggota.user_id WHERE disetujui='Ya' ORDER BY id_info_produk DESC LIMIT $start,$per_hal")or die(mysql_error());
        }
        $cek=mysql_num_rows($sql);  
        if ($cek<1){
         echo "<tr height=\"40\"><td colspan=\"12\" align=\"center\">Maaf Data Produk tidak ada</td></tr>";   
       }
       while ($data=mysql_fetch_array($sql)) {
         
         
        

        ?>
        
        
        <div class="col-md-3">


          <div class="thumbnail">
           <img class="media-object" src="files/thumb_<?php echo $data['foto_produk']?>" width="300" height ="150" alt="...">
           <div class="caption">
            <?php
            if ($data['dibaca']>=50) {
              echo "<h4 class=\"text-left media-heading\" style=\"color:#f44238;margin-top:7px;\"><img src=\"assets2/images/gold.png\" width=\"15\" height=\"15\" style=\"margin-top:-5\"> <a title=\"Lihat Detail\"style=\"text-decoration:none; color:#f44238;\" href=\"get_detail_produk.php?id={$data['id_info_produk']}\">{$data['nama_produk']} </h4></a>";
            }else {
             echo "<h4 class=\"text-left media-heading\" style=\"color:#f44238;margin-top:7px;\"><a title=\"Lihat Detail\"style=\"text-decoration:none; color:#f44238;\" href=\"get_detail_produk.php?id={$data['id_info_produk']}\">{$data['nama_produk']}</h4></a>";
           }
           ?>
           
           <p style="font-size:1em; font-family:Helvetica;font-weight:normal; line-height:25px;">Oleh : <?php echo $data['nama_lengkap']?></p>
         </div>
         
       </div>
       

     </div>
     

     
     <?php
   }

   ?>
   <div class="col-md-11">
    <ul class="pagination">     
      <?php 
      for($x=1;$x<=$halaman;$x++){
        ?>
        <li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
        <?php
      }
      ?>            
    </ul>
  </div>



</div> <!-- //ColLG12 -->
</div> <!-- //Row Pencarian -->
</div> <!-- //Container Pencarian -->


</div>

</div>    
<?php 
include 'footer.php';
?>           

</body>
</html>
<script type="text/javascript">
  $(function() {
    $( "#cari" ).autocomplete({
      source: "autocomplete.php",
      minLength: 3,
      select: function( event, ui ) {
        $('#id_produk').val(ui.item.id_info_produk);
      }
    });
  });
</script>