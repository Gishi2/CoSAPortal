<?php
    try {
        require_once "includes/merchandisedb.inc.php";

        $query = "SELECT * FROM merchandise";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($results > 1) {
            echo '<span>'. count($results) .' Merchandises</span>';
        } else if ($results == 0) {
            echo '<span> No Available Merchandise</span>';
        } else if ($results == 1) {
            echo '<span>'. count($results) .' Merchandise</span>';
        }

        $pdo = null; $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }   
?>