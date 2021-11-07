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
 	<div class="container">
 		<div class="panel panel-default">
 			<div class="panel-heading">
 				<h4>Laporan Pengguna</h4>
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
 						$no = 1;
 						$sql = mysqli_query($conn,"SELECT * FROM user WHERE level = 'peminjam'");
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
 <script>
 	window.print();
 </script>
 </html>