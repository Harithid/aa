<?php include 'header.php'; ?>


<div class="container-fluid">

	<div class="mb-4">
		<h4>Data Mahasiswa & Kuesioner</h4>
		<small>Mahasiswa yang sudah mendaftar & mengisi kuesioner</small>
	</div>

	<div class="row mb-3">
		<div class="col-lg-12">
			<a class="btn btn-primary btn-sm" target="_blank" href="print.php">
				<i class="fa fa-print"></i> &nbsp Print
			</a>
			<a class="btn btn-primary btn-sm" href="excel.php">
				<i class="fa fa-print"></i> &nbsp Export Excel
			</a>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			
			<div class="table-responsive">
				<table class="table table-bordered table-striped" id="table-datatable">
					<thead>
						<tr>
							<th width="1%">NO</th>
							<th>NAMA</th>
							<th>NPM</th>
							<th>PRODI</th>
							<th>EMAIL</th>
							<th width="15%">OPSI</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						$data = mysqli_query($koneksi,"SELECT * FROM mahasiswa,prodi WHERE mahasiswa_prodi=prodi_id");
						while($d = mysqli_fetch_array($data)){
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['mahasiswa_nama']; ?></td>
								<td><?php echo $d['mahasiswa_npm']; ?></td>
								<td><?php echo $d['prodi']; ?></td>
								<td><?php echo $d['mahasiswa_email']; ?></td>
								<td>    
									<a href="mahasiswa_survey.php?id=<?php echo $d['mahasiswa_id'] ?>" class="btn btn-info btn-sm">
										<i class="fa fa-file"></i> Lihat Kuesioner
									</a>
									
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_mahasiswa_<?php echo $d['mahasiswa_id'] ?>">
										<i class="fa fa-trash"></i>
									</button>

									<!-- modal hapus -->
									<div class="modal fade" id="hapus_mahasiswa_<?php echo $d['mahasiswa_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

													<p>Yakin ingin menghapus data ini ?</p>
													<small>Semua data yang terhubung dengan data ini akan ikut di hapus</small>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
													<a href="mahasiswa_hapus.php?id=<?php echo $d['mahasiswa_id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i>  Hapus</a>
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