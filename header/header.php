<?php 
	if(!isset($_SESSION)){
		session_start();
	}
	include'../connection/connect.php';
	include'../kunci/kunci.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>IVENTORANS</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../style/button5.css">
		<link rel="stylesheet" type="text/css" href="../font/web-fonts-with-css/css/fontawesome-all.min.css">
	<style>

		.navbar{
			border-radius: 0;
			background-image: linear-gradient(to right, #003e52, #0d6d85, #1a9cb7);
			border-color: transparent;
			height: px;
		}
		#ul-nav li a{
			color: #77868c;
		}
		#ul-nav li a:hover{
			color: white;
		}
		.navbar-atas{
			margin-bottom: x;
			background-color: black;
		}
		.navbar-atas-nav{
			height: 30px;
			background-image: linear-gradient(to right, #083746,#0c4555,#125b6d);
			margin-top: -10px;
		}
		.navbar-navbar-ul{
			margin-right: 40px;
		}
		.navbar-navbar-ul li{
			display: inline-block;
			float: right;
			margin-left: 40px;
			padding-top: 5px;
		}
		.navbar-navbar-ul li a{
			color: grey;
			text-decoration: blink;
			text-transform: uppercase;
			font-size: 11px;
		}
		.navbar-navbar-ul li a:hover{
			color: white
		}
		.a-color-1 li a{
			color: aqua;
		}
		.a-color-2 li a{
			color: orange;
		}
		#ul-nav input{
			width: 640px;
			border-radius: 0;
			margin-top: 8px;
			margin-left: 98px;
		}
		#ul-nav button{
			border-radius: 0;
			margin-top: 8px;
		}
		.navbar-atas{
			box-shadow: 1px 1px 10px 1px grey;
		}
	</style>
