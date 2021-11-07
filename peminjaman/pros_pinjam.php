<?php 
	include'../connection/connect.php';

	$pinjam = $_GET['id_pinjam'];
	$status = $_GET['status'];

	if($status == '0'){
		$total = $status + 1;
		$sql = "UPDATE peminjaman SET status = '$total', tgl_pinjam = now() WHERE id_pinjam = '$pinjam'";
		$tebas = mysqli_query($conn,$sql);

		header("location:peminjaman_terkini.php");
	}elseif($status == '1'){
		$total = $status + 1;
		$sql = "UPDATE peminjaman SET 
						status = '$total',
						tgl_kembali = now()
				 WHERE id_pinjam = '$pinjam'";
		$tebas = mysqli_query($conn,$sql);

		header("location:peminjaman_terkini.php");
	}else{
		echo "GAGAL";
	}
 ?>