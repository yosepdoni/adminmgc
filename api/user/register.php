user/register

<?php
 include '../../config.php';
header('content-type:application/json');
$method = $_SERVER['REQUEST_METHOD'];

$result = array();

if ($method=='POST') {
    # code...
    if (isset($_POST['email']) AND isset($_POST['nama']) AND isset($_POST['pwd'])) {
        # code...
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = md5($_POST['pwd']);

    $result['status'] = [
        "code" => 200,
        "code" => 'request valid'
        ];

    
    $sql = "INSERT INTO users ('id_usr',email, nama, pwd, telp, provinsi, kota, kecamatan, kelurahan, alamat, level ) VALUES('','$email','$nama','$password','','','','','','','')";
    $conn->query($sql);
    $result['result'] = [
        "email" => $email,
        "nama" => $nama,
        "password" => $password,
    ];
    }else{
        $result['status']=[
            "code" => 400,
        "code" => 'request invalid'
        ];
    }
    }else{
        $result ['status']=[
            "code" => 400,
            "code" => 'method not valid' 
        ];
    }
    echo json_encode($result);

?>