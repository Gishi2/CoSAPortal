<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $matrix = mysqli_real_escape_string($conn, $_POST['matrix']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $cpass = md5($_POST['cpassword']); // Keeping this for now, but should be updated for consistency

    // Assuming $user_type is defined somewhere in your code
    $user_type = 1;  // Replace with the actual value or logic to determine user type

    // Check if the matrixId already exists
    $stmtCheck = $conn->prepare("SELECT matrixId FROM student WHERE matrixId = ?");
    $stmtCheck->bind_param("s", $matrix);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    if ($stmtCheck->num_rows > 0) {
        // MatrixId already exists, display error and refresh the page
        echo "<script>alert('MatrixId already exists!');</script>";
        echo "<script>window.location = 'signup.html';</script>";
        exit();
    } else {
        // Prepare the statement for inserting into the 'student' table
        $stmtUser = $conn->prepare("INSERT INTO student (matrixId, studName, phoneNum, address, semester, userName, userPassword, userEmail, userType) VALUES (?,?,?,?,?,?, ?, ?, ?)");
        $stmtUser->bind_param("ssssissss", $matrix, $name, $phone, $address, $semester, $username, $password, $email, $user_type);

        if ($stmtUser->execute()) {
            // Data inserted successfully
            header('Location: login.html');
            exit();
        } else {
            // Handle insertion failure
            header('Location: signup.html');
            exit();
        }
    }
    // Close the statement after execution if necessary
    $stmtUser->close();
}
// Redirect if form wasn't submitted
header('Location: login.html');
?>
