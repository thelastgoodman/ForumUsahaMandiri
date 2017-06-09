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
                <a class="navbar-brand topnav" href="../Dashboard/index.php"><img src="../assets2/images/fk-pelheaderbdg.png" width="125" height="50" style="margin-top:-15px;"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
        
            <!-- /.navbar-collapse -->
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
              <ul class="nav navbar-nav">
        
                  <li><a href="../Dashboard/index.php">Beranda</a></li>
                  <li><a href="index.php">Forum</a></li>
                  <li><a href="#" data-target="#agreement" data-toggle="modal">Bantuan</a></li>
                    
      
            </ul>
  


 <!--   //NAVIGASI BAR KANAN   -->

    <ul class="nav navbar-nav navbar-right">
   
        
        
        
        <li><a href="#"> | Selamat Datang, <?php echo $_SESSION['username']?> : <?php echo $_SESSION['status']?></a></li>
      
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--  TUTUP NAVBAR -->
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