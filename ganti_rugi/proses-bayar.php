<?php 
	include'../connection/connect.php';

	$id_rusak = $_GET['id_rusak'];
	$nama = $_GET['nama'];
	$kondisi = $_GET['kondisi'];
	$id_user = $_GET['id_user'];

	$status_gt = mysqli_query($conn, "UPDATE `kondisi_rusak` SET `tanggal_bayar_gt` = now(), `status_gt` = '1' WHERE `kondisi_rusak`.`id_rusak` = $id_rusak");

	if($status_gt){
		echo "
				<script>
					alert('Barang yang di rusak oleh $nama telah di bayar');
					document.location.href='ganti-rugi.php?kondisi=$kondisi&id_user=$id_user';
				</script>
			";
	}else{
		echo "g";
	}
 ?>