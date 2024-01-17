<?php
    session_start();

    if (isset($_POST['submit'])) {
        // var_dump($_POST);
        $userId = $_SESSION['matrixId'];
        $productIds = $_POST['productId'];
        $sizes = $_POST['size'];
        $quantities = $_POST['quantity'];
        $payment_method = $_POST['activeButtonValue'];
        $orderStatus = 1;
        $orderNote = $_POST['message'];
        $orderTotal = $_POST['orderTotal'];
    }

    try {
        require_once 'dbh.inc.php';

        $queryOrder = "INSERT INTO orders (user_id, payment_method, order_status, order_note, order_totalPrice) 
        VALUES (:userId, :paymentMethod, :status, :note, :totalPrice);";

        $stmtOrders = $pdo->prepare($queryOrder);
        $stmtOrders->bindParam(":userId", $userId);
        $stmtOrders->bindParam(":paymentMethod", $payment_method);
        $stmtOrders->bindParam(":status", $orderStatus);
        $stmtOrders->bindParam(":note", $orderNote);
        $stmtOrders->bindParam(":totalPrice", $orderTotal);

        $stmtOrders->execute();

        $orderId = $pdo->lastInsertId();

        for ($i = 0; $i < count($productIds); $i++) {
            $productId = $productIds[$i];
            $size = $sizes[$i];
            $quantity = $quantities[$i];

            $queryItems = "INSERT INTO orders_items (order_id, product_id, order_size, order_quantity) 
            VALUES (:orderId, :productId, :size, :quantity);";

            $stmtItems = $pdo->prepare($queryItems);
            $stmtItems->bindParam(":orderId", $orderId);
            $stmtItems->bindParam(":productId", $productId);
            $stmtItems->bindParam(":size", $size);
            $stmtItems->bindParam(":quantity", $quantity);

            $stmtItems->execute();
        }   

        // $queryDeleteCart = "DELETE FROM cart WHERE user_id = :userId AND order";
        // $stmtDeleteCart = $pdo->prepare($queryDeleteCart);
        // $stmtDeleteCart->bindParam(":userId", $userId);
        // $stmtDeleteCart->execute();

        $pdo = null; $stmtOrder = null; $stmtItems = null;
        header("Location: /Merchandise/merchandise.php");
        die();
    } catch (PDOException $e) {
        die("Insertion Failed: " . $e->getMessage());
    }
?>