<?php
// filter.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cosaportal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if programmeId parameter is provided
$input = isset($_GET['programmeId']) ? $_GET['programmeId'] : '';

// SQL query to fetch data with JOIN operations
$sql = "SELECT a.programmeId, p.programmeName, a.matrixId, s.studName
        FROM attendance a
        JOIN programme p ON a.programmeId = p.programmeId
        JOIN student s ON a.matrixId = s.matrixId
        WHERE a.status = 0";

// Add a condition to filter by programmeId if it's provided
if (!empty($input)) {
    $sql .= " AND a.programmeId LIKE '%$input%'";
}

$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $rowNumber = 1; // Initialize the row number
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td> <?php echo $rowNumber++; ?> </td>
                <td> <?php echo $row["programmeId"]; ?> </td>
                <td> <?php echo $row["programmeName"]; ?> </td>
                <td> <?php echo $row["matrixId"]; ?> </td>
                <td> <?php echo $row["studName"]; ?> </td>
            </tr>
            <?php
        }
    } else {
        echo "<div>No results found</div>";
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
