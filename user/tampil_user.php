<?php 
	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';

	@$id_user = $_GET['id_user'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Data User Peminjam</title>
</head>
<body>
	<div class="container">
		 <div class="col-sm-12">
		 	<ol class="breadcrumb">
				<li><a href="../beranda/beranda-side.php">Beranda</a></li>
				<li><a href="../user/tampil_user.php">Pengguna</a></li>
			</ol>
		 	<div class="panel panel-default">
		 		<div class="panel-heading"><h2>Data Pengguna</h2></div>
		 		<div class="panel-body">
		 			<a class="btn btn-success white-green" href="tambah_user.php"><i class="fas fa-user-plus"></i>Tambah User</a><br><br>

		 			<table class="table table-bordered">
	
					<tr>
						<th>ID User</th>
						<th>Nama User</th>
						<th>Username</th>
						<th>Foto</th>
						<th>Level</th>
						<th>No Telephone</th>
						<th>Alamat</th>
						<th>Jabatan Sekolah</th>
						<th>Keterangan</th>
						<th>Opsi</th>
					</tr>

					<?php
						$no = 1;
						@$keyword = $_POST['keyword'];

						if($keyword !=''){
							$show_user =  mysqli_query($conn,"SELECT * FROM user WHERE level = 'peminjam' AND nm_user LIKE '%$keyword%'");
						}elseif($id_user){
							$show_user = mysqli_query($conn,"SELECT * FROM user WHERE level = 'peminjam' AND id_user = $id_user ORDER BY id_user ASC");
						}else{
							$show_user = mysqli_query($conn,"SELECT * FROM user WHERE level = 'peminjam' ORDER BY id_user ASC");
						}
						
						
						while($data = mysqli_fetch_array($show_user)){ 
					 ?>

						<tr>
							<td><?= $no++?></td>
							<td><?= $data['nm_user'];?></td>
							<td><?= $data['username'];?></td>
							<td><img src="../img/profile/<?= $data['foto'];?>" style="max-width: 100px;"></td>
							<td><?= $data['level'];?></td>
							<td><?= $data['tel_user'];?></td>
							<td><?= $data['alamat'];?></td>
							<td><?= $data['jabatan_sekolah'];?></td>
							<td><?= $data['kelas'];?></td>
							<td>
								<a class="btn btn-primary white-blue" href="reset_password.php?id_user=<?= $data['id_user'];?>" onclick="return confirm('Apakah anda ingin reset password ini?')"><i class="fas fa-sync-alt"></i></a>

								<a class="btn btn-danger white-red" href="hapus_user.php?id_user=<?= $data['id_user'];?>" onclick="return confirm('Apakah anda ingin menghapus user ini?')"><i class="fas fa-trash-alt"></i></a>

								<a class="btn btn-warning white-orange" href="ubah_user.php?id_user=<?= $data['id_user'];?>" onclick="return confirm('Apakah anda mengubah data user ini?')"><i class="fas fa-edit"></i></a>
							</td>
						</tr>
					<?php } ?>

		 			</table>
		 		</div>
		 	</div>
		 </div>
	</div>
</body>
</html>