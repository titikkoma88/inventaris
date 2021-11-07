<?php 
	include'../connection/connect.php';
	$ij = $_GET["id_jenis"];
	$id_barang = $_GET["id_barang"];
	$hapus = mysqli_query($conn, "DELETE FROM barang WHERE id_barang = $id_barang");

	if($hapus){
		echo 	"
					<script>
							alert('Barang Berhasil Di Hapus');
							document.location.href='tampil_barang.php?id_jenis=$ij';
					</script>
				";
	}else{
		echo 	"
					<script>
							alert('Barang Gagal Di Hapus');
							document.location.href='tampil_barang.php?id_jenis=$ij';
					</script>
				";
	}
 ?>