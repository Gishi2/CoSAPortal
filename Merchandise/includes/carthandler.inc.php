<?php
$rawData = file_get_contents('php://input');
$decodedData = json_decode($rawData, true);
error_log('PHP script executed successfully');

try {
    if ($decodedData === null) {
        echo "Error decoding JSON data";
    } 

    $name = $decodedData['name'];
    $price = $decodedData['price'];
    $quantity = $decodedData['quantity'];
    $size = $decodedData['size'];

    require_once "dbh.inc.php";

    $query = "INSERT INTO cart (name, price, quantity, size) VALUES
    (:name, :price, :quantity, :size);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":quantity", $quantity);
    $stmt->bindParam(":size", $size);

    $stmt->execute();

    $pdo = null; $stmt = null;

    die();
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}    
?>