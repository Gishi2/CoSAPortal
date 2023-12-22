<?php
$rawData = file_get_contents('php://input');
$decodedData = json_decode($rawData, true);
error_log('PHP script executed successfully');

try {
    if ($decodedData === null) {
        echo "Error decoding JSON data";
    } 

    $merchandiseId = $decodedData['merchandiseId'];
    $price = $decodedData['price'];
    $quantity = $decodedData['quantity'];
    $sizes = $decodedData['sizes'];

    $totalPrice = $price * $quantity;

    require_once "dbh.inc.php";

    $query = "INSERT INTO cart (merchandise_id, total_price, quantity, sizes) VALUES
    (:merchanduiseId, :totalPrice, :quantity, :sizes);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":merchandiseId", $merchandiseId);
    $stmt->bindParam(":totalPrice", $totalPrice);
    $stmt->bindParam(":quantity", $quantity);
    $stmt->bindParam(":sizes", $sizes);

    $stmt->execute();

    $pdo = null; $stmt = null;

    die();
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}    
?>