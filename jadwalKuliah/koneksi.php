<?php 

$kon = mysqli_connect("localhost", "root", "", "pdb_akademik");

if(!$kon){
  echo "Gagal Koneksi : " . mysqli_connect_error();
  die();
}

?>