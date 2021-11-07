<?php 
	session_start();
	if(isset($_SESSION['login'])){
		header("location:../beranda/beranda.php");
	}
	include '../connection/connect.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

		//Cek username
			if(mysqli_num_rows($result) === 1){

				//Cek password
					$row = mysqli_fetch_assoc($result);
					
					if(md5($password)== $row['password'] & $password != '12345'){
							//Set SESSION
							$_SESSION['login'] = true;
							$_SESSION['id_user'] = $row['id_user'];
							$_SESSION['username'] = $row['username'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['nm_user'] = $row['nm_user'];
							$_SESSION['kelas'] = $row['kelas'];
							$_SESSION['jabatan_s'] = $row['jabatan_sekolah'];
							$_SESSION['foto'] = $row['foto'];
							$_SESSION['tel_user'] = $row['tel_user'];
							$_SESSION['alamat'] = $row['alamat'];
							$_SESSION['email'] = $row['email'];


							header("location:../beranda/beranda.php");
							exit;
						}elseif(md5($password)== $row['password'] & $password = '12345'){
							//Set SESSION
							$_SESSION['login'] = true;
							$_SESSION['id_user'] = $row['id_user'];
							$_SESSION['username'] = $row['username'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['nm_user'] = $row['nm_user'];

							header("location:user_default.php");
							exit;
						}
					}
			

			$error = true;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../style/logincss.css">

</head>
<body>
	<?php 
		if(isset($error)):
	 ?>
	 <p style="font-style: italic; color: red;">username / password salah</p>
	<?php endif; ?>

	<form method="POST">
		<h1 style="color: white">INVENTARIS</h1>
		<hr>
		<h1 style="font-family: metropolis-light, sans-serif; color: white;">SILAHKAN MASUK</h1>
		<label>
		    <p class="label-txt">Nama Pengguna</p>
		    	<input type="text" class="input" name="username" autocomplete="off" style="color: white;">
		    <div class="line-box">
		      <div class="line"></div>
		    </div>
		</label>

		<label>
		    <p class="label-txt">Password</p>
		    	<input type="password" class="input" name="password" style="color: white;">
		    <div class="line-box">
		      <div class="line"></div>
		    </div>
		</label>
		<input type="submit" class="button" name="login" value="Masuk">
	</form>

	<script src="../bootstrap/js/jquery.js"></script>
	<script>
		$(document).ready(function(){

		  $('input').focus(function(){
		    $(this).parent().find(".label-txt").addClass('label-active');
		  });

		  $("input").focusout(function(){
		    if ($(this).val() == '') {
		      $(this).parent().find(".label-txt").removeClass('label-active');
		    };
		  });

		});
	</script>


</body>
</html>