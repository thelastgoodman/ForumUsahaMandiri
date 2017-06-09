<?php
session_start();
include '../Koneksi/Koneksi.php'
?>
<html>
  <head>
    <title>FUM | Topik Forum </title>
    <link rel="stylesheet" href="../assets2/css/bootstrap.css">
    <link rel="stylesheet" href="../assets2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets2/css/styles1.css">
    <link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
    <link href="../assets2/js/jquery-ui/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
   
    <script src="../assets2/js/jquery-ui/jquery-ui.js"></script>

  </head>
<style type="text/css">
  body{
    background-color: #faf9f9;
  }
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
   <div class="row">
      <?php
      include 'other_navbar.php'
    ?>
    <br><br><br>

<div class="col-md-12">

<div class="col-md-8" style="padding-top:100px;">

<?php
  $kat_id2=$_GET['kat_id'];
  echo "<button style=\"margin-bottom:20px;\" data-toggle=\"modal\" data-target=\"#myModals\" class=\"btn btn-danger col-md-2\"><span class=\"glyphicon glyphicon-plus\"></span>Buat Topik</button>";
  ?>
<div class="col-md-6">
    <form action="cari_act.php" method="post">
        <div class="input-group">
          <form class="navbar-form navbar-right" role="search" action="" method="post">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                <input type="text" class="form-control" placeholder="Cari Nama Topik di sini .." aria-describedby="basic-addon1" name="cari" id="cari" style="float:right;">
               <?php echo "<input type=\"hidden\" name=\"kate_id\"id=\"kate_id\" value=\"".$_GET['kat_id']."\">"?>
          </form>
        </div>
    </form>
</div>
<br><br><br>
<?php
  $sql = mysql_fetch_array(mysql_query( "SELECT * FROM tb_forum_kategori WHERE kategori_id='".$_GET['kat_id']."'" ));
  $sql2 = mysql_query("SELECT * FROM tb_forum_kategori, tb_user, tb_forum_topik  WHERE tb_forum_topik.user_id=tb_user.user_id AND tb_forum_kategori.kategori_id=tb_forum_topik.kategori_id AND tb_forum_kategori.kategori_id='".$_GET['kat_id']."' ORDER BY tb_forum_topik.id_topik DESC" );
  if (isset($_GET['cari'])) {
  $cari=mysql_real_escape_string($_GET['cari']);
  $sql2 = mysql_query("SELECT * FROM tb_forum_kategori, tb_user, tb_forum_topik  WHERE  tb_forum_topik.user_id=tb_user.user_id AND tb_forum_kategori.kategori_id=tb_forum_topik.kategori_id AND tb_forum_kategori.kategori_id='".$_GET['kat_id']."' AND tb_forum_topik.judul_topik like '%$cari%'");
  }else{
      $sql2 = mysql_query("SELECT * FROM tb_forum_kategori, tb_user, tb_forum_topik  WHERE tb_forum_topik.user_id=tb_user.user_id AND tb_forum_kategori.kategori_id=tb_forum_topik.kategori_id AND tb_forum_kategori.kategori_id='".$_GET['kat_id']."' ORDER BY tb_forum_topik.id_topik DESC" );}
  ?>

  <div class="panel panel-kostum">
  <div class="media">
    <div class="media-left media-middle">
      <img class="media-object" src="../files/thumb_<?php echo $sql['gambar']?>"" width="55" height="50px">
    </div>
  <div class="media-body">
     <h4 class="media-heading"><?php echo $sql['kat_nama_kategori']?></h4>
     <p><?php echo $sql['kat_desk_kategori']?></p>
</div>
</div>

    <ul class="list-group">
    <?php
  if( mysql_num_rows( $sql2 ) == 0 ) { 
    echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Belum ada Topik yang Tersedia.</td></tr>"; 
}else {
    $no = 1; 
    //////Kolom Daftar Topik
    while( $data = mysql_fetch_array( $sql2 ) ) {
      $tanggal = $data['tanggal_topik'];
      $jumlah = mysql_num_rows( mysql_query( "SELECT * FROM tb_forum_reply  WHERE id_topik='{$data['id_topik']}'" ) );
      
      echo "<li class=\"list-group-item\">$no.";
      if ($_SESSION['Admin']) {
        
        echo"<a href=\"hapus_topik.php?id_topik=".$data['id_topik']."&kat_id=".$data['kategori_id']."\" style=\"float:right; margin-top:-2px;\" class=\"btn btn-danger\" title=\"Hapus\"><span class=\"glyphicon glyphicon-remove\"></a>";
        
      }
    ?>

      <span>
             <a title="<?php echo $data['judul_topik']?>"style="text-decoration:none;" href="detail_topik_forum.php?option=view-topik&kat_id=<?php echo $data['kategori_id']?>&topik_id=<?php echo $data['id_topik']?>"><font color=""><?php echo $data['judul_topik']?></a></font>
      </span><br>


      <span style="font-size: 12px; color:grey; line-height: 1.3em;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="size:10px; ">By:<?php echo $data['username']?>, <?php echo "".date('d-m-Y', strtotime($tanggal));?><br></span>

      <span style="float:right;"> Balasan : <?php echo "$jumlah"?> | Dilihat : <?php echo $data['dilihat']?></span> 


      <span style="font-size: 12px; color:grey;font-style: italic; font-family:Helvetica;font-weight: normal; line-height: 1.3em;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="size:12px; "><?php echo "".substr($data['isi_topik'], 0, 85 )."..."?></span>
      
    <?php
      $no++;
    }

}

