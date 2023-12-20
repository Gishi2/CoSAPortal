<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "shopping_cart";
$conn = "";

try {
    $pdo = new PDO("mysql:host=$server;dbname=$database", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

?>