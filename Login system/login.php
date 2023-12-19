<?php

@include 'config.php';

if(isset($_POST['submit'])) {
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE username ='$username' && password = '$pass' ";
   
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_array($result);

    if($row['user_type'] == 'admin') {

        $_SESSION['admin _name'] = $row['name'];
        header('location:adminp.php');

    }elseif($row['user_type'] == 'user'){

        $_SESSION['user_name'] = $row['name'];
        header('location:user.php');

     }
      
   }else {
    $error[] = 'Incorrect Email or Password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>

<header>
    <h2 class="logo">Logo</h2>
     <nav class="navigation">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Pages</a>
        <a href="#">Activities</a>
        <a href="#">Sign Up</a>
     </nav>
</header>

<div class="form-container" >

    <form action="" method="post">
        <h3>Login</h3>
        <?php
        if(isset($error)) {
            foreach($error as $error) {
                echo '<span class="error-msg">'.$error.'</span>';
            }
        }
        ?>
        <input type="text" name="username" required placeholder="Username">
        <input type="password" name="password" required placeholder="Password">
        <input type="submit" name="submit" value="login" class="form-btn"
        <p>Don't have an an account? <a href="signup.php">Sign Up</a></p>
    </form>
</div>

</body>
</html>