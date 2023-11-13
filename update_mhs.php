<?php
// include database connection file
include 'koneksi.php';
$nim= $_POST['nim'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jurusan=$_POST['jurusan'];
$result = mysqli_query($kon, "UPDATE mahasiswa SET
nama='$nama',alamat='$alamat',jurusan='$jurusan' WHERE nim='$nim'");
// Redirect to homepage to display updated user in list
if($result){
  session_start();
  $_SESSION['tambah'] = "Data ".$nama." Berhasil Diupdate.";
  header("Location:index.php");
}else{
  echo "Gagal Menyimpan Data!";
}
