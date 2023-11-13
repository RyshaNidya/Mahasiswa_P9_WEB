<?php
// include database connection file
include 'koneksi.php';
$nidn= $_POST['nidn'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jabatan=$_POST['jabatan'];
$result = mysqli_query($kon, "UPDATE dosen SET
nama='$nama',alamat='$alamat',jabatan='$jabatan' WHERE nidn='$nidn'");
// Redirect to homepage to display updated user in list
if($result){
  session_start();
    $_SESSION['tambah'] = "Data ".$nama." Berhasil Diupdate.";
  header("Location: dosen.php");
}
?>
