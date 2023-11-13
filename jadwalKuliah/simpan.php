<?php 
  include "koneksi.php";

  $hari = $_POST['hari'];
  $kelas_mhs = $_POST['kelas_mhs'];
  $kode_matkul = $_POST['kode_matkul'];
  $nidn = $_POST['nidn'];
  $matkul = $_POST['matkul'];
  $jam = $_POST['jam'];
  $tgl = $_POST['tgl'];
  $ruang = $_POST['ruang'];

  $input = mysqli_query($kon, 
                        "INSERT INTO jadwal_kuliah 
                        VALUES('', '$kode_matkul','$nidn', '$hari', '$kelas_mhs', '$matkul', '$jam',
                        '$tgl', '$ruang')")
                        or die(mysqli_error($kon));
  if($input){
    session_start();
    $_SESSION['tambah'] = "Jadwal Kuliah Berhasil Ditambahkan.";
    header("Location:jadwalKuliah.php");
  }else{
    echo "Gagal Menyimpan Data!";
  }

?>