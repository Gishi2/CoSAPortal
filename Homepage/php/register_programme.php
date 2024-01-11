<?php
// register_program.php

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the program ID from the AJAX request
    $programId = $_POST['programId']; // Assuming it's sent via POST data

    // Retrieve the matrixId from the session (assuming you've stored it there)
    session_start();
    $matrixId = $_SESSION['matrixId']; // Assuming 'matrixId' is stored in the session

    // Establish connection to the database (change these details accordingly)
    $conn = new mysqli('localhost', 'root', '', 'cosaportal');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // // Prepare INSERT query (attendanceId will auto-increment)
    // $stmt = $conn->prepare("INSERT INTO attendance (matrixId, programmeId) VALUES (?, ?)");
    // $stmt->bind_param("ss", $matrixId, $programId); // Assuming both matrixId and programId are varchar

    // // Execute the prepared statement
    // if ($stmt->execute()) {
    //     // Registration successful
    //     echo "Registration successful";
    // } else {
    //     // Registration failed
    //     echo "Error: " . $conn->error;
    // }

    // Check if the user is already registered for the chosen program
    $stmt = $conn->prepare("SELECT * FROM attendance WHERE matrixId = ? AND programmeId = ?");
    $stmt->bind_param("ss", $matrixId, $programId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User is already registered for the program
        echo "You are already registered to this programme!";
    } else {
        // User is not registered; proceed with registration logic
        $stmt = $conn->prepare("INSERT INTO attendance (matrixId, programmeId) VALUES (?, ?)");
        $stmt->bind_param("ss", $matrixId, $programId);

        if ($stmt->execute()) {
            // Registration successful
            echo "Registration successful";
        } else {
            // Registration failed
            echo "Error: " . $conn->error;
        }
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed";
}
?>
