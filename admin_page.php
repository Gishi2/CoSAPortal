<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>