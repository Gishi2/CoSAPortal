<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "shopping_cart";
$conn = "";

try {
    $conn = new mysqli($server, $user, $pass, $database);

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

?>