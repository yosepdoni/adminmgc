
<?php
include '../config.php';
if (isset($_POST['save'])){
 $fileName = $_FILES['gambar']['name'];
  // Simpan ke Database
  $sql = "insert into upload (gambar, keterangan) values ('$fileName', '".$_POST['keterangan']."')";
  mysqli_query($conn, $sql);
  // Simpan di Folder Gambar
  move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
  echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>"; 
 } 
?>