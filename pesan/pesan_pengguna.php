<?php 
	include'../header/header.php';

	@$keyword = $_POST['keyword'];
	if($keyword !=''){
		$sql_pesan = mysqli_query($conn,"SELECT * FROM kontak_user INNER JOIN user WHERE kontak_user.id_user = user.id_user 
																					AND user.nm_user LIKE '%$keyword%'
																					ORDER BY kontak_user.id_kontak DESC");
	}elseif(isset($_GET["cari_tgl"])){
		$awal = $_GET['awal'];
		$akhir = $_GET['akhir'];

		$sql_pesan = mysqli_query($conn,"SELECT * FROM kontak_user INNER JOIN user WHERE kontak_user.id_user = user.id_user
											AND kontak_user.tanggal_pesan BETWEEN '$awal' AND '$akhir'
											ORDER BY kontak_user.id_kontak DESC");
	}else{
		$sql_pesan = mysqli_query($conn,"SELECT * FROM kontak_user INNER JOIN user WHERE kontak_user.id_user = user.id_user
										ORDER BY id_kontak DESC");

	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="../beranda/beranda-side.php">Beranda</a></li>
			<li><a href="pesan_pengguna.php">Pesan Pengguna</a></li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Pesan Pengguna</h3>
				<div class="tgl-pesan">
					<form method="GET">
						<input type="date" name="awal">
						<input type="date" name="akhir">
						<button type="submit" name="cari_tgl">Cari</button>
					</form>
				</div>
			</div>
			<div class="panel-body">
					<?php 
						while($data = mysqli_fetch_array($sql_pesan)){
					 ?>
				<div class="thumbnail" style="min-height: 140px;">
					<img src="../img/profile/<?= $data['foto'];?>" style = "width: 100px; height: 100px; float: left;" class="img-circle">
					<div class="caption" style="margin-left: 100px;">
						<h5>
							<?php 
								if($data['id_user'] === '0'){
									echo $_POST['username'];
								}else{
							?>
									<a href="../user/tampil_user.php?id_user=<?= $data['id_user'];?>"><?= $data['username'];?> </a> |
							<?php } ?>

							<?php 
								if(empty($data['email_kontak'])){
									echo "<b>NO EMAIL</b>";
								}else{ ?>
									<?= $data['email_kontak'];?>
							<?php } ?>
						</h5>
						<h5>
							<b>Pesan :</b> <br> 
							<?= $data['teks'];?>
						</h5>
						<div class="time-teks" style="float: right;">
							 <?= $data['tanggal_pesan']?>
						</div>
					</div>
				</div>
					<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>