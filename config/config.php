<?php 
    // Define page links
    define('HOME_PAGE', '/index.php');
    define('PROGRAMME_PAGE', '/Homepage/php/fetch_programme_user.php');
    define('PROGRAMME_ADMIN_PAGE', '/Homepage/php/fetch_programme_admin.php');
    define('PROGRAMME_SUPERADMIN_PAGE', '/Homepage/php/fetch_programme_superadmin.php');
    define('MERCHANDISE_PAGE', '/Merchandise/merchandise.php');
    define('BOOK_PAGE', '/Book/book.php');
    define('SIGN_UP_PAGE', '/Login-system/signup.html');
    define('SHOPPING-CART_PAGE', '/Shopping/shopping-cart.php');
    define('NORMAL_USER_PAGE', '/Login-system/mainpage/mainpage_user.php');
    define('COMMITTEE_USER_PAGE', '/Login-system/mainpage/mainpage_committee.php');
    define('ADMIN_USER_PAGE', '/Login-system/mainpage/mainpage_admin.php');

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