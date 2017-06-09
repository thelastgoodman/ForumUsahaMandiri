<?php
session_start();
include '../Koneksi/Koneksi.php';
include"../ClassFUM/classProdukUKM.php";
include"../ClassFUM/classAnggota.php";
$obj_agt = new Anggota;
 $obj_dataproduk = new ProdukUKM;
?>
<html>
	<head>
		<title> FUM | Data Produk </title>
		<link rel="stylesheet" type="text/css" href="../assets2/css/bootstrap.css">
		     <link rel="stylesheet" href="../dist/css/font-awesome.min.css">

  <link rel="icon" type="../assets2/images/png" href="../assets2/images/logobar.png">
  <script type="text/javascript" src="../assets2/js/jquery.js"></script>
  <script type="text/javascript" src="../assets2/js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets2/js/jquery-ui/jquery-ui.css">
  <script type="text/javascript" src="../assets2/js/jquery-ui/jquery-ui.js"></script>  
	</head>
	<style>
body{
  background-color:#faf9f9;
}
</style>
<body>
<div class="container">
<div class="row">
<?php
	include 'navbar_produk.php'
?>
<br><br><br>
    <br>
 <div class="panel panel-custom">	


<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_info_produk where user_id='".$_SESSION['user_id']."'");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

 <?php 
  if (isset($_GET['st'])) {
    if ($_GET['st']==1) {
     echo "<div class='alert alert-success fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong>Data Produk Berhasil Di Tambahkan';
  echo "</div>";
    }elseif ($_GET['st']==2) {

        echo "<div class='alert alert-info fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Data Produk Berhasil Di Update';
  echo "</div>";
    }elseif ($_GET['st']==3) {

        echo "<div class='alert alert-danger fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Sukses!</strong> Data Produk Berhasil Di Hapus';
  echo "</div>";
    }elseif ($_GET['st']==4) {

        echo "<div class='alert alert-danger fade in'>";
    echo  "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
    echo '<strong>Perhatian!</strong> Nama Produk Sudah Terdaftar Sebelumnya';
  echo "</div>";
}
}
    ?>
<div class="container">
	<div class="row">
	<div class="col-md-2">
	
	
		<a href="#" class ="btn btn-danger" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah Produk Baru</a>

	</div>
		<div class="col-md-7" style="margin-top:-8px;" >
	<?php
	echo"<form class=\"navbar-form navbar-right\" role=\"search\" action=\"\" method=\"post\">";          
	//     echo"<div class=\"form-group\">";
	//    echo "<select class='input-large form-control' <select name=\"statusprod\">";
	//    echo" <option>---- Status Produk ----</option>";
	//    echo " <option> Ya </option>";
	//    echo " <option> Belum </option>";
	//    echo " <option> Tidak </option>";
	// echo"</select>";
	//     echo"</div>";
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
		
		<div class="col-md-3">
		<form action="cari_act.php" method="get">
  <div class="input-group">
  <form class="navbar-form navbar-right" role="search" action="" method="post">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
    <input type="text" class="form-control" placeholder="Cari Nama Produk di sini .." aria-describedby="basic-addon1" name="cari" id="cari"> 
     <input type="hidden" class="form-control" id="id_produk" name="id_produk"> 
    </form>
  </div>
</form>
		</div>
	 
    
<!-- 
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table> -->
	
	
	</div>
	
