<?php 
	include'../connection/connect.php';
	$id_user = $_GET['id_user'];

	$query = mysqli_query($conn, "UPDATE user SET password = MD5('12345') WHERE id_user = '$id_user'");

	if($query){
		echo "
				<script>
					alert(' Password berhasil di setel ulang menjadi 12345');
					document.location.href='tampil_user.php';
				</script>
			";
	}else{
		echo "
				<script>
					alert('Password gagal di setel ulang');
					document.location.href='tampil_user.php';
				</script>
			";
	}
 ?>