<?php
    try {
        require_once "dbh.inc.php";

        $itemId = isset($_POST['itemId']) ? $_POST['itemId'] : null;

        if ($itemId !== null) {
            $query = "DELETE FROM cart WHERE cart_id = :itemId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
            $stmt->execute();

            echo "Item deleted successfully";
        } else {
            echo "Invalid item ID";
        }

        $pdo = null; $stmt = null;

        $referer = $_SERVER['HTTP_REFERER'];
        $parsedUrl = parse_url($referer);
        $currentPhpSelf = basename($parsedUrl['path']);
        // $currentPhpSelf = basename($_SERVER['HTTP_REFERER']);
        if ($currentPhpSelf === 'merchandise.php') {
            header("Location: /Merchandise/merchandise.php?deletesuccessful");
        } else if ($currentPhpSelf === 'shopping-cart.php') {
            header("Location: /Shopping/shopping-cart.php?deletesuccessful");
        } else {
            echo 'Error: Path name ('. $currentPhpSelf .') is not recognizable';
        }

        die();
    } catch (PDOException $e) {
        error_log("Query failed: " . $e->getMessage());
        http_response_code(500);
        echo "Error deleting item.";
    }

?>