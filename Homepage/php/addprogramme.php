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
        $uploadDirectory = '/CoSAPortal/Homepage/php/uploads/'; // Directory where you want to store uploaded files
        $uploadedFileName = $_FILES['programmePoster']['name'];
        $uploadedFileTmpName = $_FILES['programmePoster']['tmp_name'];
        $targetFilePath = $_SERVER['DOCUMENT_ROOT'] . $uploadDirectory .  $uploadedFileName;

        if (move_uploaded_file($uploadedFileTmpName, $targetFilePath)) {
        $posterPath = $targetFilePath;

        echo "File uploaded successfully and path stored in the database: $targetFilePath";
        } else {
            echo "Error uploading file";
        }
    } else {
        echo "No file uploaded or an error occurred during file upload";
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO programme (programmeName, programmeStartDate, programmeEndDate, programmeTime, capacity, programmeDesc, posterPath) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssiss", $programmeName, $programmeStartDate, $programmeEndDate, $programmeTime, $capacity, $programmeDesc, $posterPath);

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
