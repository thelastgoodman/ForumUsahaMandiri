<?php
include('../../Koneksi/Koneksi.php');
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=report_info_agenda.xls");
?>

<center><h2>Rekap Data Info Agenda Terlaksana</h2></center>
<table border='1'>
<h3>
<thead><tr>
<td align="center" width=52>No.</td>
<td align="center" width=200>Agenda</td>
<td align="center" width=150>Tanggal</td>
<td align="center" width=350>Deskripsi Agenda</td>
<td align="center" width=150>Terlaksana</td>
</tr></thead>
<h3><tbody>

<?php
$n=0;
$d = mysql_query("SELECT * FROM tb_agenda WHERE terlaksana='sudah' ORDER BY id_agenda DESC ");
while($data=mysql_fetch_array($d)){
	$tanggal=$data['tanggal_agenda'];
?>
	<tr>
	<td align="center"><?php echo $n=$n+1;?></td>
	<td align="center"><?php echo $data['judul_agenda']; ?></td>
	<td align="center"><?php echo ''.date('d-m-Y',strtotime($tanggal))?></td>
	<td align="center"><?php echo $data['isi_agenda']; ?></td>
	<td align="center"><?php echo $data['terlaksana']; ?></td>
	
	</tr>
		
<?php
}

?>
</tbody></h3></table>