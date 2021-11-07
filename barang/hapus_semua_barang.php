<?php 
include'../connection/connect.php';
	$ij = $_GET["id_jenis"];
	$barang = $_POST['pilih'];
	$jumlah_dipilih = count($barang);
	for($x=0;$x<$jumlah_dipilih;$x++){
	$hapus = mysql_query("DELETE FROM barang WHERE id_barang='$barang[$x]'");
}
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