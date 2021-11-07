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
 			<li><a href="user.php">Laporan User</a></li>
 		</ol>
 		<div class="panel panel-default">
 			<div class="panel-heading">
 				<h4>Laporan Pengguna</h4>
 				<a href="cetak-user.php" class="btn btn-primary white-blue">Cetak</a>
 			</div>
 			<div class="panel-body">
 				<table class="table table-bordered">
 					<tr>
 						<th>NO</th>
 						<th>Nama Pengguna</th>
 						<th>Email</th>
 						<th>Level</th>
 						<th>Jabatan Sekolah</th>
 						<th>Nomor Telfon</th>
 						<th>Alamat</th>
 					</tr>

 					<?php
 						@$keyword = $_POST['keyword'];
 						if($keyword !=''){
 							
 							$sql = mysqli_query($conn,"SELECT * FROM user WHERE level = 'peminjam' AND nm_user LIKE '%$keyword%' ");
 						}else{
 							$sql = mysqli_query($conn,"SELECT * FROM user WHERE level = 'peminjam'");
 						}  
 						$no = 1;
 						while($data = mysqli_fetch_array($sql)){
 					?>

 					<tr>
 						<td><?= $no++?></td>
 						<td><?= $data['nm_user']?></td>
 						<td><?= $data['email']?></td>
 						<td><?= $data['level']?></td>
 						<td><?= $data['jabatan_sekolah']?> <?= $data['kelas']?></td>
 						<td><?= $data['tel_user']?></td>
 						<td><?= $data['alamat']?></td>
 					</tr>

 					<?php } ?>
 				</table>
 			</div>
 		</div>
 	</div>
 </body>
 </html>