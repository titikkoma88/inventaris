<?php 
	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';

	$user = $_SESSION['id_user'];
	$no = 1;

	if($_SESSION['level'] == 'peminjam' ){
		$peminjaman = mysqli_query($conn, "SELECT * FROM barang
											INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
											INNER JOIN peminjaman ON barang.id_barang = peminjaman.id_barang
											INNER JOIN user ON user.id_user = peminjaman.id_user
											WHERE peminjaman.id_user = '$user'
											ORDER BY peminjaman.id_pinjam DESC
											 ");
	}elseif($_SESSION['level'] == 'admin'){
	
		if(isset($_GET['status'])){
		if($_GET['status'] == "-"){
			$peminjaman = mysqli_query($conn, "SELECT * FROM barang
											INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
											INNER JOIN peminjaman ON barang.id_barang = peminjaman.id_barang
											INNER JOIN user ON user.id_user = peminjaman.id_user
											ORDER BY peminjaman.id_pinjam DESC
											 ");
		}else{
			$s = $_GET['status'];
			$stat = "status = '$s'";
			$peminjaman = mysqli_query($conn, "SELECT * FROM barang
											INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
											INNER JOIN peminjaman ON barang.id_barang = peminjaman.id_barang
											INNER JOIN user ON user.id_user = peminjaman.id_user
											WHERE peminjaman.status = '$s'
											ORDER BY peminjaman.id_pinjam DESC
											 ");
			}
		
		}else{
			$peminjaman = mysqli_query($conn, "SELECT * FROM barang
											INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
											INNER JOIN peminjaman ON barang.id_barang = peminjaman.id_barang
											INNER JOIN user ON user.id_user = peminjaman.id_user
											ORDER BY peminjaman.id_pinjam DESC
											 ");
		}

		if(isset($_GET['tgl'])){
			$a = $_GET['awal'];
			$z = $_GET['akhir'];

			$peminjaman = mysqli_query($conn, "SELECT * FROM barang
											INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
											INNER JOIN peminjaman ON barang.id_barang = peminjaman.id_barang
											INNER JOIN user ON user.id_user = peminjaman.id_user
											WHERE tgl_pinjam BETWEEN '$a' AND '$z'
											ORDER BY peminjaman.id_pinjam DESC
											 ");

		}

	}else{
		$peminjaman = mysqli_query($conn, "SELECT * FROM barang
											INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
											INNER JOIN peminjaman ON barang.id_barang = peminjaman.id_barang
											INNER JOIN user ON user.id_user = peminjaman.id_user
											ORDER BY peminjaman.id_pinjam DESC
											 ");
	}

 ?>

<?php if($_SESSION['level'] == 'admin'){ ?>
<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman Admin</title>
	<style>
		img{
			max-height: 100px;
		}
	</style>
</head>
<body>
	<br>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<form>
					<table class="table table-bordered">
						<tr>
							<td colspan="7">
								<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Peminjaman</h4>
								</div>
								<div class="panel-body">
									<a class="btn btn-danger white-red" href="hapus-semua-peminjaman.php" onclick="return confirm('Apakah anda ingin menghaspus semua data peminjaman?')">Hapus Semua Data</a>
									<form method="GET">
										<select name="status">
										<option value="-" <?php if(isset($_GET['status'])){if($_GET['status'] == "-"){echo "selected";}} ?>
										>Semua data</option>

										<option value="0" <?php if(isset($_GET['status'])){if($_GET['status'] == "0"){echo "selected";}} ?>
										>Di pesan</option>

										<option value="1" <?php if(isset($_GET['status'])){if($_GET['status'] == "1"){echo "selected";}} ?>
										>Di pinjam</option>

										<option value="2" <?php if(isset($_GET['status'])){if($_GET['status'] == "2"){echo "selected";}} ?>
										>Di kembalikan</option>
									</select>
									<button>Cari</button>
									</form>

									<form method="GET"><br>
										<input type="date" name="awal">
										<input type="date" name="akhir">
										<button name="tgl">Cari</button>
									</form>
								</div>				
							</td>
						</tr>
							<tr>
								<th>NO</th>
								<th>Nama Peminjam</th>
								<th>Nama Barang</th>
								<th>Gambar Barang</th>
								<th>Tanggal Pinjam</th>
								<th>Tanggal Kembali</th>
								<th>Opsi</th>
							</tr>

						<?php 
							while($data = mysqli_fetch_array($peminjaman)){
						 ?>

							<tr>
								<td><?= $no++?></td>
								<td><?= $data['nm_user'];?></td>
								<td><?= $data['nm_jenis'];?> <?= $data['spesifikasi_barang'];?></td>
								<td><img src="<?php echo "../img/".$data['gambar_barang']; ?>"></td>
								<td><?= $data['tgl_pinjam'];?></td>
								<td><?= $data['tgl_kembali'];?></td>
								
								<?php 
									if($data['status']=='0'){
								 ?>
								 	<td>
								 		<a class="btn btn-info white-blue" href="pros_pinjam.php?id_pinjam=<?= $data['id_pinjam'];?> & status=<?= $data['status'];?>">Pinjamkan Barang
								 		</a>
								 	</td>
								<?php }elseif($data['status']=='1'){ ?>
									<td>
								 		<a class="btn btn-warning white-orange" href="pros_pinjam.php?id_pinjam=<?= $data['id_pinjam'];?> & status=<?= $data['status'];?>">Selesai Pinjam Barang
								 		</a>
								 	</td>
								<?php }elseif($data['status']=='2'){ ?>
									<td>
										Barang Sudah Kembali
								 	</td>
								<?php } ?>
							</tr>
						<?php } ?>
					</table>
				</form>				
			</div>
		</div>
	</div>
</body>
</html>



<?php }elseif($_SESSION['level'] == 'peminjam'){ ?>
<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman Peminjam</title>
</head>
<body>
	<br>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<ol class="breadcrumb">
				<li><a href="../beranda/beranda.php">Beranda</a></li>      
				<li><a href="../peminjaman/tampil_pinjam.php">Keranjang</a></li>  
			</ol>
				<form>
						<table class="table table-bordered">
								<tr>
									<td colspan="7">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4>Peminjaman</h4>
											</div>				
										</div>
									</td>
								</tr>
								<tr>
									<th>NO</th>
									<th>Nama Peminjam</th>
									<th>Nama Barang</th>
									<th>Tanggal Pinjam</th>
									<th>Tanggal Kembali</th>
									<th>Opsi</th>
								</tr>

							<?php 
								while($data = mysqli_fetch_array($peminjaman)){
							 ?>

								<tr>
									<td><?= $no++?></td>
									<td><?= $data['nm_user'];?></td>
									<td><?= $data['nm_jenis'];?> <?= $data['spesifikasi_barang'];?></td>
									<td><?= $data['tgl_pinjam'];?></td>
									<td><?= $data['tgl_kembali'];?></td>
									
									<?php 
										if($data['status']=='0'){
									 ?>
									 	<td>
											Sedang di ajukan							
									 	</td>
									<?php }elseif($data['status']=='1'){ ?>
										<td>
											Barang sedang di pinjam							
									 	</td>
									<?php }elseif($data['status']=='2'){ ?>
										<td>
											Barang Sudah Kembali
									 	</td>
									<?php } ?>
								</tr>
							<?php } ?>
						</table>
					</form>
				
		</div>
	</div>
</body>
</html>
<?php } ?>
