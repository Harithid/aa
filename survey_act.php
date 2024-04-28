<?php 
include 'koneksi.php';
$nama = $_POST['nama'];
$npm = $_POST['npm'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];
$pertanyaan = $_POST['pertanyaan'];
$jawaban = $_POST['jawaban'];

// cek sudah isi
$cek = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_npm='$npm'");
$c = mysqli_num_rows($cek);
if($c > 0){
	// jika sudah
	header("location:survey.php?alert=sudah");
}else{
	// jika belum
	mysqli_query($koneksi, "insert into mahasiswa values (NULL,'$nama','$npm','$prodi','$email')");

	$last_id = mysqli_insert_id($koneksi);

	$jumlah = count($pertanyaan);
	for($a = 1; $a <= $jumlah; $a++){
		$p = $pertanyaan[$a];
		$j = $jawaban[$a];
		mysqli_query($koneksi, "insert into polling values (NULL,'$last_id','$p','$j')");
	}

	header("location:survey.php?alert=selesai");
}
