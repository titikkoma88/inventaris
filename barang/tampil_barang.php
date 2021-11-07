	<?php 
	session_start();
		include'../connection/connect.php';
		include'../header/header.php';
		include'../kunci/kunci.php';
		@$id = $_GET['id_jenis'];
		$sql = mysqli_query($conn, "SELECT * FROM jenis WHERE id_jenis = '$id' ");

		if(isset($_POST['hapus'])){
			$ij = $_GET["id_jenis"];
			$barang = $_POST['pilih'];
			$jumlah_dipilih = count($barang);
			for($x=0;$x<$jumlah_dipilih;$x++){
			$hapus = mysqli_query($conn,"DELETE FROM barang WHERE id_barang='$barang[$x]'");
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
		}

		if(isset($_POST['ubah_kon'])){
			$ij = $_GET["id_jenis"];
			$barang = $_POST['pilih'];
			$jumlah_dipilih = count($barang);
			for($x=0;$x<$jumlah_dipilih;$x++){
			$ubah = mysqli_query($conn, "UPDATE `barang` SET `kondisi` = 'Baik' WHERE id_barang='$barang[$x]'");
		}
		if($ubah){
				echo 	"
							<script>
									alert('Barang Berhasil Di Perbaiki');
									document.location.href='tampil_barang.php?id_jenis=$ij';
							</script>
						";
			}else{
				echo 	"
							<script>
									alert('Barang Gagal Di Perbaiki');
									document.location.href='tampil_barang.php?id_jenis=$ij';
							</script>
						";
			}	
		}
		
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Semua Barang</title>
</head>
<body>
	<br>

	<?php 
		@$id_jenis = $_GET['id_jenis'];
		$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_jenis = '$id_jenis'");

		$data = mysqli_fetch_array($query);
	 ?>
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
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
			</ol>
			<form method="post">
				
				<table class="table table-bordered">
				<tr>
					<td colspan="10">
						<div class="panel panel-default">
							<?php 
								$jenis = mysqli_query($conn, "SELECT * FROM jenis WHERE id_jenis = '$id_jenis'");
								$row_jenis = mysqli_fetch_array($jenis);
							 ?>
						<div class="panel-heading"><h4><?= $row_jenis['nm_jenis']?></h4></div>
						<div class="panel-body">
							<?php 
								
								$data = mysqli_fetch_array($sql);
							 ?>
							<a class="btn btn-succsess outline white-green" href="tambah_barang.php?jumlah=<?= $jumlah=1?>& id_jenis=<?= $id_jenis?>">Tambah Barang</a>
							<input type="submit" name="hapus" value="Hapus">
							<input type="submit" name="ubah_kon" value="Perbaiki">
						</div>
					</div>
					</td>
				</tr>
				<tr>
					<th>NO</th>
					<th>Nama Jenis</th>
					<th>Spesifikasi Barang</th>
					<th>Harga Barang</th>
					<th>Gambar</th>
					<th>Kondisi</th>
					<th>Sumber Dana</th>
					<th>ID Supplier</th>
					<th>Tanggal Beli</th>
					<th>Opsi</th>
				</tr>
					<?php 
						@$keyword = $_POST['keyword'];
						@$id_jenis = $_GET['id_jenis'];

						if($keyword !=''){

							$halaman = 10;
							$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							$result = mysqli_query($conn,"SELECT * FROM barang WHERE id_jenis = '$id_jenis'");
							$total = mysqli_num_rows($result);
							$pages = ceil($total/$halaman);  
							$no = $mulai+1; 
							$barang = 	mysqli_query($conn, "SELECT * FROM barang
															INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
															WHERE barang.id_jenis = '$id_jenis' AND
															barang.spesifikasi_barang LIKE '%$keyword%'
															");
						}else{

							$halaman = 10;
							$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							$result = mysqli_query($conn,"SELECT * FROM barang WHERE id_jenis = $id_jenis");
							$total = mysqli_num_rows($result);
							$pages = ceil($total/$halaman);            
							$barang = mysqli_query($conn,"select * from barang
														INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis
														WHERE barang.id_jenis = '$id_jenis' LIMIT $mulai, $halaman")or die(mysql_error);
							$no = $mulai+1;
						}
						
						while($data = mysqli_fetch_array($barang)){
					 ?>
				<tr>
					<td><?= $no++?></td>
					<td><?= $data['nm_jenis'];?></td>
					<td class="col-md-2"><?= $data['spesifikasi_barang'];?></td>
					<td><?= "Rp." . number_format($data['harga_barang'],2,',','.') ?></td>
					<td>
						<a href="#" class="edit-record btn btn-primary white-blue btn-xs" data-id="<?= $data['gambar_barang']?>">Lihat Gambar</a>
						<!-- Trigger the modal with a button -->

						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Gambar</h4>
						      </div>
						      <div class="modal-body">
						        
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>

						  </div>
						</div>
						
					</td>

					<td><?= $data['kondisi'];?></td>
					<td><?= $data['sumber_dana'];?></td>
					<td><?= $data['id_supplier'];?></td>
					<td><?= $data['tanggal_beli'];?></td>
					<td>
						<a class="btn btn-danger white-red" href="hapus_barang.php?id_barang=<?= $data['id_barang'];?>& id_jenis=<?= $data['id_jenis'];?>" onclick="return confirm('Apakah anda ingin hapus ini?')">Hapus</a>
						<a class="btn btn-warning white-orange" href="edit_barang.php?id_barang=<?= $data['id_barang'];?>">Edit</a>
						<input class="btn btn-warning white-orange" type="checkbox" name="pilih[]" value="<?= $data['id_barang']?>& id_jenis=<?= $id_jenis?>">
					</td>
				</tr>
					<?php } ?>
				<tr>
					<td colspan="10">
						<div class="">
						  <?php for ($i=1; $i<=$pages ; $i++){ ?>
							<ul class="pagination">
							  <li>
							  	<a class="btn btn-primary white-orange" href="?id_jenis=<?= $_GET['id_jenis'];?>& halaman=<?php echo $i;?>"><?php echo $i;?></a>
							  </li>
							</ul>
						  <?php } ?>
						</div>
					</td>
				</tr>
			</table>
			
			</form>
		</div>
	</div>

	<!-- MULAI MODAL -->

		<!-- memulai modal nya. pada id="$myModal" harus sama dengan data-target="#myModal" pada tombol di atas -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Gambar Barang</h4>
					</div>
					<!-- memulai untuk konten dinamis -->
					<!-- lihat id="data_barang", ini yang di pangging pada ajax di bawah -->
					<div class="modal-body" id="data_barang">
					</div>
					<!-- selesai konten dinamis -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

<script>
    $(function(){
        $(document).on('click','.edit-record',function(e){
            e.preventDefault();
            $("#myModal").modal('show');
            $.post('gambar_modal.php',
                {id:$(this).attr('data-id')},
                function(html){
                    $(".modal-body").html(html);
                }   
            );
        });
    });
</script>	

</body>
</html><br><br><br><br>
<?php 
	include'../footer/footer.php';
 ?>