<?php
    require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MERCHANDISE - CoSA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/Homepage/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/Homepage/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/Homepage/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="\Homepage\css\bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="\Merchandise\css\merchandise-edit.css" rel="stylesheet">  
    <!-- <link href="\Homepage\css\style.css" rel="stylesheet"> -->
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" style="box-shadow: 0 1px 4px 0 rgba(74,74,78,.12);" data-wow-delay="0.1s">
        <a href="/index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="header-logo" src="/Homepage/img/cosa/cosa_logo_inBlue.png">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/index.php" class="nav-item nav-link">Home</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color: #1B2C51; margin-right: 2rem;">PAGES</a>
            <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                <a href="<?php echo PROGRAMME_PAGE; ?>" class="dropdown-item">Programme</a>
                <a href="<?php echo MERCHANDISE_PAGE; ?>" class="dropdown-item">Merchandise</a>
                <a href="<?php echo BOOK_PAGE; ?>" class="dropdown-item">E-Book</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="sidebar-container-edit">
        <div class="sidebar-edit">
            <div class="sidebar-menu-edit">
                <ul>
                    <li class="sidebar-menu-box">
                        <div class="sidebar-menu-item">
                            <i class="fa-solid fa-shirt"></i>
                            <span class="text">
                                Merchandise
                            </span>
                            <span class="space"></span>
                        </div>
                        <ul class="sidebar-submenu">
                            <li >
                                <div class="sidebar-submenu-item"></div>
                                <a>
                                    <span>My Merchandise</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-container has-sidebar">
        <div class="page-wrapper-content">
            <div class="page-content-main">
                <div class="page-header">
                    <span>10 Products</span>
                </div>
                <div class="content-list-section">
                    <div class="content-list-container">
                        <div class="content-table">
                            <table>
                                <colgroup>
                                    <col width="40">
                                    <col width="232">
                                    <col width="606">
                                    <col width="96">
                                    <col width="88">
                                </colgroup>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="/Merchandise/js/merchandise.js"></script>
    <script src="/Merchandise/js/merchandise.add.field.js"></script>
</body>
