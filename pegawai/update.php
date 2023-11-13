<?php
// include database connection file
include 'koneksi.php';
$nik= $_POST['nik'];
$nama=$_POST['nama'];
$bagian=$_POST['bagian'];
$result = mysqli_query($kon, "UPDATE pegawai SET
nama='$nama',bagian='$bagian' WHERE nik='$nik'");
// Redirect to homepage to display updated user in list
if($result){
  session_start();
    $_SESSION['tambah'] = "Data ".$nama." Berhasil Diupdate.";
  header("Location: pegawai.php");
}
?>
