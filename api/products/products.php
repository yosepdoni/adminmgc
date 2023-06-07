<?php
include ('config.php');
$conn=mysqli_query($conn,"SELECT * FROM products");
$data=mysqli_fetch_all($conn,MYSQLI_ASSOC);
echo json_encode($data);

?>