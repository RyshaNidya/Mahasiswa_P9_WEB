<?php 
  include "koneksi.php";

  session_start();
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $bagian = $_POST['bagian'];

  $input = mysqli_query($kon, 
                        "INSERT INTO pegawai 
                        VALUES('$nik','$nama', '$bagian')")
                        or die(mysqli_error($kon));
  if($input){
    session_start();
    $_SESSION['tambah'] = "Data ".$nama." Berhasil Ditambahkan.";
    header("Location:pegawai.php");
  }else{
    echo "Gagal Menyimpan Data!";
  }

?>