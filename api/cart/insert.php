<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if ($_SERVER['REQUEST_METHOD'] !== 'POST') :
    http_response_code(405);
    echo json_encode([
        'success' => 0,
        'message' => 'Invalid Request Method. HTTP method should be Cart',
    ]);
    exit;
endif;

require '../config.php';
$database = new Database();
$conn = $database->dbConnection();

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->user_id) || !isset($data->product_id) || !isset($data->product) || !isset($data->category) || !isset($data->qty) || !isset($data->price) || !isset($data->total) ) :

    echo json_encode([
        'success' => 0,
        'message' => 'Please fill all the fields | user_id, product_id, product, category, qty, price, total.',
    ]);
    exit;

elseif (empty(trim($data->user_id)) || empty(trim($data->product_id)) || empty(trim($data->product)) || empty(trim($data->category)) || empty(trim($data->qty)) || empty(trim($data->price)) || empty(trim($data->total)) ) :

    echo json_encode([
        'success' => 0,
        'message' => 'Oops! empty field detected. Please fill all the fields.',
    ]);
    exit;

endif;

try {

    $user_id = htmlspecialchars(trim($data->user_id));
    $product_id = htmlspecialchars(trim($data->product_id));
    $product = htmlspecialchars(trim($data->product));
    $category = htmlspecialchars(trim($data->category));
    $qty = htmlspecialchars(trim($data->qty));
    $price = htmlspecialchars(trim($data->price));
    $total = htmlspecialchars(trim($data->total));
    // $total = $qty * $price; 

    $query = "INSERT INTO `cart`(user_id,product_id,product,category,qty,price,total) VALUES(:user_id,:product_id,:product,:category,:qty,:price,:total)";

    $stmt = $conn->prepare($query);

    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->bindValue(':product_id', $product_id, PDO::PARAM_STR);
    $stmt->bindValue(':product', $product, PDO::PARAM_STR);
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->bindValue(':qty', $qty, PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, PDO::PARAM_STR);
    $stmt->bindValue(':total', $total, PDO::PARAM_STR);

    if ($stmt->execute()) {

        http_response_code(201);
        echo json_encode([
            'success' => 1,
            'message' => 'Data Inserted Successfully.'
        ]);
        exit;
    }
    
    echo json_encode([
        'success' => 0,
        'message' => 'Data not Inserted.'
    ]);
    exit;

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => 0,
        'message' => $e->getMessage()
    ]);
    exit;
}