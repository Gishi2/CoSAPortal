<?php
$rawData = file_get_contents('php://input');
$decodedData = json_decode($rawData, true);
error_log('PHP script executed successfully');

try {
    if ($decodedData === null) {
        echo "Error decoding JSON data";
        die();
    } 

    $merchandiseId = $decodedData['merchandiseId'];
    $price = (float)$decodedData['price'];
    $quantity = (int)$decodedData['quantity']; 
    $sizes = $decodedData['sizes']; 

    $totalPrice = $price * $quantity;

    require_once "dbh.inc.php";

    $query = "INSERT INTO cart (merchandise_id, quantity, total_price, size) VALUES
    (:merchandiseId, :quantity, :totalPrice, :sizes);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":merchandiseId", $merchandiseId);
    $stmt->bindParam(":totalPrice", $totalPrice);
    $stmt->bindParam(":quantity", $quantity);
    $stmt->bindParam(":sizes", $sizes);
    $stmt->execute();

    $pdo = null; $stmt = null;
    header("Location: /Merchandise/merchandise.php?insertsuccessful");
    die();
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
    http_response_code(500);
    echo "Error inserting item.";
}    
?>