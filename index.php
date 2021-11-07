<?php 
	session_start();
	$id_user = $_SESSION['id_user'];

	if(isset($id_user)){
		header("location:beranda/beranda.php");
	}else{
		header("location:beranda/beranda-keluar.php");
	}
 ?>