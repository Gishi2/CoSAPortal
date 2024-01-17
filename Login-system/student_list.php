<?php
// student_list.php

include 'config.php';

session_start();

// Check if admin is not logged in, redirect to login page
if (!isset($_SESSION['admin_name'])) {
    header('location: login.php');
    exit();
}

// Assuming your student table is named 'students'
$adminUsername = $_SESSION['admin_name'];

// Fetch students based on the admin's username
$sql = "SELECT * FROM students WHERE userName = '$adminUsername'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>" . $row["matrixId"] . "</td>
            <td>" . $row["studName"] . "</td>
            <td>" . $row["phoneNum"] . "</td>
            <td>" . $row["address"] . "</td>
            <td>" . $row["semester"] . "</td>
            <!-- Add other student attributes as needed -->
        </tr>";
}

?>

