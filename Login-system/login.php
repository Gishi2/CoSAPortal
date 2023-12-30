<?php

session_start();

include 'config.php';

if (isset($_POST['submit'])) {
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = $_POST['password'];


   $select = "SELECT * FROM user WHERE username = ?";

   $stmt = $conn->prepare($select);
   $stmt->bind_param("s", $username);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      if (password_verify($password, $row['userPassword'])) {
         if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location: admin.php');
            exit();
         } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            header('location: user.php');
            exit();
         }
      } else {
         $error[] = 'Incorrect Username or Password!';
      }
   } else {
      $error[] = 'Incorrect Username or Password!';
   }

   $stmt->close();
}

?>