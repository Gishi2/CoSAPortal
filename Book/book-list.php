<?php
    session_start();

    if (!isset($_SESSION['matrixId'])) {
        header("Location: /Login-system/login.html");
    }

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

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="\Homepage\css\bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="\Book\css\book-list.css" rel="stylesheet">  
</head>

<body>
    <!-- Sidebar Start -->
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="/Shopping/order-list.php">
                <i class='bx bx-clipboard'></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li>
            <a href="/Merchandise/merchandise-list.php">
                <i class='bx bx-cart-alt' ></i>
                <span class="links_name">Merchandise</span>
            </a>
            <span class="tooltip">Merchandise</span>
            </li>
            <li>
                <a href="/Book/book-list-user.php">
                    <i class='bx bx-book'></i>
                    <span class="links_name">My Book</span>
                </a>
                <span class="tooltip">Book</span>
            </li>
            <li>
                <a href="/Book/book-list.php">
                    <i class='bx bx-folder' ></i>
                    <span class="links_name">Book List</span>
                </a>
                <span class="tooltip">Book</span>
            </li>
         </ul>
    </div>
    <!-- Sidebar End -->

    <section class="content-section">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s" style="box-shadow: 0 1px 4px 0 rgba(74,74,78,.12);">
        <a href="<?php echo HOME_PAGE; ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="header-logo" src="/Homepage/img/cosa/cosa_logo_inBlue.png">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
            <?php  
                // if ($_SESSION['userType'] === 'normalUser') {
                //     echo '<a href="'.NORMAL_USER_PAGE.'" class="nav-item nav-link">Home</a>';
                // } else if ($_SESSION['userType'] === 'committeeMember') {
                //     echo '<a href="'.COMMITTEE_USER_PAGE.'" class="nav-item nav-link">Home</a>';
                // } else if ($_SESSION['userType'] === 'admin') {
                //     echo '<a href="'.ADMIN_USER_PAGE.'" class="nav-item nav-link">Home</a>';
                // } 
                echo '<a href="'.HOME_PAGE.'" class="nav-item nav-link">Home</a>';
            ?>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="margin-right: 2rem;">PAGES</a>
            <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                <?php  
                    if ($_SESSION['userType'] === 'normalUser') {
                        echo '<a href="'.PROGRAMME_PAGE.'" class="dropdown-item">Programme</a>';
                    } else if ($_SESSION['userType'] === 'committeeMember') {
                        echo '<a href="'.PROGRAMME_ADMIN_PAGE.'" class="nav-item nav-link">Programme</a>';
                    } else if ($_SESSION['userType'] === 'admin') {
                        echo '<a href="'.PROGRAMME_SUPERADMIN_PAGE.'" class="nav-item nav-link">Programme</a>';
                    } 
                ?>
                <a href="<?php echo MERCHANDISE_PAGE; ?>" class="dropdown-item">Merchandise</a>
                <a href="<?php echo BOOK_PAGE; ?>" class="dropdown-item">E-Book</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    
    <!-- Page Content -->
    <div class="page-container">
        <div class="page-wrapper-content">
            <div class="page-content-main">
                <div class="page-header">
                    <?php
                       require_once "includes/dbh.inc.php";

                       $query = "SELECT * FROM book";

                        $stmt = $pdo->prepare($query);
                        $stmt->execute();

                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $counter = count($results);

                        if ($counter !== 0 && $counter !== 1) {
                            echo '<h3>'.$counter.' Books</h3>';
                        } else {
                            echo '<h3>'.$counter.' Book</h3>';
                        }
                        
                    
                    echo '
                        <a class="add-merchandise-btn" href="/Book/book-add.php">
                        <i class=\'bx bx-plus\'></i>Sell a Book</a>
                            </div>
                            <div class="content-list-section">
                                <div class="content-list-container">
                                    <div class="content-table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">ID</th>
                                                    <th>Title</th>
                                                    <th>Subject</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                        try {
                                            

                                            if (!empty($results)) {
                                                foreach ($results as $book) {
                                                    echo '<tr>';
                                                        echo '<td>';
                                                            echo '<div style="text-align: center">' . $book['book_id'] . '</div>';
                                                        echo '</td>';
                                                        echo '<td>';
                                                        echo '<div class="name-container">';
                                                            echo '<div class="img-container">';
                                                                echo '<img src="' . $book['url_image']. '">';
                                                            echo '</div>';
                                                            echo '<div class="text-container">';
                                                                echo '<span>'. $book['book_title'] .'</span>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                        echo '<td>';
                                                            echo '<div>' . $book['book_subject'] . '</div>';
                                                        echo '</td>';
                                                        echo '<td>';
                                                            if (empty($book['book_desc'])) {
                                                                echo '<div style="color: red;">none</div>';
                                                            } else {
                                                                echo '<div class="truncate">' . $book['book_desc'] . '</div>';
                                                            } 
                                                        echo '</td>';
                                                        echo '<td>';
                                                            echo '<div>RM' . $book['book_price'] . '</div>';
                                                        echo '</td>';
                                                        // echo '<td>';
                                                        //     echo '<div>' . $book['size'] . '</div>';
                                                        // echo '</td>';
                                                        echo '<td>';
                                                            echo '<div class="table-btn">';
                                                                echo '<button onclick="redirectToEditPage('. $book['book_id'] .')">';
                                                                    echo '<span>Edit</span>';
                                                                echo '</button>';
                                                            echo '</div>';
                                                        echo '</td>';
                                                    echo '</tr>';
                                                }
                                            } else {
                                                echo '<tr>
                                                        <th colspan="8" style="text-align: center; background: none;">There are no available book</th>
                                                    </tr>';
                                            }
                                            $pdo = null; $stmt = null;
                                        } catch (PDOException $e) {
                                            die("Query failed: " . $e->getMessage());
                                        }   
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    <script src="js/book.list.js"></script>
    <script src="js/sidebar.js"></script>
</body>
