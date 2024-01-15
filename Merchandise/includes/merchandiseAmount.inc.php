<?php
    try {
        require_once "includes/merchandisedb.inc.php";

        $query = "SELECT * FROM merchandise";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = count($results);

        if ($count > 1) {
            echo '<span>'. $count .' Merchandises</span>';
        } else if ($count == 0) {
            echo '<span> No Available Merchandise</span>';
        } else if ($count == 1) {
            echo '<span>'. $count .' Merchandise</span>';
        }

        $pdo = null; $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }   
?>