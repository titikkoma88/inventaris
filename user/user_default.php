<?php 
	
	include'../connection/connect.php';
	session_start();

	if(isset($_POST['login'])){
		$baru = $_POST['pw_baru'];
		$lama = $_POST['pw_lama'];
		$konfir = $_POST['konfir'];
		$id = $_SESSION['id_user'];

		if($baru === $konfir){
			$baru_pw = MD5($baru);
			$konfir_pw = MD5($konfir);

			$sql = mysqli_query($conn, "UPDATE user SET password = '$baru_pw' WHERE id_user = $id AND password = MD5('$lama')");
			if($sql){
				echo "
						<script>
							alert('Password berhasil di ubah harap login ulang');
							document.location.href='logout.php';
						</script>
				";
			}else{
				echo "
						<script>
							alert('Password lama salah / konfirmasi password salah');
							document.location.href='../jenis/tampil_jenis.php';
						</script>
					";
			}
		}else{
			echo "
						<script>
							alert('Password lama salah / konfirmasi password salah');
							document.location.href='../jenis/tampil_jenis.php';
						</script>
			";
		}
		

	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../style/form-new-user.css">
</head>
<body>
<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading"><b><h2>IVENTORANS</h2></b></div>
					<div class="panel-body">
						
						<h4>
							Selamat datang <?= $_SESSION['nm_user'];?> anda sedang menggunakan <i>Password Default</i> harap ganti password untung kenyamanan dan keamanan anda, terimakasih :)
						</h4>
						<button id="hide" class="button-up">Ubah password</button>
						
						<form method="POST" style="display: none;">
							<label><h3>UBAH PASSWORD</h3></label>
							<label>
							    <p class="label-txt">Password lama</p>
							    	<input type="text" class="input" name="pw_lama">
							    <div class="line-box">
							      <div class="line"></div>
							    </div>
							</label>

							<label>
							    <p class="label-txt">Password bary</p>
							    	<input type="text" class="input" name="pw_baru">
							    <div class="line-box">
							      <div class="line"></div>
							    </div>
							</label>

							<label>
							    <p class="label-txt">Konfirmasi password</p>
							    	<input type="text" class="input" name="konfir">
							    <div class="line-box">
							      <div class="line"></div>
							    </div>
							</label>
							
							<input type="submit" class="button" name="login" value="Masuk">
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../bootstrap/js/jquery-3.3.1"></script>
	<script>
		$(document).ready(function(){
		  $("button").click(function(){
		    $("form").fadeIn();
		  });
});
	</script>

</body>
</html>




