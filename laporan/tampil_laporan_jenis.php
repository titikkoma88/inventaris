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
	<br>
	<div class="row">

		<div class="col-md-10 col-md-offset-1">
			<ol class="breadcrumb">
				<li><a href="../beranda/beranda.php">Beranda</a></li>
				<li><a href="laporan_jenis.php">Laporan Jenis</a></li>
				<li><a href="tampil_laporan_jenis.php">Laporan Peminjaman Jenis</a></li>
			</ol>
			<form>
				<table class="table table-bordered">
					<tr>
						<td colspan="8">
							<div class="panel panel-default">
							<?php 
								$id_jenis = $_GET['id_jenis'];
								$query_user = mysqli_query($conn, "SELECT * FROM jenis WHERE id_jenis = $id_jenis");
								$data = mysqli_fetch_array($query_user);
							 ?>
							<div class="panel-heading"><h4>Laporan Peminjaman Jenis <?= $data['nm_jenis'];?></h4>
								<a href="print_laporan_jenis.php?id_jenis=<?= $_GET['id_jenis'];?>" class="btn btn-primary white-blue" target="_BLANK">Print</a>
							</div>
						</div>
						</td>
					</tr>  
					<tr>
						<th>NO</th>
						<th>Peminjaman</th>
						<th>Spesifikasi Barang</th>
						<th>Tanggal Pinjam</th>
						<th>Tanggal Kembali</th>
						<th>Status</th>
					</tr>
						<?php 
							$id_jenis = $_GET['id_jenis'];
							$no = 1;
							$sql = mysqli_query($conn,"SELECT * FROM barang 
														INNER JOIN peminjaman 
														ON barang.id_barang = peminjaman.id_barang
														INNER JOIN user 
														ON user.id_user = peminjaman.id_user
														WHERE barang.id_jenis = $id_jenis
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

	</form>
		</div>
	</div>
</body>
</html>