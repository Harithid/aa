<?php 
include '../koneksi.php';
$id  = $_GET['id'];

// hapus prodi
mysqli_query($koneksi, "delete from prodi where prodi_id='$id'");


// ubah prodi prodi ke lainnya
mysqli_query($koneksi, "update mahasiswa set mahasiswa_prodi='1' where mahasiswa_prodi='$id'");
header("location:prodi.php");