<?php 
  include 'koneksi.php';

  $nik = $_GET['nik'];
  $hasil = mysqli_query($kon, "SELECT * FROM pegawai WHERE nik = '$nik'");
  $data = mysqli_fetch_array($hasil);
  $nama = $data['nama'];
  $result = mysqli_query($kon, 
                  "DELETE FROM pegawai WHERE nik = '$nik'");

  if($result){
    session_start();
    $_SESSION['tambah'] = "Data ".$nama." Berhasil Dihapus.";
    header("location:pegawai.php");
  }
?>