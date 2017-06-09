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
   
   
	$query     = "select * from tb_anggota inner join tb_user on tb_user.user_id = tb_anggota.user_id ORDER BY id_anggota ASC";
    $db_query  = mysql_query($query) or die("Query gagal");
	
    //Variabel untuk iterasi
    $i = 0;
	
    //Mengambil nilai dari query database
    while($data=mysql_fetch_row($db_query))
    {
        $cell[$i][1] = $data[1];
       	$cell[$i][2] = $data[2];
        $cell[$i][3] = $data[8];
		$cell[$i][4] = $data[9];
		
		
		

		
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
            
            //untuk warna text
            $this->SetTextColor(0,0,0);
            $this->SetFillColor(255,255,255);
            //Menampilkan tulisan di halaman = TBLR (untuk garis)=> B = Bottom,
            // L = Left, R = Right
            //untuk garis, C = center
           
            $this->Cell(19,1,'Data Anggota FK-PEL','TBLR',0,'C',1);
        }
		
    }
    //pengaturan ukuran kertas P = Portrait
    $pdf = new PDF('P','cm','A4');
    $pdf->Open();
    $pdf->AddPage();
	
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('Times','B',11);

	$pdf->Cell(1,1,'No','LRTB',0,'C');
   
    $pdf->Cell(4,1,'Nama Lengkap','LRTB',0,'C');
    $pdf->Cell(6,1,'Alamat','LRTB',0,'C');
    $pdf->Cell(5,1,'Email','LRTB',0,'C');
	$pdf->Cell(3,1,'Tanggal','LRTB',0,'C');

   
	
    $pdf->Ln();
    $pdf->SetFont('Times',"",9);
	
   	for($j=0;$j<$i;$j++)
    {	
		
        //$harga = number_format($cell[$j][4],0,",",".");
        //menampilkan data dari hasil query database
        //$pdf->Cell(1,1,$j+1,'LBTR',0,'C');
		
        $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
        $pdf->Cell(4,1,$cell[$j][1],'LBTR',0,'C');
        $pdf->Cell(6,1,$cell[$j][2],'LBTR',0,'C');
		$pdf->Cell(5,1,$cell[$j][3],'LBTR',0,'C');
		$pdf->Cell(3,1,$cell[$j][4],'LBTR',0,'C');
	
	
		

		
		//$pdf->Cell(3,1,$harga,'LBTR',0,'R');
        $pdf->Ln();
    }
	
    //menampilkan output berupa halaman PDF
    $pdf->Output("Laporan_AnggotaUKM.pdf","I");
?>