<?php

include '../..//config.php';

$email = $_POST['email'];
$password = md5($_POST['pwd']);


$sql = "SELECT * FROM users WHERE email = '$email' AND pwd='$password' ";


$result = $conn->query($sql);
if($result->num_rows > 0) {
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data []= $row;
    }
    echo json_encode(array(
        // "success"=>true,
         $data[0],
    ));
} else {
    echo json_encode(array(
        "success"=>false,        
    ));
}