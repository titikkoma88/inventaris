<?php 
	session_start();
	include '../connection/connect.php';
	include '../header/header.php';
	include'../kunci/kunci.php';

	$query = mysqli_query($conn, "SELECT * FROM jenis");
	$no = 1;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Jenis</title>

</head>
<body>
	<br>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<ol class="breadcrumb">
				<li><a href="../beranda/beranda.php">Beranda</a></li>
				<li><a href="laporan_jenis.php">Laporan Jenis</a></li>
			</ol>
			<table class="table table-bordered"> 
				<tr>
					<td colspan="8">
						<div class="panel panel-default">
						<div class="panel-heading"><h4>Laporan Peminjaman Berdasarkan Jenis</h4></div>
					</div>
					</td>
				</tr>
				<tr>
					<th>NO</th>
					<th>Nama Jenis</th>
					<th>Jumlah</th>
					<th>Detail</th>
				</tr>
					<?php 
						while($data = mysqli_fetch_array($query)){ 
					?>
					<?php

							$jml_jenis = mysqli_query($conn, "SELECT COUNT(*) jml FROM peminjaman
													INNER JOIN barang ON peminjaman.id_barang = barang.id_barang
													WHERE barang.id_jenis = {$data['id_jenis']} AND peminjaman.status =2");
					
						while($data2 = mysqli_fetch_array($jml_jenis)){
					 ?>
				<tr>
					<td><?= $no++?></td>
					<td><?= $data['nm_jenis'];?></td>
					<td><?= $data2['jml'];?></td>					
					<td>
						<a class="btn btn-info white-blue" href="tampil_laporan_jenis.php?id_jenis=<?= $data['id_jenis'];?>">Detail</a>
					</td>
				<?php } ?>
			<?php } ?>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>