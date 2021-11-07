<?php 

	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';

	$id = $_GET['id_user'];

	if(isset($_POST['ubah_user'])){
		$nama = $_POST['nama'];
		$user = $_POST['user'];
		$gambar = $_FILES['foto_u']['name'];
		$level = $_POST['level'];
		$alamat = $_POST['alamat'];
		$tel = $_POST['no_tel'];
		$jabatan = $_POST['jabatan_u'];
		$kelas = $_POST['kelas'];

		$sql = mysqli_query($conn,"UPDATE user SET 
									nm_user = '$nama',
									username = '$user',
									foto = '$gambar',
									level = '$level',
									alamat = '$alamat',
									tel_user = '$tel',
									jabatan_sekolah = '$jabatan',
									kelas = '$kelas'
									WHERE id_user = $id");
		if($sql){
			echo "
				<script>
					alert('Data user berhasil di ubah');
					document.location.href='tampil_user.php';
				</script>
				";
		}else{
			echo "
				<script>
					alert('Data user gagal di ubah');
					document.location.href='ubah_user.php';
				</script>
				";
		}
	}
	$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id")		
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
			<li><a href="ubah_user.php">Ubah Pengguna</a></li>
		</ol>

		<div class="row">
			<div class="col-sm-12">
				<h2 class="text-center">UBAH DATA USER</h2>
				<hr>
			</div>

			<div class="col-sm-12 col-sm-offset-3">
				<div class="input-group">
					<form method="post" enctype="multipart/form-data">
					<?php while($data = mysqli_fetch_array($query)){ ?>

						<div class="input-group">
							<label class="input-group-addon">Nama Lengkap</label>
							<input class="form-control" type="text" name="nama" value="<?= $data['nm_user'];?>">
						</div>

						<div class="input-group">
							<label class="input-group-addon">Username</label>
							<input class="form-control" type="text" name="user" value="<?= $data['username'];?>">
						</div>

						<div class="input-group">
							<label class="input-group-addon">Foto</label>
							<input class="form-control" type="file" name="foto_u">
						</div>

						<div class="input-group">
							<label class="input-group-addon">Level</label>
							<select name="level" class="form-control" value="<?= $data['level'];?>">
								<option value="manager">Manager</option value="<?= $data['level'];?>">
								<option value="peminjam">Peminjam</option value="<?= $data['level'];?>">
							</select>
						</div>
						
						<div class="input-group">
							<label class="input-group-addon">Alamat</label>
							<input class="form-control" type="text" name="alamat" value="<?= $data['username'];?>">
						</div>
						<div class="input-group">
							<label class="input-group-addon">Telephone User</label>
							<input class="form-control" type="text" name="no_tel" value="<?= $data['tel_user'];?>">
						</div>
						
						<div class="input-group">
							<label class="input-group-addon">Jabatan Sekolah</label>
							<input class="form-control" type="text" name="jabatan_u" value="<?= $data['jabatan_sekolah']?>">
						</div>

						<div class="input-group">
							<label class="input-group-addon">Keterangan</label>
							<input class="form-control" type="text" name="kelas" value="<?= $data['kelas'];?>">
						</div>

						<input class="btn btn-warning white-orange" type="submit" name="ubah_user" value="Ubah">
					<?php } ?>
				</form>
				</div>
			</div>

		</div>
	</div>
</body>
</html>