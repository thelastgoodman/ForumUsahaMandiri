<?php
function UploadImage1($fupload_name){
  // Tentukan folder dan file gambar yang di upload
  $folder = "../files/";
  $folderx = "../filesreport/";
  $file_upload = $folder . $fupload_name;
 $file_upload = $folderx . $fupload_name;
  // Simpan gambar dalam ukuran aslinya
  move_uploaded_file($_FILES["fupload1"]["tmp_name"], $file_upload);

  // Identitas file asli
  $gbr_asli = imagecreatefromjpeg($file_upload);
  $lebar    = imageSX($gbr_asli);
  $tinggi 	= imageSY($gbr_asli);

  // Simpan dalam versi thumbnail (110 pixel)
  $thumb_lebar  = 510;
  $thumb_tinggi = 286;

  //ukuran untuk laporan
  $thumb_lebarlap = 57;
  $thumb_tinggilap =57;


  // Proses perubahan dimensi ukuran
  $gbr_thumb = imagecreatetruecolor($thumb_lebar,$thumb_tinggi);
  imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $thumb_lebar, $thumb_tinggi, $lebar, $tinggi);

  $gbr_thumbx = imagecreatetruecolor($thumb_lebarlap,$thumb_tinggilap);
  imagecopyresampled($gbr_thumbx, $gbr_asli, 0, 0, 0, 0, $thumb_lebarlap, $thumb_tinggilap, $lebar, $tinggi);
  // Simpan gambar thumbnail
  imagejpeg($gbr_thumb,$folder . "thumb_" . $fupload_name);
  imagejpeg($gbr_thumbx,$folderx . "thumb_" . $fupload_name);
  // Hapus gambar di memori komputer
  imagedestroy($gbr_asli);
  imagedestroy($gbr_thumb);
  imagedestroy($gbr_thumbx);
}
?>