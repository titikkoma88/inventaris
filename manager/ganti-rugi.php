<?php 
	include'../header/header.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<div class="container">
 		<ol class="breadcrumb">
 			<li><a href="../beranda/beranda.php">Beranda</a></li>
 			<li><a href="ganti-rugi.php">Laporan Ganti Rugi</a></li>
 		</ol>
 		<div class="panel panel-default">
 			<div class="panel-heading">
 				<h4>Laporan Ganti Rugi</h4>
 			</div>
 			<div class="panel-body">
 				<table class="table table-bordered">
 					<tr>
 						<th>Kondisi</th>
 						<th>Jumlah</th>
 						<th>Opsi</th>
 					</tr>

 					<tr>
 						<td>Rusak</td>
 						<td>
 							<?php 
 								$sql = mysqli_query($conn,"SELECT * FROM kondisi_rusak WHERE kondisi = 'Rusak'");
 								$total_r = mysqli_num_rows($sql);
 								echo $total_r;
 							 ?>
 						</td>
 						<td>
 							<a href="ganti-rugi-2.php?kondisi=Rusak">Lihat</a>
 						</td>
 					</tr>
 					<tr>
 						<td>Hilang</td>
 						<td>
 							<?php 
 								$sql = mysqli_query($conn,"SELECT * FROM kondisi_rusak WHERE kondisi = 'Hilang'");
 								$total_h = mysqli_num_rows($sql);
 								echo $total_h;
 							 ?>
 						</td>
 						<td>
 							<a href="ganti-rugi-2.php?kondisi=Hilang">Lihat</a>
 						</td>
 					</tr>

 				</table>
 			</div>
 		</div>
 	</div>
 </body>
 </html>