<?php 
	include'../header/header.php';

	if(isset($_POST['submit'])){
		$nama = $_POST['nm_user'];
		$user = $_POST['username'];
		$no_tel = $_POST['no_tel'];
		$id = $_SESSION['id_user'];

		$sql = mysqli_query($conn, "UPDATE user SET nm_user = '$nama',
													username = '$user',
													tel_user = '$no_tel'
													WHERE id_user = '$id'");
		if($sql){
			echo "
					<script>
						alert('Biodata berhasil di ubah, silahkan masuk ulang');
						document.location.href='logout.php';
					</script>
				";
		}else{
			echo "
				<script>
					alert('Biodata gagal di ubah');
					document.location.href='biodata-user.php';
				</script>
			";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>

label {
  display: block;
  position: relative;
  margin: 40px 0px;
}

input {
  width: 100%;
  padding: 10px;
  background: transparent;
  border: none;
  outline: none;
}

.line-box {
  position: relative;
  width: 100%;
  height: 2px;
  background: #BCBCBC;
}

.line {
  position: absolute;
  width: 0%;
  height: 2px;
  top: 0px;
  left: 50%;
  transform: translateX(-50%);
  background: orange;
  transition: ease .6s;
}

input:focus + .line-box .line {
  width: 100%;
}

.label-txt {
  position: absolute;
  top: -1.2em;
  padding: 10px;
  font-family: sans-serif;
  font-size: .8em;
  letter-spacing: 1px;
  color: orange;
  transition: ease .3s;
}

.label-active {
  top: -2em;
}

.button{
  align-self: center;
  padding: 20px 100px 18px 100px;
  color: white;
  font-family: arial;
  font-size: 18px;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-align: center;
  background: rgb(255, 85, 85);
  border-radius: 10px;
  transition: all 0.1s ease-in-out;
  cursor: pointer;
}

.button:hover{
 background: #E03A3A;
}

.button:active{
  transform: scale(1.025);
}
	</style>
</head>
<body>
	<div class="col-sm-6 col-sm-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading"><h3 class="text-center">BIODATA</h3></div>
			<div class="panel-body">
				<img src="../img/profile/<?= $_SESSION['foto'];?>" class="img-circle" style="width: 200px; height: 200px; margin-left: 200px;">
				<form method="POST">
					<label>
					    <p class="label-txt">Nama Lengkap</p>
					    	<input type="text" class="input" name="nm_user" value="<?= $_SESSION['nm_user'];?>">
					    <div class="line-box">
					      <div class="line"></div>
					    </div>
					</label>

					<label>
					    <p class="label-txt">Username</p>
					    	<input type="text" class="input" name="username" value="<?= $_SESSION['username'];?>">
					    <div class="line-box">
					      <div class="line"></div>
					    </div>
					</label>

					<label>
					    	<input type="text" class="input" name="password" style="margin-top: -100px;"><a href="ubah_password.php" class="btn btn-warning white-orange">Klik di sini untuk ubah <i>Password</i></a>
					    <div class="line-box">
					      <div class="line"></div>
					    </div>
					</label>

					<label>
					    <p class="label-txt">Nomot Telephone</p>
					    	<input type="text" class="input" name="no_tel" value="<?= $_SESSION['tel_user'];?>">
					    <div class="line-box">
					      <div class="line"></div>
					    </div>
					</label>

					<input type="submit" class="button" name="submit" value="Ubah">
				</form>
			</div>
		</div>
	</div>

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