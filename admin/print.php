<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Administrator - Sistem Informasi Kuesioner Mahasiswa Online</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

  <?php 
  include '../koneksi.php';
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../index.php?alert=belum_login");
  }
  ?>

</head>
<body>

  <center><h5>Data Kuesioner Mahasiswa</h5></center>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th width="1%">NO</th>
        <th>NAMA</th>
        <th>NPM</th>
        <th>PRODI</th>
        <th>EMAIL</th>
        <th>SURVEY</th>
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
            <?php 
            $no2 = 1;
            $id = $d['mahasiswa_id'];
            $polling = mysqli_query($koneksi,"SELECT * FROM polling,mahasiswa,pertanyaan,jawaban WHERE mahasiswa_id=polling_mahasiswa AND mahasiswa_id='$id' AND polling_pertanyaan=pertanyaan_id AND polling_jawaban=jawaban_id");
            while($p = mysqli_fetch_array($polling)){
              ?>
              <table class="table">
                <tr>
                  <td class="p-1"><?php echo $p['pertanyaan']; ?></td>
                </tr>
                <tr>
                  <td class="p-1"><?php echo $p['jawaban']; ?></td>
                </tr>
              </table>
              <?php 
            }
            ?>
          </td>
        </tr>
        <?php 
      }
      ?>
    </tbody>
  </table>

  <script type="text/javascript">
    window.print();
  </script>
</body>
</html>