<br>
<table class="table table-hover">
	<tr style="font-size:14px;">
		<td align="center"><h5><b>No</b></h5></td>
		<td align="center" class="col-md-2"><h5><b>Nama Produk</b></h5></td>
		<td align="center"><h5><b>Kategori</b></h5></td>
	
		<td align="center" class="col-md-2"><h5><b>Foto</b></h5></td>
		<td align="center" class="col-md-2"><h5><b>Tanggal Post</b></h5></td>
		
		<td align="center" class="col-md-4"><h5><b>Alamat Workshop</b></h5></td> 
		<td align="center"><h5><b>Disetujui</b></h5></td>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<td align="center" class="col-md-2"><h5><b>Opsi</b></h5></td>
	</tr>
	<?php 
	 if (isset($_POST['button'])) {
  	$search = $_POST['search']; 
   
    $brg=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk ON tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk WHERE user_id='".$_SESSION['user_id']."' AND nama_cat like '$search' ORDER BY id_info_produk DESC ");
    }elseif (isset($_GET['cari'])){
    $cari=mysql_real_escape_string($_GET['cari']);
    $brg=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk ON tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk where nama_produk like '%$cari%' ORDER BY id_info_produk DESC ");
     
    }else{
     $brg=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk ON tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk WHERE user_id='".$_SESSION['user_id']."' ORDER BY id_info_produk DESC  limit $start, $per_hal ");
 	}
     
    $cek=mysql_num_rows($brg);	
    if ($cek<1){
         echo "<tr height=\"40\"><td colspan=\"12\" align=\"center\">Maaf Data Produk tidak ada</td></tr>";   
    }
		
	$no=1;
	while($b=mysql_fetch_array($brg)){
		if ($b['user_id']==$_SESSION['user_id']) {
		
		
		$tanggal = $b['tanggal'];

		?>
		<tr style="font-size:14px">
			<td><?php echo $no++ ?></td>
			<td><a href="detail_info_produk.php?id=<?php echo $b['id_info_produk']?>"><?php echo $b['nama_produk'] ?></a></td>
			<td><?php echo $b['nama_cat'] ?></td>
				<td align="center"><img src="../files/thumb_<?php echo $b['foto_produk']; ?>" width="120px" class="img-thumbnail"></td>
			<td align="center"><?php echo ''.date( "d-m-Y", strtotime($tanggal) ); ?></td>
		
				<td><?php echo "".substr($b['alamat_workshop'],0,150).".." ?></td>
				<td align="center"><?php echo $b['disetujui'] ?></td>
			
			
			
			<td align="center">
				   <a class="btn btn-primary" href="edit_info_produk.php?id=<?php echo $b['id_info_produk'];?>" title="Edit"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></a>
				  
				<a  class="trash2 btn btn-danger" data-id="<?php echo $b['id_info_produk']; ?>" title="Hapus" href="#Delete" data-toggle="modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a>

			</td>
		</tr>		
		<?php 
	}
	}

	?>
	
	
</table>

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
<div class="col-md-1">
<right><a class="btn" href="index.php" style="padding-top:21px;"></span>  Kembali</a></right></div>
</div>
</div>
</div>
<!-- modal input -->

