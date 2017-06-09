<?php
session_start();
include '../Koneksi/Koneksi.php';
?>
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="index.php"><img src="../assets2/images/fk-pelheaderbdg.png" width="125" height="50" style="margin-top:-15px;"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
        
            <!-- /.navbar-collapse -->
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
              <ul class="nav navbar-nav">
        
                  <li><a href="index.php">Beranda</a></li>
                  <li><a href="../Forum/index.php">Forum</a></li>
                  <li><a href="#" data-target="#agreement" data-toggle="modal">Bantuan</a></li>
      
            </ul>
  


 <!--   //NAVIGASI BAR KANAN   -->

    <ul class="nav navbar-nav navbar-right">
   
        <li class="dropdown messages-menu">
           
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
              $sql= mysql_query("SELECT * FROM tb_info_produk WHERE user_id='".$_SESSION['user_id']."' AND disetujui='Tidak'");
              $cek = mysql_num_rows($sql);

              if ($cek <1) {
                   echo "<i class=\"fa fa-envelope-square\"></i>";
                 
              }else {
             echo "<i class=\"fa fa-envelope-square\"></i>";
               echo "<span class=\"label label-danger\"><span id=\"jumlah_ditolak\"></span>";
              }
              ?>
              
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifikasi Produk Ditolak</li>
              <li>
               <?php
          $prd=mysql_query(" SELECT * from tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_user on tb_info_produk.user_id = tb_user.user_id INNER JOIN tb_anggota on tb_anggota.user_id = tb_user.user_id WHERE disetujui='Tidak' AND tb_info_produk.user_id ='".$_SESSION['user_id']."' ORDER BY id_info_produk DESC LIMIT 0,3");
          while ($data=mysql_fetch_array($prd)) {
            $tanggal=$data['tanggal'];
            
          
        ?>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="../files/thumb_<?php echo $data['foto_produk'];?>" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                         <?php echo $data['nama_produk']?>
                      </h4>
                      <!-- The message -->
                      <p><?php echo ''.date('d-m-Y', strtotime($tanggal) )?> | <span data-toggle="modal" data-deskripsi2="<?php echo $data['deskripsi_produk']?>" data-deskripsi="<?php echo $data['alamat_workshop']?>" data-foto="../files/thumb_<?php echo $data['foto_produk']?>"data-kategori="<?php echo $data['nama_cat']?>"data-napem ="<?php echo $data['nama_lengkap']?>"data-nama="<?php echo $data['nama_produk']?>" data-id="<?php echo $data['id_info_produk']?>" title="Lihat detail produk" class="trash2 open-AddBookDialog" href="#addBookDialog">Lihat</span></p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                 <?php
              }
            ?>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="data_info_produk.php">Lihat Semua Produk</a></li>
            </ul>

          </li>
        
        
        <li><a href="#"> | Selamat Datang, <?php echo $_SESSION['username']?> : <?php echo $_SESSION['status']?></a></li>
      
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--  TUTUP NAVBAR -->
<div id="addBookDialog"" class="modal fade in " data-backdrop="static"  aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="text-center">Detail Produk</h3>
      </div>
      <div class="modal-body">
        <table class="table" border="0">
    <tr>
      <td>Foto Produk</td>
      <td><img id="foto" src="#" width="420" height="250"></td>
    </tr>
    <tr>
      <td>Nama Pemilik</td>
      <td><input name="napem" type="text" id="napem" class="form-control" readonly value=""/></td>
    </tr>
    <tr>
      <td>Nama Produk</td>
      <td><input name="napro" type="text" id="napro" class="form-control"  readonly value=""/></td>
    </tr>
   <tr>
      <td>Kategori </td>
      <td><input name="kat" type="text" id="kat" class="form-control"  readonly value=""/></td>
    </tr>
  
    <tr>
      <td>Alamat</td>
      <td><textarea name="desk" type="text" id="desk" class="form-control" rows="5" readonly value=""></textarea></td>
    </tr>
    <tr>
      <td>Deskripsi Usaha</td>
      <td><input type="text" name="desk2" id="desk2" class="form-control" rows="5" readonly value=""></td>
    </tr>
  </table>
    <div class="modal-footer">
      <a href="#" id="modalDelete" class="btn btn-danger">Hapus Produk</a> 
    </div>

      </div>
  </div>
  </div>
