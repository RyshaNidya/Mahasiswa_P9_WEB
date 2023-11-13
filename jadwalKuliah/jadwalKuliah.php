<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../admin/admin.css">
  <link rel="stylesheet" type="text/css" href="../admin/fontawesome/css/all.min.css">
  <title>JADWAL KULIAH</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <a class="navbar-brand nav-link text-white" href="#">SELAMAT DATANG ADMIN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0 ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 text-white" type="submit">Search</button>
      </form>
      <div class="icon ml-4">
        <h5>
          <i class="fas fa-envelope-square mr-3"></i>
          <i class="fas fa-bell-slash mr-3"></i>
          <i class="fas fa-sign-out-alt mr-3"></i>
        </h5>
      </div>
    </div>
  </nav>
  <div class="row no-gutters mt-5">
    <div class="col-md-2 bg-info mt-2 pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a class="nav-link active text-white" href="../dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../index.php"><i class="fas fa-user-graduate mr-2"></i>Daftar Mahasiswa</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../dosen/dosen.php"><i class="fas fa-chalkboard-teacher mr-2"></i>Daftar Dosen</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pegawai/pegawai.php"><i class="fas fa-users mr-2"></i>Daftar Pegawai</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../jadwalKuliah/jadwalKuliah.php"><i class="far fa-calendar-alt mr-2"></i>Jadwal Kuliah</a>
          <hr class="bg-secondary">
        </li>
      </ul>
    </div>

    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-calendar-alt mr-2"></i> Jadwal Kuliah</h3>
      <hr>
      <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah">
        <i class="fas fa-plus-circle mr-2"></i>TAMBAH JADWAL KULIAH 
      </a><br>
      <div class="d-flex justify-content-end">
        <a href="today.php" class="btn btn-info mb-2  " >
          <i class="fas fa-eye mr-2"></i>JADWAL HARI INI 
        </a>
      </div>
      
        <?php 
        session_start();
        if(isset($_SESSION['tambah'])){
        ?>
          <div class="alert alert-success" role="alert">
            <?php 
              echo $_SESSION['tambah'];
            ?>
          </div>
        <?php 
          session_destroy();
          } ?>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">NO/HARI</th>
            <th scope="col">KELAS</th>
            <th scope="col">KODE</th>
            <th scope="col">DOSEN</th>
            <th scope="col">MATA KULIAH</th>
            <th scope="col">JAM</th>
            <th scope="col">TANGGAL</th>
            <th scope="col">RUANG</th>
            <th scope="col" colspan="3">AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'koneksi.php';
            
            $dos = mysqli_query($kon, "SELECT dosen.*, jadwal_kuliah.*
                      FROM dosen INNER JOIN jadwal_kuliah ON dosen.nidn=jadwal_kuliah.nidn 
                      ORDER BY jadwal_kuliah.tgl");
                      
            while ($data = mysqli_fetch_assoc($dos)) {
          ?>
            <tr>
              <th><?php echo $data['hari'] ?></th>
              <td><?php echo $data['kelas_mhs'] ?></td>
              <td><?php echo $data['kode_matkul'] ?></td>
              <td><?php echo $data['nidn'] ." - ". $data['nama'] ?></td>
              <td><?php echo $data['matkul'] ?></td>
              <td><?php echo $data['jam'] ?></td>
              <td 
                <?php 
                  if($data['tgl'] == date("Y-m-d")){
                    echo "bgcolor='red' class='text-white rounded shadow-lg '";
                  } 
                ?>>
                <?php echo $data['tgl'];
                  if($data['tgl'] == date("Y-m-d")){
                    echo "<br><br> <span class='badge bg-dark shadow rounded-pill border'> Hari Ini!!</span>";
                  } 
                  ?>
              </td>
              <td><?php echo $data['ruang'] ?></td>
              <td align="center">
                <a href="#">
                  <i class="fas fa-edit bg-success p-2 text-white rounded m-2" data-toggle="modal" data-target="#ubah<?php echo $data['id']; ?>">Edit</i>
                </a>
                <a href="#">
                  <i class="fas fa-edit bg-danger p-2 text-white rounded" data-toggle="modal" data-target="#hapus<?php echo $data['id']; ?>">Hapus</i>
                </a>
              </td>
            </tr>

            <!-- update Modal -->
            <div class="example-modal">
              <div class="modal fade" id="ubah<?php echo $data['id']; ?>" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Edit Data Jadwal Kuliah</h3>
                    </div>
                    <div class="modal-body">
                      <form action="update.php" method="post" role="form">
                        <?php
                        $id = $data['id'];
                        $dosen = $data['nama'];
                        $dos1 = mysqli_query($kon, "SELECT dosen.*, jadwal_kuliah.*
                        FROM dosen INNER JOIN jadwal_kuliah ON dosen.nidn=jadwal_kuliah.nidn 
                        WHERE id = $id");

                        while ($data1 = mysqli_fetch_assoc($dos1)) {
                        ?>
                        <!-- menyimpan ID -->

                        <input type="number" name="id" id="id" value="<?php echo $data['id'] ?>" hidden>
                          <div class="form-group">
                            <div class="row">
                              <label for="hari" class="col-sm-3 control-label text-right">HARI</label>
                              <div class="col-sm-8">
                                <select name="hari" id="hari" class="form-control" >
                                  <option value="<?php echo $data1['hari'] ?>" selected ><?php echo $data1['hari'] ?></option>
                                  <option value="SENIN" >SENIN</option>
                                  <option value="SELASA" >SELASA</option>
                                  <option value="RABU" >RABU</option>
                                  <option value="KAMIS" >KAMIS</option>
                                  <option value="JUMAT" >JUMAT</option>
                                </select>
                                <!-- <input type="text" name="hari" id="hari" class="form-control" value="<?php echo $data1['hari']; ?>" > -->
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label for="kelas_mhs" class="col-sm-3 control-label text-right">KELAS MAHASISWA</label>
                              <div class="col-sm-8">
                                <input type="text" name="kelas_mhs" id="kelas_mhs" class="form-control" 
                                value="<?php echo $data1['kelas_mhs']; ?>" placeholder="contoh : IF 1A PAGI">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label for="kode_matkul" class="col-sm-3 control-label text-right">KODE</label>
                              <div class="col-sm-8">
                                <input type="text" name="kode_matkul" id="kode_matkul" class="form-control" 
                                placeholder="Kode Mata Kuliah" value="<?php echo $data1['kode_matkul']; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label for="nidn" class="col-sm-3 control-label text-right">DOSEN</label>
                              <div class="col-sm-8">
                                <select name="nidn" id="nidn" class="form-control">
                                  <?php 
                                  $dt = mysqli_query($kon, "SELECT * FROM dosen");

                                  while($isi = mysqli_fetch_assoc($dt)){

                                  ?>
                                  <option value="<?php echo $isi['nidn']; ?>"
                                  <?php 
                                  if($isi['nidn']== $data['nidn']){
                                    echo 'selected';
                                  } else {
                                    echo '';

                                  }
                                  ?>><?php echo $isi['nama']; ?></option>
                                  <?php } ?>
                                </select>
                                <!-- <input type="text" name="nidn" id="nidn" class="form-control" value="<?php echo $data1['nama']; ?>"> -->
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label for="matkul" class="col-sm-3 control-label text-right">MATA KULIAH</label>
                              <div class="col-sm-8">
                                <input type="text" name="matkul" id="matkul" class="form-control" 
                                placeholder="Mata Kuliah" value="<?php echo $data1['matkul']; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label for="jam" class="col-sm-3 control-label text-right">JAM</label>
                              <div class="col-sm-8">
                                <input type="text" name="jam" id="jam" class="form-control" 
                                placeholder="contoh : 07:00 - 09:00 WIB" value="<?php echo $data1['jam']; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label for="tgl" class="col-sm-3 control-label text-right">TANGGAL</label>
                              <div class="col-sm-8">
                                <input type="date" name="tgl" id="tgl" class="form-control" value="<?php echo $data1['tgl']; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label for="ruang" class="col-sm-3 control-label text-right">RUANG</label>
                              <div class="col-sm-8">
                                <input type="text" name="ruang" id="ruang" class="form-control" 
                                placeholder="Ruang/Tempat" value="<?php echo $data1['ruang']; ?>">
                              </div>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                          </div>

                        <?php } ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- hapus Modal -->
            <div class="example-modal">
              <div class="modal fade" id="hapus<?php echo $data['id']; ?>" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                    </div>
                    <div class="modal-body">
                      <h5 align="center">Apakah Anda Yakin Ingin Menghapus Jadwal Kuliah ini
                        <strong><span class="grt"></span></strong>?
                      </h5>
                    </div>
                    <div class="modal-footer">
                      <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                      <a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php
          }
          ?>
        </tbody>
      </table>




    </div>
    <!-- Simpan Modal  -->
    <div class="example-modal">
      <div class="modal fade" id="tambah" role="dialog" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Tambah Data Dosen</h3>
            </div>
            <div class="modal-body">
              <form action="simpan.php" method="post" role="form">
              <div class="form-group">
                <div class="row">
                  <label for="hari" class="col-sm-3 control-label text-right">HARI</label>
                  <div class="col-sm-8">
                    <select name="hari" id="hari" class="form-control" required>
                      <option value="" selected disabled>-- Hari --</option>
                      <option value="SENIN" >SENIN</option>
                      <option value="SELASA" >SELASA</option>
                      <option value="RABU" >RABU</option>
                      <option value="KAMIS" >KAMIS</option>
                      <option value="JUMAT" >JUMAT</option>
                    </select>
                    <!-- <input type="text" name="hari" id="hari" class="form-control" value="<?php echo $data1['hari']; ?>" > -->
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label for="kelas_mhs" class="col-sm-3 control-label text-right">KELAS MAHASISWA</label>
                  <div class="col-sm-8">
                    <input type="text" name="kelas_mhs" id="kelas_mhs" class="form-control" required 
                    placeholder="contoh : IF 1A PAGI">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label for="kode_matkul" class="col-sm-3 control-label text-right">KODE</label>
                  <div class="col-sm-8">
                    <input type="text" name="kode_matkul" id="kode_matkul" class="form-control" required 
                    placeholder="Kode Mata Kuliah">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label for="nidn" class="col-sm-3 control-label text-right">DOSEN</label>
                  <div class="col-sm-8">
                    <select name="nidn" id="nidn" class="form-control" required>
                      <?php 
                      $dt = mysqli_query($kon, "SELECT * FROM dosen");

                      while($isi = mysqli_fetch_assoc($dt)){

                      ?>
                      <option value="<?php echo $isi['nidn']; ?>"><?php echo $isi['nama']; ?></option>
                      <?php } ?>
                    </select>
                    <!-- <input type="text" name="nidn" id="nidn" class="form-control" value="<?php echo $datadosen['nama']; ?>"> -->
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label for="matkul" class="col-sm-3 control-label text-right">MATA KULIAH</label>
                  <div class="col-sm-8">
                    <input type="text" name="matkul" id="matkul" class="form-control" required placeholder="Mata Kuliah">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label for="jam" class="col-sm-3 control-label text-right">JAM</label>
                  <div class="col-sm-8">
                    <input type="text" name="jam" id="jam" class="form-control" required 
                    placeholder="contoh : 07:00 - 09:00 WIB">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label for="tgl" class="col-sm-3 control-label text-right">TANGGAL</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl" id="tgl" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label for="ruang" class="col-sm-3 control-label text-right">RUANG</label>
                  <div class="col-sm-8">
                    <input type="text" name="ruang" id="ruang" class="form-control" required 
                    placeholder="Ruang/Tempat">
                  </div>
                </div>
              </div>

                <div class="modal-footer">
                  <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal" >
                    Batal
                  </button>
                  <input type="submit" name="submit" class="btn btn-primary" value="Tambah">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>