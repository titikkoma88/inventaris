<?php 
session_start();
	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';

	if(isset($_POST['submit'])){
		$baru = $_POST['pw_baru'];
		$lama = $_POST['pw_lama'];
		$konfir = $_POST['konfir'];
		$id = $_SESSION['id_user'];

		if($baru === $konfir){
			$baru_pw = MD5($baru);
			$konfir_pw = MD5($konfir);

			$sql = mysqli_query($conn, "UPDATE user SET password = '$baru_pw' WHERE id_user = $id AND password = MD5('$lama')");
			if($sql){
				echo "
						<script>
							alert('Password berhasil di ubah');
							document.location.href='../jenis/tampil_jenis.php';
						</script>
				";
			}else{
				echo "
						<script>
							alert('Password lama salah / konfirmasi password salah');
							document.location.href='../jenis/tampil_jenis.php';
						</script>
					";
			}
		}else{
			echo "
						<script>
							alert('Password lama salah / konfirmasi password salah');
							document.location.href='../jenis/tampil_jenis.php';
						</script>
			";
		}
		

	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ganti Password</title>
</head>
<body>
	<br>
	<form method="POST">
		<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form method="POST">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Ganti Password</h4>
			</div>
			<div class="panel-body">
				<table>
			<tr>
				<td>
					<div class="input-group input-group-sm mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Password Lama</span>
							<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="password" name="pw_lama">
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="input-group input-group-sm mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Password Baru</span>
							<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="password" name="pw_baru">
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Konfirmasi Password</span>
							<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="password" name="konfir">
					</div>
					<br>
				</td>
			</tr>
			<tr>
				<td>
					<input class="btn btn-success white-green " type="submit" name="submit" value="Ganti Password">
				</td>
			</tr>
		</table>
			</div>
		</div>
	</form>
		</div>
	</div>
	</form>
</body>
</html>