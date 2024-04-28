<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$prodi  = $_POST['prodi'];

mysqli_query($koneksi, "update prodi set prodi='$prodi' where prodi_id='$id'");
header("location:prodi.php");