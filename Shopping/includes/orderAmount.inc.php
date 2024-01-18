<?php
    session_start();

    if (!isset($_SESSION['matrixId'])) {
        header("Location: /Login-system/login.html");
    }

    try {
        require_once "includes/dbh.inc.php";

        $queryOrder = "SELECT * FROM orders";

        $stmtOrder = $pdo->prepare($queryOrder);
        $stmtOrder->execute();

        $results = $stmtOrder->fetchAll(PDO::FETCH_ASSOC);
        $count = count($results);

        if ($count > 1) {
            echo '<span>'. $count .' Orders</span>';
        } else if ($count == 0) {
            echo '<span> No Available Order</span>';
        } else if ($count == 1) {
            echo '<span>'. $count .' Order</span>';
        }

        $pdo = null; $stmtOrder = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }   
?>