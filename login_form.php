<?php

@include 'config.php';

if(isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $matrix = mysqli_real_escape_string($conn, $_POST['matrix']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $semester = mysqli_real_escape_string($conn, $_POST['semester']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELCT * FROM user_form WHERE email ='$email' && password = '$pass' ";
   
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_array($result);

    if($row['user_type'] == 'admin') {

        $_SESSION['admin _name'] = $row['name'];
        header('location:admin_page.php');

    }elseif($row['user_type'] == 'user'){

        $_SESSION['user_name'] = $row['name'];
        header('location:user_page.php');

     }
      
   }else {
    $error[] = 'Incorrect Email or Password!';
   }
}
?>

<?php
        if(isset($error)) {
            foreach($error as $error) {
                echo '<span class="error-msg">'.$error.'</span>';
            }
        }
        ?>