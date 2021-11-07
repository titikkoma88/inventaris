	<div class="container">
		<div class="row">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading"><legend>PEMINJMAN BARANG</legend></div>
					<div class="panel-body">

						<?php while($data = mysqli_fetch_array($show_pinjam)){ ?>
						<div class="col-sm-6 col-md-3">
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
										
										<a id="btn-user" class="btn btn-info white-blue" href="pinjam.php?id_barang=<?= $data['id_barang'];?>& id_jenis=<?= $data['id_jenis'];?>" onclick="return confirm('Apakah anda ingin pinjam barang ini?')">
																Pinjam
										</a>

									</div>

									<?php }else{ ?>
											-
									<?php } ?>		
							</div>
						</div>

					<!-- END WHILE -->
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
	</div>