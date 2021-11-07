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
			<li><a href="supplier.php">Laporan Barang Supplier</a></li>
		</ol>
 		<div class="panel panel-default">
 			<div class="panel-heading">
 				<h4>Laporan Supplier</h4>
 			</div>
 			<div class="panel-body">
 				<table class="table table-bordered">
	 				<tr>
	 					<th>NO</th>
	 					<th>Nama Supplier</th>
	 					<th>No Telfon</th>
	 					<th>Alamat</th>
	 					<th>Jumlah Barang</th>
	 					<th>Opsi</th>
	 				</tr>

	 				<?php 
	 					$no = 1;
	 					@$keyword = $_POST['keyword'];

	 					if($keyword !=''){
		 					$query = mysqli_query($conn,"SELECT * FROM supplier WHERE nm_supplier LIKE '%$keyword%' ");
	 					}else{
		 					$query = mysqli_query($conn,"SELECT * FROM supplier");
		 				}
	 					while($data_supp = mysqli_fetch_array($query)){
	 				 ?>

	 				<tr>
	 					<td><?= $no++?></td>
	 					<td><?= $data_supp['nm_supplier']?></td>
	 					<td><?= $data_supp['telp_supplier']?></td>
	 					<td><?= $data_supp['alamat']?></td>
	 					<td>
	 						<?php 
	 							$sql = mysqli_query($conn,"SELECT * FROM barang WHERE id_supplier = {$data_supp['id_supplier']}");
	 							$total_supp = mysqli_num_rows($sql);
	 							echo $total_supp;
	 						 ?>
	 					</td>
	 					<td>
	 						<a href="barang.php?id_supp=<?= $data_supp['id_supplier']?>&nm_supp=<?= $data_supp['nm_supplier']?>" class="btn btn-primary white-blue">Lihat</a>
	 					</td>
	 				</tr>
	 				<?php } ?>
	 			</table>
 			</div>
 		</div>
 	</div>
 </body>
 </html>