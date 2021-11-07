<?php 
	
	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';

	$id_sup = $_GET['id_supplier'];

	if(isset($_POST['submit_sup'])){
		
		$nm_sup = $_POST['nm_sup'];
		$tel_sup = $_POST['tel_sup'];
		$alamat = $_POST['alamat'];

		$sql = mysqli_query($conn, "UPDATE supplier SET 
									nm_supplier = '$nm_sup',
									telp_supplier = '$tel_sup',
									alamat = '$alamat'
									WHERE id_supplier = $id_sup");
		if($sql){
		echo "
				<script>
					alert('Supplier berhasil di ubah');
					document.location.href='tampil_supplier.php';
				</script>
			";
		}else{
			echo "
					<script>
						alert('Supplier gagal di ubah');
						document.location.href='tampil_supplier.php';
					</script>
				";
		}
	}

	$query = mysqli_query($conn, "SELECT * FROM supplier WHERE id_supplier = $id_sup");

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.input-group{
			margin-bottom: 10px;
			width: 550px;
		}
		.input-group-addon{
			width: 150px;
			border-radius: 0;
		}
		.form-control{
			width: 250px;
		}
		input{
			width: 550px;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="text-center">UBAH SUPPLIER</h2>
				<hr>
			</div>

			<div class="col-sm-4 col-sm-offset-3">
				<form method="post">
					<?php while($data = mysqli_fetch_array($query)){ ?>
						
						<input type="hidden" name="id_sup" value="$id_supplier">

						<div class="input-group">
							<label class="input-group-addon">Nama Supplier</label>
							<input class="form-control" type="text" name="nm_sup" value="<?= $data['nm_supplier'];?>">
						</div>

						<div class="input-group">
							<label class="input-group-addon">Telephone Supplier</label>
							<input class="form-control" type="text" name="tel_sup" value="<?= $data['telp_supplier'];?>">
						</div>

						<div class="input-group">
							<label class="input-group-addon">Alamat</label>
							<input class="form-control" type="text" name="alamat" value="<?= $data['alamat'];?>">
						</div>
						
						<input class="btn btn-warning white-orange" type="submit" name="submit_sup">
					<?php } ?>
				</form>
			</div>

		</div>
	</div>
</body>
</html>