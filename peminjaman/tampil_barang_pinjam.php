<?php 
	include'../connection/connect.php';
	include'../header/header.php';
	include'../kunci/kunci.php';

	
	$id_jenis = $_GET['id_jenis'];
	
	//pagination
		$halaman = 8;
		$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		$result = mysqli_query($conn,"SELECT * FROM barang WHERE id_jenis = $id_jenis");
		$total = mysqli_num_rows($result);
		$pages = ceil($total/$halaman); 
		$no = $mulai+1;

	@$keyword = $_POST['keyword'];

	if($keyword !=''){
		$show_pinjam = mysqli_query($conn, "SELECT * FROM barang
										INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
										INNER JOIN supplier ON supplier.id_supplier = barang.id_supplier
										WHERE jenis.id_jenis = '$id_jenis' AND spesifikasi_barang LIKE '%$keyword%' OR nm_jenis LIKE '%$keyword%' LIMIT $mulai, $halaman");
	}else{
		$halaman = 8;
		$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		$result = mysqli_query($conn,"SELECT * FROM barang WHERE id_jenis = $id_jenis");
		$total = mysqli_num_rows($result);
		$pages = ceil($total/$halaman);            
		$no = $mulai+1;

		$show_pinjam = mysqli_query($conn, "SELECT * FROM barang
										INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
										INNER JOIN supplier ON supplier.id_supplier = barang.id_supplier
										WHERE jenis.id_jenis = '$id_jenis' LIMIT $mulai, $halaman");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
		<style>
			
		.panel-default{
			border-radius: 0;
			box-shadow: 1px 1px 2px 1px grey;
		}
		.thumbnail{
			border-radius: 0;
			min-width: 250px;
			box-shadow: 1px 1px 1px grey;
			height: 280px;
		}
		img{
			max-height: 100px;
		}
		#btn-admin{
			border-radius: 0;
			min-width:32%;

		}
		#btn-user{
			width: 100%
		}
		.panel-footer{
			width: 100%;
		}
		.caption{
			height: 00px;
		}
		.caption{
			min-height: 100px;
		}
		</style>

</head>
<body>
	<div class="container">
		<div class="row">
			
			<ol class="breadcrumb">
				<li><a href="../beranda/beranda.php">Beranda</a></li>        
			    <li><a href="../jenis/tampil_jenis.php">Jenis</a></li>        
			    <li><a href="../peminjaman/tampil_barang_pinjam.php?id_jenis=<?= $_GET['id_jenis'];?>">
			    	<?php 
			    		$id_nm_brg = $_GET['id_jenis'];
			    		$sql = mysqli_query($conn, "SELECT * FROM jenis WHERE id_jenis = '$id_nm_brg'");
			    		$data_nm_brg = mysqli_fetch_array($sql);
			    	 ?>
			    	 <?= $data_nm_brg['nm_jenis'];?>
			    </a></li>        
			</ol>

			<div class="panel panel-default">
				<div class="panel-heading"><h3>Peminjaman Barang</h3></div>
				<div class="panel-body">

						<?php while($data = mysqli_fetch_array($show_pinjam)){ ?>
					<div class="col-sm-3">
						<div class="thumbnail">
							<img src="<?php echo "../img/".$data['gambar_barang']; ?>">
							
							<div class="caption">
								<b><?= $data['nm_jenis'];?> <?= $data['spesifikasi_barang'];?></b>
								<p>Kondisi : <?= $data['kondisi'];?></p>
							</div>	

								<?php 
									$stat = mysqli_query($conn,"SELECT * FROM peminjaman 
																WHERE id_barang = '{$data['id_barang']}' AND status !=2");
									$cek = mysqli_num_rows($stat);
										if($cek > 0){
							 	?>
										 	<i>Barang Sedang Dipinjam</i>
								<?php }else{ ?>
											<i>Barang Tersedia</i>
								<?php } 
									if($cek !=1){
								?>	
								<div class="panel-footer">
									<?php 
										if($data['kondisi'] === 'Rusak'){
									?>
										<i style="color: orange">Barang rusak tidak bisa dipinjam</i>
									<?php 
										}elseif($data['kondisi'] === 'Hilang'){
									?>
										<i style="color: red">Barang hilang tidak bisa dipinjam</i>
									<?php
										}else{
									?>
										<a id="btn-user" class="btn btn-info white-blue" href="pinjam.php?id_barang=<?= $data['id_barang'];?>& id_jenis=<?= $data['id_jenis'];?>" onclick="return confirm('Apakah anda ingin pinjam barang ini?')">
															Pinjam
										</a>
									<?php
										}
									 ?>
									

								</div>

								<?php }else{ ?>
										-
								<?php } ?>		

						</div>

					</div>

					<!-- END WHILEE -->
						<?php } ?>

				</div>

				<div class="panel-footer">
					<?php for ($i=1; $i<=$pages; $i++){ ?>
						<ul class="pagination">
						  <li>
						  	<a href="?halaman=<?php echo $i;?>& id_jenis=<?= $_GET['id_jenis'];?>"><?php echo $i;?></a>
						  </li>
						</ul>
				  	<?php } ?>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
<?php 
	include'../footer/footer.php';
 ?>