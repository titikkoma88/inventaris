<?php 
session_start();
	include'../connection/connect.php';

	
	$nama = $_POST['username'];
	$teks = $_POST['teks'];
	$email = $_POST['email'];

	if(empty($_SESSION['id_user'])){
		$sql = mysqli_query($conn, "INSERT INTO `kontak_user_bd` (`id_kontak_bd`, `username`, `teks`, `tanggal_pesan`) VALUES (NULL, '$nama', '$teks', now())");
	}else{
		$id = $_SESSION['id_user'];
		$sql = mysqli_query($conn, "INSERT INTO kontak_user VALUES(NULL, '$id', '$email', '$teks', now())");
	}
	

	if($sql){
		echo "
				<script>
					alert('Pesan berhasil di kirim');
					document.location.href='beranda-keluar.php';
				</script>
			";
	}else{
		echo "
g
		";
	}
 ?>