<div id="myModal" class="modal fade" data-backdrop="static"  aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="text-center">Tambah Produk Baru</h2>
			</div>
			<div class="modal-body ">
			 	<div class="container-fluid">
                	<div class="row">
						<div class ="col-md-5">
							<?php
								$sql=mysql_query("SELECT deskripsi_produk,klasifikasi,kelurahan,nopos,siup,kecamatan,alamat_workshop,no_telp FROM tb_info_produk where user_id='".$_SESSION['user_id']."'") or die(mysql_error());
								while ($row=mysql_fetch_array($sql)) {
									
								


						?>
						<form  enctype= "multipart/form-data"  action="../ClassFUM/proses_produk.php?aksi=simpanproduk" method="post" name="daftar" id="myform">
					
              		<div class="form-group">

              		
    				<label for="exampleInputEmail1">Nama Produk<font color="red" >* <p id='pesan_error_nama'></p></font></label>
    				<input type="text" class="form-control"  placeholder="Nama Produk.." name="napro" id="napro"> 
  			  		</div>
                     <div class="form-group">
					    <label for="exampleInputEmail1">Kategori Produk <font color="red" >* <p id="pesan_error_kategori"></p></font></label>
					    <?php
					       echo "<select class='form-control' name='kategori' id='kategori'>";
	   						echo" <option>---- Kategori Produk----</option>";
						    $sql=mysql_query("SELECT * FROM tb_cat_produk ORDER BY nama_cat ASC");
							    if(mysql_num_rows($sql) != 0){
							        while($data = mysql_fetch_array($sql)){
							            echo "<option value={$data[id_cat_produk]}>{$data[nama_cat]}</option>";   
						        }
						    } echo "</select>"; 
						?>    
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Alamat Workshop <font color="red" >* <p id='pesan_error_alamat'></p></font></label>
					  <input type="text" class="form-control" readonly name="alamat" id="alamat" value="<?php echo $row['alamat_workshop'];?>"  >
					  </div>
					  	<div class="form-group">
                                <label for="exampleInputEmail1">Kecamatan <font color="red" >* <p id="pesan_error_kec"></p></font></label>
                                   <input type="text" class="form-control"  readonly value="<?php echo $row['kecamatan']?>" name="kecamatan" id="kecamatan"> 
                        </div>
                        <div class="form-group">
    				<label for="exampleInputEmail1">Kelurahan<font color="red" >* <p id='pesan_error_kel'></p></font></label>
    				<input type="text" class="form-control" readonly value="<?php echo $row['kelurahan']?>" name="kelurahan" id="kelurahan"> 
  			  		</div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Telp-HP <font color="red" >* <p id='pesan_error_tlp'></p></font></label>
					    <input type="text" class="form-control"  readonly value="<?php echo $row['no_telp']?>" name="tlp" id="tlp">   
					  </div>
					  

			   			</div>

						<div class="col-md-7">
						<div class="form-group">
					    <label for="exampleInputPassword1">No Pos <font color="red" >* <p id='pesan_error_tlp'></p></font></label>
					    <input type="text" class="form-control" readonly value="<?php echo $row['nopos']?>" name="nopos" id="nopos">   
					  </div>
					   <div class="form-group">
					    <label for="exampleInputPassword1">Surat Izin Usaha Perdagangan <font color="red" >* <p id='pesan_error_tlp'></p></font></label>
					    <input type="text" class="form-control"  readonly value="<?php echo $row['siup']?>" name="siup" id="siup">   
					  </div>
						<div class="form-group">
                                <label for="exampleInputEmail1">Klasifikasi Usaha <font color="red" >* <p id="pesan_error_klasifikasi"></p></font></label>
                                   <input type="text" class="form-control"  readonly value="<?php echo $row['klasifikasi']?>" name="klasifikasi" id="klasifikasi">   
                        </div>
						  	<div class="form-group">
						   <label for="exampleInputPassword1">Gambar<font color="red" >* (Harus Bertipe JPG)<p id='pesan_error_fp1'></p></font></label>
						  	<div class="input-group">
              					<span class="input-group-btn">


                					<label class="btn btn-danger btn-file" for="multiple_input_group">
                  					<div class="input required"><input id="multiple_input_group" type="file" name="fupload1" id="fp1" multiple></div> Telusuri.. </label>
              					</span>
              					<span class="file-input-label"></span>
            				</div>
					 		</div>
						 <div class="form-group">
							<label for="exampleInputPassword1">Kegiatan Utama <font color="red" >* <p id='pesan_error_desk'></p></font></label>
							 <input type="text" class="form-control"   readonly value="<?php echo $row['deskripsi_produk']?>" name="desk" id="desk">   
						
						   </div>
						  
						</div>
					</div>
				</div>
				 <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<input type="submit" class="btn btn-danger" onclick="return validasi()" value="Simpan">
				
				 </form>
				
				</div>
							 <?php
				}
				?>
		    </div> <!-- modal body -->
		   
		</div> <!-- modal konten -->

	</div><!--  modal dialog -->
</div> <!-- modal utama -->

<div class="modal small fade" data-backdrop="static" data-keyboard="false" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h3 id="myModalLabel">Konfirmasi Hapus</h3>

            </div>
            <div class="modal-body">
                <p class="error-text"><i class="fa fa-warning modal-icon"></i>Apakah anda yakin untuk menghapus produk ini?
                   
            </div>
            <div class="modal-footer">
               <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button> <a href="#" class="btn btn-danger"  id="hapusproduk" >Hapus</a>

            </div>
        </div>
    </div>
</div>
<script>
	$('.trash2').click(function(){
    var id=$(this).data('id');
    $('#hapusproduk').attr('href','hapus_produk_user.php?id='+id);
})

