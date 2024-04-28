<?php 
include '../koneksi.php';
$prodi = $_POST['prodi'];

mysqli_query($koneksi, "insert into prodi values (NULL,'$prodi')");
header("location:prodi.php");