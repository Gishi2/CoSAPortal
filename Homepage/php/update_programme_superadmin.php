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
    $updatedStatus = isset($_POST['updatedStatus']) ? 0 : 1;
    echo "Updated Status: " . $updatedStatus;
    $updatedDescription = $_POST['updatedDescription'];

    // Handle special characters in updatedDescription
    $updatedDescription = mysqli_real_escape_string($conn, $updatedDescription);

    // Use prepared statement to update the program details
    $sql = "UPDATE programme SET programmeName=?, programmeStartDate=?, programmeEndDate=?, programmeStatus=?, programmeDesc=? WHERE programmeId=?";
    
    $stmt = $conn->prepare($sql);
    
    // Bind parameters with proper data types
    $stmt->bind_param("sssiss", $updatedName, $updatedStartDate, $updatedEndDate, $updatedStatus, $updatedDescription, $programmeId);

    if ($stmt->execute()) {
        echo "<script>alert('Program details updated successfully');</script>";

        // Redirect to fetch_programme_superadmin.php
        header("Location: fetch_programme_superadmin.php");
    } else {
        echo "Error updating program details: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>