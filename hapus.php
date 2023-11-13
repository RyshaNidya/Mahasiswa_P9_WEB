<?php 
  include 'koneksi.php';

  $nim = $_GET['nim'];
  $hasil = mysqli_query($kon, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
  $data = mysqli_fetch_array($hasil);
  $nama = $data['nama'];
  $result = mysqli_query($kon, 
                  "DELETE FROM mahasiswa WHERE nim = '$nim'");

  if($result){
    session_start();
    $_SESSION['tambah'] = "Data ".$nama." Berhasil Dihapus.";
    header("location:index.php");
  }
?>