<?php 
    // Define page links
    define('HOME_PAGE', '/index.php');
    define('PROGRAMME_PAGE', '/Programme/php/fetch_programme_user.php');
    define('MERCHANDISE_PAGE', '/Merchandise/merchandise.php');
    define('BOOK_PAGE', '/E-Book/book.php');
    define('SIGN_UP_PAGE', '/Login-system/signup.html');

    // Only need to Change the link here if u want to change the nav bar href
    // 1. Applied to Homepage.php

    // How to use? 
    // *Can refer to Homepage.php and merchandise.php for reference*
    // First, change your HTML file to PHP file.
    // Then, add config.php to the top of your file. (../config/config.php)
    // put the name of the variable in the href.

    /* 
    e.g. <a href="<?php echo MERCHANDISE_PAGE; ?>"></a> 
    */
?>