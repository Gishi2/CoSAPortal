<?php

$server = "localhost";
$user = "root";
$password = ""  ;
$database = "shopping_cart";
$conn = "";

$conn = mysqli_connect($server, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

echo json_encode($products);

$conn->close();
?>