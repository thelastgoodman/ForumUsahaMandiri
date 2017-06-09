	<script src="../assets2/js/highcharts.js"></script>
	
	<script src="../assets2/js/jquery-1.10.1.min.js"></script>

	<script>
		var chart; 
		$(document).ready(function() {
			  chart = new Highcharts.Chart(
			  {
				  
				 chart: {
					renderTo: 'mygraph',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				 },   
				 title: {
					text: 'Internet Browser Statistics '
				 },
				 tooltip: {
					formatter: function() {
						return '<b>'+
						this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
					}
				 },
				 
				
				 plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: 'green',
							formatter: function() 
							{
								return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
							}
						}
					}
				 },
       
					series: [{
					type: 'pie',
					name: 'Browser share',
					data: [
					<?php
					    include "connection.php";
						$query = mysqli_query($con,"SELECT nama_cat, COUNT( tb_info_produk.id_cat_produk ) AS TotalProduk
FROM tb_info_produk
INNER JOIN tb_cat_produk ON tb_info_produk.id_cat_produk = tb_cat_produk.id_cat_produk
GROUP BY tb_cat_produk.nama_cat");
					 
						while ($row = mysqli_fetch_array($query)) {
							$clustername = $row['nama_cat'];
						 
							$data = mysqli_fetch_array(mysqli_query($con,"SELECT nama_cat, COUNT( tb_info_produk.id_cat_produk ) AS TotalProduk
FROM tb_info_produk
INNER JOIN tb_cat_produk ON tb_info_produk.id_cat_produk = tb_cat_produk.id_cat_produk where nama_cat='$clustername'"));
							$jumlah = $data['TotalProduk'];
							?>
							[ 
								'<?php echo $clustername ?>', <?php echo $jumlah; ?>
							],
							<?php
						}
						?>
			 
					]
				}]
			  });
		});	
	</script>
	 <div id ="mygraph"></div>