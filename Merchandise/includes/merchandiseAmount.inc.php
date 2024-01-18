<?php
    session_start();

    if (!isset($_SESSION['matrixId'])) {
        header("Location: /Login-system/login.html");
    }

    try {
        require_once "includes/merchandisedb.inc.php";

        $query = "SELECT * FROM merchandise";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = count($results);

        if ($count > 1) {
            echo '<h3>'. $count .' Merchandises</h3>';
        } else if ($count == 0) {
            echo '<h3> No Available Merchandise</h3>';
        } else if ($count == 1) {
            echo '<h3>'. $count .' Merchandise</h3>';
        }

        $pdo = null; $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }   
?>