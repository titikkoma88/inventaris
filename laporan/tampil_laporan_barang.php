<?php 
	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';
	$id = $_GET['id_barang'];
	$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = $id");
	$data = mysqli_fetch_array($query);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
</head>
<body>
	<br>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="../beranda/beranda.php">Beranda</a></li>
			<li><a href="laporan_barang.php">Laporan Barang</a></li>
			<li><a href="tampil_laporan_barang">Tampil Laporan Peminjaman <?= $data['spesifikasi_barang'];?></a></li>
		</ol>
		<table class="table table-bordered">
					<tr>
						<td colspan="8">
							<div class="panel panel-default">
							<?php 
								
								
						
							 ?>
							<div class="panel-heading"><h4>Laporan Peminjaman Barang <?= $data['spesifikasi_barang'];?></h4>
								<a href="print_laporan_barang.php?id_barang=<?= $_GET['id_barang'];?>" target="_BLANK" class="btn btn-primary white-blue">Print</a>
							</div>
						</div>
						</td>
					</tr>  
					<tr>
						<th>NO</th>
						<th>Peminjam</th>
						<th>Spesifikasi Barang</th>
						<th>Tanggal Pinjam</th>
						<th>Tanggal Kembali</th>
						<th>Status</th>
					</tr>
						<?php 
							$id = $_GET['id_barang'];
							$no = 1;
							$sql = mysqli_query($conn,"SELECT * FROM barang 
														INNER JOIN peminjaman 
														ON barang.id_barang = peminjaman.id_barang
														INNER JOIN user 
														ON user.id_user = peminjaman.id_user
														WHERE barang.id_barang = $id
														AND peminjaman.status = 2");
							while($data = mysqli_fetch_array($sql)){
						 ?>
					<tr>
						<td><?= $no++?></td>
						<td><?= $data['nm_user'];?></td>
						<td><?= $data['spesifikasi_barang'];?></td>
						<td><?= $data['tgl_pinjam'];?></td>
						<td><?= $data['tgl_kembali'];?></td>
						<td><?= $data['status'] === 2	;?>Barang Sudah Kembali</td>
					</tr>
				<?php } ?>
				</table>
	</div>
</body>
</html>