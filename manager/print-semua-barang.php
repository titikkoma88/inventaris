<?php 
	include'../connection/connect.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<?php if(isset($_GET['id_jenis'])){ 
		$id = $_GET['id_jenis'];
		$no = 1;
		$barang_jenis = mysqli_query($conn,"SELECT * FROM barang 
											INNER JOIN jenis ON barang.id_jenis = jenis.id_jenis
											INNER JOIN supplier ON barang.id_supplier = supplier.id_supplier  ");
		
	?>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Laporan Semua Barang></h4>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<tr>
							<th>NO</th>
							<th>Nama Jenis</th>
							<th>Spesifikasi Barang</th>
							<th>Harga Barang</th>
							<th>Kondisi</th>
							<th>Sumber Dana</th>
							<th>Nama Supplier</th>
							<th>Tanggal Beli</th>
						</tr>

						<?php while($data_bj = mysqli_fetch_array($barang_jenis)){ ?>

						<tr>
							<td><?= $no++?></td>
							<td><?= $data_bj['nm_jenis'];?></td>
							<td><?= $data_bj['spesifikasi_barang'];?></td>
							<td><?= $data_bj['harga_barang'];?></td>
							<td><?= $data_bj['kondisi'];?></td>
							<td><?= $data_bj['sumber_dana'];?></td>
							<td><?= $data_bj['nm_supplier'];?></td>
							<td><?= $data_bj['tanggal_beli'];?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>

	<?php }else{ ?>

	<?php } ?>
		<script>
			window.print();
		</script>
</body>
</html>