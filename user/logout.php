<?php 
	session_start();
	session_destroy();
	
	header("location:../beranda/beranda-keluar.php");
	exit;
 ?>