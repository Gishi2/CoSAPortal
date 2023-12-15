<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cosaportal";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO programme (programmeName, programmeStartDate, programmeEndDate, programmeTime, capacity, programmeDesc, programmePoster) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssiss", $programmeName, $programmeStartDate, $programmeEndDate, $programmeTime, $capacity, $programmeDesc, $programmePoster);

    // Set parameters from the form
    $programmeName = $_POST['programmeName'];
    $programmeStartDate = $_POST['programmeStartDate'];
    $programmeEndDate = $_POST['programmeEndDate'];
    $programmeTime = $_POST['programmeTime'];
    $capacity = $_POST['capacity'];
    $programmeDesc = $_POST['programmeDesc'];
    $programmePoster = $_FILES["programmePoster"]['name'];

    // Handling file upload for programmePoster
    if (isset($_FILES['programmePoster']) && $_FILES['programmePoster']['error'] === UPLOAD_ERR_OK) {
        $programmePoster = file_get_contents($_FILES['programmePoster']['tmp_name']);
    } else {
        $programmePoster = null; // If file upload fails or no file is selected
    }

    // Execute the prepared statement
    $stmt->execute();

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect after successful submission (change the URL as needed)
    header("Location: /CoSAPortal/Homepage/success.php");
    exit();
}
?>
