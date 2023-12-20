<?php

try {
    require_once "dbh.inc.php";

    $query = "SELECT * FROM cart";

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