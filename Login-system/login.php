<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $enteredUsername = mysqli_real_escape_string($conn, $_POST['username']);
    $enteredPassword = $_POST['password']; // Password from input

    // Check if the entered username exists
    $stmtCheckUser = $conn->prepare("SELECT userName, userPassword, userType, matrixId FROM student WHERE userName = ?");
    $stmtCheckUser->bind_param("s", $enteredUsername);
    $stmtCheckUser->execute();
    $result = $stmtCheckUser->get_result();

    if ($result->num_rows === 1) {
        // Username exists, verify the password
        $row = $result->fetch_assoc();
        $storedPassword = $row['userPassword']; // Password from the database
        $userType = $row['userType'];
        $matrixId = $row['matrixId']; // Add this line to fetch matrixId

        // For debugging: Print entered password and stored hashed password
        echo "<script>console.log('Entered Password: $enteredPassword')</script>";
        echo "<script>console.log('Entered Password: $storedPassword')</script>";

        if (password_verify($enteredPassword, $storedPassword)) {
            // Password is correct, set session or redirect to logged-in page
            session_start();
            $_SESSION['username'] = $enteredUsername; // Set session variable for logged-in user
            $_SESSION['matrixId'] = $matrixId;
            $_SESSION['userType'] = $userType;
            // // For debugging: Print entered password and stored hashed password
            // echo "<script>console.log('Entered Password: $enteredPassword')</script>";
            // echo "<script>console.log('Entered Password: $storedPassword')</script>";
            if ($userType == "1") {
                $_SESSION['userType'] = 'normalUser';
                header('Location: /Login-system/mainpage/mainpage_user.php'); // Redirect to normal user interface
                exit();
            } elseif ($userType == "2") {
                $_SESSION['userType'] = 'committeeMember';
                header('Location: /Login-system/mainpage/mainpage_committee.php'); // Redirect to Committee interface
                exit();
            } elseif ($userType == "3") {
                $_SESSION['userType'] = 'admin';
                header('Location: /Login-system/mainpage/mainpage_admin.php'); // Redirect to Admin interface
                exit();
            }

        } else {
            // Password is incorrect
            echo "<script>alert('Incorrect password!');</script>";
            echo "<script>window.location = 'login.html';</script>";
            exit();
        }
    } else {
        // Username doesn't exist
        echo "<script>alert('Username not found!');</script>";
        echo "<script>window.location = 'login.html';</script>";
        exit();
    }

    $stmtCheckUser->close();
}

// Redirect if form wasn't submitted
header('Location: login.html');
?>
