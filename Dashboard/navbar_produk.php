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
                
      
            </ul>
  


 <!--   //NAVIGASI BAR KANAN   -->

    <ul class="nav navbar-nav navbar-right">
   
        
        
        
        <li><a href="#"> | Selamat Datang, <?php echo $_SESSION['username']?> : <?php echo $_SESSION['status']?></a></li>
      
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--  TUTUP NAVBAR -->
