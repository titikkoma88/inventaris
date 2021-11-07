<?php 
	session_start();
	include '../connection/connect.php';
	include '../header/header.php';

	$query = mysqli_query($conn, "SELECT * FROM user");
	$no = 1;
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
				<li><a href="laporan_user.php">Laporan User</a></li>
			</ol>
			<form>
				<table class="table table-bordered">  
					<tr>
					<td colspan="8">
						<div class="panel panel-default">
						<div class="panel-heading"><h4>Laporan Peminjaman Berdasarkan User</h4></div>
					</div>
					</td>
					</tr>
				<tr>
					<td>NO</td>
					<td>Nama User</td>
					<td>Jumlah</td>
					<td>Detail</td>
				</tr>
					<?php 
						while($data = mysqli_fetch_array($query)){ 
					?>
					<?php 
						$jml_user = mysqli_query($conn, "SELECT COUNT(*) jml FROM peminjaman
													INNER JOIN user ON user.id_user = peminjaman.id_user
													WHERE peminjaman.id_user = {$data['id_user']} AND peminjaman.status =2");
						while($data2 = mysqli_fetch_array($jml_user)){
					 ?>
				<tr>
					<td><?= $no++?></td>
					<td><?= $data['nm_user'];?></td>
					<td><?= $data2['jml'];?></td>					
					<td>
						<a class="btn btn-info white-blue" href="tampil_laporan_user.php?id_user=<?= $data['id_user'];?>">Detail</a>
					</td>
				<?php } ?>
			<?php } ?>
				</tr>
			</table>
	</form>
		</div>
	</div>
</body>
</body>
</html>