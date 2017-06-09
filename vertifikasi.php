<?php  
@session_start(); // memulai session
include"Koneksi/koneksi.php";// memanggil koneksi

?>

 <?php
        $username = @$_POST['username']; // variabel user untuk user
        $pass = @$_POST['pass']; // variabel pass untuk pass
        $login = @$_POST['login']; // variabel login untuk login
        $uname = @$_POST['username'];
        if($login) { // jika login di klik
        if($username == "" || $pass == "" ) { // dan jika text user dan pass masih kosong
    ?> 
        <!-- muncul peringatan dari javascript -->
        <script type="text/javascript">alert("Username atau password masih kosong"); window.location.href="login.php"</script> <?php
        } 
        //jika tidak kosong
        else { 
        // menuliskan query mysql dimana username = '$user' dan password = $ pass yang sudah di beri md5
        $sql = mysql_query(" SELECT * FROM tb_user WHERE tb_user.username = '$username' AND tb_user.password = '$pass' AND tb_user.terverifikasi='Sudah'") or die(mysql_error());
        //menjadikan data sebagai array
        
        $data = mysql_fetch_array($sql);
      
        //untuk mendapatkan jumlah baris pada database
        $cek = mysql_num_rows($sql);
        //jika kode user lebih sama dengan 1
        if($cek >= 0) {
        
         if($data['status'] == "Admin" ) {
             @$_SESSION['Admin'] = $data['user_id'];
             @$_SESSION['user_id'] = $data['user_id'];
             @$_SESSION['username'] = $data['username'];
             @$_SESSION['email'] = $data['email'];
             @$_SESSION['status'] = $data['status'];
            
              // maka menuju ke halaman index.php
              echo "<script>window.location.assign('Admin/index.php')</script>";
            //dan jika levelnya operator
           
            }
            else if($data['status'] == "Anggota UKM" ) {
             @$_SESSION['AnggotaUKM'] = $data['user_id'];
             @$_SESSION['email'] = $data['email'];
             @$_SESSION['user_id'] = $data['user_id'];
             @$_SESSION['username'] = $data['username'];
             @$_SESSION['status'] = $data['status'];
        
              // maka menuju ke halaman index.php
              echo "<script>window.location.assign('Dashboard/index.php')</script>";
            //dan jika levelnya operator
            
            //jika tidak
        }
        else if ($data['status'] == "Non Anggota UKM" ) {
             @$_SESSION['NONAnggotaUKM'] = $data['user_id'];
             @$_SESSION['email'] = $data['email'];
             @$_SESSION['user_id'] = $data['user_id'];
             @$_SESSION['username'] = $data['username'];
             @$_SESSION['status'] = $data['status'];
              @$_SESSION['alamat_workshop'] = $data['alamat_workshop'];
              // maka menuju ke halaman index.php
              echo "<script>window.location.assign('Dashboard/index.php')</script>";
            //dan jika levelnya operator) {
            # code...
          }
       
           ?> 
          <!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">window.location.href="login.php?pesan=gagal"</script> <?php
        }
            }
      }
 ?>