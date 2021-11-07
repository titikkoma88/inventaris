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
			<li><a href="jenis.php">Laporan Jenis</a></li>
		</ol>
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Laporan Jenis</h4></div>
			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>Nama Jenis</th>
						<th>Jumlah</th>
						<th>Opsi</th>
					</tr>
				<?php 
					$no = 1;
					@$keyword = $_POST['keyword'];

					if($keyword !=''){
						$sql = mysqli_query($conn,"SELECT * FROM jenis WHERE nm_jenis LIKE '%$keyword%' ");
					}else{
						$sql = mysqli_query($conn,"SELECT * FROM jenis");
					}
					while($data = mysqli_fetch_array($sql)){
				 ?>
					<tr>
						<td><?= $no++?></td>
						<td><?= $data['nm_jenis']?></td>
						<td>
							<?php 
								$id = $data['id_jenis'];
								$sql2 = mysqli_query($conn,"SELECT * FROM barang WHERE id_jenis = '$id' ");
								$total = mysqli_num_rows($sql2);
								echo $total;
							 ?>
						</td>
						<td><a href="barang.php?id_jenis=<?= $id?>&nm_jns=<?= $data['nm_jenis']?>" class="btn btn-primary white-blue">Lihat</a></td>
					</tr>
				<?php } ?>
					<tr>
						<th colspan="2">TOTAL</th>
						<td>
							<?php 
								$id = $data['id_jenis'];
								$sql3 = mysqli_query($conn,"SELECT * FROM barang");
								$total = mysqli_num_rows($sql3);
								echo $total;
							 ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>