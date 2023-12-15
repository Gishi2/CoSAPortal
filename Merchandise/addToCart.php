<?php
    include '\Merchandise\config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = floatval($_POST['price']);
        $quantity = intval($_POST['quantity']);
        $size = mysqli_real_escape_string($conn, $_POST['size']);
    
        $sql = "INSERT INTO cart (name, price, quantity, size)
                VALUES ('$name', $price, $quantity, '$size')";
    
        mysqli_query($conn, $sql);
    
        mysqli_close($conn);
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
?>