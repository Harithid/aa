<?php 
include '../koneksi.php';
$id  = $_GET['id'];
$pertanyaan  = $_GET['pertanyaan'];

// hapus mahasiswa
mysqli_query($koneksi, "delete from mahasiswa where mahasiswa_id='$id'");

// hapus polling
mysqli_query($koneksi, "delete from polling where polling_mahasiswa='$id'");

header("location:mahasiswa.php");