<?php 
  include "koneksi.php";

  session_start();
  $nidn = $_POST['nidn'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jabatan = $_POST['jabatan'];

  $input = mysqli_query($kon, 
                        "INSERT INTO dosen 
                        VALUES('$nidn','$nama', '$alamat', '$jabatan')")
                        or die(mysqli_error($kon));
  if($input){
    session_start();
    $_SESSION['tambah'] = "Data ".$nama." Berhasil Ditambahkan.";
    header("Location:dosen.php");
  }else{
    echo "Gagal Menyimpan Data!";
  }

?>