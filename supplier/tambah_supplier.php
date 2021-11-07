<?php 
	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';

	if(isset($_POST['submit'])){
		$nm_sup = $_POST['nm_sup'];
		$no_hp = $_POST['no_hp'];
		$alamat = $_POST['alamat'];
		
		$tambah_brg = mysqli_query($conn, "INSERT INTO supplier VALUES (NULL, '$nm_sup', '$no_hp', '$alamat')");
		
			if($tambah_brg){
				echo 	"
							<script>
								alert('Supplier Baru Berhasil Di Tambahkan');
								document.location.href='tampil_supplier.php';
							</script>
						";
			}else{
				echo 	"
							<script>
								alert('Supplier Baru Gagal Di Tambahkan');
								document.location.href='tampil_supplier.php';
							</script>
						";
			}
		}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Supplier</title>
</head>
<body>
	<br>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form method="POST">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Tambah Supplier</h4>
			</div>
			<div class="panel-body">
				<table>
			<tr>
				<td>
					<div class="input-group input-group-sm mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Nama Supplier</span>
							<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="text" name="nm_sup">
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="input-group input-group-sm mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">No Telephone</span>
							<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="text" name="no_hp">
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Alamat</span>
							<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="text" name="alamat">
					</div>
					<br>
				</td>
			</tr>
			<tr>
				<td>
					<input class="btn btn-success white-green " type="submit" name="submit" value="Tambah Supplier">
				</td>
			</tr>
		</table>
			</div>
		</div>
	</form>
		</div>
	</div>
</body>
</html>