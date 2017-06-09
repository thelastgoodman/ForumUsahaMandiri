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
        
                    <li><a href="../Dashboard/index.php">Beranda</a></li>
                  <li><a href="index.php">Forum</a></li>
               
      
            </ul>
  


 <!--   //NAVIGASI BAR KANAN   -->

    <ul class="nav navbar-nav navbar-right">
   
        <li class="dropdown messages-menu">
           
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-square"></i>

              <span class="label label-danger"><span id="jumlah_ditolak"></span>
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
                      <p><?php echo ''.date('d-m-Y', strtotime($tanggal) )?> | <span data-toggle="modal" data-deskripsi="<?php echo $data['deskripsi_produk']?>" data-foto="../files/thumb_<?php echo $data['foto_produk']?>"data-kategori="<?php echo $data['nama_cat']?>"data-napem ="<?php echo $data['nama_lengkap']?>"data-nama="<?php echo $data['nama_produk']?>" data-id="<?php echo $data['id_info_produk']?>" title="Lihat detail produk" class="trash2 open-AddBookDialog" href="#addBookDialog"> Lihat</span></p>
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
      <td><input name="napro" type="text" id="naproo" class="form-control"  readonly value=""/></td>
    </tr>
   <tr>
      <td>Kategori </td>
      <td><input name="kat" type="text" id="kat" class="form-control"  readonly value=""/></td>
    </tr>
  
    <tr>
      <td>Deksripsi</td>
      <td><textarea name="desk" type="text" id="deskk" class="form-control" rows="5" readonly value=""></textarea></td>
    </tr>
  </table>
    <div class="modal-footer">
      <a href="#" id="modalDelete6" class="btn btn-danger">Hapus Produk</a> 
    </div>

      </div>
  </div>
  </div>
</div>