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

    // Check if the username already exists
    $stmtCheckUsername = $conn->prepare("SELECT userName FROM student WHERE userName = ?");
    $stmtCheckUsername->bind_param("s", $username);
    $stmtCheckUsername->execute();
    $stmtCheckUsername->store_result();

    if ($stmtCheckUsername->num_rows > 0) {
        // Username already exists, display error and refresh the page
        echo "<script>alert('This username already exists! Please choose a different username.');</script>";
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
