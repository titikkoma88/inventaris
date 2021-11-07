<?php 
	include'../connection/connect.php';
	include'../header/header.php';

	if(isset($_POST['submit_brg'])){
		//hitung jumlah form yang dikirim
		$ij = $_POST['ij'];
		$gambar = $_FILES['file_gambar']['name'];
			// $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			// // $x = explode('.', $gambar);
			// // $ekstensi = strtolower(end($x));
			// $ukuran	= $_FILES['file_gambar']['size'];
			// $file_tmp = $_FILES['file_gambar']['tmp_name'];
		$sb = $_POST['sb'];
		$hb = $_POST['hb'];
		$kondisi = $_POST['kondisi'];
		$sd = $_POST['sd'];
		$is = $_POST['is'];
		$tb = $_POST['tb'];
		$count = count($ij);



			//if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			    // if($ukuran < 10440700){			
					// move_uploaded_file($file_tmp, '../img/'.$gambar);
					$query = "INSERT INTO barang (id_barang, id_jenis, spesifikasi_barang, harga_barang, kondisi, sumber_dana, id_supplier, tanggal_beli, gambar_barang) VALUES";
						for( $i=0; $i < $count; $i++ )
							{
							    $query .= "(NULL,'{$ij[$i]}', '{$sb[$i]}', '{$hb[$i]}', '{$kondisi[$i]}', '{$sd[$i]}', '{$is[$i]}', '{$tb[$i]}', '{$gambar[$i]}')";
							    $query .= ",";
							}
							$query = rtrim($query,",");
 
							$insert = $conn->query($query);
							 
							if( !$insert )
							{
							    echo "
							    	<script>
										alert('Barang Baru Berhasil Di Tambahkan');
										document.location.href='tampil_barang.php?id_jenis={$_GET['id_jenis']}';
		 							</script>
							    ".$conn->error;
							}else{
							    echo "
							    <script>
									alert('Barang Baru Berhasil Di Tambahkan');
									document.location.href='tampil_barang.php?id_jenis={$_GET['id_jenis']}';
								</script>";
							}
							// (NULL, '$ij', '$sb', '$kondisi', '$sd', '$is', '$tb', '$gambar')")
			// 	if($query){
			// 		echo "

			// 				<script>
		 // 						alert('Barang Baru Berhasil Di Tambahkan');
			// 					document.location.href='tampil_barang.php?id_jenis=$ij';
		 // 					</script>

			// 			";
			// 	}else{
			// 		echo "


		 // 					<script>
		 // 						alert('Barang Baru Gagal Di Tambhkan');
		 // 						document.location.href='tampil_barang.php?id_jenis=$ij';
			// 				</script>

			// 			";
			// 	}
			//     }else{
			// 	echo 'UKURAN FILE TERLALU BESAR';
			//     }
		 //       }else{
			// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	  //      }

		}
		
		// $tambah_brg = mysqli_query($conn, "INSERT INTO barang VALUES (NULL, '$ij', '$sb', '$kondisi', '$sd', '$is', '$tb')");
		
		// 	if($tambah_brg){
		// 		echo 	"
		// 					<script>
		// 						alert('Barang Baru Berhasil Di Tambahkan');
		// 						document.location.href='tampil_barang.php?id_jenis=$ij';
		// 					</script>
		// 				";
		// 	}else{
		// 		echo 	"
		// 					<script>
		// 						alert('Barang Baru Gagal Di Tambhkan');
		// 						document.location.href='tampil_barang.php?id_jenis=$ij';
		// 					</script>
		// 				";
		// 	}
		

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
	<style>
		.input-group{
			margin-bottom: 10px;
			width: 380px;
		}
		.input-group-addon{
			width: 150px;
			border-radius: 0;
		}
		.form-control{
			width: 250px;
		}
		.btn{
			width: 1200px;
		}

	</style>
