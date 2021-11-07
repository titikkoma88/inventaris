<?php 
	include'../header/header.php';

	@$kondisi = $_GET['kondisi'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	.panel-default{
		border-radius: 0;
	}
</style>
<body>

<?php if($kondisi === "Rusak"){ ?>

<div class="container">
	<ol class="breadcrumb">
		<li><a href="../beranda/beranda-side.php">Beranda</a></li>
		<li><a href="ganti-rugi.php">Ganti Rugi Rusak</a></li>
	</ol>
	<div class="panel panel-default">
		<div class="panel-body">
			<h1>Data Ganti Rugi Barang Rusak</h1>
			<table class="table table-bordered">
				<tr>
					<th>NO</th>
					<th>Nama Pengguna</th>
					<th>Nama Barang</th>
					<th>Harga Ganti Rugi</th>
					<th>Tanggal Rusak</th>
					<th>Tanggal Bayar</th>
					<th>Keterangan</th>
					<th>Opsi</th>
				</tr>
					<?php 
						$no = 1;
						$sql_gt = mysqli_query($conn, "SELECT * FROM kondisi_rusak
														INNER JOIN peminjaman ON peminjaman.id_pinjam = kondisi_rusak.id_pinjam
														INNER JOIN barang ON peminjaman.id_barang = barang.id_barang
														INNER JOIN user ON peminjaman.id_user = user.id_user
														WHERE kondisi_rusak.kondisi = 'Rusak'
														ORDER BY kondisi_rusak.id_rusak DESC");
						while($data_gt = mysqli_fetch_array($sql_gt)){
					 ?>

				<tr>
					<td><?= $no++?></td>
					<td><?= $data_gt['nm_user'];?></td>
					<td><?= $data_gt['spesifikasi_barang']?></td>
					<td><?= "Rp." . number_format($data_gt['harga_barang']/2,2,',','.') ?></td>
					<td><?= $data_gt['tanggal_rusak']?></td>
					<td><?= $data_gt['tanggal_bayar_gt']?></td>
					<td>
						<?php 
							if($data_gt['status_gt'] === '0'){
								echo "<i style='color:red;'>Belum bayar</i>";
							}elseif($data_gt['status_gt'] === '1'){
								echo "<i>Sudah lunas</i>";
							}
						 ?>
					</td>
					<td>
						<?php 
							if($data_gt['status_gt'] === '0'){
						?>
					<a href="proses-bayar.php?id_rusak=<?= $data_gt['id_rusak']?>&nama=<?= $data_gt['nm_user']?>&kondisi=<?= $kondisi?>&id_user=<?= $data_gt['id_user']?>" class="btn btn-primary white-blue">Bayar</a></td>
						<?php 
							}elseif($data_gt['status_gt'] === '1'){
								echo "<i>LUNAS</i>";
							}
						 ?>
				</tr>

					<?php } ?>
			</table>
		</div>
	</div>
</div>

<?php }elseif($kondisi === "Hilang"){ ?>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="../beranda/beranda-side.php">Beranda</a></li>
			<li><a href="ganti-rugi.php">Ganti Rugi Rusak</a></li>
		</ol>
		<div class="panel panel-default">
			<div class="panel-body">
				<h1>Data Ganti Rugi Barang Hilang</h1>
				<table class="table table-bordered">
					<tr>
						<th>NO</th>
						<th>Nama Pengguna</th>
						<th>Nama Barang</th>
						<th>Harga Ganti Rugi</th>
						<th>Tanggal Hilang</th>
						<th>Tanggal Bayar</th>
						<th>Keterangan</th>
						<th>Opsi</th>
					</tr>
						<?php 
							$no = 1;
							$sql_gt = mysqli_query($conn, "SELECT * FROM kondisi_rusak
															INNER JOIN peminjaman ON peminjaman.id_pinjam = kondisi_rusak.id_pinjam
															INNER JOIN barang ON peminjaman.id_barang = barang.id_barang
															INNER JOIN user ON peminjaman.id_user = user.id_user
															WHERE kondisi_rusak.kondisi = 'Hilang'
															ORDER BY kondisi_rusak.id_rusak DESC");
							while($data_gt = mysqli_fetch_array($sql_gt)){
						 ?>

					<tr>
						<td><?= $no++?></td>
						<td><?= $data_gt['nm_user'];?></td>
						<td><?= $data_gt['spesifikasi_barang']?></td>
						<td><?= "Rp." . number_format($data_gt['harga_barang']/2,2,',','.') ?></td>
						<td><?= $data_gt['tanggal_rusak']?></td>
						<td><?= $data_gt['tanggal_bayar_gt']?></td>
						<td>
							<?php 
								if($data_gt['status_gt'] === '0'){
									echo "<i style='color:red;'>Belum bayar</i>";
								}elseif($data_gt['status_gt'] === '1'){
									echo "<i>Sudah lunas</i>";
								}
							 ?>
						</td>
						<td>
							<?php 
								if($data_gt['status_gt'] === '0'){
							?>
						<a href="proses-bayar.php?id_rusak=<?= $data_gt['id_rusak']?>&nama=<?= $data_gt['nm_user']?>&kondisi=<?= $kondisi?>&id_user=<?= $data_gt['id_user']?>" class="btn btn-primary white-blue">Bayar</a></td>
							<?php 
								}elseif($data_gt['status_gt'] === '1'){
									echo "<i>LUNAS</i>";
								}
							 ?>
					</tr>

						<?php } ?>
				</table>
			</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="../beranda/beranda-side.php">Beranda</a></li>
			<li><a href="ganti-rugi.php">Ganti Rugi Rusak</a></li>
		</ol>
		<div class="panel panel-default">
			<div class="panel-body">
				<h1>Data Semua Ganti Rugi</h1>
				<table class="table table-bordered">
					<tr>
						<th>NO</th>
						<th>Nama Pengguna</th>
						<th>Nama Barang</th>
						<th>Kondisi</th>
						<th>Harga Ganti Rugi</th>
						<th>Tanggal Kejadian</th>
						<th>Tanggal Bayar</th>
						<th>Keterangan</th>
						<th>Opsi</th>
					</tr>
						<?php 
							$halaman = 10;
							$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							$result = mysqli_query($conn,"SELECT * FROM kondisi_rusak");
							$total = mysqli_num_rows($result);
							$pages = ceil($total/$halaman);  
							
							$sql_gt = mysqli_query($conn, "SELECT * FROM kondisi_rusak
															INNER JOIN peminjaman ON peminjaman.id_pinjam = kondisi_rusak.id_pinjam
															INNER JOIN barang ON peminjaman.id_barang = barang.id_barang
															INNER JOIN user ON peminjaman.id_user = user.id_user
															ORDER BY kondisi_rusak.id_rusak DESC
															LIMIT $mulai,$halaman");
							$no = $mulai+1; 
							while($data_gt = mysqli_fetch_array($sql_gt)){
						 ?>

					<tr>
						<td><?= $no++?></td>
						<td><?= $data_gt['nm_user'];?></td>
						<td><?= $data_gt['spesifikasi_barang']?></td>
						<td><?= $data_gt['kondisi']?></td>
						<td><?= "Rp." . number_format($data_gt['harga_barang']/2,2,',','.') ?></td>
						<td><?= $data_gt['tanggal_rusak']?></td>
						<td><?= $data_gt['tanggal_bayar_gt']?></td>
						<td>
							<?php 
								if($data_gt['status_gt'] === '0'){
									echo "<i style='color:red;'>Belum bayar</i>";
								}elseif($data_gt['status_gt'] === '1'){
									echo "<i>Sudah lunas</i>";
								}
							 ?>
						</td>
						<td>
							<?php 
								if($data_gt['status_gt'] === '0'){
							?>
						<a href="proses-bayar.php?id_rusak=<?= $data_gt['id_rusak']?>&nama=<?= $data_gt['nm_user']?>&kondisi=<?= $kondisi?>&id_user=<?= $data_gt['id_user']?>" class="btn btn-primary white-blue">Bayar</a></td>
							<?php 
								}elseif($data_gt['status_gt'] === '1'){
									echo "<i>LUNAS</i>";
								}
							 ?>
					</tr>
						<?php } ?>
					<tr>
						<td colspan="8">
						<div class="">
						  <?php for ($i=1; $i<=$pages ; $i++){ ?>
							<ul class="pagination">
							  <li>
							  	<a class="btn btn-primary white-orange" href="?halaman=<?php echo $i;?>"><?php echo $i;?></a>
							  </li>
							</ul>
						  <?php } ?>
						</div>
					</td>
					</tr>
				</table>

				<div class="col-sm-4">
					<div class="thumbnail" style="border-radius: 0">
						<h4>Keterangan Ganti Rugi</h4>
						<table class="table table-bordered">
							<tr>
								<td>Keterangan</td>
								<td>Jumlah</td>
								<td>Harga</td>
							</tr>
							<tr>
								<td>Lunas</td>
								<td>
									<?php 
										$result_lunas = mysqli_query($conn,"SELECT * FROM kondisi_rusak WHERE status_gt = '1'");
										$gr_lunas = mysqli_num_rows($result_lunas);
										echo $gr_lunas;
									 ?>
								</td>
								<td>
									<?php 
										$harga_lunas = mysqli_query($conn,"SELECT SUM(harga_barang)/2 AS total_lunas FROM barang
																	INNER JOIN peminjaman ON peminjaman.id_barang = barang.id_barang
																	INNER JOIN kondisi_rusak ON kondisi_rusak.id_pinjam = peminjaman.id_pinjam
																	WHERE kondisi_rusak.status_gt = '1'		
																	");
										$total_lunas = mysqli_fetch_array($harga_lunas);
										echo $total_lunas['total_lunas'];
									 ?>
								</td>
							</tr>
							<tr>
								<td>Belum Lunas</td>
								<td>
									<?php 
										$result_blunas = mysqli_query($conn,"SELECT * FROM kondisi_rusak WHERE status_gt = '0'");
										$gr_blunas = mysqli_num_rows($result_blunas);
										echo $gr_blunas;
									 ?>
								</td>
								<td>
									<?php 
										$harga_blunas = mysqli_query($conn,"SELECT SUM(harga_barang) AS total_blunas FROM barang
																	INNER JOIN peminjaman ON peminjaman.id_barang = barang.id_barang
																	INNER JOIN kondisi_rusak ON kondisi_rusak.id_pinjam = peminjaman.id_pinjam
																	WHERE kondisi_rusak.status_gt = '0'		
																	");
										$total_blunas = mysqli_fetch_array($harga_blunas);
										echo $total_blunas['total_blunas'];
									 ?>
								</td>
							</tr>
							<tr>
								<td>TOTAL</td>
								<td>
									<?php 
										$result_semua = mysqli_query($conn,"SELECT * FROM kondisi_rusak WHERE status_gt = '1' OR status_gt = '0'");
										$gr_semua = mysqli_num_rows($result_semua);
										echo $gr_semua;
									 ?>
								</td>
								<td>
									<?php 
										$total_semua = $total_lunas['total_lunas'] + $total_blunas['total_blunas'];

										echo $total_semua;
									 ?>
								</td>
							</tr>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
<?php } ?>


</body>
</html>
<?php include'../footer/footer.php'; ?>
