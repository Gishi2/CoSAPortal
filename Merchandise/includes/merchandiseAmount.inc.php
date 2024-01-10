<?php
    try {
        require_once "includes/merchandisedb.inc.php";

        $query = "SELECT * FROM merchandise";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($results > 1) {
            echo '<span>'. count($results) .' Merchandises</span>';
        } else {
            echo '<span>'. count($results) .' Merchandise</span>';
        }

        $pdo = null; $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }   
?>