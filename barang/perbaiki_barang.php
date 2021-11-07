 <?php 
include'../connection/connect.php';
	$ij = $_GET["id_jenis"];
	$barang = $_POST['pilih'];
	$jumlah_dipilih = count($barang);
	for($x=0;$x<$jumlah_dipilih;$x++){
	$ubah = mysql_query("UPDATE barang SET kondisi = 'Baik' WHERE id_barang='$barang[$x]'");
}
if($ubah){
		echo 	"
					<script>
							alert('Barang Berhasil Di ubah');
							document.location.href='tampil_barang.php?id_jenis=$ij';
					</script>
				";
	}else{
		echo 	"
					<script>
							alert('Barang Gagal Di ubah');
							document.location.href='tampil_barang.php?id_jenis=$ij';
					</script>
				";
	}
 

?>