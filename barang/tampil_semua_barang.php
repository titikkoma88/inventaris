	<?php 
		include'../connection/connect.php';
		include'../header/header.php';
		include'../kunci/kunci.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Semua Barang</title>
</head>
<body>
	<br>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<ol class="breadcrumb">
				<li><a href="../beranda/beranda-side.php">Beranda</a></li>
				<li><a href="tampil_semua_barang.php">Data Semua Barang</a></li>
			</ol>
			<table class="table table-bordered">
				<tr>
					<td colspan="9">
						<div class="panel panel-default">
						<div class="panel-heading"><h4>Data Semua Barang</h4></div>
						<div class="panel-body">
							<form method="GET" action="">
								<input type="date" name="awal">
								<input type="date" name="akhir">
								<select name="kondisi">
									<option value="-" <?php if(isset($_GET['kondisi'])){if($_GET['kondisi'] == "-"){echo "selected";}} ?> >Semua Kondisi
									</option>
									<option value="Baik" <?php if(isset($_GET['kondisi'])){if($_GET['kondisi'] == "Baik"){echo "selected";}} ?> >Baik
									</option>
									<option value="Rusak" <?php if(isset($_GET['kondisi'])){if($_GET['kondisi'] == "Rusak"){echo "selected";}} ?>>Rusak
									</option>
									<option value="Hampir rusak" <?php if(isset($_GET['kondisi'])){if($_GET['kondisi'] == "Hampir rusak"){echo "selected";}} ?>>Hampir rusak
									</option>
								</select>
								<button type="submit">Cari</button>
							</form>
						</div>
					</div>
					</td>
				</tr>
				<tr>
					<th>NO</th>
					<th>ID Jenis</th>
					<th>Spesifikasi Barang</th>
					<th>Harga Barang</th>
					<th>Kondisi</th>
					<th>Sumber Dana</th>
					<th>ID Supplier</th>
					<th>Tanggal Beli</th>
					<th>Opsi</th>
				</tr>
					<?php

						if(isset($_GET['kondisi'])){
							if ($_GET['kondisi'] == "-") {
								$awal = $_GET['awal'];
								$akhir = $_GET['akhir'];
								$date = " WHERE tanggal_beli BETWEEN '$awal' AND '$akhir'";
								$barang = mysqli_query($conn, "SELECT * FROM barang".$date." ORDER BY id_jenis ASC");
							}else{
								$awal = $_GET['awal'];
								$akhir = $_GET['akhir'];
								$kon = $_GET['kondisi'];
								$kondisi = " WHERE kondisi = '$kon' OR tanggal_beli BETWEEN '$awal' AND '$akhir'";
							}
						}else{
							$kondisi = "";
						}

						@$keyword = $_POST['keyword'];

						if($keyword !=''){

							$barang = 	mysqli_query($conn, "SELECT * FROM barang WHERE 
										spesifikasi_barang LIKE '%$keyword%'
										ORDER BY id_jenis ASC");
						}else{

							$halaman = 10;
							$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							$result = mysqli_query($conn,"SELECT * FROM barang");
							$total = mysqli_num_rows($result);
							$pages = ceil($total/$halaman);            
							$barang = mysqli_query($conn,"select * from barang".@$kondisi." LIMIT $mulai, $halaman")or die(mysql_error);
							$no = $mulai+1;
							}
						
						while($data = mysqli_fetch_array($barang)){
					 ?>
				<tr>
					<td><?= $no++?></td>
					<td><?= $data['id_jenis'];?></td>
					<td><?= $data['spesifikasi_barang'];?></td>
					<td>Rp.<?= number_format($data['harga_barang'],2,',','.');?>,-</td>
					<td><?= $data['kondisi'];?></td>
					<td><?= $data['sumber_dana'];?></td>
					<td><?= $data['id_supplier'];?></td>
					<td><?= $data['tanggal_beli'];?></td>
					<td>
						<a style="margin-right: 10px;" class="btn btn-danger white-red" href="hapus_barang.php?id_barang=<?= $data['id_barang'];?>" onclick="return confirm('Apakah anda ingin hapus ini?')">Hapus
						</a>

						<a class="btn btn-warning white-orange" href="edit_barang.php?id_barang=<?= $data['id_barang'];?>" >Edit
						</a>
					</td>
				</tr>
				
					<?php } ?>
				<tr>
					<td colspan="9">
							<div class="">
							  <?php for ($i=1; $i<=$pages ; $i++){ ?>
								<ul class="pagination">
								  <li>
								  	<a href="?halaman=<?php echo $i;?>"><?php echo $i;?></a>
								  </li>
								</ul>
							  <?php } ?>
							</div>
					</td>
				</tr>
			</table>
		</div>
	</div>

</body>
</html>