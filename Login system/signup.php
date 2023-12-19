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

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="header-logo" src="/Homepage/img/cosa/cosa_logo_inBlue.png">
            <!-- <h1 class="m-0 text-primary">PORTAL</h1> -->
            <!-- <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Klinik</h1> -->
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav  -item nav-link active">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <!-- <a href="service.html" class="nav-item nav-link">Service</a> -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <!-- <a href="about.html" class="dropdown-item">About Us</a> -->
                        <a href="\Homepage\programme-registration-user.html" class="dropdown-item">Programme</a>
                        <a href="\Merchandise\merchandise.html" class="dropdown-item">Merchandise</a>
                        <a href="\CoSA E-Book\ebook.html" class="dropdown-item">E-Book</a>
                    </div>
                </div>
                <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
            </div>
            <a href="/sign-up/signup.html" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login / Sign Up<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
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
             </select>
            <input type="submit" name="submit" value="sign up" class="form-btn"
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>

</body>
</html>