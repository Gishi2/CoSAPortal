<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cosaportal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $programmeId = $_POST['programmeId'];
    $updatedName = $_POST['updatedName'];
    $updatedStartDate = $_POST['updatedStartDate'];
    $updatedEndDate = $_POST['updatedEndDate'];
    $updatedDescription = $_POST['updatedDescription'];

    // SQL query to update the program details
    $sql = "UPDATE programme SET programmeName='$updatedName', programmeStartDate='$updatedStartDate', programmeEndDate='$updatedEndDate', programmeDesc='$updatedDescription' WHERE programmeId=$programmeId";

    if ($conn->query($sql) === TRUE) {
        echo "Program details updated successfully";
    } else {
        echo "Error updating program details: " . $conn->error;
    }
}

$conn->close();
?>