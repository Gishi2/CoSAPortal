<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>

    <link rel="stylesheet" href="registration.css">

</head>
<body>

<div class="container">

    <div class="content">
        <h3>Hi, <span>user</span></h3>
        <h1>Welcome <span></span></h1>
        <p>This is an admin page</p>
        <a href="login.php" class="btn">Login</a>
        <a href="signup.php" class="btn">Sign Up</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>

</div>

</body>
</html>