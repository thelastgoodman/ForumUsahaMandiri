<?php
    require('../../assets2/pdf/fpdf.php');
    include('../../Koneksi/koneksi.php');
   
    $server="localhost"; 
	$username="root"; 
	$password=""; 
	$db = "ukm_db";
	 
	//buka koneksi database 
	mysql_connect($server,$username,$password); 
	mysql_select_db($db);
   
   
	$query     = "select * from tb_cat_produk";
    $db_query  = mysql_query($query) or die("Query gagal");
	
    //Variabel untuk iterasi
    $i = 0;
	
    //Mengambil nilai dari query database
    while($data=mysql_fetch_row($db_query))
    {
        $cell[$i][1] = $data[0];
       
        $cell[$i][3] = $data[1];
		$cell[$i][4] = $data[2];
		$cell[$i][5] = $data[3];
		

		
        $i++;
    }
	
    //memulai pengaturan output PDF
    class PDF extends FPDF
    {
        //untuk pengaturan header halaman
        function Header()
        {
            //Pengaturan Font Header = jenis font : Times New Romans, Bold, ukuran 14
            $this->SetFont('Times','B',13);
            //untuk warna background Header
            $this->SetFillColor(244,66,56);
            //untuk warna text
            $this->SetTextColor(0,0,0);
            //Menampilkan tulisan di halaman = TBLR (untuk garis)=> B = Bottom,
            // L = Left, R = Right
            //untuk garis, C = center
           $this->Cell(1,3);
            $this->Cell(17,1,'Rekap Data Kategori Produk','TBLR',0,'C',1);
        }
		
    }
    //pengaturan ukuran kertas P = Portrait
    $pdf = new PDF('P','cm','A4');
    $pdf->Open();
    $pdf->AddPage();
	$pdf->SetMargins(2,3,1);
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('Times','B',11);

	$pdf->Cell(1,1,'No','LRTB',0,'C');
   
    $pdf->Cell(5,1,'Nama Kategori','LRTB',0,'C');
    $pdf->Cell(7,1,'Deskripsi','LRTB',0,'C');
    $pdf->Cell(4,1,'Tanggal','LRTB',0,'C');


   
	
    $pdf->Ln();
    $pdf->SetFont('Times',"",9);
	
   	for($j=0;$j<$i;$j++)
    {	
		
        //$harga = number_format($cell[$j][4],0,",",".");
        //menampilkan data dari hasil query database
        //$pdf->Cell(1,1,$j+1,'LBTR',0,'C');
		
        $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
       
        $pdf->Cell(5,1,$cell[$j][3],'LBTR',0,'C');
		$pdf->Cell(7,1,$cell[$j][4],'LBTR',0,'C');
		$pdf->Cell(4,1,$cell[$j][5],'LBTR',0,'C');
	
	
		

		
		//$pdf->Cell(3,1,$harga,'LBTR',0,'R');
        $pdf->Ln();
    }
	
    //menampilkan output berupa halaman PDF
    $pdf->Output();
?>