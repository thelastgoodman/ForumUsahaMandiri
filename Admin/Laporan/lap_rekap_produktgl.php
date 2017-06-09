<?php
include '../../koneksi/koneksi.php';
require('../../assets2/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../../assets2/images/fk-pelheader.png',0.1,1,4.2,1.7);
$pdf->SetX(3);            
$pdf->MultiCell(19.5,0.5,'Forum Usaha Mandiri',0,'L');
$pdf->SetFont('Times','',10);
$pdf->SetX(3);
$pdf->Cell(19.5,0.5,'Nomor Telepon :(022) 6642158 - 6642209',0,'L');    
$pdf->SetFont('Times','',10);
$pdf->SetX(3);
$pdf->Cell(19.5,1.5,'Alamat :Jln. Raden Demang Harja Kusuma Blok Jati, Cihanjuang, Cimahi',0,'L');

$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(3);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Produk Forum Usaha Mandiri",0,10,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(25.5,0.7,"Tanggal ".date('d-m-Y',strtotime($_GET['tglAwal']))." s/d ".date('d-m-Y',strtotime($_GET['tglKe']))."",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada Tanggal : ".date("d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Times','',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Produk', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Pemilik', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Kategori', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Klasifikasi', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
// $pdf->Cell(5, 0.8, 'Alamat', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'Alamat', 1, 1, 'C');
$pdf->SetFont('Times','',10);

$tglawal = $_GET['tglAwal'];
$tglKe = $_GET ['tglKe'];
$no=1;
$query=mysql_query("SELECT * FROM tb_info_produk INNER JOIN tb_cat_produk on tb_info_produk.id_cat_produk=tb_cat_produk.id_cat_produk INNER JOIN tb_anggota ON tb_info_produk.user_id=tb_anggota.user_id WHERE disetujui='Ya' AND tb_info_produk.tanggal BETWEEN '$tglawal' AND '$tglKe' ORDER BY id_info_produk ASC ");
while($lihat=mysql_fetch_array($query)){
	$tanggal = $lihat ["tanggal"];
	$pdf->Cell(1, 1, $no , 1, 0, 'C');
	$pdf->Cell(4, 1, $lihat['nama_produk'],1, 0, 'C');
	$pdf->Cell(3, 1, $lihat['nama_lengkap'], 1, 0,'C');
	$pdf->Cell(3, 1, $lihat['nama_cat'],1, 0, 'C');
	$pdf->Cell(3, 1, $lihat['klasifikasi'],1, 0, 'C');
	$pdf->Cell(3, 1, ''.date('d-m-Y',strtotime($tanggal)), 1, 0,'C');
	// $pdf->Cell(5, 0.8, ''.substr($lihat['alamat_workshop'],0,25)."...", 1, 1,'C');
     $pdf->Cell(8, 1, ''.substr($lihat['alamat_workshop'],0,50)."...", 1, 1,'C');
	$no++;
}

$pdf->Output("laporan_info_produk.pdf","I");

?>

