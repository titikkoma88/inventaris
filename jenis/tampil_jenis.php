<?php 
	include'../header/header.php';
	include'../connection/connect.php';
	include'../kunci/kunci.php';

	if(isset($_POST['submit_jenis'])){
		$nj = $_POST['add_jenis'];
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		$gambar = $_FILES['file_gambar']['name'];
		$x = explode('.', $gambar);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['file_gambar']['size'];
		$file_tmp = $_FILES['file_gambar']['tmp_name'];

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			    if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, '../img/'.$gambar);
					$query = mysqli_query($conn,"INSERT INTO jenis VALUES(NULL, '$nj','$gambar')");
				if($query){
					echo "<script>
							alert('Jenis baru berhasil di tambahkan');
							document.location.href='tampil_jenis.php';
						</script>";
				}else{
					echo "<script>
							alert('Gagal upload gambar');
							document.location.href='tampil_jenis.php';
						</script>";
				}
			    }else{
				echo "<script>
							alert('Ukuran gambar terlalu besar');
							document.location.href='tampil_jenis.php';
						</script>";
			    }
		       }else{
			echo "<script>
							alert('Eksetensi tidak valid');
							document.location.href='tampil_jenis.php';
						</script>";
	       }

		}

	$no = 1;
	@$keyword = $_POST['keyword'];
		if($keyword !=''){
			$jenis = mysqli_query($conn, "SELECT * FROM jenis WHERE nm_jenis LIKE '%$keyword%'");
		}else{
			$jenis = mysqli_query($conn, "SELECT * FROM jenis");
		}
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.panel-default{
			border-radius: 0;
			box-shadow: 1px 1px 2px 1px grey;
		}
		.thumbnail{
			display: inline-block;
			border-radius: 0;
			width: 100%;
			min-height: 220px;
			box-shadow: 1px 1px 1px grey;
		}
		img{
			max-height: 100px;
		}
		#btn-admin{
			border-radius: 0;
			min-width:32%;

		}
		#btn-user{
			width: 100%
		}
		.panel-footer{
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="container">

		<div class="row">
			<div>
			<ol class="breadcrumb">
				<li><a href="../beranda/beranda.php">Beranda</a></li>        
			    <li><a href="../jenis/tampil_jenis.php">Jenis</a></li>        
			</ol>

				<div class="panel panel-default">
					<div class="panel-heading" ><h2>JENIS</h2></div>
					<div class="panel-body">

						<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'admin'){ ?>

							<div class="panel-footer">
								
								<!-- Trigger the modal with a button -->
								  <button type="button" class="btn btn-success outline white-green" data-toggle="modal" data-target="#myModal">Tambah Jenis</button>

								  <!-- Modal -->
								  <div class="modal fade" id="myModal" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title"><b>JENIS</b></h4>
								        </div>
								        <div class="modal-body">
								          <p>Tambah Jenis</p><br>
								          <form method="POST" class="form-inline" enctype="multipart/form-data">
												<input type="text" name="add_jenis" class="form-control">
												<input type="file" name="file_gambar">
												<button type="submit" name="submit_jenis" class="btn btn-succsess outline white-green">Tambah Jenis</button>
											</form>
								        </div>
								        <div class="modal-footer">
								          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
								        </div>
								      </div>
								      
								    </div>
							  	</div>
							  <!-- batas modal -->

							</div>

							<?php while($data = mysqli_fetch_array($jenis)){ ?>
								 <div class="col-sm-6 col-md-3">
								 	<div class="thumbnail">
									 	<img src="<?php echo "../img/".$data['gambar']; ?>" style="width: 120px; height: 95px;">
								 		<div class="caption">
								 			<h3><?= $data['nm_jenis'];?></h3>
								 			<?php 
												$jml_brg = mysqli_query($conn,"SELECT COUNT(*) jml FROM barang WHERE id_jenis = {$data['id_jenis']}");
												while($data2 = mysqli_fetch_array($jml_brg)){
											 ?>
								 			<p>Jumlah Barang : <?= $data2['jml']?></p>
								 			<?php } ?>
								 		</div>

								 		<div class="panel-footer">

								 			<a id="btn-admin" class="btn btn-info white-blue" href="../barang/tampil_barang.php?id_jenis=<?= $data['id_jenis'];?>">
								 				<span class="glyphicon glyphicon-info-sign"></span>
											</a>	
											<a id="btn-admin" class="btn btn-danger white-red" href="hapus_jenis.php?id_jenis=<?= $data['id_jenis'];?>"onclick="return confirm('Apakah anda ingin hapus ini?')">
												<span class="	glyphicon glyphicon-trash"></span>
											</a>	
											<a id="btn-admin" class="btn btn-warning white-orange" href="edit_jenis.php?id_jenis=<?= $data['id_jenis'];?>">
												<span class="glyphicon glyphicon-edit"></span>
											</a>	

								 		</div>

								 	</div>
								  </div>
							<!-- //tutup php while admin -->
							<?php } ?>

						<?php }elseif(isset($_SESSION['level']) && $_SESSION['level'] == 'manager'){ ?>
							<?php while($data = mysqli_fetch_array($jenis)){ ?>
								 <div class="col-sm-6 col-md-3">
								 	<div class="thumbnail">
									 	<img src="<?php echo "../img/".$data['gambar']; ?>" style="width: 120px; height: 95px;">
								 		<div class="caption">
								 			<h3><?= $data['nm_jenis'];?></h3>
								 			<?php 
												$jml_brg = mysqli_query($conn,"SELECT COUNT(*) jml FROM barang WHERE id_jenis = {$data['id_jenis']}");
												while($data2 = mysqli_fetch_array($jml_brg)){
											 ?>
								 			<p>Jumlah Barang : <?= $data2['jml']?></p>
								 			<?php } ?>
								 		</div>

								 		<div class="panel-footer">

								 			<a id="btn-admin" class="btn btn-info white-blue" href="../barang/tampil_barang.php?id_jenis=<?= $data['id_jenis'];?>">
								 				<span class="glyphicon glyphicon-info-sign"></span>
											</a>	
											<a id="btn-admin" class="btn btn-danger white-red" href="hapus_jenis.php?id_jenis=<?= $data['id_jenis'];?>"onclick="return confirm('Apakah anda ingin hapus ini?')">
												<span class="	glyphicon glyphicon-trash"></span>
											</a>	
											<a id="btn-admin" class="btn btn-warning white-orange" href="edit_jenis.php?id_jenis=<?= $data['id_jenis'];?>">
												<span class="glyphicon glyphicon-edit"></span>
											</a>	

								 		</div>

								 	</div>
								  </div>
							<!-- //tutup php while Maneger -->
							<?php } ?>
						<?php }elseif(isset($_SESSION['level']) && $_SESSION['level'] == 'peminjam'){ ?>

							<?php while($data = mysqli_fetch_array($jenis)){ ?>
								 <div class="col-sm-6 col-md-3">
								 	<div class="thumbnail">
									 	<img src="<?php echo "../img/".$data['gambar']; ?>" style="width: 120px; height: 95px;">
								 		<div class="caption">
								 			<h3><?= $data['nm_jenis'];?></h3>
								 			<?php 
												$jml_brg = mysqli_query($conn,"SELECT COUNT(*) jml FROM barang WHERE id_jenis = {$data['id_jenis']}");
												while($data2 = mysqli_fetch_array($jml_brg)){
											 ?>
								 			<p>Jumlah Barang : <?= $data2['jml']?></p>
								 			<?php } ?>
								 		</div>

								 		<div class="panel-footer">
								 			<a id="btn-user" class="btn btn-info white-blue" href="../peminjaman/tampil_barang_pinjam.php?id_jenis=<?= $data['id_jenis'];?>">Detail
								 			</a>
								 		</div>

								 	</div>
								  </div>
							<!-- //tutup php while peminjam -->
							<?php } ?>

						<!-- //tutup php user privilage	 -->
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<?php 
	include'../footer/footer.php';
 ?>