</script>
<!-- //VALIDASI -->
<script language="javascript">
function validasi(){ 

var napro = document.getElementById("napro").value;
var alamat = document.getElementById("alamat").value;
var tlp = document.getElementById("tlp").value;
var kategori= document.getElementById("kategori").value;
var klasifikasi= document.getElementById("klasifikasi").value;
var batas = 1;
var kelurahan = document.getElementById("kelurahan").value;
 
  if (napro == '') { //cek jika kosong
    document.getElementById("pesan_error_nama").innerHTML = "(Nama Produk Tidak Boleh Kosong)";
   document.daftar.napro.focus();
  
   return false;
    
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_nama").innerHTML = ""; 
  }
  
  if (alamat == '') { //cek jika kosong
    document.getElementById("pesan_error_alamat").innerHTML = "(Alamat Tidak Boleh Kosong)";
    document.daftar.alamat.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_alamat").innerHTML = ""; 
  }
  
if (kelurahan=='') {
    document.getElementById("pesan_error_kel").innerHTML = "(Kelurahan Tidak boleh kosong)";
    document.daftar.kelurahan.focus();
   return false;
}else {
	document.getElementById("pesan_error_kel").innerHTML ="";
 }
   if (tlp == '') { //cek jika kosong
    document.getElementById("pesan_error_tlp").innerHTML = "(No Telp/ Handphone Tidak Boleh Kosong)";
    document.daftar.tlp.focus();

   return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_tlp").innerHTML = ""; 
  }
  if(!/^[0-9.]+$/.test(document.daftar.tlp.value)) {
  daftar.tlp.value = daftar.tlp.value.substring(0,daftar.tlp.value.length-1000);
  document.getElementById("pesan_error_tlp").innerHTML = "(Hanya menggunakan Angka)";
  document.daftar.tlp.focus();
  return false;
}else{
	document.getElementById("pesan_error_tlp").innerHTML = ""; 
}

if (kategori=="---- Kategori Produk----") {
 document.getElementById("pesan_error_kategori").innerHTML = "(Pilih Salah satu Kategori Produk)";
   document.daftar.kategori.focus();
   return false;
}else {
	document.getElementById("pesan_error_kategori").innerHTML ="";
}

if(klasifikasi=="---- Klasifikasi Usaha ----"){
	document.getElementById("pesan_error_klasifikasi").innerHTML = "(Pilih Salah satu Klasifikasi Usaha)";
   document.daftar.klasifikasi.focus();
   return false;
}else {
	document.getElementById("pesan_error_klasifikasi").innerHTML ="";
}

}


function validAngka(a){
  var batas =12;
  if (a.value.length>batas) {
      a.value = a.value.substring(0,a.value.length>12);
      document.getElementById("pesan_error_tlp").innerHTML = "(Maksimal hanya 12 digit)";
      return false;
    
  }else if(!/^[0-9.]+$/.test(a.value)) {
  a.value = a.value.substring(0,a.value.length-1000);
  document.getElementById("pesan_error_tlp").innerHTML = "(Hanya menggunakan Angka)";
    return false;
  } else {
    //kosongkan pesan error jika sudah benar semua
    document.getElementById("pesan_error_tlp").innerHTML = ""; 
  }
}
</script>


<script type="text/javascript">
 $("#myModal").on("hidden.bs.modal",function(){
  
myform.reset();
       
});

// $(document).on('change', '.btn-file :file', function() {
//   var input = $(this),
//       numFiles = input.get(0).files ? input.get(0).files.length : 1,
//       label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
//   input.trigger('fileselect', [numFiles, label]);
// });

// $(document).ready( function() {
// 	$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
// 		console.log("teste");
// 		var input_label = $(this).closest('.input-group').find('.file-input-label'),
// 			log = numFiles > 1 ? numFiles + ' files selected' : label;

// 		if( input_label.length ) {
// 			input_label.text(log);
// 		} else {
// 			if( log ) alert(log);
// 		}
// 	});
// });
</script>
<!-- //VALIDASI -->

<!-- //MODAL NOTIF HAPUS -->
<script type="text/javascript">
  $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     var myNapem = $(this).data('napem');
     var myNapro= $(this).data('nama');
     var myKategori = $(this).data('kategori');
     var myFoto = $(this).data('foto');
     var myDeskripsi= $(this).data('deskripsi');
 
     $(".modal-body #napem").val( myNapem );
     $(".modal-body #naproo").val( myNapro );
     $(".modal-body #kat").val( myKategori );
     $(".modal-body #foto").val( myFoto );
     $("#foto").attr("src", myFoto);    
      $(".modal-body #deskk").val( myDeskripsi );

});

</script>
<!-- //MODAL NOTIF HAPUS -->
<script type="text/javascript">
 function ambil4(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select4",
        dataType:'json',
        success: function(response){
          $("#jumlah_ditolak").text(" "+response+"");
          timer = setTimeout("ambil4()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil4();
});
 function ambil5(){
  $.ajax({
        type: "POST",
       url: "aksi_pesan.php?act=select5",
        dataType:'json',
        success: function(response){
          $("#jumlah_disetujui2").text(" "+response+"");
          timer = setTimeout("ambil5()",5000);
        }
      });   
}
$(document).ready(function(){
  ambil5();
});
</script>
<!-- //MODAL HAPUS -->

<!-- //MODAL HAPUS -->
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

	</body>
	</html>