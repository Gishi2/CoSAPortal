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

    // Prepare the statement for inserting into the 'user' table
    $stmtUser = $conn->prepare("INSERT INTO user (userName, userPassword, userEmail, userTypeId) VALUES (?, ?, ?, ?)");
    $stmtUser->bind_param("sssi", $username, $password, $email, $user_type);
    $stmtUser->execute();
    $stmtUser->close();

    // Check for duplicate users in 'user' table
    $stmtSelect = $conn->prepare("SELECT * FROM user WHERE userName = ?");
    $stmtSelect->bind_param("s", $username);
    $stmtSelect->execute();
    $result = $stmtSelect->get_result();

    // Check if a user with the same name already exists in 'user' table
    if ($result->num_rows > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'Passwords do not match!';
        } else {
            // Get the last inserted ID from 'user' table
            $lastInsertId = mysqli_insert_id($conn);

            // Insert into 'student' table
            $insertStudent = "INSERT INTO student (studUserId, name, matrix, address, phone, semester) VALUES ('$lastInsertId','$name','$matrix','$address','$phone','$semester')";
            mysqli_query($conn, $insertStudent);
        }
    }

    $stmtSelect->close();

    // Handle errors if any
    if (!empty($error)) {
        // Handle errors, such as displaying an error message or logging them
        // Example: echo implode("<br>", $error);
    }
}
header('Location: login.php');
?>
