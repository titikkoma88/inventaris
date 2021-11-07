<?php 
	include'../header/header.php';

	
	$sql_user = mysqli_query($conn, "SELECT * FROM user
									 WHERE id_user = 4");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<style>
	.biodata-thumb h1{
		font-size: 45px;
		font-family: Verdana;
		font-weight: normal;
		margin-bottom: -20px;
		font-style: normal;
	}
	.biodata-thumb h2{
		font-size: 25px;
		font-family: Verdana;
		font-weight: normal;
		font-style: italic;
		margin-bottom: -20px;
	}
	.biodata-thumb h4{
		font-size: 20px;
		font-family: Verdana;
		font-weight: normal;
		font-style: italic;
	}
	.biodata-thumb h5{
		font-size: 20px;
		font-family: Verdana;
		font-weight: normal;
		font-style: italic;
	}
</style>

<body>
	<div class="container">
		<div class="col-sm-6 col-sm-offset-3">
					<?php 
						while($data = mysqli_fetch_array($sql_user)){
					?>
			<img src="../img/profile/<?= $data['foto'];?>" class="img-circle" style="width: 200px; height: 200px; margin-left: 170px; position: absolute; border: 4px solid white;">
			
			<div class="thumbnail biodata-thumb" style="margin-top: 100px; background-color: #f2f2f2;">					
				<h1 class="text-center"><br><br><?= $data['nm_user'];?></h1>
				<h2 class="text-center"><i><?= $data['jabatan_sekolah'];?> <?= $data['kelas'];?></i></h2>
				<h3 class="text-center"><i class="fas fa-envlope"></i> <?= $data['email'];?></h3>
				<h4 class="text-center"><i class="fas fa-map-marker-alt"> </i> <?= $data['alamat'];?></h4>
				<h5 class="text-center"><i class="fas fa-phone"> </i> <?= $data['tel_user'];?></h5>
					<?php } ?>
					<?php 
						$sql_pjm = mysqli_query($conn, "SELECT COUNT(*) jumlah FROM peminjaman WHERE id_user = 4");
						$data = mysqli_fetch_array($sql_pjm);
					 ?>
				<h3 class="text-center">Peminjaman : <?= $data['jumlah'];?> Kali</h3>
			</div>
		</div>
	</div>
</body>
</html>