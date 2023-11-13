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
  <title>DAFTAR PEGAWAI</title>
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
      <h3><i class="fas fa-users mr-2"></i> Daftar Pegawai</h3>
      <hr>
      <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah">
        <i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA PEGAWAI</a>
      
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
            <th scope="col">NO</th>
            <th scope="col">NIK</th>
            <th scope="col">NAMA PEGAWAI</th>
            <th scope="col">BAGIAN</th>
            <th scope="col" colspan="3">AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'koneksi.php';
          $query = mysqli_query($kon, "SELECT * FROM pegawai ORDER BY nama");
          $no = 1;
          while ($data = mysqli_fetch_assoc($query)) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nik'] ?></td>
              <td><?php echo $data['nama'] ?></td>
              <td><?php echo $data['bagian'] ?></td>
              <td>
                <a href="#">
                  <i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="modal" data-target="#ubah<?php echo $data['nik']; ?>">Edit</i>
                </a>
                <a href="#">
                  <i class="fas fa-edit bg-danger p-2 text-white rounded" data-toggle="modal" data-target="#hapus<?php echo $data['nik']; ?>">Hapus</i>
                </a>
              </td>
            </tr>

            <!-- update Modal -->
            <div class="example-modal">
              <div class="modal fade" id="ubah<?php echo $data['nik']; ?>" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Edit Data Pegawai</h3>
                    </div>
                    <div class="modal-body">
                      <form action="update.php" method="post" role="form">
                        <?php
                        $nik = $data['nik'];
                        $query1 = mysqli_query(
                          $kon,
                          "SELECT * FROM pegawai WHERE nik = '$nik'"
                        );

                        while ($data1 = mysqli_fetch_assoc($query1)) {
                        ?>

                          <div class="form-group">
                            <div class="row">
                              <label for="nik" class="col-sm-3 control-label text-right">NIK</label>
                              <div class="col-sm-8">
                                <input type="text" name="nik" id="nik" class="form-control" value="<?php echo $data1['nik']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label for="nama" class="col-sm-3 control-label text-right">NAMA</label>
                              <div class="col-sm-8">
                                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data1['nama']; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label for="bagian" class="col-sm-3 control-label text-right">BAGIAN</label>
                              <div class="col-sm-8">
                                <input type="text" name="bagian" id="bagian" class="form-control" value="<?php echo $data1['bagian']; ?>">
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
              <div class="modal fade" id="hapus<?php echo $data['nik']; ?>" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                    </div>
                    <div class="modal-body">
                      <h5 align="center">Apakah Anda Yakin Ingin Menghapus Data <?php echo $data['nama']; ?>
                        <strong><span class="grt"></span></strong>?
                      </h5>
                    </div>
                    <div class="modal-footer">
                      <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                      <a href="hapus.php?nik=<?php echo $data['nik']; ?>" class="btn btn-primary">Hapus</a>
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
              <h3 class="modal-title">Tambah Data Pegawai</h3>
            </div>
            <div class="modal-body">
              <form action="simpan.php" method="post" role="form">
                <div class="form-group">
                  <div class="row">
                    <label for="nik" class="col-sm-3 control-label text-right">NIK</label>
                    <div class="col-sm-8">
                      <input type="number" name="nik" id="nik" class="form-control" placeholder="NIK" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label for="nama" class="col-sm-3 control-label text-right">NAMA</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama" id="nama" class="form-control" placeholder="NAMA" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label for="bagian" class="col-sm-3 control-label text-right">BAGIAN</label>
                    <div class="col-sm-8">
                      <input type="text" name="bagian" id="bagian" class="form-control" placeholder="bagian" required>
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