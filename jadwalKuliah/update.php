<?php
// include database connection file
include 'koneksi.php';
$id = $_POST['id'];
$hari = $_POST['hari'];
$kelas_mhs = $_POST['kelas_mhs'];
$kode_matkul = $_POST['kode_matkul'];
$nidn = $_POST['nidn'];
$matkul = $_POST['matkul'];
$jam = $_POST['jam'];
$tgl = $_POST['tgl'];
$ruang = $_POST['ruang'];
$result = mysqli_query($kon, "UPDATE jadwal_kuliah SET
                        kode_matkul='$kode_matkul', nidn = '$nidn',
                        hari = '$hari', kelas_mhs='$kelas_mhs', matkul = '$matkul',
                        jam = '$jam', tgl = '$tgl', ruang = '$ruang' WHERE id = $id");
// Redirect to homepage to display updated user in list
if($result){
  session_start();
    $_SESSION['tambah'] = "Jadwal Kuliah id ". $id. " Berhasil Diupdate.";
  header("Location: jadwalKuliah.php");
}
?>
