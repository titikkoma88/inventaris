<?php 
	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';

	$hapus = mysqli_query($conn, "DELETE FROM peminjaman");

	if($hapus){
		echo 	"
					<script>
							alert('Semua data peminjaman Berhasil Di Hapus');
							document.location.href='tampil_pinjam.php';
					</script>
				";
	}else{
		echo 	"
					<script>
							alert('Semua data peminajaman Gagal Di Hapus');
							document.location.href='tampil_pinjam.php';
					</script>
				";
	}
 ?>