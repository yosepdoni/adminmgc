<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: PUT");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') :
    http_response_code(405);
    echo json_encode([
        'success' => 0,
        'message' => 'Invalid Request Method. HTTP method should be PUT',
    ]);
    exit;
endif;

require '../config.php';
$database = new Database();
$conn = $database->dbConnection();

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->cart_id)) {
    echo json_encode(['success' => 0, 'message' => 'Please provide the cart ID.']);
    exit;
}

try {

    $fetch_cart = "SELECT * FROM `cart` WHERE cart_id=:cart_id";
    $fetch_stmt = $conn->prepare($fetch_cart);
    $fetch_stmt->bindValue(':cart_id', $data->cart_id, PDO::PARAM_INT);
    $fetch_stmt->execute();

    if ($fetch_stmt->rowCount() > 0) :

        $row = $fetch_stmt->fetch(PDO::FETCH_ASSOC);
        $cart_qty = isset($data->qty) ? $data->qty : $row['qty'];

        $update_query = "UPDATE `cart` SET qty = :qty 
        WHERE cart_id = :cart_id";

        $update_stmt = $conn->prepare($update_query);

        $update_stmt->bindValue(':qty', htmlspecialchars(strip_tags($cart_qty)), PDO::PARAM_STR);
        $update_stmt->bindValue(':cart_id', $data->cart_id, PDO::PARAM_INT);


        if ($update_stmt->execute()) {

            echo json_encode([
                'success' => 1,
                'message' => 'cart updated successfully'
            ]);
            exit;
        }

        echo json_encode([
            'success' => 0,
            'message' => 'cart Not updated. Something is going wrong.'
        ]);
        exit;

    else :
        echo json_encode(['success' => 0, 'message' => 'Invalid ID. No cart found by the ID.']);
        exit;
    endif;
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => 0,
        'message' => $e->getMessage()
    ]);
    exit;
}