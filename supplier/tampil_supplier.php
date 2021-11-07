<?php 
	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Supplier</title>
</head>
<body>
<br>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<ol class="breadcrumb">
				<li><a href="../beranda/beranda-side.php">Beranda</a></li>
				<li><a href="tampil_supplier.php">Supplier</a></li>
			</ol>
			<form>
				<table class="table table-bordered">
						<tr>
							<td colspan="8">
								<div class="panel panel-default">
								<div class="panel-heading"><h4>Data Supplier</h4></div>
								<div class="panel-body">
									<a href="tambah_supplier.php" class="btn btn-success white-green">Tambah Supplier</a>
								</div>
							</div>
							</td>
						</tr>
						<tr>
							<th>NO</th>
							<th>Nama Supplier</th>
							<th>No Telephone</th>
							<th>Alamat</th>
							<th>Opsi</th>
						</tr>

					<?php 
						$no = 1;
						@$keyword = $_POST['keyword'];

						if($keyword !=''){
							$supplier = mysqli_query($conn,"SELECT * FROM supplier WHERE nm_supplier LIKE '%$keyword%'");
						}else{
							$supplier = mysqli_query($conn,"SELECT * FROM supplier");
						}
						
						while($data = mysqli_fetch_array($supplier)){
					 ?>

						<tr>
							<td><?= $no++?></td>
							<td><?= $data['nm_supplier'];?></td>
							<td><?= $data['telp_supplier'];?></td>
							<td><?= $data['alamat'];?></td>
							<td>
								<a class="btn btn-danger white-red" href="hapus_supplier.php?id_supplier=<?= $data['id_supplier'];?>" style="margin-right: 10px;" onclick="return confirm('Apakah anda ingin hapus ini?')">Hapus</a>

								<a class="btn btn-warning white-orange" href="ubah_supplier.php?id_supplier=<?= $data['id_supplier'];?>" onclick="return confirm('Apakah anda ingin ubah ini?')">Ubah</a>
							</td>
						</tr>
					<?php } ?>			
				</table>
	</form>
		</div>
	</div>
</body>
</html>