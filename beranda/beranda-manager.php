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
			margin-left: 340px;
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
		.thumbnail{
			border-radius: 0;
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
								<a href="#" data-toggle="collapse" data-target="#list-peminjaman"><i class="fas fa-handshake" >
								</i> Laporan</a>

									<div id="list-peminjaman" class="collapse">
										<a href="../manager/jenis.php" ><i class="fas fa-handshake"></i> Laporan Jenis</a><br><br>
										<a href="../manager/barang.php" ><i class="fas fa-handshake"></i> Laporan Barang</a>
										<br><br>
										<a href="../manager/supplier.php" ><i class="fas fa-handshake"></i> Laporan Supplier</a>
										<br><br>
										<a href="../manager/user.php" ><i class="fas fa-handshake"></i> Laporan Pengguna</a>
										<br><br>
										<a href="../manager/ganti-rugi.php" ><i class="fas fa-handshake"></i> Laporan Ganti Rugi</a>
									</div>
							</li>
							

							<li>
								<a href="../user/logout.php"><i class="fas fa-power-off"></i> Keluar</a>
							</li>
						</ul>
					</div>
			</div>

	    	<div class="col-sm-9 hs">	</div>

	    	<div class="col-sm-9" style="background-color:blac; margin-top: 5px; margin-left: 330px; margin-top: 80px;">



	    		<div class="col-sm-12">
	    			<div class="panel panel-default">
	    				<div class="panel-body">
	    					<legend>Laporan Peminjaman</legend>
	    					<div class="col-sm-4">
	    						<a href="../laporan/laporan_jenis.php">
	    							<div class="thumbnail">
		    							Jenis
		    						</div>
	    						</a>
	    					</div>

	    					<div class="col-sm-4">
	    						<a href="../laporan/laporan_barang.php">
	    							<div class="thumbnail">
		    							barang
		    						</div>
	    						</a>
	    					</div>

	    					<div class="col-sm-4">
	    						<a href="../laporan/laporan_user.php">
	    							<div class="thumbnail">
		    							Pengguna
		    						</div>
	    						</a>
	    					</div>

	    				</div>
	    			</div>
	    		</div>

	    	</div>

</body>
</html>