</head>
<body>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="../beranda/beranda.php">Beranda</a></li>        
		    <li><a href="../jenis/tampil_jenis.php">Jenis</a></li>
		    	<?php
		    		$id = $_GET['id_jenis']; 
		    		$sql_nm_brg = mysqli_query($conn, "SELECT * FROM jenis WHERE id_jenis = $id");
		    		while($data = mysqli_fetch_array($sql_nm_brg)){
		    	 ?>        
		    <li><a href="../barang/tampil_barang.php?id_jenis=<?= $id?>"><?= $data['nm_jenis'];?></a></li>
		    	<?php } ?>
		    <li><a href="../barang/tambah_barang.php?jumlah=<?= $jumlah=1?>& id_jenis=<?= $ij?>">Tambah barang</a></li>        
		</ol>
		<div class="row">
			
			<h2 class="text-center">Tambah Barang</h2>
			<hr>

			<form method="get" action="">
				Jumlah form : <input type="text" size="5" name="jumlah" />
				<?php 
					$id_jenis = $_GET['id_jenis'];	
					$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_jenis = '$id_jenis'");
					$data = mysqli_fetch_array($query);
				?>
				<input type="hidden" name="id_jenis" value="<?= $id_jenis;?>">
				<input type="submit" value="OK"/>
			</form>
			<hr>

<!-- 			<form style="display: inline-block;">
				<p><label>ID Jenis</label></p>
				<p><label>Spesifikasi Barang</label></p>
				<p><label>Gambar Barang</label></p>
				<p><label>kondisi</label></p>
				<p><label>Sumber Dana</label></p>
				<p><label>ID Supplier</label></p>
				<p><label>Tanggal Beli</label></p>
			</form> -->
			
			<form action="" method="post" enctype="multipart/form-data" style="display: inline-block;">
				<!-- <p><label>ID Jenis</label></p>
				<p><label>Spesifikasi Barang</label></p>
				<p><label>Gambar Barang</label></p>
				<p><label>kondisi</label></p>
				<p><label>Sumber Dana</label></p>
				<p><label>ID Supplier</label></p>
				<p><label>Tanggal Beli</label></p> -->
				<table style="display: inline-block;">
				<?php
					$id_jenis = $_GET['id_jenis'];
					$jumlah=$_GET['jumlah'];
					for($i=0; $i<$jumlah; $i++){
					$no = $i + 1;
				?>

				
					<div class="col-sm-4">
						
						<div class="input-group">
							<label class="input-group-addon">ID Jenis</label>
							<?php 
								$id_jenis = $_GET['id_jenis'];	
								$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_jenis = '$id_jenis'");
								$data = mysqli_fetch_array($query);
							 ?>
							<input class="form-control" type="text" name="ij[]" value="<?= $_GET['id_jenis'];?>">
						</div>

						<div class="input-group">
							<label class="input-group-addon">Spesifikasi Barang</label>
							<input class="form-control" type="text" name="sb[]">
						</div>

						<div class="input-group">
							<label class="input-group-addon">Harga Barang</label>
							<input class="form-control" type="number" name="hb[]">
						</div>

						<div class="input-group">
							<label class="input-group-addon">Gambar Barang</label>
							<input class="form-control" type="file" name="file_gambar[]">
						</div>

						<div class="input-group">
							<label class="input-group-addon">kondisi</label>
							<select name="kondisi[]" class="form-control">
								<option>Baik</option>
								<option>Rusak</option>
								<option>Hampir rusak</option>
							</select>	
						</div>

						<div class="input-group">
							<label class="input-group-addon">Sumber Dana</label>
							<input class="form-control" type="text" name="sd[]">
						</div>

						<div class="input-group">
							<label class="input-group-addon">ID Supplier</label>
							<select name="is[]" class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm">
								<?php 
									$id_supp = mysqli_query($conn, "SELECT * FROM supplier");
									while($data_supp = mysqli_fetch_array($id_supp)){
								 ?>
								<option value="<?= $data_supp['id_supplier'];?>">
									<?= $data_supp['nm_supplier'];?>
									<?php } ?>
								</option>
							</select>					
						</div>

						<div class="input-group">
							<label class="input-group-addon">Tanggal Beli</label>
							<input class="form-control" type="date" name="tb[]">
						</div>
						<hr>

				</div>

			<?php } ?>
			<?php
				//cetak tombol jika inputan lebih dari 0
					if($jumlah >0){ ?>
					<p><input class="btn btn-succes white-green" type="submit" name="submit_brg" value="Tambah Barang" class="btn btn-white-green "></p>
			<?php } ?>	
			</form>
				
		</div>
	</div>
</body>
</html>

