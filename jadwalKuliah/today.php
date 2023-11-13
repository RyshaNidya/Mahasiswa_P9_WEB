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
  <title>ADMINISTRATOR</title>
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
      <h3><i class="fas fa-calendar-alt mr-2"></i> Jadwal Kuliah Hari Ini</h3>
      <hr>
      
      <div class="d-flex justify-content-end">
        <a href="jadwalKuliah.php" class="btn btn-info mb-2  " >
          <i class="fas fa-arrow-left mr-2"></i>Kembali
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
          </tr>
        </thead>
        <tbody>
          <?php
            include 'koneksi.php';
            
            $dos = mysqli_query($kon, "SELECT dosen.*, jadwal_kuliah.*
                      FROM dosen INNER JOIN jadwal_kuliah ON dosen.nidn=jadwal_kuliah.nidn 
                      ORDER BY jadwal_kuliah.tgl");
                      
            while ($data = mysqli_fetch_assoc($dos) and $data['tgl'] == date("Y-m-d")) {
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
                    echo "<br> <span class='badge bg-dark shadow rounded-pill border mt-2'> Hari Ini!!</span>";
                  } 
                  ?>
              </td>
              <td><?php echo $data['ruang'] ?></td>
            </tr>

          <?php
          }
          ?>
        </tbody>
      </table>




    </div>
  

  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>