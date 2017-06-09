<?php
session_start();
include '../Koneksi/Koneksi.php'

?>
<html>
  <head>
    <title>FUM | Detail Topik </title>
    <link rel="stylesheet" href="../assets2/css/bootstrap.css">
    <link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
    <link rel="stylesheet" href="../assets2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets2/css/styles1.css">
        <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
<style>
#testing a {
  color:#545454;
  font-size:14px;
  font-weight: 500px;
}
#testing a:hover {
  color :#f44238;
}
</style>
<body>
<div class="container">
   
  <?php
      include 'other_navbar.php'
    ?>
     <br><br><br>
<div class="row">
  <div class="col-md-8" style="padding-top:75px;">
  

<?php
//QUERY KOMENTAR
$kat_ide=$_GET['kat_id'];
mysql_query( "UPDATE tb_forum_topik SET dilihat=dilihat+1 WHERE id_topik='".$_GET['topik_id']."'" );
  $sql = mysql_fetch_array(mysql_query("SELECT * FROM tb_forum_topik, tb_forum_kategori,tb_user, tb_anggota WHERE  tb_forum_topik.user_id=tb_user.user_id AND tb_forum_topik.kategori_id=tb_forum_kategori.kategori_id AND tb_user.user_id =tb_anggota.user_id AND tb_forum_topik.id_topik ='".$_GET['topik_id']."'"));
  $sql2 = mysql_query("SELECT COUNT(*) as total FROM tb_forum_topik INNER JOIN tb_user ON tb_forum_topik.user_id=tb_user.user_id WHERE tb_forum_topik.user_id = tb_user.user_id ");
 $data=mysql_fetch_array($sql2);
  $tanggal = $sql['tanggal_topik'];
  $tanggal2 = $sql['member_date'];

   ?>
   <?php
    if ($sql['status']=='Admin') {
    ?>
    
  
           <div class="headerposting2">
       <?php echo ''.date('d-m-Y',strtotime($tanggal2))?>
     </div>
     <div class="panel panel-default">
      <div class="panel-heading">
       
          
             
                 <div class="media">
                     <div class="media-left media-middle">
                      <img class="media-object" src="../files/thumb_<?php echo $sql['foto_user']?>"" width="60" height="60">
                     </div>
                      <div class="media-body">
                       <h4 class="media-heading"><?php echo $sql['username']?></h4>
                       <span style="font-size: 12px; color:grey; line-height: 1.3em;"><p><?php echo $sql['status']?> - Join: <?php echo ''.date('d-m-Y',strtotime($tanggal2))?></span>
                      </div>
                  </div>
             
          </div>
                  <div class="sectionposting">
                    <h4><p><b><?php echo $sql['judul_topik']?></b></p></h4><hr>
                    <p><?php echo $sql['isi_topik']?></p>
                  </div>
    </div>
            
      
       

    <?php
  }else{
  ?>
     <div class="headerposting">
       <?php echo ''.date('d-m-Y',strtotime($tanggal2))?>
     </div>
     <div class="panel panel-default">
      <div class="panel-heading">
       
          
             
                 <div class="media">
                     <div class="media-left media-middle">
                      <img class="media-object" src="../files/thumb_<?php echo $sql['foto_user']?>"" width="60" height="60">
                     </div>
                      <div class="media-body">
                       <h4 class="media-heading"><?php echo $sql['username']?></h4>
                       <span style="font-size: 12px; color:grey; line-height: 1.3em;"><p><?php echo $sql['status']?> - Join: <?php echo ''.date('d-m-Y',strtotime($tanggal2))?></span>
                      </div>
                  </div>
             
          </div>
                  <div class="sectionposting">
                    <h4><p><b><?php echo $sql['judul_topik']?></b></p></h4><hr>
                    <p><?php echo $sql['isi_topik']?></p>
                  </div>
    </div>
<?php
}
?>
<!-- CLear -->
<?php

// SECTION KOMENTAR
  if( isset( $_SESSION['user_id'] ) ) {
    
    echo "<a name=\"comment\"></a>";
    if( isset( $_SESSION['msg-err-reply']['empty-field'] ) ) {
      echo "<p class=\"err\"><b>Pesan kesalahan:</b><br>".$_SESSION['msg-err-reply']['empty-field']."</p>";
      unset( $_SESSION['msg-err-reply']['empty-field'] );
    }
?>

    <form method="post" action="reply_forum.php" name="komentar">
         <h4>Komentari</h4><textarea name="reply" id="reply" rows="7" cols="105"></textarea><br><br>
         <input class='btn btn-danger' type="submit" name="action" value="Balas Topik" 
         onclick="return cekkomentar()">
         <?php echo "<input type=\"hidden\" name=\"topik_id\" value=\"".$_GET['topik_id']."\">"?>
         <a class='btn btn-default' href="index.php">Kembali</a>
    </form>

  <?php
  } else {
    ?>
    <h1>Tidak bisa komentar</h1>
    <p>Tidak bisa komentar</p>
    <?php
  
}
  ?>
