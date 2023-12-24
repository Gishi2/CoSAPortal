<?php

try {
    require_once "dbh.inc.php";

    $query = "SELECT cart.total_price, merchandise.name, merchandise.image_url FROM cart 
    INNER JOIN merchandise ON cart.merchandise_id = merchandise.id;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results > 0) {
        echo '<h3>Recently added Product</h3>';
        foreach ($results as $item) {
            echo '<div class="cart-item">';
                echo '<div class="box">';
                    echo '<img src="'. $item['image_url'] . '">';
                echo '</div>';
                echo '<div class="text">' . htmlspecialchars($item['name']) . '</div>';
                echo '<div class="price">RM' . htmlspecialchars($item['total_price']) .'</div>';
                echo '<div class="btn-delete" onclick="deleteCart()">Delete</div>';
            echo '</div>';
            echo '<a href="merchandise.cart.php" class="shopping-cart-button">';
                echo '<button>View My Shopping Cart</button>';
            echo '</a>';
        }
    } else {

    }

    $pdo = null; $stmt = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}    
?>