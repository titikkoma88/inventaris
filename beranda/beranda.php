<?php 
	include'../connection/connect.php';
	include'../kunci/kunci.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>INVENTORANS</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../style/dashboard.css">
		<link rel="stylesheet" type="text/css" href="../font/web-fonts-with-css/css/fontawesome-all.min.css">

		<style>


			hr{
				width: 250px;
				border-top: solid 3px #666;
			}
			.col-sm-2 a{
				width: 200px;
				height: 100px;
				margin-left: 100px;
			}
			
			}
			.jumbotron{
				background-image: url(../download.png);
			}
			#link-log-out{
				text-decoration: none;
				color: white;
			}
			#link-log-out:hover{
				color: red;
			}
			.jumbotron h2{
				color: white;
			}
			.jumbotron h3{
				color: white;
			}
			.jumbotron p{
				color: white;
			}

			
		</style>
</head>
<body>
	<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'admin'){ ?>
		
		<?php 
			include'beranda-side.php';
		 ?>

	<!-- BATAS USER PRIVILAGE ADMIN -->

	<?php }elseif(isset($_SESSION['level']) && $_SESSION['level'] == 'manager'){ ?>

		<?php include'beranda-manager.php'; ?>

	<?php }elseif(isset($_SESSION['level']) && $_SESSION['level'] == 'peminjam'){ ?>

		<?php include'../beranda/beranda-user.php'; ?>

	<!-- BATAS USER PRIVILAGE PEMINJAM -->

	<?php }else{
		echo "ERROR";
	} ?>	
</body>
</html>
