<?php
session_start();
class Anggota {
    public function comboBox1(){

	  echo "<select class='form-control' disabled name='kategori'> ";
	   	    $sql=mysql_query("SELECT * FROM tb_cat_produk ORDER BY nama_cat ASC");
		    if(mysql_num_rows($sql) != 0){
		        while($data = mysql_fetch_array($sql)){
		            echo "<option value=$data[id_cat_produk]>$data[nama_cat]</option>";   
	        }
	    } echo "</select>";
    }

      public function comboBox2(){

    echo "<select class='form-control' disabled name='klasifikasi'> ";
    
      echo" <option value='Besar'>Besar</option>";
       echo" <option value='Mikro'>Mikro</option>";
        echo" <option value='Kecil'>Kecil</option>";
        echo" <option value='Menengah'>Menengah</option>";
     echo "</select>";
	}

   public function comboBox3(){

    echo "<select class='form-control' disabled name='kecamatan'> ";
     
      echo" <option value='Cimahi Utara'>Cimahi Utara</option>";
       echo" <option value='Cimahi Selatan'>Cimahi Selatan</option>";
        echo" <option value='Cimahi Tengah'>Cimahi Tengah</option>";
       
     echo "</select>";
  }
 
	public function AddAnggotaUKM($username,$pass,$email,$NL,$kosong,$alamat,$kategori,$nu,$desk,$nama_file_unik1,$tlp,$aw,$kec,$kel,$klasifikasi,$siup,$nopos){
	$carikode = mysql_query("select max(user_id) as idMaks from tb_user") or die (mysql_error());
                          // menjadikannya array
                          $datakode = mysql_fetch_array($carikode);
                          // jika $datakode
                          
                           // membuat variabel baru untuk mengambil kode barang mulai dari 1
                           $nilaikode = $datakode['idMaks'];
                           // menjadikan $nilaikode ( int )
                           $hasilkode = (int) substr($nilaikode,0, 3);
                           // setiap $kode di tambah 1
                           $hasilkode ++;
                           // hasil untuk menambahkan kode 
                           // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
                           // atau angka sebelum $kode
   
           $sql_simpan1=("INSERT INTO tb_user VALUES ('$hasilkode ','".mysql_escape_string($username)."','$pass','$email','".date('Y-m-d')."','Anggota UKM ','Belum')");
                          mysql_query($sql_simpan1) 
                              or die ("Memasukan data user gagal".mysql_error());
           $sql_simpan2=("INSERT INTO tb_anggota 
                          VALUES ('','$NL','$alamat','$kosong','$hasilkode ')");
                          mysql_query($sql_simpan2) 
                              or die ("Memasukan data anggota gagal".mysql_error());
		   $sql_simpan3="INSERT INTO tb_info_produk VALUES ('','$kategori','".mysql_escape_string($nu)."','$desk','$nama_file_unik1','".date('Y-m-d')."','0','Belum','$tlp','$aw','$kec','$nopos','$kel','$klasifikasi','$siup','$hasilkode')"; mysql_query($sql_simpan3) 
    or die ("Memasukan data info produk gagal".mysql_error());
    echo "<script> alert('Data Berhasil Disimpan');  location = '../login.php'; </script>";

}
public function NONAnggotaUKM($username,$pass,$email,$NL,$kosong,$alamat){
  $carikode = mysql_query("select max(user_id) as idMaks from tb_user") or die (mysql_error());
                          // menjadikannya array
                          $datakode = mysql_fetch_array($carikode);
                          // jika $datakode
                          
                           // membuat variabel baru untuk mengambil kode barang mulai dari 1
                           $nilaikode = $datakode['idMaks'];
                           // menjadikan $nilaikode ( int )
                           $hasilkode = (int) substr($nilaikode,0, 3);
                           // setiap $kode di tambah 1
                           $hasilkode ++;
                           // hasil untuk menambahkan kode 
                           // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
                           // atau angka sebelum $kode
      $sql_simpan1=("INSERT INTO tb_user VALUES ('$hasilkode ','$username','$pass','$email','".date('Y-m-d')."','Non Anggota UKM ','Belum')");
                          mysql_query($sql_simpan1) 
                              or die ("Memasukan data a gagal".mysql_error());
      $sql_simpan2=("INSERT INTO tb_anggota VALUES ('','$NL','$alamat','$kosong','$hasilkode ')");
                          mysql_query($sql_simpan2) 
                              or die ("Memasukan data s gagal".mysql_error());
    echo "<script> alert('Data Berhasil Disimpan');  location = '../login.php'; </script>";
}
public function HapusUser($id_hapus1){
  $sql_hapususer="DELETE FROM tb_user WHERE user_id='$id_hapus1'";
  mysql_query($sql_hapususer) 
    or die ("Hapus Data User Gagal".mysql_error());
  
  header("location:../Admin/data_info_user.php?st=2"); 
  }
public function SimpanAdmin($email,$username,$pass){
    $carikode = mysql_query("select max(user_id) as idMaks from tb_user") or die (mysql_error());
                          // menjadikannya array
                          $datakode = mysql_fetch_array($carikode);
                          // jika $datakode
                          
                           // membuat variabel baru untuk mengambil kode barang mulai dari 1
                           $nilaikode = $datakode['idMaks'];
                           // menjadikan $nilaikode ( int )
                           $hasilkode = (int) substr($nilaikode,0, 3);
                           // setiap $kode di tambah 1
                           $hasilkode ++;
                           // hasil untuk menambahkan kode 
                           // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
                           // atau angka sebelum $kode
  $sql_tambah_admin="INSERT INTO tb_user VALUES ('$hasilkode','$username','$pass','$email','".date('Y-m-d')."','Admin')";
 mysql_query($sql_tambah_admin) or die ("Menambah data admin gagal".mysql_error());
    header("location:../Admin/data_info_user.php?st=1");

}
public function edit_anggotaukm($id,$nama,$alamat,$nama_file_unik){
  $sql_updateinfo="UPDATE tb_anggota SET nama_lengkap='$nama', alamat='$alamat', foto_user='$nama_file_unik' WHERE id_anggota='$id'";
   mysql_query($sql_updateinfo) 
    or die ("Update Informasi Gagal".mysql_error());
     header("location:../Dashboard/edit_informasi.php?st=1");
}

public function UbahPassword($email,$pass1,$pass2,$pass3){
  $cek=mysql_query("select * from tb_user where password='$pass1' and email='$email'");
if(mysql_num_rows($cek)==1){
  if($pass2==$pass3){
    $b = $pass2;
    mysql_query("update tb_user set password='$b' where email='$email'");
    header("location:../Admin/ganti_pass.php?pesan=oke");
  }else{
    header("location:../Admin/ganti_pass.php?pesan=tdksama");
  }
}else{
  header("location:../Admin/ganti_pass.php?pesan=gagal");
}
}

public function setujui($idagt){
    $sql_ubahstat="UPDATE tb_user SET terverifikasi='Sudah' WHERE user_id='$idagt'";

  mysql_query($sql_ubahstat) 
    or die ("Vertifikasi Anggota gagal".mysql_error());
  
  header("location:../Admin/data_info_user.php?st=2");  
}

public function tolak($idagt){
    $sql_ubahstat="UPDATE tb_user SET terverifikasi='Tidak' WHERE user_id='$idagt'";

  mysql_query($sql_ubahstat) 
    or die ("Vertifikasi Anggota gagal".mysql_error());
  
  header("location:../Admin/data_info_user.php?st=3");  
}

}


?>