<!--   SECTION KOMENTAR -->
 <?php

  // SECTION KOMENTAR

  $sql2 = mysql_query("SELECT * FROM tb_forum_reply INNER JOIN tb_user ON tb_forum_reply.user_id=tb_user.user_id  INNER JOIN tb_anggota ON tb_user.user_id=tb_anggota.user_id WHERE tb_forum_reply.user_id=tb_user.user_id AND tb_forum_reply.id_topik ='".$_GET['topik_id']."'  ORDER BY tb_forum_reply.id_reply DESC");
  if( mysql_num_rows( $sql2 ) == 0 ) {
    echo "<p>Tidak Ada Komentar.</p>";
  } else {
    echo "<h4>".mysql_num_rows( $sql2)." Komentar</h4>";
   
    /////Kolom Komentar
    while( $row = mysql_fetch_array( $sql2) ) {
      $tanggal=$row['member_date'];
    date_default_timezone_set("Asia/Jakarta");

    ///Button Hapus tiap section Komentar
    if ($_SESSION['Admin']) {
      echo"<a href=\"hapus_reply.php?id_reply=".$row['id_reply']."&topik_id=".$row['id_topik']."\" style=\"float:right; margin-top:-30px;\" class=\"btn btn-danger\" title=\"Hapus\"><span class=\"glyphicon glyphicon-remove\"></a>";
    }
    /// Kolom Komentar Jika Admin bos
  ?>
  <?php
  if ($row['status']=='Admin') {
    ?>
     <div class="panel panel-default">
  
          <div class="headerposting2">
      <?php echo $row['tanggal_reply']?>
        </div>
          <div class="isikonten">
            <div id="kiri">
                <div class="foto">
                <img class="media-object" src="../files/thumb_<?php echo $row['foto_user']?>"" width="60" height="60">
                </div>
                <div class="detailuser">
                <b><?php echo $row['username']?></b><br><span style="color:grey;"><?php echo $row['status']?> -Join:<?php echo ''.date('d-m-Y', strtotime($tanggal))?></span>
                </div>
            </div>
            <div id="kanan">
              <div class="komenuser">
              <p><?php echo $row['reply']?></p>
              </div>
            </div>
            
        </div>
            
      
       
    </div>
    <?php
  }else{
  ?>
    <div class="panel panel-default">
  
          <div class="headerposting">
      <?php echo $row['tanggal_reply']?>
        </div>
          <div class="isikonten">
            <div id="kiri">
                <div class="foto">
                <img class="media-object" src="../files/thumb_<?php echo $row['foto_user']?>"" width="60" height="60">
                </div>
                <div class="detailuser">
                <b><?php echo $row['username']?></b><br><span style="color:grey;"><?php echo $row['status']?> -Join:<?php echo ''.date('d-m-Y', strtotime($tanggal))?></span>
                </div>
            </div>
            <div id="kanan">
              <div class="komenuser">
              <p><?php echo $row['reply']?></p>
              </div>
            </div>
            
        </div>
            
      
       
    </div>
      <?php
    }
      }
    }
    
?>
 <!-- TUTUP DIV -->
   </div> 
 <!-- TUTUP DIV -->

<div class="col-md-4" style="padding-top:75px;">
<?php
  $sql=mysql_query("SELECT * FROM tb_forum_topik WHERE dilihat >= 5 ORDER BY id_topik DESC ");
  $cek=mysql_num_rows($sql);
  
  echo "<div class=\"panel panel-kostum\">";
    echo "<div class=\"panel-heading\"style='background:#ebebeb; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"8px\" height=\"30px\"> <span style=\"font-weight:bold;\"> &nbsp; Topik Popoler</div></span>  ";
    echo "<ul class=\"list-group\"> ";
    $no=1;
      if( mysql_num_rows( $sql ) == 0 ) { 
        echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Maaf Forum Belum Tersedia saat ini....</td></tr>"; 
    }else{
  while ($data=mysql_fetch_array($sql)) {

    $tanggal=$data['tanggal_kategori'];
       echo "<li class=\"list-group-item\">
      <div id=\"testing\">
      <span><a title=\"{$data['judul_topik']}\" style=\"text-decoration:none;\" href=\"".SITE_URL."/detail_topik_forum.php?option=view-topik&topik_id={$data['id_topik']}\">
      {$data['judul_topik']}</a></span></div>";
      
      $no++;
    } 
  
      
  
  }
    echo "</div>";

?>
</div>

 <div class="col-md-4" style="float:right;">


</div>
</div>



</div>
</div>
</body>
</html>
<script type="text/javascript">
  function cekkomentar(){
  var reply = document.getElementById("reply").value;

  if (reply == '') {
    alert("Harap Isikan Komentar Anda");
    document.komentar.reply.focus();
     return false;
  }
}
</script>