</head>
<body>
	<div class="container-fluid navbar-fixed-top">
		<div class="row">

				<div class="navbar-atas">
					<nav class="navbar-atas-nav">
						<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'admin'){ ?>

							<ul class="navbar-navbar-ul">
								<li><a href="../user/logout.php" onclick="return confirm('Apakah adnda ingin keluar?')">Keluar</a></li>
								<li><a href="../jenis/tampil_jenis.php">Jenis</a></li>
								<li><a href="../peminjaman/tampil_pinjam.php" style="">Data Peminjaman</a></li>
								<li><a href="../barang/tampil_semua_barang.php">Data Barang</a></li>
								<li><a href="../user/tampil_user.php">Data User</a></li>
								<li><a href="../supplier/tampil_supplier.php">Data Supplier</a></li>
									<?php 
										$sql = mysqli_query($conn, "SELECT COUNT(*) jml FROM peminjaman
																	WHERE status = '0' OR status = '1'");
										while($data = mysqli_fetch_array($sql)){
									 ?>
								<div class="a-color-1">
									<li><a href="../peminjaman/peminjaman_terkini.php">Peminjman Terkini (<?= $data['jml'];?>)</a></li>
								</div>
								<div class="a-color-2">
									<?php } ?>
									<li><a href="../beranda/beranda.php">Beranda</a></li>
								</div>
							</ul>
					</nav>

					<!-- BATAS NAVBAR ATAS DAN BAWAH -->

					<nav class="navbar navbar-inverse">

						<div class="container">
							 <div class="navbar-header">
						      <a class="navbar-brand" href="#" style="color: white;"><h4 style="width: 200px; height: 40px; margin-top: 10px; margin-left: -90px; margin-right: 5px; color: white">INVENTARIS</h4></a>
						    </div>
						    <ul id="ul-nav" class="nav navbar-nav">
						    	<li>
						    		<form method="POST" class="form-inline">
						    			<!-- <img src="../img/logo.png" -->
										<input class="form-control" type="text" name="keyword" placeholder="Cari...">
										<button class="form-control btn btn-warning white-orange" type="submit" name="cari_submit">
											<span class="glyphicon glyphicon-search"></span>
										</button>

									</form>
						    	</li>
						    </ul>
						</div>

					</nav>
				</div>

						<!-- BATAS USER PRIVILAGE ADMIN -->
						<?php }elseif(isset($_SESSION['level']) && $_SESSION['level'] == 'manager'){ ?>
							
							<div class="navbar-atas">
								<nav class="navbar-atas-nav">

									<ul class="navbar-navbar-ul">
										<li><a href="../user/logout.php" onclick="return confirm('Apakah adnda ingin keluar?')">Keluar</a></li>
										<li><a href="../jenis/tampil_jenis.php">jenis</a></li>
										<li><a href="../barang/tampil_semua_barang.php">Data Barang</a></li>
										<li><a href="../laporan/laporan_jenis.php">Laporan Jenis</a></li>
										<li><a href="../laporan/laporan_user.php">Laporan User</a></li>
										<li><a href="../laporan/laporan_barang.php">Laporan Barang</a></li>
											<!-- <?php 
												$sql = mysqli_query($conn, "SELECT COUNT(*) jml FROM peminjaman
																			WHERE status = '0'");
												while($data = mysqli_fetch_array($sql)){
											 ?>
											<li><a href="../peminjaman/tampil_pinjam.php">Data Peminjaman (<?= $data['jml'];?>)</a></li>
											<?php } ?> -->
										<div class="a-color-1">
											<li><a href="../statis/tentang_kami.php">Tentang Kami</a></li>
										</div>
										<div class="a-color-2">
											<li><a href="../beranda/beranda.php">Beranda</a></li>
										</div>								
									</ul>

								</nav>
								
								<!-- BATAS NAVBAR ATAS DAN BAWAH -->							

								<nav class="navbar navbar-inverse">

									<div class="container">
										 <div class="navbar-header">
									      <a class="navbar-brand" href="#"><h4 style="width: 200px; height: 40px; margin-top: 10px; margin-left: -90px; margin-right: 5px; color: white">INVENTARIS</h4></a>
									    </div>
									    <ul id="ul-nav" class="nav navbar-nav">
									    	<li>
									    		<form method="POST" class="form-inline">
									    			<!-- <img src="../img/logo.png" -->
													<input class="form-control" type="text" name="keyword" placeholder="Cari...">
													<button class="form-control btn btn-warning white-orange" type="submit" name="cari_submit">
														<span class="glyphicon glyphicon-search"></span>
													</button>

												</form>
									    	</li>
									    </ul>
									</div>

								</nav>
							</div>

						<!-- BATAS USER PRIVILAGE MANAGER -->

						<?php }elseif(isset($_SESSION['level']) && $_SESSION['level'] == 'peminjam'){ ?>

							<div class="navbar-atas">
								<nav class="navbar-atas-nav">

									<ul class="navbar-navbar-ul">
										<li><a href="../user/logout.php" onclick="return confirm('Apakah adnda ingin keluar?')">Keluar</a></li>
										<li><a href="../jenis/tampil_jenis.php">Jenis</a></li>
										<li><a href="../user/ubah_password.php">Ubah Password</a></li>					
										<div class="a-color-1">
											<li><a href="../peminjaman/tampil_pinjam.php">Peminjaman ku</a></li>
										</div>
										<div class="a-color-2">
											<li><a href="../beranda/beranda.php">Beranda</a></li>
										</div>											
									</ul>

								</nav>

								<!-- BATAS NAVBAR ATAS DAN BAWAH -->

								<nav class="navbar navbar-inverse">

									<div class="container">
										 <div class="navbar-header">
									      <a class="navbar-brand" href="#"><h4 style="width: 200px; height: 40px; margin-top: 10px; margin-left: -90px; margin-right: 5px; color: white">INVENTARIS</h4></a>
									    </div>
									    <ul id="ul-nav" class="nav navbar-nav">
									    	<li>
									    		<form method="POST" class="form-inline">
									    			<!-- <img src="../img/logo.png" -->
													<input class="form-control" type="text" name="keyword" placeholder="Cari...">
													<button class="form-control btn btn-warning white-orange" type="submit" name="cari_submit">
														<span class="glyphicon glyphicon-search"></span>
													</button>
												</form>
									    	</li>
									    			<?php 
														$id = $_SESSION['id_user'];
															$sql = mysqli_query($conn, "SELECT COUNT(*) jml FROM peminjaman
																						WHERE status = '0' AND id_user = '$id'");
															while($data = mysqli_fetch_array($sql)){
													 ?>
											<li><a href="../peminjaman/tampil_pinjam.php?id_user=<?= $_SESSION['id_user'];?>"><img src="../img/cart.png" 
												style="max-width: 30px;">
												<span class="badge" style="margin-bottom: 10px; margin-left: -10px;">
														<?= $data['jml']?>
												</span></a>
											</li>
													<?php } ?>			
									    </ul>
									</div>

								</nav>

							</div>

						<!-- BATAS USER PRIVILAGE PEMINJAM -->

						<?php }else{
						echo "ERROR";
						} ?>	
					</nav>


				</div>
			<div>
				
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
</body>
<br><br><br><br><br><br>
</html>

