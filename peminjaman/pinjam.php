<?php 
	session_start();
	include'../connection/connect.php';

	$jenis = $_GET['id_jenis'];
	$id_user = $_SESSION['id_user'];
	$id_barang = $_GET['id_barang'];

	$pinjam = mysqli_query($conn, "INSERT INTO peminjaman
								(`id_pinjam`,
								 `id_user`, 
								 `id_barang`, 
								 `tgl_pinjam`, 
								 `tgl_kembali`, 
								 `status`) 
								 VALUES (NULL, '$id_user', '$id_barang','', '', '')");
	if($pinjam){
		echo "
			<script>
				alert('Permintaan peminjaman sedang di ajukan');
				document.location.href='tampil_barang_pinjam.php?id_jenis=$jenis';
			</script>
			";
	}else{
		echo "gagaal";
	}
 ?>
