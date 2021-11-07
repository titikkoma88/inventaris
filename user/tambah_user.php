<?php 

	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';

	if(isset($_POST['submit_user'])){
		$nama = $_POST['nm_user'];
		$user = $_POST['user'];
		$gambar = $_FILES['foto_u']['name'];
		$email = $_POST['email'];
		$level = $_POST['level'];
		$alamat = $_POST['alamat'];
		$tel_user = $_POST['tel_user'];
		$kelas = $_POST['kelas'];
		$jabatan_u = $_POST['jabatan_u'];

		$sql = mysqli_query($conn,"INSERT INTO `user` (`id_user`, `nm_user`, `username`, `foto`, `email`, `password`, `level`, `alamat`, `tel_user`, `kelas`, `jabatan_sekolah`) 
			VALUES (NULL, '$nama', '$user', '$gambar', '$email', MD5('12345'), '$level', '$alamat', '$tel_user', '$kelas', '$jabatan_u')");

		if($sql){
			echo "
					<script>
						alert('Pengguna Baru Berhasil Di Tambahkan');
						document.location.href='tampil_user.php';
					</script>
				";
		}else{
			echo "
g
				";
		}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.input-group{
			margin-bottom: 10px;
			width: 500px;
		}
		.input-group-addon{
			width: 150px;
			border-radius: 0;
		}
		.form-control{
			width: 250px;
		}
		input{
			width: 500px;
		}

	</style>
</head>
<body>
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="../beranda/beranda-side.php">Beranda</a></li>
			<li><a href="tampil_user.php">Pengguna</a></li>
			<li><a href="tambah_user.php">Tambah Pengguna</a></li>
		</ol>

		<div class="row">
			<div class="col-sm-12">
				<h2 class="text-center">TAMBAH PENGGUNA</h2>
				<hr>
			</div>

			<div class="col-sm-2 col-sm-offset-3">
				<form method="post" enctype="multipart/form-data">
				<div class="input-group">
					<label class="input-group-addon">Nama Lengkap</label>
					<input class="form-control" type="text" name="nm_user">
				</div>

				<div class="input-group">
					<label class="input-group-addon">Username</label>
					<input class="form-control" type="text" name="user">
				</div>

				<div class="input-group">
					<label class="input-group-addon">Foto</label>
					<input class="form-control" type="file" name="foto_u">
				</div>

				<div class="input-group">
					<label class="input-group-addon">Email</label>
					<input class="form-control" type="text" name="email">
				</div>

				<div class="input-group">
					<label class="input-group-addon">Level</label>
					<select name="level" class="form-control">
						<option value="manager">Manager</option>
						<option value="peminjam">Peminjam</option>
					</select>
				</div>
				
				<div class="input-group">
					<label class="input-group-addon">Nomot Telephone</label>
					<input class="form-control" type="text" name="tel_user">
				</div>

				<div class="input-group">
					<label class="input-group-addon">Alamat</label>
					<input class="form-control" type="text" name="alamat">
				</div>
				<div class="input-group">
					<label class="input-group-addon">Jabatan Sekolah</label>
					<input class="form-control" type="text" name="jabatan_u">
				</div>
				<div class="input-group">
					<label class="input-group-addon">Keterangan</label>
					<input class="form-control" type="text" name="kelas">
				</div>
				
				<input class="btn btn-succes white-green" type="submit" name="submit_user" value="Tambah User">
			</form><br><br>
			</div>

		</div>
	</div>
</body>
</html>