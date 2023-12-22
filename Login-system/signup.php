<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $matrix = mysqli_real_escape_string($conn, $_POST['matrix']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    // Assuming $user_type is defined somewhere in your code
    $user_type = 1;  // Replace with the actual value or logic to determine user type

    // Prepare the statement for inserting into the 'user' table
    $stmtUser = $conn->prepare("INSERT INTO user (userName, userPassword, userEmail, userTypeId) VALUES (?, ?, ?, ?)");

    // Bind parameters
    $stmtUser->bind_param("sssi", $name, $pass, $email, $user_type);

    // Execute the statement
    $stmtUser->execute();

    // Check for duplicate users
    $stmtSelect = $conn->prepare("SELECT * FROM user WHERE userName = ?");
    $stmtSelect->bind_param("s", $name);
    $stmtSelect->execute();

    // Store the result
    $result = $stmtSelect->get_result();

    // Check if a user with the same name already exists
    if ($result->num_rows > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'Passwords do not match!';
        } else {
            // Get the last inserted ID
            $lastInsertId = mysqli_insert_id($conn);

            // Assuming studUserId is generated from another table
            $insertUserForm = "INSERT INTO student (studUserId, name, matrix, address, phone, semester, username, password) VALUES ('$lastInsertId','$name','$matrix','$address','$phone','$semester','$username','$pass')";
            mysqli_query($conn, $insertUserForm);

            // Close the statements
            $stmtUser->close();
            $stmtSelect->close();

            // Redirect to login.php
            header('Location: /Login-system/login.php');
            exit();
        }
    }

    // Close the statements
    $stmtUser->close();
    $stmtSelect->close();

    // Handle errors if any
    if (!empty($error)) {
        // Handle errors, such as displaying an error message or logging them
        // Example: 
        echo implode("<br>", $error);
    }
}

?>
