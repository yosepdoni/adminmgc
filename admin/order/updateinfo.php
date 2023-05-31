<?php 
// koneksi database
include '../../config.php';

// menangkap data yang di kirim dari form
$order_id = $_POST['order_id'];
$status_pengiriman = $_POST['status_pengiriman'];

// update data ke database
mysqli_query($conn,"UPDATE checkout SET status_pengiriman='$status_pengiriman' WHERE order_id='$order_id'");
echo "<script>window.location.href='../index.php?p=orders'</script>";

?>