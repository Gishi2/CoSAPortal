<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['studName']);
    $matrix = mysqli_real_escape_string($conn, $_POST['matrixId']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phoneNum']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $username = mysqli_real_escape_string($conn, $_POST['userName']);
    $password = $_POST['userPassword'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $userTypeId = $_POST['userTypeId'];

    // Insert into user table
    $insertUserQuery = "INSERT INTO user (userName, userPassword, userEmail, userTypeId) VALUES ('$username', '$hashed_password', '$userEmail', '$userTypeId')";
    mysqli_query($conn, $insertUserQuery);

    // Get the last inserted user ID
    $lastUserId = mysqli_insert_id($conn);

    // Insert into student table with the user ID as the foreign key
    $insertStudentQuery = "INSERT INTO student (matrixId, studName, phoneNum, address, semester, studUserId) VALUES ('$matrix', '$name', '$phone', '$address', '$semester', '$lastUserId')";
    mysqli_query($conn, $insertStudentQuery);

    header('location: login.php');
    exit();
}

?>