<?php 
	include'../connection/connect.php';
	include'../kunci/kunci.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../font/web-fonts-with-css/css/fontawesome-all.min.css">
		<link rel="stylesheet" type="text/css" href="../style/dashboard.css">		
		 <script src="../bootstrap/js/jquery-3.3.1"></script>
		 <script src="../bootstrap/js/bootstrap.min.js"></script>


	<style>
		body{
			background-color: #eee;
		}
		.panel-default{
			border-radius: 0;
		}
		.hs{
			background-image: linear-gradient(to right, #0d6d85, #1a9cb7);
			height: 70px !IMPORTANT;
			box-shadow: 2px 1px 2px 1px #666;
			position: fixed;
			margin-left: 335px;
			z-index: 999;
		}
		.side ul li a{
			color: white;
		}
		.side ul li{
			margin-bottom: 30px;
			margin-left: -40px;
		}
		.side ul li i{
			margin-right: 40px;
		}
		.side ul{
			list-style-type: none;
			float: left;
		}

		/*DASHBOARD USER*/
		.db-user{
			background-color: #20a8d8;
			height: 150px;
			border: 1px solid #1c93bd;
			margin-left: -6px;
			margin-right: 2px;
		}
		/*TUTUP DASHBOARD USER*/

		/*DASHBOARD JENIS*/
		.db-jenis{
			background-color: #63c2de;
			height: 150px;
			border: 1px solid #57aac2;
			margin-right: 2px;
		}
		/*TUTUP DASHBOARD JENIS*/

		/*DASHBOARD BARANG*/
		.db-barang{
			background-color: #ffc107;
			height: 150px;
			border: 1px solid #dfa906;
			margin-right: 2px;
		}
		/*TUTUP DASHBOARD BARANG*/

		/*DASHBOARD SUPPLIER*/
		.db-supp{
			background-color: #f86c6b;
			height: 150px;
			border: 1px solid #d95f5e;
		}
		/*TUTUP DASHBOARD SUPPLIER*/
		#list-peminjaman {
			margin-left: 30px;
			 margin-top: 30px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3" style="background-image:url(../download.png); height:1300px; position: fixed;">
				<h4 class="text-center" style="color: white;"><h4 style="width: 200px; margin-top: 30px;">LogoKamu</h4></h4>
				<hr>
					<div class="side">
						<ul>
							<li>
								<a href="beranda.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
							</li>
							<li>
								<a href="../jenis/tampil_jenis.php"><i class="fas fa-archive"></i> Jenis</a>
							</li>
							<li>
								<a href="../user/tampil_user.php"><i class="fas fa-users"></i> Pengguna</a>
							</li>
							<li>
								<a href="../barang/tampil_semua_barang.php"><i class="fas fa-cube"></i> Barang</a>
							</li>
							<li>
								<a href="../supplier/tampil_supplier.php"><i class="fas fa-truck"></i> Supplier</a>
							</li>
							<li>
								<a href="#" data-toggle="collapse" data-target="#list-peminjaman"><i class="fas fa-handshake" >
								</i> Peminjaman</a>

									<div id="list-peminjaman" class="collapse">
										<a href="../peminjaman/peminjaman_terkini.php" ><i class="fas fa-handshake"></i> Peminjaman Terkini</a><br><br>
										<a href="../peminjaman/peminjaman_terkini.php" ><i class="fas fa-handshake"></i> Data Peminjaman</a>
										<br><br>
										<a href="../peminjaman/peminjaman_terkini.php" ><i class="fas fa-handshake"></i> Peminjaman Admin</a>
									</div>
							</li>
							
							<li>
								<a href="../pesan/pesan_pengguna.php"><i class="fas fa-envelope"></i> Pesan Pengguna</a>
							</li>
							<li>
								<a href="../ganti_rugi/ganti-rugi.php"><i class="fas fa-envelope"></i> Ganti Rugi</a>
							</li>
							<li>
								<a href="../user/logout.php"><i class="fas fa-power-off"></i> Keluar</a>
							</li>
						</ul>
					</div>
			</div>

	    	<div class="col-sm-9 hs">
	    		<div class="header-side">
	    			<a href="">
	    				
	    			</a>
	    				<div class="dropdown">
	    					<i class="fas fa-bell fa-lg dropdown-toggle" data-toggle="dropdown" style="color: black; margin-top: 30px;"></i>
	    					<i class="badge" style="margin-bottom: 20px; margin-left: -5px;">
	    						<?php 
	    							$sql = mysqli_query($conn,"SELECT COUNT(*) jml FROM peminjaman WHERE status = '0'");
	    							while($data = mysqli_fetch_array($sql)){
	    						 ?>
	    						 <?= $data['jml']; }?>
	    					</i>
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu"  style="height: 235px; overflow-y: auto;">
						      	<?php 
						      		$sql = mysqli_query($conn,"SELECT * FROM peminjaman
						      									INNER JOIN user ON peminjaman.id_user = user.id_user
						      									INNER JOIN barang ON barang.id_barang = peminjaman.id_barang
						      									INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
						      									WHERE peminjaman.tgl_pinjam = CURDATE() OR peminjaman.tgl_pinjam = '0000-00-00' ORDER BY peminjaman.tgl_pinjam ASC
						      									");
						      		while($data = mysqli_fetch_array($sql)){
						      	 ?>
					      	 <li>
					      		<a href="../peminjaman/peminjaman_terkini.php">
					      			<div class="thumbnail">
					      				<?php 
					      					if($data['status'] == '0'){
					      				?>
					      					<div>
					      						<?= $data['nm_user'];?><br>
						      					Ingin meminjam barang bernama <?= $data['spesifikasi_barang'];?><br>
						      					yg berjenis <?= $data['nm_jenis']?>
					      					</div>
					      				<?php
					      					}elseif($data['status'] == '1'){
					      				?>
					      					<?= $data['nm_user'];?><br>
					      					Telah meminjam barang yang bernama <?= $data['spesifikasi_barang'];?><br>
					      					yg berjenis <?= $data['nm_jenis']?>
					      				<?php
					      					}elseif($data['status'] == '2'){
					      				?>
					      					<?= $data['nm_user'];?><br>
					      					Telah mengembalikan barang yang bernama <?= $data['spesifikasi_barang'];?><br>
					      					yg berjenis <?= $data['nm_jenis']?>
						      			<?php } ?>
					      			</div>
					      		</a>
					  		</li>
					  			<?php } ?>
					    </ul>
					  </div>
	    		</div>
	    	</div>

	    	<div class="col-sm-9" style="background-color:blac; margin-top: 5px; margin-left: 330px; margin-top: 80px;">

	    		<div class="col-sm-3 db-user" style="z-index: 1">
	    			
		    			<?php 
							$sql_user = mysqli_query($conn, "SELECT COUNT(*) jumlah FROM user WHERE level = 'peminjam'");
							$user = mysqli_fetch_array($sql_user);
						 ?>
					<h1><i class="fas fa-users" style="font-size: 100px; color: white; margin-top: -10px;"></i></h1>
					<h3 style="float: right; margin-top: -120px; font-size: 50px; color: white;"><?= $user['jumlah'];?></h3>
					<h4 style="float: right; margin-top: -70px;  font-size: 20px; color: white;"> User</h4>
					
					<div class="panel-group" id="accordion" style="margin-top: -10px;">
					  <div class="panel panel-default" style=" border-radius: 0; width: 246px; margin-left: -16px;">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					        Detail</a>
					      </h4>
					    </div>
					    <div id="collapse2" class="panel-collapse collapse">
					      <div class="panel-body" style="width: 100%; height: 200px; overflow-y: auto; z-index: 999">
					      	<h4>Data pengguna</h4>
								<?php 
									$sql = mysqli_query($conn,"SELECT * FROM user WHERE level = 'peminjam'");
									while($data = mysqli_fetch_array($sql)){
								 ?>
							<div class="thumbnail tb-user" style="width: 100%; height: 50px; border-radius: 40px;">
								<img src="../img/profile/<?= $data['foto'];?>" class="img-circle" style="width: 40px; height:40px; float: left;">
								 <P style="margin-top: auto; margin-left: 50px;">
								 	<a href="../user/tampil_user.php?id_user=<?= $data['id_user']?>"><?= $data['nm_user']?></a>
								 </P>
							</div>
								<?php } ?>
					      </div>
					    </div>
					  </div>
					</div>

	    		</div>

	    		<div class="col-sm-3 db-jenis" style="z-index: 1">
						<?php 
							$sql_j = mysqli_query($conn, "SELECT COUNT(*) jumlah FROM jenis");
							$jenis = mysqli_fetch_array($sql_j);
						 ?>
					<h1><i class="fas fa-archive" style="font-size: 100px; color: white; margin-top: -10px;"></i></h1>
					<h3 style="float: right; margin-top: -120px; font-size: 50px; color: white;"><?= $jenis['jumlah'];?></h3>
					<h4 style="float: right; margin-top: -70px;  font-size: 20px; color: white;"> Jenis</h4>

					<div class="panel-group" id="accordion" style="margin-top: -10px;">
					  <div class="panel panel-default" style=" border-radius: 0; width: 246px; margin-left: -16px;">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
					        Detail</a>
					      </h4>
					    </div>
					    <div id="collapse3" class="panel-collapse collapse">
					      <div class="panel-body" style="width: 100%; height: 200px; overflow-y: auto;">
					      	<h4>Data Jenis</h4>
					      	<table class="table table-bordered">
					      		<tr>
					      			<th>Nama Jenis</th>
					      			<th>Jumlah</th>
					      		</tr>
						      		<?php 
					      				$sql_d_jenis = mysqli_query($conn, "SELECT * FROM jenis");
					      				
					      				while($data_jenis = mysqli_fetch_array($sql_d_jenis)){
					      			 ?>
					      		<tr>
					      			<td>
					      				<?= $data_jenis['nm_jenis'];?>
					      			</td>
					      				<?php 
											$jml_jenis = mysqli_query($conn,"SELECT COUNT(*) jml FROM barang WHERE id_jenis = {$data_jenis['id_jenis']}");
											while($jml_jns = mysqli_fetch_array($jml_jenis)){
										 ?>
					      			<td>
					      				<?= $jml_jns['jml'];?>
					      			</td>
					      		</tr>
						      		<?php }} ?>
					       	</table>
					      </div>
					    </div>
					  </div>
					</div>

	    		</div>

	    		<div class="col-sm-3 db-barang" style="z-index: 1">
			    		<?php 
							$sql_barang = mysqli_query($conn, "SELECT COUNT(*) jumlah FROM barang");
							$barang = mysqli_fetch_array($sql_barang);
						 ?>
 					<h1><i class="fas fa-cube" style="font-size: 100px; color: white; margin-top: -10px;"></i></h1>
					<h3 style="float: right; margin-top: -120px; font-size: 50px; color: white;"><?= $barang['jumlah'];?></h3>
					<h4 style="float: right; margin-top: -70px;  font-size: 20px; color: white;"> Barang</h4>

					<div class="panel-group" id="accordion" style="margin-top: -10px;">
					  <div class="panel panel-default" style=" border-radius: 0; width: 246px; margin-left: -16px;">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
					        Detail</a>
					      </h4>
					    </div>
					    <div id="collapse4" class="panel-collapse collapse">
					      <div class="panel-body" style="width: 100%; height: 200px; overflow-y: auto;">
					      	<h4>Kondisi Barang</h4>
					      	<table class="table table-bordered">
					      		<tr>
					      			<th>Kondisi</th>
					      			<th>Jumlah</th>
					      		</tr>
						      	
						      	<tr>
						      		<td>Baik</td>
						      		<?php 
						      			$sql_k_baik = mysqli_query($conn,"SELECT COUNT(*) jml FROM barang WHERE kondisi = 'Baik'");
						      			$data_baik = mysqli_fetch_array($sql_k_baik);
						      		 ?>
						      		 <td><?= $data_baik['jml'];?></td>
						      	</tr>

						      	<tr>
						      		<td>Hampir Rusak</td>
						      		<?php 
						      			$sql_k_hs = mysqli_query($conn,"SELECT COUNT(*) jml FROM barang WHERE kondisi = 'Hampir Rusak'");
						      			$data_hs = mysqli_fetch_array($sql_k_hs);
						      		 ?>
						      		 <td><?= $data_hs['jml'];?></td>
						      	</tr>

						      	<tr>
						      		<td>Rusak</td>
						      		<?php 
						      			$sql_k_rusak = mysqli_query($conn,"SELECT COUNT(*) jml FROM barang WHERE kondisi = 'Rusak'");
						      			$data_rusak = mysqli_fetch_array($sql_k_rusak);
						      		 ?>
						      		 <td><?= $data_rusak['jml'];?></td>
						      	</tr>

						      	<tr>
						      		<td>Hilang</td>
						      		<?php 
						      			$sql_k_hilang = mysqli_query($conn,"SELECT COUNT(*) jml FROM barang WHERE kondisi = 'Hilang'");
						      			$data_b_hilang = mysqli_fetch_array($sql_k_hilang);
						      		 ?>
						      		 <td><?= $data_b_hilang['jml'];?></td>
						      	</tr>
					       	</table>
					      </div>
					    </div>
					  </div>
					</div>

	    		</div>

	    		<div class="col-sm-3 db-supp" style="z-index: 1">
	    				<?php 
							$sql = mysqli_query($conn, "SELECT COUNT(*) jumlah FROM supplier");
							$supplier = mysqli_fetch_array($sql);
						 ?>
					<h1><i class="fas fa-truck" style="font-size: 100px; color: white; margin-top: -10px;"></i></h1>
					<h3 style="float: right; margin-top: -120px; font-size: 50px; color: white;"><?= $supplier['jumlah'];?></h3>
					<h4 style="float: right; margin-top: -70px;  font-size: 20px; color: white;"> Supplier</h4>

					<div class="panel-group" id="accordion" style="margin-top: -10px;">
					  <div class="panel panel-default" style=" border-radius: 0; width: 246px; margin-left: -16px;">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
					        Detail</a>
					      </h4>
					    </div>
					    <div id="collapse5" class="panel-collapse collapse">
					      <div class="panel-body" style="width: 100%; height: 200px; overflow-y: auto; ">
					      	<h4>Barang Supplier</h4>
					      		<table class="table table-bordered">
					      			<tr>
					      				<th>Supplier</th>
					      				<th>Jumlah</th>
						      				<?php 
						      					$supplier_data = mysqli_query($conn,"SELECT * FROM supplier");
												while($data_s = mysqli_fetch_array($supplier_data)){
												$supp = $data_s['nm_supplier'];
						      				 ?>
					      			</tr>
						      			<td><?= $data_s['nm_supplier'];?></td>
						      			<?php 
						      				$data = mysqli_query($conn,"select COUNT(*) jml from barang INNER JOIN supplier ON barang.id_supplier = supplier.id_supplier WHERE supplier.nm_supplier = '$supp'");
											
											while($d=mysqli_fetch_array($data)){
						      			 ?>
						      			 <td><?= $d['jml'];?></td>
						      				<?php } }?>
					      			<tr>
					      				
					      			</tr>
					      		</table>
					      </div>
					    </div>
					  </div>
					</div>

	    		</div>
	    		<!-- TUTUP COLAPS -->
				
				<!-- Pengeluaran -->

    			<div class="col-sm-9" style="margin-top: 5px; margin-left: -15px;">
    				<div class="panel panel-default pd-ib">
    					<div class="panel-body">
    						<h4>Data Pengeluaran Dana Selama 6 Bulan</h4>
    						<div style="margin: 0px auto;">
								<canvas id="luarChart"></canvas>
							</div>
    					</div>
    				</div>
    			</div>
    			<!-- Tabel pengeluaran -->
    			<div class="col-sm-3" style=" margin-top: 5px;">
    				<div class="panel panel-default" style="min-width: 250px; margin-left: -20px;">
    					<div class="panel-body" style="min-height: 405px;">
    						<table class="table table-bordered">
    							<legend class="text-center">Table Pengeluaran</legend>
    							<tr>
		    						<th>Bulan</th>
		    						<th>Jumlah</th>
		    					</tr>
		    					<tr>
		    						<td>Januari</td>
		    							<?php 
		    								$sql = mysqli_query($conn, "SELECT SUM(harga_barang) AS jml FROM barang WHERE tanggal_beli BETWEEN '2019-01-01' AND '2019-01-31'");
		    								while($data = mysqli_fetch_array($sql)){
		    							 ?>
		    						<td>Rp.<?= number_format($data['jml'],2,',','.');?>,-</td>
		    							<?php } ?>
		    					</tr>
		    					<tr>
		    						<td>Februari</td>
		    						<?php 
		    								$sql = mysqli_query($conn, "SELECT SUM(harga_barang) AS jml FROM barang WHERE tanggal_beli BETWEEN '2019-02-01' AND '2019-02-31'");
		    								while($data = mysqli_fetch_array($sql)){
		    							 ?>
		    						<td>Rp.<?= number_format($data['jml'],2,',','.');?>,-</td>
		    							<?php } ?>
		    					</tr>
		    					<tr>
		    						<td>Maret</td>
		    						<?php 
		    								$sql = mysqli_query($conn, "SELECT SUM(harga_barang) AS jml FROM barang WHERE tanggal_beli BETWEEN '2019-03-01' AND '2019-03-31'");
		    								while($data = mysqli_fetch_array($sql)){
		    							 ?>
		    						<td>Rp.<?= number_format($data['jml'],2,',','.');?>,-</td>
		    							<?php } ?>
		    					</tr>
		    					<tr>
		    						<td>April</td>
		    						<?php 
		    								$sql = mysqli_query($conn, "SELECT SUM(harga_barang) AS jml FROM barang WHERE tanggal_beli BETWEEN '2019-04-01' AND '2019-04-31'");
		    								while($data = mysqli_fetch_array($sql)){
		    							 ?>
		    						<td>Rp.<?= number_format($data['jml'],2,',','.');?>,-</td>
		    							<?php } ?>
		    					</tr>
		    					<tr>
		    						<td>Mei</td>
		    						<?php 
		    								$sql = mysqli_query($conn, "SELECT SUM(harga_barang) AS jml FROM barang WHERE tanggal_beli BETWEEN '2019-05-01' AND '2019-05-31'");
		    								while($data = mysqli_fetch_array($sql)){
		    							 ?>
		    						<td>Rp.<?= number_format($data['jml'],2,',','.');?>,-</td>
		    							<?php } ?>
		    					</tr>
		    					<tr>
		    						<td>Juni</td>
		    						<?php 
		    								$sql = mysqli_query($conn, "SELECT SUM(harga_barang) AS jml FROM barang WHERE tanggal_beli BETWEEN '2019-06-01' AND '2019-06-31'");
		    								while($data = mysqli_fetch_array($sql)){
		    							 ?>
		    						<td>Rp.<?= number_format($data['jml'],2,',','.');?>,-</td>
		    							<?php } ?>
		    					</tr>
    						</table>
    					</div>
    				</div>
    			</div>
    			<!-- /Tabel pengeluaran -->
    			<!--Pengeluaran -->

    			<!-- GANTI RUGI -->

    			<div class="col-sm-6">
    				<style>
    					.my-custom-scrollbar {
							  position: relative;
							  height: 200px;
							  overflow: auto;
							}
							.table-wrapper-scroll-y {
							  display: block;
							}
    				</style>
					<div class="panel panel-default">
						<div class="panel-body" style="min-height: 200px;">
							<h3>Rusak</h3>
							<div class="table-wrapper-scroll-y my-custom-scrollbar">
								<table class="table table-hover">
									<thead style="background-color: #A205A2">
										<style>
											.thead-color td{
												color: white;
											}
										</style>
										<tr class="thead-color">
											<td>Nama Peminjam</td>
											<td>Nama Barang</td>
											<td>Tanggal Kejadian</td>
											<td>Opsi</td>
										</tr>
									</thead>
										<?php
											$sql_gt = mysqli_query($conn, "SELECT * FROM kondisi_rusak
																			INNER JOIN peminjaman ON peminjaman.id_pinjam = kondisi_rusak.id_pinjam
																			INNER JOIN barang ON peminjaman.id_barang = barang.id_barang
																			INNER JOIN user ON peminjaman.id_user = user.id_user 
																			WHERE kondisi_rusak.status_gt = '0' AND barang.kondisi = 'Rusak' ORDER BY kondisi_rusak.id_rusak DESC");
											while($data_gt = mysqli_fetch_array($sql_gt)){
										 ?>
									<tr>
										<td><?= $data_gt['nm_user'];?></td>
										<td><?= $data_gt['spesifikasi_barang'];?></td>
										<td><?= $data_gt['tanggal_rusak'];?></td>
										<td><a href="../ganti_rugi/ganti-rugi.php?id_user=<?= $data_gt['id_user']?>&kondisi=<?= 'Rusak'?> " class="btn btn-primary white-blue">Detail</a></td>
									</tr>
										<?php } ?>
								</table>
							</div>
						</div>
					</div>
    			</div>

    			<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-body" style="min-height: 200px;">
							<h3>Hilang</h3>
							<div class="table-wrapper-scroll-y my-custom-scrollbar">
								<table class="table table-bordered">
									<style>
										.thead-color td{
											color: white;
										}

									</style>
									<tr style="background-color: #820582;" class="thead-color">
										<td>Nama Peminjam</td>
										<td>Nama Barang</td>
										<td>Tanggal Kejadian</td>
										<td>Opsi</td>
									</tr>
										<?php 
											$sql_gt = mysqli_query($conn, "SELECT * FROM kondisi_rusak
																			INNER JOIN peminjaman ON peminjaman.id_pinjam = kondisi_rusak.id_pinjam
																			INNER JOIN barang ON peminjaman.id_barang = barang.id_barang
																			INNER JOIN user ON peminjaman.id_user = user.id_user 
																			WHERE kondisi_rusak.status_gt = '0' AND barang.kondisi = 'Hilang' ORDER BY kondisi_rusak.id_rusak DESC");
											while($data_gt = mysqli_fetch_array($sql_gt)){
										 ?>
									<tr>
										<td><?= $data_gt['nm_user'];?></td>
										<td><?= $data_gt['spesifikasi_barang'];?></td>
										<td><?= $data_gt['tanggal_rusak'];?></td>
										<td><a href="../ganti_rugi/ganti-rugi.php?id_user=<?= $data_gt['id_user']?>&kondisi=<?= 'Hilang'?>" class="btn btn-primary white-blue">Detail</a></td>
									</tr>
										<?php } ?>
								</table>
							</div>
						</div>
					</div>
    			</div>


    			<!-- TUTUP GANTI RUGI -->

    			<div class="col-sm-12">
    				<div class="thumbnail" style="border-radius: 0;">
    					<h3>Riwayat peminjaman pengguna bulan ini</h3>
    					<div class="table-wrapper-scroll-y my-custom-scrollbar">
    						<table class="table table-striped">
	    						<style>
	    							.thead-color{
	    								color: white;
	    							}
	    						</style>
	    						<tr class="thead-color" style="background-color: orange;">
	    							<td>No</td>
	    							<td>Nama</td>
	    							<td>Jumlah</td>
	    							<td>Opsi</td>
	    						</tr>

	    							<?php 
	    								$no = 1;
										$sql = mysqli_query($conn,"SELECT * FROM user WHERE level = 'peminjam'");
										while($data = mysqli_fetch_array($sql)){
									 ?>
	    						<tr>
	    							<td><?= $no++?></td>
	    							<td><?= $data['nm_user']?></td>
	    								<?php 
	    									$nama = $data['id_user'];
	    									$query = mysqli_query($conn,"SELECT COUNT(*) jml FROM peminjaman WHERE status = '2' AND id_user = '$nama' AND tgl_pinjam BETWEEN '2019-03-01' AND '2019-03-31' ");
	    									$data_jml = mysqli_fetch_array($query);
	    								 ?>
									<td><?= $data_jml['jml']?></td>	
	    							<td><a href="">Lihat</a></td>    							
	    							<?php } ?>

	    						</tr>
	    					</table>
    					</div>
    				</div>
    			</div>

	    	</div>
		</div>
	</div>
</div>

	<script type="text/javascript" src="../bootstrap/js/chart.js"></script>
<script>
		var ctx = document.getElementById("luarChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Januari","Februari","Maret","April","Mei","Juni"],
				datasets: [{
					label: '',
					data: [ 
					<?php 
						$januari = mysqli_query($conn,"SELECT SUM(harga_barang) AS total_jan FROM barang WHERE tanggal_beli BETWEEN '2019-01-01' AND '2019-01-31'");
							while($data_jan = mysqli_fetch_array($januari)){
							echo $data_jan['total_jan'];
					}
					?>, 

					<?php 
						$februari = mysqli_query($conn,"SELECT SUM(harga_barang) AS total_feb FROM barang WHERE tanggal_beli BETWEEN '2019-02-01' AND '2019-02-31'");
							while($data_feb = mysqli_fetch_array($februari)){
							echo $data_feb['total_feb'];
					}
					?>, 

					<?php 
						$mar = mysqli_query($conn,"SELECT SUM(harga_barang) AS total_mar FROM barang WHERE tanggal_beli BETWEEN '2019-03-01' AND '2019-03-31'");
							while($data_mar = mysqli_fetch_array($mar)){
							echo $data_mar['total_mar'];
					}
					?>, 

					<?php 
						$april = mysqli_query($conn,"SELECT SUM(harga_barang) AS total_april FROM barang WHERE tanggal_beli BETWEEN '2019-04-01' AND '2019-04-31'");
							while($data_april = mysqli_fetch_array($april)){
							echo $data_april['total_april'];
					}
					?>, 

					<?php 
						$mei = mysqli_query($conn,"SELECT SUM(harga_barang) AS total_mei FROM barang WHERE tanggal_beli BETWEEN '2019-05-01' AND '2019-05-31'");
							while($data_mei = mysqli_fetch_array($mei)){
							echo $data_mei['total_mei'];
					}
					?>, 

					<?php 
						$juni = mysqli_query($conn,"SELECT SUM(harga_barang) AS total_jun FROM barang WHERE tanggal_beli BETWEEN '2019-06-01' AND '2019-06-31'");
							while($data_jun = mysqli_fetch_array($juni)){
							echo $data_jun['total_jun'];
					}
					?>, 
 					
					],
					backgroundColor: [
					'rgba(255, 193, 7, 0.7)',
					'rgba(255, 193, 7, 0.7)',
					'rgba(255, 193, 7, 0.7)'
					],
					borderColor: [
					'rgba(255, 193, 7, 0.7)',
					'rgba(255, 193, 7, 0.7)',
					'rgba(255, 193, 7, 0.7)'
					],
					labelsColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

</body>
</html>