<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $matrix = mysqli_real_escape_string($conn, $_POST['matrix']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $semester = mysqli_real_escape_string($conn, $_POST['semester']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, matrix, address, phone, semester, username, password, user_type) VALUES('$name','$matrix','$address','$phone','$semester','$username','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>

    <header>
        <a href="homepage.html" class="navbar-brand d-flex align-items-center px-4">
            <img src="/Homepage/img/cosa/cosa_logo_inBlue.png">
        </a>
         <nav class="navigation">
            <a href="\CoSAPortal\Homepage\homepage.html">Home</a>
            <a href="#">About</a>
            <a href="#">Pages</a>
            <a href="#">Activities</a>
            <a href="\CoSAPortal\login.html">Log In</a>
         </nav>
    </header>

    <div class="form-container" >

        <form action="" method="post">
            <h3>Sign Up</h3>
            <?php
            if(isset($error)) {
                foreach($error as $error) {
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            }
            ?>
            <input type="text" name="name" required placeholder="Full Name">
            <input type="number" name="matrix" required placeholder="Matrix Number">
            <input type="address" name="address" required placeholder="Address">
            <input type="phone" name="phone" required placeholder="Phone Number">
            <input type="semester" name="semester" required placeholder="Semester">
            <input type="text" name="username" required placeholder="Username">
            <input type="password" name="password" required placeholder="Password">
            <input type="password" name="cpassword" required placeholder="Confirm Password">
            <select name="user_type">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
             </select>
            <input type="submit" name="submit" value="sign up" class="form-btn"
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>

</body>
</html>