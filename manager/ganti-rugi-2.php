<?php 
	include'../header/header.php';
	$kondisi = $_GET['kondisi'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php if($_GET['kondisi'] === "Rusak"){ ?>
		<div class="container">
		<ol class="breadcrumb">
 			<li><a href="../beranda/beranda.php">Beranda</a></li>
 			<li><a href="ganti-rugi.php">Laporan Ganti Rugi</a></li>
 			<li><a href="ganti-rugi-2.php">Laporan Ganti Rugi <?= $kondisi?></a></li>
 		</ol>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Laporan Ganti Rugi Barang <?= $kondisi?></h4>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<tr>
							<th>NO</th>
							<th>Nama Pengguna</th>
							<th>Nama Barang</th>
							<th>Harga Ganti Rugi</th>
							<th>Tanggal Rusak</th>
							<th>Tanggal Bayar</th>
							<th>Keterangan</th>
							<th>Opsi</th>
						</tr>
							<?php 
								$no = 1;
								$sql_gt = mysqli_query($conn, "SELECT * FROM kondisi_rusak
																INNER JOIN peminjaman ON peminjaman.id_pinjam = kondisi_rusak.id_pinjam
																INNER JOIN barang ON peminjaman.id_barang = barang.id_barang
																INNER JOIN user ON peminjaman.id_user = user.id_user
																WHERE kondisi_rusak.kondisi = 'Rusak'
																ORDER BY kondisi_rusak.id_rusak DESC");
								while($data_gt = mysqli_fetch_array($sql_gt)){
							 ?>

						<tr>
							<td><?= $no++?></td>
							<td><?= $data_gt['nm_user'];?></td>
							<td><?= $data_gt['spesifikasi_barang']?></td>
							<td><?= "Rp." . number_format($data_gt['harga_barang']/2,2,',','.') ?></td>
							<td><?= $data_gt['tanggal_rusak']?></td>
							<td><?= $data_gt['tanggal_bayar_gt']?></td>
							<td>
								<?php 
									if($data_gt['status_gt'] === '0'){
										echo "<i style='color:red;'>Belum bayar</i>";
									}elseif($data_gt['status_gt'] === '1'){
										echo "<i>Sudah lunas</i>";
									}
								 ?>
							</td>
							<td>
								<?php 
									if($data_gt['status_gt'] === '0'){
									echo "<i>BELUM<br> LUNAS</i>";
								?>

								<?php 
									}elseif($data_gt['status_gt'] === '1'){
										echo "<i>LUNAS</i>";
									}
								 ?>
						</tr>

							<?php } ?>
					</table>
				</div>
			</div>
		</div>
	<?php }elseif($_GET['kondisi'] === "Hilang"){ ?>
		<div class="container">
		<ol class="breadcrumb">
 			<li><a href="../beranda/beranda.php">Beranda</a></li>
 			<li><a href="ganti-rugi.php">Laporan Ganti Rugi</a></li>
 			<li><a href="ganti-rugi-2.php">Laporan Ganti Rugi <?= $kondisi?></a></li>
 		</ol>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Laporan Ganti Rugi Barang <?= $kondisi?></h4>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<tr>
							<th>NO</th>
							<th>Nama Pengguna</th>
							<th>Nama Barang</th>
							<th>Harga Ganti Rugi</th>
							<th>Tanggal Hikang</th>
							<th>Tanggal Bayar</th>
							<th>Keterangan</th>
							<th>Opsi</th>
						</tr>
							<?php 
								$no = 1;
								$sql_gt = mysqli_query($conn, "SELECT * FROM kondisi_rusak
																INNER JOIN peminjaman ON peminjaman.id_pinjam = kondisi_rusak.id_pinjam
																INNER JOIN barang ON peminjaman.id_barang = barang.id_barang
																INNER JOIN user ON peminjaman.id_user = user.id_user
																WHERE kondisi_rusak.kondisi = 'Hilang'
																ORDER BY kondisi_rusak.id_rusak DESC");
								while($data_gt = mysqli_fetch_array($sql_gt)){
							 ?>

						<tr>
							<td><?= $no++?></td>
							<td><?= $data_gt['nm_user'];?></td>
							<td><?= $data_gt['spesifikasi_barang']?></td>
							<td><?= "Rp." . number_format($data_gt['harga_barang']/2,2,',','.') ?></td>
							<td><?= $data_gt['tanggal_rusak']?></td>
							<td><?= $data_gt['tanggal_bayar_gt']?></td>
							<td>
								<?php 
									if($data_gt['status_gt'] === '0'){
										echo "<i style='color:red;'>Belum bayar</i>";
									}elseif($data_gt['status_gt'] === '1'){
										echo "<i>Sudah lunas</i>";
									}
								 ?>
							</td>
							<td>
								<?php 
									if($data_gt['status_gt'] === '0'){
									echo "<i>BELUM<br> LUNAS</i>";
								?>

								<?php 
									}elseif($data_gt['status_gt'] === '1'){
										echo "<i>LUNAS</i>";
									}
								 ?>
						</tr>

							<?php } ?>
					</table>
				</div>
			</div>
		</div>
	<?php } ?>

</body>
</html>