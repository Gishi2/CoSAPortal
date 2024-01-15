<?php
// drop_programme.php

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

    // Check if the user is already registered for the chosen program
    $stmtCheckRegistration = $conn->prepare("SELECT * FROM attendance WHERE matrixId = ? AND programmeId = ?");
    $stmtCheckRegistration->bind_param("ss", $matrixId, $programId);
    $stmtCheckRegistration->execute();
    $resultCheckRegistration = $stmtCheckRegistration->get_result();

    // if ($resultCheckRegistration->num_rows > 0) {
    //     // User is registered for the program; update status to indicate dropping
    //     $stmtUpdateStatus = $conn->prepare("UPDATE attendance SET status = 1 WHERE matrixId = ? AND programmeId = ?");
    //     $stmtUpdateStatus->bind_param("ss", $matrixId, $programId);

    //     if ($stmtUpdateStatus->execute()) {
    //         // Drop successful
    //         echo "Program dropped successfully";
    //     } else {
    //         // Drop failed
    //         echo "Error updating status: " . $conn->error;
    //     }

    //     // Close the update statement
    //     $stmtUpdateStatus->close();
    // } else {
    //     // User is not registered for the program
    //     echo "You are not registered for this programme";
    // }
    if ($resultCheckRegistration->num_rows > 0) {
        $row = $resultCheckRegistration->fetch_assoc();
        $currentStatus = $row['status'];
    
        if ($currentStatus == 1) {
            // User is registered for the program but already dropped
            echo "You have already dropped from this programme";
        } else {
            // User is registered for the program; update status to indicate dropping
            $stmtUpdateStatus = $conn->prepare("UPDATE attendance SET status = 1 WHERE matrixId = ? AND programmeId = ?");
            $stmtUpdateStatus->bind_param("ss", $matrixId, $programId);
    
            if ($stmtUpdateStatus->execute()) {
                // Drop successful
                echo "Program dropped successfully";
            } else {
                // Drop failed
                echo "Error updating status: " . $conn->error;
            }
    
            // Close the update statement
            $stmtUpdateStatus->close();
        }
    } else {
        // User is not registered for the program
        echo "You are not registered for this programme";
    }

    // Close the check registration statement and connection
    $stmtCheckRegistration->close();
    $conn->close();
} else {
    // If the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed";
}
?>