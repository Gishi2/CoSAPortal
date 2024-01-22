<?php
    session_start();

    if (!isset($_SESSION['matrixId'])) {
        header("Location: /Login-system/login.html");
    }

    if (isset($_POST['submit'])) {
        $cartIds = $_POST['cartId'];
        $userId = $_SESSION['matrixId'];
        $productIds = $_POST['productId']; // plural are arrays
        $sizes = $_POST['size'];
        $quantities = $_POST['quantity']; 
        $payment_method = $_POST['activeButtonValue'];
        $orderStatus = 1; // 1 - Pending Status
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

        for ($i = 0; $i < count($cartIds); $i++) {
            $queryDeleteCart = "DELETE FROM cart WHERE user_id = :userId AND cart_id = :cartId";
            $stmtDeleteCart = $pdo->prepare($queryDeleteCart);
            $stmtDeleteCart->bindParam(":userId", $userId);
            $stmtDeleteCart->bindParam(":cartId", $cartIds[$i]);
            $stmtDeleteCart->execute();
        }

        $pdo = null; $stmtOrders = null; $stmtItems = null; $stmtDeleteCart = null;
        header("Location: /Merchandise/merchandise.php");
        die();
    } catch (PDOException $e) {
        die("Insertion Failed: " . $e->getMessage());
    }
?>