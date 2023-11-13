<?php 
  include 'koneksi.php';

  $id = $_GET['id'];
  $result = mysqli_query($kon, 
                  "DELETE FROM jadwal_kuliah WHERE id = '$id'");

  if($result){
    session_start();
    $_SESSION['tambah'] = "Data Berhasil Dihapus.";
    header("location:jadwalKuliah.php");
  }
?>