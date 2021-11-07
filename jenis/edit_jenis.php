<?php 
	include'../connection/connect.php';
	include'../header/header.php';

	if(isset($_POST['submit'])){
		$id_jenis = $_GET['id_jenis'];
		$nm_jenis = $_POST['nm_jenis'];
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		$gambar = $_FILES['file_gambar']['name'];
		$x = explode('.', $gambar);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['file_gambar']['size'];
		$file_tmp = $_FILES['file_gambar']['tmp_name'];

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			    if($ukuran < 10440700){			
					move_uploaded_file($file_tmp, '../img/'.$gambar);
					$query = mysqli_query($conn, "UPDATE jenis SET nm_jenis = '$nm_jenis', gambar = '$gambar' WHERE id_jenis = $id_jenis");
				if($query){
					echo 'GAMBAR BERHASIL DI UPLOAD';
				}else{
					echo 'GAGAL MENGUPLOAD GAMBAR';
				}
			    }else{
				echo 'UKURAN FILE TERLALU BESAR';
			    }
		       }else{
			echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	       }


		// $edit_pros = mysqli_query($conn, "UPDATE jenis SET nm_jenis = '$nm_jenis' WHERE id_jenis = $id_jenis");

		// 	if($edit_pros){
		// 		echo 	"
		// 					<script>
		// 						alert('Jenis Berhasil Di Edit');
		// 						document.location.href='tampil_jenis.php';
		// 					</script>
		// 				";
		// 	}else{
		// 		echo 	"
		// 					<script>
		// 						alert('Jenis Berhasil Di Hapus');
		// 						document.location.href='tampil_jenis.php';
		// 					</script>
		// 				";
		// 	}
	}
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Jenis</title>
</head>
<body>
	<br>
	<?php 
		$id_jenis = $_GET['id_jenis'];
		$edit_show = mysqli_query($conn, "SELECT * FROM jenis WHERE id_jenis = $id_jenis");
		while($data = mysqli_fetch_array($edit_show)){
	 ?>
	 	<div class="row">
	 		<div class="col-md-3 col-md-offset-4">
	 			
	 				<form method="POST" action="" enctype="multipart/form-data">
				 		<table class="table table-bordered">
				 			<tr>
				 				<td colspan="2">
				 					<div class="panel panel-default">
						 				<div class="panel-heading">Edit Jenis</div>
						 			</div>
				 				</td>
				 			</tr>
				 			<tr>
								<td> Nama Jenis
									<div class="input-group-prepend">
										<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="text" name="nm_jenis" value="<?= $data['nm_jenis'];?>">
									</div>
								</td>
							</tr>
							<tr>
								<td> Gambar
									<div class="input-group-prepend">
										<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="file" name="file_gambar" value="<?= $data['gambar'];?>">
									</div>
								</td>
							</tr>
				 					<td>
				 						<input type="submit" name="submit" value="Edit Barang" class="btn btn-success white-green ">
				 					</td>
				 				</tr>
				 				
				 			</tr>
				 		</table>
					</form>			
	 		</div>
	 	</div>
<?php } ?>
</body>
</html>