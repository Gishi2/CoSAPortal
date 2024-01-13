<?php

try {
    require_once "dbh.inc.php";

    $query = "SELECT cart.cart_id, cart.price, merchandise.name, merchandise.image_url FROM cart 
    INNER JOIN merchandise ON cart.product_id = merchandise.id;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($results)) {
        echo '<h3>Recently added Product</h3>';
        foreach ($results as $item) {
            echo '<div class="cart-item">';
                echo '<div class="box">';
                    echo '<img src="'. $item['image_url'] . '">';
                echo '</div>';
                echo '<div class="text">' . htmlspecialchars($item['name']) . '</div>';
                echo '<div class="price">RM' . htmlspecialchars($item['price']) .'</div>';
                echo '<form action="includes/deleteCart.inc.php" method="post">';
                    echo '<input type="hidden" name="itemId" value="'. $item['cart_id'] .'">';
                    echo '<button type="submit" class="btn-delete">Delete</button>';
                echo '</form>';
            echo '</div>';
        }
        echo '<div class="shopping-cart-button">';
            echo '<a href="/Shopping/shopping-cart.php" class="shopping-cart-link">';
                echo '<button>View My Shopping Cart</button>';
            echo '</a>';
        echo '</div>';
    } else {
        echo '<div class="empty-cart">';
        echo '<i class="fa-regular fa-face-meh"></i>';
        echo 'Your Shopping Cart is empty</div>';
    }

    $pdo = null; $stmt = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}    
?>