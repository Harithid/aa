<?php include 'header.php'; ?>
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card" style="min-height: 500px">
        <div class="card-body pt-4">

          <center>

            <h4>KUESIONER MAHASISWA</h4>
            <small>Isi data diri dan data pertanyaan berikut dengan baik dan benar.</small>

          </center>

          <br>

          <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert'] == "sudah"){
              echo "<div class='text-center alert alert-danger'><b>MAAF!</b> <br> ANDA SUDAH PERNAH MENGISI KUESIONER SEBELUMNYA!</div>";
            }else if($_GET['alert'] == "selesai"){
              echo "<div class='text-center alert alert-success'><b>DATA JAWABAN KUESIONER ANDA TELAH TERSIMPAN</b> <br> TERIMA KASIH TELAH MELUANGKAN WAKTU</div>";
            }
          }
          ?>


          <form action="survey_act.php" method="post">

            <h5>Data Mahasiswa</h5>
            <hr>
            <div class="row">

              <div class="col-lg-6">

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" required="required" placeholder="Misal : Jhony">
                </div>

              </div>

              <div class="col-lg-6">

                <div class="form-group">
                  <label>NPM</label>
                  <input type="number" name="npm" class="form-control" required="required" placeholder="Misal : 120170020">
                </div>
                
              </div>

              <div class="col-lg-6">

                <div class="form-group">
                  <label>Program Studi</label>
                  <select name="prodi" class="form-control" required="required">
                    <option value="">- Pilih program studi</option>
                    <?php 
                    $prodi = mysqli_query($koneksi,"SELECT * FROM prodi order by prodi asc");
                    while($p = mysqli_fetch_array($prodi)){
                      ?>
                      <option value="<?php echo $p['prodi_id'] ?>"><?php echo $p['prodi'] ?></option>
                      <?php 
                    }
                    ?>
                  </select>
                </div>
                
              </div>

              <div class="col-lg-6">

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" required="required" placeholder="Misal : Jhony@jhony.com">
                </div>
                
              </div>

            </div>
            
            <br>

            <h5>Isi Kuesioner</h5>
            <hr>

            <?php 
            $no = 1;
            $pertanyaan = mysqli_query($koneksi,"SELECT * FROM pertanyaan");
            while($p = mysqli_fetch_array($pertanyaan)){
              $nox = $no++;
              ?>
              <div class="form-group">
                <?php echo $nox; ?>.
                <label><?php echo $p['pertanyaan'] ?></label>
                <input type="hidden" name="pertanyaan[<?php echo $nox ?>]" value="<?php echo $p['pertanyaan_id'] ?>">
                <br>
                <?php 
                $id_pertanyaan = $p['pertanyaan_id'];
                $jawaban = mysqli_query($koneksi,"SELECT * FROM jawaban WHERE jawaban_pertanyaan='$id_pertanyaan'");
                while($j = mysqli_fetch_array($jawaban)){
                  ?>
                  <input class="ml-3" type="radio" name="jawaban[<?php echo $nox ?>]" value="<?php echo $j['jawaban_id'] ?>" required="required"> <?php echo $j['jawaban'] ?> <br>
                  <?php 
                }
                ?>
              </div>
              <?php 
            }
            ?>

            <br>
            <center>
              <small class="text-muted"><i>Pastikan semua jawaban sudah benar sebelum menyelesaikan kuesioner.</i></small>
              <br>
              <br>
              <input type="checkbox" name="setuju" required="required"> Ya, kuesioner telah diisi dengan benar
            </center>

            <br>
            <br>
            <input type="submit" value="SELESAI" class="btn btn-primary btn-block">
            <br>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<?php include 'footer.php'; ?>