 <?php
session_start();
 ?>

 <body class="hold-transition skin-blue sidebar-mini">
 <div class="wrapper">
 <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo" style ="background-color :#e1423a ">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>FK</b>PEL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">FK <b>PEL</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" style ="background-color :#f44238 " role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
       
                 <li class="dropdown messages-menu">
           <!------ NOTIF PRODUK MASUK-- -->
                     <a href="#" dropdown-toggle"  data-toggle="dropdown">
                                <?php
                                  $sql =mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Belum'");
                                  $cek = mysql_num_rows($sql);
                                  if ($cek < 1) {
                                     echo "<i class=\"fa fa-globe\" ></i>";
                                  }else{
                                    echo"<i class=\"fa fa-globe \" ></i>";
                                    echo "<span class=\"label label-success\"  ><span id=\"jumlah_ygbelumdisetujui\"></span></span>";
                                  }
                                ?>
            
                     </a>
         
            <ul class="dropdown-menu">
               <li class="header">Notifikasi Produk Belum Disetujui</li>
                                         <?php
                          $prd=mysql_query(" SELECT * from tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_user on tb_info_produk.user_id = tb_user.user_id INNER JOIN tb_anggota on tb_anggota.user_id = tb_user.user_id WHERE disetujui='Belum' ORDER BY id_info_produk DESC LIMIT 0,5");
                          while ($data=mysql_fetch_array($prd)) {
                            $tanggal=$data['tanggal'];
                            
                          
                        ?>
              <li>
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
                      <p><?php echo ''.date('d-m-Y', strtotime($tanggal) )?> | <span data-toggle="modal" data-deskripsi2="<?php echo $data['deskripsi_produk']?>" data-deskripsi="<?php echo $data['alamat_workshop']?>" data-foto="../files/thumb_<?php echo $data['foto_produk']?>"data-kategori="<?php echo $data['nama_cat']?>"data-napem ="<?php echo $data['nama_lengkap']?>"data-nama="<?php echo $data['nama_produk']?>" data-id="<?php echo $data['id_info_produk']?>" title="Lihat produk ini" class="trash open-AddBookDialog" href="#addBookDialog"> Lihat</span></p>
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

         
<li class="dropdown messages-menu">
           <!------ NOTIF PRODUK MASUK-- -->
                     <a href="#" dropdown-toggle"  data-toggle="dropdown">
                                <?php
                                  $sql =mysql_query("SELECT * FROM tb_info_produk WHERE disetujui='Belum'");
                                  $cek = mysql_num_rows($sql);
                                  if ($cek < 1) {
                                     echo "<i class=\"fa fa-bell\" ></i>";
                                  }else{
                                    echo"<i class=\"fa fa-bell \" ></i>";
                                    echo "<span class=\"label label-warning\"  ><span id=\"jumlah_member\"></span></span>";
                                  }
                                ?>
            
                     </a>
         
            <ul class="dropdown-menu">
               <li class="header">Member Baru</li>
                                         <?php
                          $prd=mysql_query(" SELECT * from tb_user INNER JOIN tb_anggota on tb_user.user_id=tb_anggota.user_id WHERE terverifikasi='Belum' ORDER BY tb_user.user_id DESC LIMIT 0,5");
                          while ($data=mysql_fetch_array($prd)) {
                            $tanggal = $data['member_date'];

                        ?>
              <li>
                <!-- inner menu: contains the messages -->

                <ul class="menu">
        
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->

                        <img src="../files/thumb_<?php echo $data['foto_user'];?>" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        <?php echo $data['nama_lengkap']?>
      
                      </h4>
                      <!-- The message -->
                      <p><?php echo ''.date('d-m-Y', strtotime($tanggal) )?> | <?php echo $data['status']?>| <span data-toggle="modal" data-alamat="<?php echo $data['alamat']?> "data-namauser="<?php echo $data['nama_lengkap']?>" data-status="<?php echo $data['status']?>" data-iduser="<?php echo $data['user_id']?>" title="Lihat Member" class="trash open-AddBookDialog2" href="#addBookDialog2"> Lihat</span></p>
                    </a>
                  </li>

                  <!-- end message -->
                </ul>
                   <?php
          }
          ?>
                <!-- /.menu -->
              </li>
      <li class="footer"><a href="data_info_anggotaukm.php">Lihat Semua Member</a></li>
            </ul>
          
            </li>
            <!-- NOTIFIKASI MEMBER -->
          <!-- Messages: style can be found in dropdown.less-->
           <!------ NOTIF PESAN-- -->
          
          <!-- /.messages-menu -->

          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../dist/img/thom.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../dist/img/thom.jpg" class="img-circle" alt="User Image">

                <p>
                  Admin
                 <small>  </small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/thom.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'];?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <br> <br>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
        <li><a href="kategori_produk.php"><i class="fa fa-folder-open"></i> <span>Kategori Produk</span></a></li>
         <li class="treeview">
          <a href="#"><i class="fa fa-folder-open"></i><span>Informasi Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_info_produk.php"><i class="fa fa-circle-o"></i> Data Info Produk</a></li>
            <li><a href="data_rekap_produk.php"><i class="fa fa-circle-o"></i> Data Rekap Produk</a></li>
           <!--  <li><a href="data_keseluruhan_produk.php"><i class="fa fa-circle-o"></i> Data Keseluruhan Produk</a></li> -->
          </ul>
        </li>
          <li class="treeview">
          <a href="#"><i class="fa fa-calendar"></i> <span>Agenda </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="data_info_agenda.php"><i class="fa fa-circle-o"></i> Data Agenda </a></li>
            <li><a href="data_rekap_agenda.php"><i class="fa fa-circle-o"></i> Data Rekap Agenda </a></li>
          </ul>
        </li>
           <li class="treeview">
          <a href=""><i class="fa fa-comments "></i> <span>Forum </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="../Forum/index.php"><i class="fa fa-circle-o"></i> Lihat Forum</a></li>
            <li><a href="data_kategori_forum.php"><i class="fa fa-circle-o"></i> Kategori Topik</a></li>
            <li><a href="data_topik_forum.php"><i class="fa fa-circle-o"></i> Topik Forum </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span>Anggota UKM</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_info_anggotaukm.php"><i class="fa fa-circle-o"></i> Data Anggota UKM</a></li>
            <li><a href="data_info_user.php"><i class="fa fa-circle-o"></i> Data User</a></li>
          </ul>
        </li>
         
         <li class="treeview">
          <a href="index_db.php"><i class="fa fa-file-text-o"></i> <span>Backup & Restore DB</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li><a href="ganti_pass.php"><i class="fa fa-pencil-square-o"></i> <span>Ganti Password</span></a></li>


      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

<div id="addBookDialog" class="modal fade in " data-backdrop="static"  aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="text-center">Detail Produk</h3>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
      <td>Foto Produk</td>
      <td><img id="foto" src="#" width="420" height="250"></td>
    </tr>
    <tr>
      <td>Nama Pemilik</td>
      <td><input name="napem" type="text" id="napem" class="form-control" readonly value=""/></td>
    </tr>
    <tr>
      <td>Nama Usaha</td>
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
      <td><input type="text" name="desk2" type="text" id="desk2" class="form-control" rows="5" readonly value=""></td>
    </tr>
  </table>
   <div class="modal-footer">
      <a href="#" id="modalsetujui" class="btn btn-success">Setujui Produk</a>
      <a href="#" id="modaltolak" class="btn btn-danger">Tolak Produk</a> 
    </div>
    </div>
</div>
</div>
</div>



<div id="addBookDialog2" class="modal fade in " data-backdrop="static"  aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="text-center">Detail Member Baru</h3>
      </div>
      <div class="modal-body">
        <table class="table">
     
    <tr>
      <td>Nama Lengkap</td>
      <td><input name="nauser" type="text" id="nauser" class="form-control" readonly value=""/></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><textarea name="alamatuser" type="text" id="alamatuser" class="form-control" rows="5" readonly value=""></textarea></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><input type="text" name="status" type="text" id="status" class="form-control" rows="5" readonly value=""></td>
    </tr>
  </table>
   <div class="modal-footer">
      <a href="#" id="modalsetujui2" class="btn btn-success">Setujui</a>
      <a href="#" id="modaltolak2" class="btn btn-danger">Tolak</a> 
    </div>
    </div>
</div>
</div>
</div>
</body>
</html>


  

