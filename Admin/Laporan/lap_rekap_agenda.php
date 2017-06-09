<?php
include '../../koneksi/koneksi.php';
require('../../assets2/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',11);
$pdf->Image('../../assets2/images/fk-pelheader.png',1,1,3.3,1.5);
$pdf->SetX(4);  
$pdf->SetFont('Times','B',10);          
$pdf->MultiCell(19.5,0.5,'Forum Usaha Mandiri',0,'L');
$pdf->SetFont('Times','',10);
$pdf->SetX(4);
$pdf->Cell(25,0.5,'Nomor Telepon :(022) 6642158 - 6642209',0,'L');    
$pdf->SetFont('Times','',10);
$pdf->SetX(4);
$pdf->Cell(26,1.5,'Alamat :Jln. Raden Demang Harja Kusuma Blok Jati, Cihanjuang, Cimahi',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,2.5,'Website : www.fum-cimahi.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Rekap Agenda terlaksanakan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("d/m/Y"),0,0,'C');
$pdf->ln(1);


$pdf->SetFont('Times','',10);

$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'Agenda', 1, 0, 'C');

$pdf->Cell(10, 0.8, 'Deskripsi', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Dilihat', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Terlaksana', 1, 1, 'C');


$pdf->SetFont('Times','',10);
$no=1;
$query=mysql_query("SELECT * FROM tb_agenda WHERE terlaksana='sudah' ORDER BY id_agenda DESC");
while($lihat=mysql_fetch_array($query)){
	$tanggal = $lihat ["tanggal_agenda"];
	
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(8, 0.8, $lihat['judul_agenda'],1, 0, 'C');
$pdf->Cell(10, 0.8, ''.substr($lihat['isi_agenda'],0,50)."...", 1, 0,'C');
	$pdf->Cell(3, 0.8, ''.date('d-m-Y',strtotime($tanggal)), 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['dibaca'],1,0,'C');
	$pdf->Cell(2, 0.8, $lihat['terlaksana'],1,1,'C');

	$no++;
}

$pdf->Output("laporan_info_produk.pdf","I");


?>

