<?php 
	include'../connection/connect.php';
	$id_jenis = $_GET["id_jenis"];
	$hapus = mysqli_query($conn, "DELETE FROM jenis WHERE id_jenis = $id_jenis");

	if($hapus){
		echo 	"
					<script>
							alert('Jenis Berhasil Di Hapus');
							document.location.href='tampil_jenis.php';
					</script>
				";
	}else{
		echo 	"
					<script>
							alert('Jenis Gagal Di Hapus');
							document.location.href='tampil_jenis.php';
					</script>
				";
	}
 ?>