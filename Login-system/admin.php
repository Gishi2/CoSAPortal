<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}

?>

<h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
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
        <a href="#">Log In</a>
     </nav>
</header>
   
<div class="container">

   <div class="content">
      <h3>Hi, <span>Admin</span></h3>
      <p>This is an admin page</p>
      <a href="login.php" class="btn">login</a>
      <a href="signup.php" class="btn">sign up</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>