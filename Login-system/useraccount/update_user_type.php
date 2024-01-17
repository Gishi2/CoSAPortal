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
    $matrixId = $_POST['matrixId'];
    $newType = $_POST['newType'];

    // Update the user type in the database
    $stmt = $conn->prepare("UPDATE student SET userType = ? WHERE matrixId = ?");
    $stmt->bind_param("is", $newType, $matrixId);

    if ($stmt->execute()) {
        echo "User type updated successfully";
    } else {
        echo "Error updating user type: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
