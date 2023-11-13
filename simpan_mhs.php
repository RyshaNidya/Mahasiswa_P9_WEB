<?php 
  include "koneksi.php";

  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jurusan = $_POST['jurusan'];

  $input = mysqli_query($kon, 
                        "INSERT INTO mahasiswa 
                        VALUES('$nim','$nama', '$alamat', '$jurusan')")
                        or die(mysqli_error($kon));
  if($input){
    session_start();
    $_SESSION['tambah'] = "Data ".$nama." Berhasil Ditambahkan.";
    header("Location:index.php");
  }else{
    echo "Gagal Menyimpan Data!";
  }

  

?>