<?php 
 
	include'../header/header.php';

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<style>
		.text{
			width: 100%;
			height: 230px;
			overflow-y: auto; 
		}
		.panel-default{
			height: 300px;
			border-radius: 0;
		}
	</style>

	<div class="container">

		<ol class="breadcrumb">
			<li><a href="../beranda/beranda-side.php">Beranda</a></li>
			<li><a href="peminjaman_terkini.php">Peminjaman Terkini</a></li>
		</ol>
		
		<div class="row">
			
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading" style="border-top: 3px solid #4ABDAC;"><h4>Di Pesan</h4></div>
					<div class="panel-body">
						
						<table border="1" class="table table-bordered">

							<tr>
								<th>Nama</th>
								<th>Nama Barang</th>
								<th>Aksi</th>
							</tr>

							
								<?php 
									$sql = mysqli_query($conn,"SELECT * FROM peminjaman
														INNER JOIN user ON user.id_user = peminjaman.id_user
														INNER JOIN barang ON barang.id_barang = peminjaman.id_barang
														 WHERE status = '0' ");
									while($data = mysqli_fetch_array($sql)){
								 ?>

							<tr>
								<td><?= $data['nm_user'];?></td>
								<td><?= $data['spesifikasi_barang'];?></td>
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

					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading" style="border-top: 3px solid orange"><h4>Di Pinjam</h4></div>

					<div class="panel-body">

						<div class="text">

							<table border="1" class="table table-bordered">	
								<tr>
									<th>Nama</th>
									<th>Nama Barang</th>
									<th>Aksi</th>
								</tr>

								
									<?php 
										$sql = mysqli_query($conn,"SELECT * FROM peminjaman
															INNER JOIN user ON user.id_user = peminjaman.id_user
															INNER JOIN barang ON barang.id_barang = peminjaman.id_barang
															 WHERE status = '1'");
										while($data = mysqli_fetch_array($sql)){
									 ?>

								<tr>
									<td><?= $data['nm_user'];?></td>
									<td><?= $data['spesifikasi_barang'];?></td>
									<?php 
										if($data['status']=='0'){
									 ?>
									 	<td>
									 		<a class="btn btn-info white-blue" href="pros_pinjam.php?id_pinjam=<?= $data['id_pinjam'];?> & status=<?= $data['status'];?>">Pinjamkan Barang
									 		</a>
									 	</td>
									<?php }elseif($data['status']=='1'){ ?>
										<td>

									 		<!-- Trigger the modal with a button -->

											  <a class="btn btn-warning white-orange" data-toggle="modal" data-target="#myModal" href="pros_pinjam.php?id_pinjam=<?= $data['id_pinjam'];?> & status=<?= $data['status'];?>">Selesai Pinjam Barang
									 		</a>

											  <!-- Modal -->
											  <div class="modal fade" id="myModal" role="dialog">
											    <div class="modal-dialog">
											    
											      <!-- Modal content-->
											      <div class="modal-content">
											        <div class="modal-header">
											          <button type="button" class="close" data-dismiss="modal">&times;</button>
											          <h4 class="modal-title"><b>Barang Kembali Dengan Kondisi</b></h4>
											        </div>
											        <div class="modal-body">

														<a class="btn btn-warning white-orange" href="pros_pinjam.php?id_pinjam=<?= $data['id_pinjam'];?> & 	status=<?= $data['status'];?>" style="width: 48%; margin-bottom: 10px;">Baik
									 					</a>

									 					<a class="btn btn-warning white-orange" href="pros_pinjam.php?id_pinjam=<?= $data['id_pinjam'];?> & 	status=<?= $data['status'];?>" style="width: 48%;margin-bottom: 10px;">Hampir Rusak
									 					</a>

									 					<a class="btn btn-warning white-orange" href="proses_rusak.php?id_pinjam=<?= $data['id_pinjam'];?>&id_barang=<?= $data['id_barang'];?>" style="width: 48%;">Rusak
									 					</a>
									 					<a class="btn btn-warning white-orange" href="proses_hilang.php?id_pinjam=<?= $data['id_pinjam'];?>&id_barang=<?= $data['id_barang'];?>" style="width: 48%;">Hilang
									 					</a>
											        </div>
											        <div class="modal-footer">
											          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
											        </div>
											      </div>
											      
											    </div>
										  	</div>
										  <!-- batas modal -->

									 	</td>
									<?php }elseif($data['status']=='2'){ ?>
										<td>
											Barang Sudah Kembali
									 	</td>
									<?php } ?>
								</tr>
								<?php } ?>
							</table>

						</div>
							
					</div>

				</div>
			</div>

			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading" style="border-top: 3px solid red">
						<h4>Di kembalikan</h4>
					</div>
					<div class="panel-body">
						<table border="1" class="table table-bordered">

							<tr>
								<th>NO</th>
								<th>Nama</th>
								<th>Nama Barang</th>
								<th>Tanggal Kembali</th>
								<th>Keterangan</th>
							</tr>

							
								<?php 
									$no = 1;
									$sql = mysqli_query($conn,"SELECT * FROM peminjaman
														INNER JOIN user ON user.id_user = peminjaman.id_user
														INNER JOIN barang ON barang.id_barang = peminjaman.id_barang
														 WHERE status = '2' AND tgl_kembali = CURDATE() ORDER BY peminjaman.id_pinjam DESC");
									while($data = mysqli_fetch_array($sql)){
								 ?>

							<tr>
								<td><?= $no++?></td>
								<td><?= $data['nm_user'];?></td>
								<td><?= $data['spesifikasi_barang'];?></td>
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
					</div>
				</div>
			</div>

		</div>

	</div>
</body>
</html>