</div>












<!-- ///KONTEN UNTUK USER -->
<br><br><br><br><br><br><br>
<div class="col-md-3">

					<?php
						     $sql = mysql_query( "SELECT * FROM tb_user INNER JOIN tb_anggota on tb_user.user_id = tb_anggota.user_id");
						    $cek = mysql_num_rows($sql) ;
						         while($f=mysql_fetch_array($sql)){
						         	if($f["user_id"]==$_SESSION["user_id"]){
				     ?>        

					<center><img  class="img-circle" width="100" height="100"  src="../files/<?php echo $f['foto_user']; ?> "></center>
					<br> <hr>
					 	<div class="media">
			  		<div class="media-left media-top">
			   	    <a href="#">
			        <img class="media-object" src="../assets2/images/bgpinggir.png" alt="..." width="8px;" height="55px;"> </a>
		 		 </div>
		  		<div class="media-body">
				    <h4 class="media-heading" style="font-family:Ostrich Sans; letter-spacing: 1px; line-height :25px;color:#495056; font-size:30px;">&nbsp;<?php echo $f['nama_lengkap'];?></h4>
				     <h5 class="media-heading" style="color:#828181;line-height :20px;padding-right:7px">&nbsp;<?php echo $f['alamat'];?></h5>
				</div>

						</div>
					<?php
}
}
					?>
					<br>
					
 <ul class="nav nav-tabs nav-stacked">
    
    <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li> 
     <?php
     if ($_SESSION['AnggotaUKM']) {
       
     

     ?>
      <li><a href="edit_informasi.php?id=<?php echo $_SESSION['user_id']?>"><span class="glyphicon glyphicon-edit"></span> Edit Informasi</a></li>   
      <li><a href="data_info_produk.php"><span class="glyphicon glyphicon-briefcase"></span> Kelola Produk</a></li>
   
      
      <li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
   
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>     
     <?php

   }
   ?>

   <?php
   if ($_SESSION['NONAnggotaUKM']) {
     # code...
   
   ?>
    <li><a href="edit_informasi.php?id=<?php echo $_SESSION['user_id']?>"><span class="glyphicon glyphicon-edit"></span> Edit Informasi</a></li> 
<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
 
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
      <?php

    }
    ?>
    </ul>
</div>

<div class="modal small fade" data-backdrop="static" data-keyboard="false" id="agreement" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h3 class="text-center">Bantuan Penggunaan</h3>

            </div>
            <div class="modal-body">
                <h4><b> Dashboard user </b></h4>
                <i class="fa fa-caret-right"></i> Menu Navigasi Produk UKM sebagai menu pengelolaan produk anda sebagai Anggota UKM
                <p><i class="fa fa-caret-right"></i> Menu Navigasi Edit Informasi sebagai menu jika anda ingin mengganti Foto Profil, Informasi dll.
                <p><i class="fa fa-caret-right"></i> Menu Navigasi Ganti Password sebagai menu jika anda ingin mengganti password untuk akun anda
                <p><i class="fa fa-caret-right"></i>  Menu Navigasi LogOut sebagai menu jika anda ingin keluar dari akun anda
                <p><i class="fa fa-caret-right"></i> Silahkan pergunakan fitur Notifikasi Produk yang telah kami sediakan (Anggota UKM)
                <h4><b> Forum </b></h4>
            
                <p><i class="fa fa-caret-right"></i> Jika Anda ingin melihat fitur diskusi atau Forum yang telah kami sediakan, silahkan pilih menu Navigasi Bar Forum
                <p><i class="fa fa-caret-right"></i> Untuk membuat sebuah topik, anda terlebih dahulu harus memilih kategori forum
                <p><i class="fa fa-caret-right"></i> Untuk memberikan komentar topik, anda harus memilih topik terlebih dahulu
                <p><i class="fa fa-caret-right"></i> Gunakan fitur pencarian Topik, untuk memudahkan anda dalam pencarian suatu topik
               
            </div>
            <div class="modal-footer">
               <button class="btn btn-default" data-dismiss="modal">Tutup</button>

            </div>
        </div>
   </div>
</div>