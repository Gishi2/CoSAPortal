<?php

try {
    require_once "dbh.inc.php";

    $query = "SELECT * FROM cart";

    $stmt = $pdo->prepare($query);

    // $stmt->bindParam(":name", $name);
    // $stmt->bindParam(":price", $price);
    // $stmt->bindParam(":quantity", $quantity);
    // $stmt->bindParam(":size", $size);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results > 0) {
        echo '<h3>Recently added Product</h3>';
        foreach ($results as $item) {
            echo '<div class="cart-item">';
            echo '<div class="box">';
            echo '<img src="">';
            echo '</div>';
            echo '<div class="text">' . htmlspecialchars($item['name']) . '</div>';
            echo '<div class="price">'. htmlspecialchars($item['price']) .'</div>';
            echo '<div class="btn-delete">Delete</div>';
            echo '</div>';
        }
    } else {
        
    }

    $pdo = null; $stmt = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}    
?>