<?php 
	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
</head>
<body>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="../beranda/beranda.php">Beranda</a></li>
			<li><a href="laporan_barang.php">Laporan Barang</a></li>
		</ol>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Laporan Peminjaman Barang</h4>

				</div>
				<div class="panel-body">
					<table class="table table-bordered">  
						<tr>
							<td>NO</td>
							<td>Nama Jenis</td>
							<td>Jumlah</td>
							<td>Detail</td>
						</tr>
							<?php 
								$query = mysqli_query($conn, "SELECT * FROM barang");
								$no = 1;

								while($data = mysqli_fetch_array($query)){ 
							?>
							<?php 
								$jml_brg = mysqli_query($conn, "SELECT COUNT(*) jml FROM peminjaman
															INNER JOIN barang ON peminjaman.id_barang = barang.id_barang
															WHERE barang.id_barang = {$data['id_barang']} AND peminjaman.status = 2");
								while($data2 = mysqli_fetch_array($jml_brg)){
							 ?>
						<tr>
							<td><?= $no++?></td>
							<td><?= $data['spesifikasi_barang'];?></td>
							<td><?= $data2['jml'];?></td>					
							<td>
								<a href="tampil_laporan_barang.php?id_barang=<?= $data['id_barang'];?>" class="btn btn-primary white-blue">Detail</a>
							</td>
						<?php } ?>
					<?php } ?>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>