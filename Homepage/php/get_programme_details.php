<?php
// Establish your database connection here
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cosaportal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Get the ID sent via the GET request
    $programmeId = $_GET['id'];

    // Perform a database query to retrieve the program details based on $programmeId
    // Execute your SQL query and fetch details from the database

    // Assuming $programmeDetails is an associative array containing fetched details
    $programmeDetails = array(
        'programmeName' => $fetchedProgrammeName,
        'programmeStartDate' => $fetchedStartDate,
        'programmeEndDate' => $fetchedEndDate,
        'programmeDesc' => $fetchedDescription
    );

    // Return the details in JSON format
    header('Content-Type: application/json');
    echo json_encode($programmeDetails);
} else {
    // Handle invalid requests or errors
    http_response_code(400); // Bad request status code
    echo json_encode(array('message' => 'Invalid request'));
}
?>