<?php
include('../../Koneksi/Koneksi.php');
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=report_keseluruhan_produk.doc");
?>

<center><h2>Rekap Data Produk 2016</h2></center>
<table border='1'>
<h3>
<thead><tr>
<td align="center" width=52>No.</td>
<td align="center" width=200>Nama Produk</td>
<td align="center" width=150>Nama Lengkap</td>
<td align="center" width=180>Kategori</td>
<td align="center" width=200>Tanggal</td>
<td align="center" width=350>Deskripsi Produk</td>
<td align="center" width=150>Alamat</td>
<td align="center" width=150>Disetujui</td>
</tr></thead>
<h3><tbody>

<?php
$n=0;
$d = mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_anggota ON tb_info_produk.user_id=tb_anggota.user_id");
while($data=mysql_fetch_array($d)){
	$tanggal=$data['tanggal'];
?>
	<tr>
	<td align="center"><?php echo $n=$n+1;?></td>
	<td align="center"><?php echo $data['nama_produk']; ?></td>
	<td align="center"><?php echo $data['nama_lengkap']; ?></td>
	<td align="center"><?php echo $data['nama_cat']; ?></td>
	<td align="center"><?php echo ''.date('d-m-Y',strtotime($tanggal))?></td>
	<td align="center"><?php echo $data['deskripsi_produk']; ?></td>
	<td align="center"><?php echo $data['alamat_workshop']; ?></td>
	<td align="center"><?php echo $data['disetujui']; ?></td>
	
	</tr>
		
<?php
}

?>
</tbody></h3></table>