<?php
    session_start();

    session_unset(); // unset all variables registered
    session_destroy(); // destroy the session 
    $_SESSION = array(); // empty session

    header('Location: ../index.php');
?>