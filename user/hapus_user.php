<?php 
	include'../connection/connect.php';
	$id = $_GET['id_user'];

	$sql = mysqli_query($conn,"DELETE FROM user WHERE id_user = $id");

	if($sql){
		echo "
				<script>
						alert('User berhasil di hapus');
						document.location.href='tampil_user.php';
				</script>
			";
	}else{
		echo "
				<script>
					alert('User gagal di hapus');
					document.location.href='tampil_user.php';
				</script>
			";
	}
 ?>