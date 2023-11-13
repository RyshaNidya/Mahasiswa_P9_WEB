<?php
include "koneksi.php";

$nim = $_GET['nim'];
$result = mysqli_query(
  $kon,
  "SELECT * FROM mahasiswa WHERE nim = '$nim'"
);

while ($data = mysqli_fetch_array($result)) {
  $nama = $data['nama'];
  $alamat = $data['alamat'];
  $jurusan = $data['jurusan'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>ADMINISTRATOR</title>

  <link rel="stylesheet" href="admin/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin/admin.css">
  <link rel="stylesheet" type="text/css" href="admin/fontawesome/css/all.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <a href="" class="navbar-brand">SELAMAT DATANG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form action="" class="form-inline my-2 my-lg-0 ml-auto">
        <input type="search" class="form-control mr-sm-2" placeholder="Search" name="" id="" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a href="" class="nav-link active text-white">
            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
          </a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a href="" class="nav-link text-white">
            <i class="fas fa-user-graduate mr-2"></i>Daftar Mahasiswa
          </a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a href="" class="nav-link text-white">
            <i class="fas fa-users mr-2"></i>Daftar Pegawai
          </a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a href="" class="nav-link text-white">
            <i class="fas fa-calendar-alt mr-2"></i>Jadwal Kuliah
          </a>
          <hr class="bg-secondary">
        </li>
      </ul>
    </div>

    <!-- KONTEN -->

    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-user-graduate mr-2"></i>Ubah Data Mahasiswa</h3>
      <hr>
      <form action="update_mhs.php" method="post">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="nim">NIM</label>
            <input type="number" name="nim" id="nim" class="form-control" value="<?php echo $nim; ?>" readonly>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="nama">NAMA</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="alamat">ALAMAT</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $alamat; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="jurusan">JURUSAN</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?php echo $jurusan; ?>">
          </div>
        </div>

        <button type="submit" class="btn btn-primary">UPDATE</button>
      </form>
    </div>

  </div>
</body>

</html>