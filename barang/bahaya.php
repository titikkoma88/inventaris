<br>
	<div class="row">
		<div class="col-md-3 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tambah Barang
				</div>
					<div class="panel-body">
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
						
							<!-- Isi form nya -->
							<form method="POST" action="" enctype="multipart/form-data">
								<?php
									$id_jenis = $_GET['id_jenis'];
									$jumlah=$_GET['jumlah'];
									for($i=0; $i<$jumlah; $i++){
									$no = $i + 1;
									echo $no .". ";
								?>
								<table>
									<tr>
										<td>
											<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-sm">ID Jenis</span>
											<?php 
												$id_jenis = $_GET['id_jenis'];	
												$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_jenis = '$id_jenis'");
												$data = mysqli_fetch_array($query);
											 ?>
											<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="text" name="ij" value="<?= $id_jenis;?>">
										</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroup-sizing-sm">Spesifikasi Barang</span>
												<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="text" name="sb">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroup-sizing-sm">Gambar Barang</span>
												<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="file" name="file_gambar">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroup-sizing-sm">Kondisi</span>
												<select name="kondisi" class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm">
													<option>Baik</option>
													<option>Buruk</option>
												</select>	
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroup-sizing-sm">Sumber Dana</span>
												<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" input type="text" name="sd">
											</div>

										</td>
									</tr>
									<tr>
										<div class="input-group-prepend">
											<td>
												<span class="input-group-text" id="inputGroup-sizing-sm">ID Supplier</span>
												<select name="is" class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm">
													<?php 
														$id_supp = mysqli_query($conn, "SELECT * FROM supplier");
														while($data_supp = mysqli_fetch_array($id_supp)){
													 ?>
													<option value="<?= $data_supp['id_supplier'];?>">
														<?= $data_supp['nm_supplier'];?>
														<?php } ?>
													</option>
												</select>										
											</td>
										</div>

									</tr>
									<tr>
										<td>
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroup-sizing-sm">Tanggal Beli</span>
												<input class="form-control" aria-label="small" aria-describedby="inpuGruop-sizin-sm" type="date" name="tb">
											</div>
											<br>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												}
												//cetak tombol jika inputan lebih dari 0
												if($jumlah >0){ ?>
														<input type="submit" name="submit_brg" value="Tambah Barang" class="btn btn-success white-green ">
												<?php } ?>	
										</td>
									</tr>
								</table>
							</form>
						
				</div>
			</div>
		</div>
	</div>