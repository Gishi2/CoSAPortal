<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "shopping_cart";
    $conn = "";
    
    try {
        $conn = mysqli_connect($server, $user, $pass, $database);
    } catch (mysqli_sql_exception) {
        echo "Connection failed!";
    }
    
    if ($conn) {
        echo "Connected successfully";
    }
?>