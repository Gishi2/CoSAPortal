<?php
// Perform your database connection here
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cosaportal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the ID and status from the AJAX request
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Update the status in the database
    $updateQuery = "DELETE FROM student WHERE matrixId = $id";

    // Execute the query
    // You might want to add error handling and security measures here
    if ($conn->query($updateQuery) === TRUE) {
        // Send a success response if the update is successful
        http_response_code(200);
        echo 'Account has been deleted from the database successfully 2';
    } else {
        // Send an error response if the update fails
        http_response_code(500);
        echo 'Error updating status';
    }
}
?>