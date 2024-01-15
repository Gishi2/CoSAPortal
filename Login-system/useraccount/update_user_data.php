<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $name = $_POST['name'];
    $matrixId = $_SESSION['matrixId'];
    $semester = $_POST['semester'];
    $address = $_POST['address'];
    $userEmail = $_POST['userEmail'];
    $phoneNum = $_POST['phoneNum'];

    // Perform database update (modify this part according to your database schema)
    $conn = new mysqli('localhost', 'root', '', 'cosaportal');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE student SET studName=?, phoneNum=?, address=?, semester=?, userName=?, userEmail=? WHERE matrixId=?");
    $stmt->bind_param("sssssss", $name, $phoneNum, $address, $semester, $username, $userEmail, $matrixId);

    if ($stmt->execute()) {
        echo "Changes saved successfully";
    } else {
        echo "Error updating data: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed";
}
?>
