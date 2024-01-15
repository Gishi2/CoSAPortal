<?php
// Connect to your database (modify this part according to your database configuration)
$conn = new mysqli('localhost', 'root', '', 'cosaportal');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform a query to get the number of registered students
$sql = "SELECT COUNT(*) as studentCount FROM student WHERE userType = '1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $studentCount = $row['studentCount'];
} else {
   // $studentCount = 0; // Default value if no students are found
   die("Error executing the query: " . $conn->error);
}

// Close the database connection
$conn->close();

// Return the student count as a JSON response
echo json_encode(['studentCount' => $studentCount]);
?>