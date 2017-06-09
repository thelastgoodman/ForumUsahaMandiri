<?php
function UploadImage($fupload_name){
  // Tentukan folder dan file gambar yang di upload
  $folder = "../files/";

  $file_upload = $folder . $fupload_name;

  // Simpan gambar dalam ukuran aslinya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $file_upload);

  // Identitas file asli
  $gbr_asli = imagecreatefromjpeg($file_upload);
  $lebar    = imageSX($gbr_asli);
  $tinggi   = imageSY($gbr_asli);

  // Simpan dalam versi thumbnail (110 pixel)
  $thumb_lebar  = 230;
  $thumb_tinggi = 160;

  // Proses perubahan dimensi ukuran
  $gbr_thumb = imagecreatetruecolor($thumb_lebar,$thumb_tinggi);
  imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $thumb_lebar, $thumb_tinggi, $lebar, $tinggi);

  // Simpan gambar thumbnail
  imagejpeg($gbr_thumb,$folder . "thumb_" . $fupload_name);
  
  // Hapus gambar di memori komputer
  imagedestroy($gbr_asli);
  imagedestroy($gbr_thumb);
}

?>
