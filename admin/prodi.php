<?php include 'header.php'; ?>


<div class="container">

	<div class="mb-4">
		<h4>Data Prodi</h4>
		<small>Kelola data program studi</small>
	</div>


	<div class="card">
		<div class="card-header">

			Data Program Studi

			<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalTambahprodi">
				<i class="fa fa-plus"></i> &nbsp Tambah Prodi Baru
			</button>

			<form action="prodi_act.php" method="post">
				<div class="modal fade" id="modalTambahprodi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h6 class="modal-title" id="exampleModalLabel">Buat Nama Program Studi Baru</h6>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label>Nama Program Studi</label>
									<input type="text" name="prodi" required="required" class="form-control" placeholder="Tulis nama prodi ..">
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
								<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<div class="card-body">
			


			<div class="table-responsive">
				<table class="table table-bordered table-striped" id="table-datatable">
					<thead>
						<tr>
							<th class="text-center" width="1%">NO</th>
							<th>NAMA PROGRAM STUDI</th>
							<th class="text-center" width="10%">OPSI</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						$data = mysqli_query($koneksi,"SELECT * FROM prodi ORDER BY prodi_id ASC");
						while($d = mysqli_fetch_array($data)){
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['prodi']; ?></td>
								<td>    
									<center>
										<div class="btn-group">
											
											<?php 
											if($d['prodi_id'] != "1"){
												?>
												<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_prodi_<?php echo $d['prodi_id'] ?>">
													<i class="fa fa-cog"></i>
												</button>
												
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_prodi_<?php echo $d['prodi_id'] ?>">
													<i class="fa fa-trash"></i>
												</button>
												<?php
											}

											?>
											
										</div>
									</center>

									<form action="prodi_update.php" method="post">
										<div class="modal fade" id="edit_prodi_<?php echo $d['prodi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h6 class="modal-title" id="exampleModalLabel">Edit Nama Program Studi</h6>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">

														<div class="form-group" style="width:100%">
															<label>Nama Program Studi</label>
															<input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['prodi_id']; ?>">
															<input type="text" name="prodi" required="required" class="form-control" placeholder="Tulis prodi .." value="<?php echo $d['prodi']; ?>" style="width:100%">
														</div>

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
														<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Simpan</button>
													</div>
												</div>
											</div>
										</div>
									</form>

									<!-- modal hapus -->
									<div class="modal fade" id="hapus_prodi_<?php echo $d['prodi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h6 class="modal-title" id="exampleModalLabel">Peringatan!</h6>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

													<p>Yakin ingin menghapus prodi ini ?</p>
													<small>Semua mahasiswa yang terhubung dengan prodi ini akan di pindah ke prodi "lainnya"</small>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
													<a href="prodi_hapus.php?id=<?php echo $d['prodi_id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Hapus</a>
												</div>
											</div>
										</div>
									</div>


								</td>
							</tr>
							<?php 
						}
						?>
					</tbody>
				</table>
			</div>

		</div>
	</div>

</div>


<?php include 'footer.php'; ?>