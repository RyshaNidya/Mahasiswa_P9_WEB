<?php 
  include 'koneksi.php';

  $nidn = $_GET['nidn'];
  $hasil = mysqli_query($kon, "SELECT * FROM dosen WHERE nidn = '$nidn'");
  $data = mysqli_fetch_array($hasil);
  $nama = $data['nama'];
  $result = mysqli_query($kon, 
                  "DELETE FROM dosen WHERE nidn = '$nidn'");

  if($result){
    session_start();
    $_SESSION['tambah'] = "Data ".$nama." Berhasil Dihapus.";
    header("location:dosen.php");
  }
?>