<?php
    session_start();

    if (!isset($_SESSION['matrixId'])) {
        header("Location: /Login-system/login.html");
    }

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "cosaportal";
    $conn = "";

    try {
        $pdo = new PDO("mysql:host=$server;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
?>