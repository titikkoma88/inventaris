<?php 
	include'../connection/connect.php';

	$pinjam = $_GET['id_pinjam'];
	$id_barang = $_GET['id_barang'];

	$sql_rusak = mysqli_query($conn, "INSERT INTO `kondisi_rusak` 
									(`id_rusak`,
									`id_pinjam`,
									`kondisi`,
									`tanggal_rusak`,
									`tanggal_bayar_gt`,
									`status_gt`) 
									VALUES (NULL, '$pinjam', 'Rusak', now(), '0000-00-00', '0')");

	$update_brg = mysqli_query($conn, "UPDATE barang SET kondisi = 'Rusak' WHERE id_barang = '$id_barang'");
	$sql_pinjam = mysqli_query($conn, "UPDATE peminjaman SET 
							status = '2',
							tgl_kembali = now()
				 			WHERE id_pinjam = '$pinjam'");

	if($sql_rusak){
		echo "
				<script>
					alert('Barang kembali dengan keadaan rusak');
					document.location.href='peminjaman_terkini.php';
				</script>
			";
	}else{
		echo "g";
	}


		
 ?>