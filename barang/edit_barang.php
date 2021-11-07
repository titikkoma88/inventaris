<?php 
	include'../connection/connect.php';
	include'../header/header.php';
	
	if(isset($_POST['submit'])){
		$ib = $_POST['id_barang'];
		$ij = $_POST['ij'];
		$gambar = $_FILES['gb']['name'];
		$sb = $_POST['sb'];
		$hb = $_POST['hb'];
		$kondisi = $_POST['kondisi'];
		$sd = $_POST['sd'];
		$is = $_POST['is'];
		$tb = $_POST['tb'];
		
		$edit_brg = mysqli_query ($conn, "UPDATE barang SET
										id_jenis = '$ij',
										spesifikasi_barang = '$sb',
										harga_barang = '$hb',
										kondisi = '$kondisi',
										sumber_dana = '$sd',
										id_supplier = '$is',
										tanggal_beli = '$tb',
										gambar_barang = '$gambar'
										WHERE
										id_barang = $ib;
									");
		
			if($edit_brg){
				echo 	"
							<script>
								alert('Barang Berhasil Di Edit');
								document.location.href='tampil_barang.php?id_jenis=$ij';
							</script>
						";
			}else{
				echo 	"
							<script>
								alert('Barang gagal di ubah');
								document.location.href='edit_barang.php?id_barang=$ib';
							</script>
						";
			}
		}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
</head>
<body>
	<br>
	
	<?php 
		$id_barang = $_GET['id_barang'];

		$edit_barang = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
		while ($data = mysqli_fetch_array($edit_barang)){
	 ?>

	<div class="row">
		<div class="col-md-3 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Edit Barang</h4>	
				</div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="">
						<table>
							<tr>
								<td><input type="hidden" name="id_barang" value="<?= $data['id_barang'];?>"></td>
							</tr>
							<tr>
								<td>
									<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-sm">ID Jenis</span>
									<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="text" name="ij" value="<?= $data['id_jenis'];?>">
								</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-sm">Gambar Barang</span>
										<input value="<?= $data['gambar_barang'];?>" class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="file" name="gb">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-sm">Spesifikasi Barang</span>
										<input value="<?= $data['spesifikasi_barang'];?>" class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="text" name="sb">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-sm">Harga Barang</span>
										<input value="<?= $data['harga_barang'];?>" class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="text" name="hb">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-sm">Kondisi</span>
										<select name="kondisi" class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm">
											<option>Baik</option>
											<option>Buruk</option>
										</select>	
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-sm">Sumber Dana</span>
										<input value="<?= $data['sumber_dana'];?>" class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" input type="text" name="sd">
									</div>

								</td>
							</tr>
							<tr>
								<div class="input-group-prepend">
									<td>
										<span class="input-group-text" id="inputGroup-sizing-sm">ID Supplier</span>
										<select name="is" class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm">
											<?php 
												$id_supp = mysqli_query($conn, "SELECT * FROM supplier");
												while($data_supp = mysqli_fetch_array($id_supp)){
											 ?>
											<option value="<?= $data_supp['id_supplier'];?>">
												<?= $data_supp['nm_supplier'];?>
												<?php } ?>
											</option>
										</select>										
									</td>
								</div>

							</tr>
							<tr>
								<td>
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-sm">Tanggal Beli</span>
										<input value="<?= $data['tanggal_beli'];?>" class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="date" name="tb">
									</div>
									<br>
								</td>
							</tr>
							<tr>
								<td><input type="submit" name="submit" value="Edit Barang" class="btn btn-success white-green "></td>
							</tr>
						</table>
					<?php } ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
