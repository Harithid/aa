<?php include 'header.php'; ?>


<div class="container">

	<div class="mb-4">
		<h4>Data Kuesioner Mahasiswa</h4>
		<small>Detail data kuesioner mahasiswa.</small>
	</div>

	<div class="row mb-3">
		<div class="col-lg-12">
			<a class="btn btn-primary btn-sm" href="mahasiswa.php">
				<i class="fa fa-arrow-left"></i> &nbsp Kembali
			</a>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			
			<div class="row">
				<div class="col-lg-5">
					<h5>Data Mahasiswa</h5>
					<?php 
					$id = $_GET['id'];
					$data = mysqli_query($koneksi,"SELECT * FROM mahasiswa,prodi WHERE mahasiswa_prodi=prodi_id and mahasiswa_id='$id'");
					while($d = mysqli_fetch_array($data)){
						?>
						<table class="table table-bordered table-striped">
							<tr>
								<td>Nama</td>
								<td><?php echo $d['mahasiswa_nama']; ?></td>
							</tr>
							<tr>
								<td>NPM</td>
								<td><?php echo $d['mahasiswa_npm']; ?></td>
							</tr>
							<tr>
								<td>PRODI</td>
								<td><?php echo $d['prodi']; ?></td>
							</tr>
							<tr>
								<td>EMAIL</td>
								<td><?php echo $d['mahasiswa_email']; ?></td>
							</tr>
						</table>
						<?php 
					}
					?>
				</div>

				<div class="col-lg-7">
					<h5>Data Kuesioner</h5>
					<?php 
					$no = 1;
					$polling = mysqli_query($koneksi,"SELECT * FROM polling,mahasiswa,pertanyaan,jawaban WHERE mahasiswa_id=polling_mahasiswa AND mahasiswa_id='$id' AND polling_pertanyaan=pertanyaan_id AND polling_jawaban=jawaban_id");
					while($p = mysqli_fetch_array($polling)){
						?>
						<table class="table table-bordered table-striped">
							<tr>
								<td width="1%"><?php echo $no++ ?></td>
								<td><?php echo $p['pertanyaan']; ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?php echo $p['jawaban']; ?></td>
							</tr>
						</table>
						<?php 
					}
					?>
				</div>

			</div>

		</div>
	</div>

</div>


<?php include 'footer.php'; ?>