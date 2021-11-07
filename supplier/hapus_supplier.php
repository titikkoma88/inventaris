<?php  
	include'../connection/connect.php';
	$id_supplier = $_GET['id_supplier'];
	$sql = mysqli_query($conn, "DELETE FROM supplier WHERE id_supplier = '$id_supplier'");

	if($sql){
		echo 	"
					<script>
							alert('Supplier berhasil di hapus');
							document.location.href='tampil_supplier.php';
					</script>
				";
	}else{
		echo 	"
					<script>
							alert('Supplier gagal di hapus');
							document.location.href='tampil_supplier.php';
					</script>
				";
	}
 ?>