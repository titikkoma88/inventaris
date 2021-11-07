<?php 
	include'../connection/connect.php';
	include'../kunci/kunci.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

</head>
<body>
	<br>
	<div class="container">

		<table class="table table-bordered">
					<tr>
						<td colspan="8">
							<div class="panel panel-default">
							<?php 
								$id = $_GET['id_barang'];
								$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = $id");
								$data = mysqli_fetch_array($query);
							 ?>
							<div class="panel-heading"><h4>Laporan Peminjaman Barang <?= $data['spesifikasi_barang'];?></h4>
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
	<script>
		window.print();
	</script>
</body>
</html>