?>
</div>
</div>

 <div class="col-md-4" style="padding-top:160px;">
<?php
  $sql=mysql_query("SELECT * FROM tb_forum_topik WHERE dilihat >= 5 ORDER BY id_topik DESC LIMIT 0,7 ");
  $cek=mysql_num_rows($sql);
  
  echo "<div class=\"panel panel-kostum\">";
    echo "<div class=\"panel-heading\"style='background:#ebebeb; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"8px\" height=\"30px\"> <span style=\"font-weight:bold;\"> &nbsp; Topik Populer</div></span>  ";
    echo "<ul class=\"list-group\"> ";
    $no=1;
      if( mysql_num_rows( $sql ) == 0 ) { 
        echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Maaf Topik Belum Tersedia saat ini....</td></tr>"; 
    }else{
  while ($data=mysql_fetch_array($sql)) {

    $tanggal=$data['tanggal_kategori'];
       echo "<li class=\"list-group-item\">
       <div id=\"testing\">
      <span><a title=\"{$data['judul_topik']}\" style=\"text-decoration:none;\" href=\"".SITE_URL."/detail_topik_forum.php?option=view-topik&topik_id={$data['id_topik']}\">
      {$data['judul_topik']}</a></span></div>";
      
      $no++;
    } 
  
     echo "</div>";
  
  }
?>
   
<?php
$kat_id2=$_GET['kat_id'];
  $sql=mysql_query("SELECT * FROM tb_info_produk WHERE dibaca >=50 AND disetujui='Ya' ORDER BY id_info_produk DESC LIMIT 0,3");
  $cek=mysql_num_rows($sql);
  
  echo "<div class=\"panel panel-kostum\">";
    echo "<div class=\"panel-heading\"style='background:#ebebeb; color:Gray;' ><img src='../assets2/images/bgpinggir.png' width=\"8px\" height=\"30px\"> <span style=\"font-weight:bold;\"> &nbsp; Produk Usaha Populer</div></span>  ";
    echo "<ul class=\"list-group\"> ";
    $no=1;
      if( mysql_num_rows( $sql ) == 0 ) { 
        echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Maaf Produk Belum Tersedia saat ini....</td></tr>"; 
    }else{
  while ($data=mysql_fetch_array($sql)) {

    $tanggal=$data['tanggal'];
  ?>
      <li class="list-group-item">
          <div class="media">
            <div class="media-left media-middle">

                 <img class="media-object" src="../files/thumb_<?php echo $data['foto_produk']?>" width="67px" height="60px" alt="...">
            </div>

            <div class="media-body">
        <?php
                 echo"<h5 class=\"media-heading\">
                 <a title=\"{$data['nama_produk']}\" style=\"text-decoration:none;\" href=\"get_iklan_produk.php?kat_id=".$_GET['kat_id']."&id={$data['id_info_produk']}\">";
        ?>


      <?php echo $data['nama_produk']?></a><br><span style="font-size: 12px;  color:grey; line-height: 1.3em;">
      <i class="fa fa-calendar"> <?php echo ''.date('j-F-Y', strtotime($tanggal) ) ?> </i>
        </div>
     <?php
    } 
  
 echo "</div>";
  }
?>


</div>


</div>
</div>
<div id="myModals" class="modal fade in " data-backdrop="static"  aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Topik Baru</h4>
      </div>
      <div class="modal-body">
       <form action="tambah_topik.php" method="post" name="topik" id="myform">
 
           <div class="form-group">
            <label>Pembicaraan Forum<font color="red" ><p id='pesan_error_judul'></p></font></label>
            <input name="judul" type="text" id="judul" class="form-control" placeholder="Judul Topik">
              <input name="user_id" type="hidden" id="user_id" value ="<?php echo "".$_SESSION['user_id'] ?>" class="form-control" placeholder="Judul Topik">
              <?php
              echo "<input name=\"kat_id\" type=\"hidden\" id=\"kat_id\" value =\"".$_GET['kat_id']."\" class=\"form-control\" placeholder=\"Judul Topik\"> ";
              ?>
          </div>
         <div class="form-group">
            <label>Isi Topik<font color="red" ><p id='pesan_error_isi'></p></font></label>
           <textarea class="ckeditor form-control" placeholder="Isi Topik" name="isi" id="ckeditor"  rows="5"></textarea>
          </div>
          
                                    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-danger" onclick="return validasi()" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>

<script language="javascript">
function validasi(){ 

var judul = document.getElementById("judul").value;
var ckeditor = document.getElementById("ckeditor").value;


     
  if (judul == '') { //cek jika kosong
    document.getElementById("pesan_error_judul").innerHTML = "(Judul Topik Tidak Boleh Kosong)";
    document.topik.judul.focus();
  
   return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_judul").innerHTML = ""; 
  }
  
 
  if (ckeditor == '') { //cek jika kosong
    document.getElementById("pesan_error_isi").innerHTML = "(Isi Topik Tidak Boleh Kosong)";
    document.topik.ckeditor.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_isi").innerHTML = ""; 
  }

 $("#myModal").on("hidden.bs.modal",function(){
   
myform.reset();
       
});

}


</script>
</body>
</html>

