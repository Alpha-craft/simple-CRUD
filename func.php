<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'web-lks';
$conn = mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName);
function query($query){
  global $conn;
  $results = mysqli_query($conn,$query);
  return $results;
}
function upload(){
  $ekstensi = ['jpg','jpeg','png'];
  $namaFile = $_FILES['gambar']['name'];
  $tipeFile = $_FILES['gambar']['type'];
  $tmpFile = $_FILES['gambar']['tmp_name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $ekstensiFile = strtolower( explode(".",$namaFile)['1']);
  
  //generating nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru.= ".$ekstensiFile";
  //memindahkan file
  move_uploaded_file($tmpFile,'assets/pict/'.$namaFileBaru);

  return $namaFileBaru;

}
?>