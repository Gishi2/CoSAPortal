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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="\Homepage\css\bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="\Homepage\css\style.css" rel="stylesheet">
    <!-- <link href="\Merchandise\css\merchandise.css" rel="stylesheet"> -->
    <link href="\Book\css\book.css" rel="stylesheet">    
</head>
<body>

    <nav class="navbar navbar-expand-lg box-shadow bg-white navbar-light fixed-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="<?php echo HOME_PAGE; ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="header-logo" src="\Homepage\img\cosa\cosa_logo_inBlue.png">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>`
        </button
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <?php  
                    if ($_SESSION['userType'] === 'normalUser') {
                        echo '<a href="'.NORMAL_USER_PAGE.'" class="nav-item nav-link">Home</a>';
                    } else if ($_SESSION['userType'] === 'committeeMember') {
                        echo '<a href="'.COMMITTEE_USER_PAGE.'" class="nav-item nav-link">Home</a>';
                    } else if ($_SESSION['userType'] === 'admin') {
                        echo '<a href="'.ADMIN_USER_PAGE.'" class="nav-item nav-link">Home</a>';
                    } 
                ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="<?php echo PROGRAMME_PAGE; ?>" class="dropdown-item">Programme</a>
                        <a href="<?php echo BOOK_PAGE; ?>" class="dropdown-item">E-Book</a>
                    </div>
                </div>
                <a class="sell-book-btn" href="/Book/book-add.php"><div>Sell your Book</div></a>
                <div class="nav-cart">
                    <i id="nav-cart-icon" class="fa-solid fa-cart-shopping" onclick="redirectToShopping()"></i>
                </div>
                <div class="box-cart" id="cart-container">
                    <?php
                        require_once '../Merchandise/includes/updateCart.inc.php';
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <main class="container">
            <section class="content-container">
                <?php
                    try {
                        require_once 'includes/dbh.inc.php';

                        $query = "SELECT * from book;";
                        $stmt = $pdo->prepare($query);

                        $stmt->execute();

                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (!empty($results)) {
                            $counter = 0;
                            foreach ($results as $book) {
                                $counter++;
                                echo '<a class="section-a" onclick="openPopUp(' .$counter. ')">';
                                echo '<div class="content-box">';
                                    echo '<div class="image">';
                                        echo '<img src="'. $book['url_image'] .'">';
                                    echo '</div>';
                                    echo '<div class="details">';
                                        echo '<span>'. $book['book_title'] .'</span>';
                                        echo '<span>RM'. $book['book_price'] .'</span>';
                                        echo '<div id="star-rating"></div>';
                                        echo '<input type="hidden" value="'. $book['book_condition'] .'" id="star-value"></input>';
                                        echo '<span>Semester 3</span>';
                                    echo '</div>';
                                echo '</div>';
                                echo '</a>';
                            }

                            echo '<div id="overlay" class="pop-up-overlay">'; $counter = 0;

                            foreach ($results as $book) {
                                $counter++;
                                echo '<div id="pop-up-' .$counter. '" class="pop-up" data-book-id="' . $book['book_id'] . '">';
                                    echo '<div class="pop-up-image">';
                                        echo '<img src="' . $book['url_image']. '">';
                                    echo '</div>';
                                    echo '<span class="fa-solid fa-xmark" onclick="closePopUp(' .$counter. ')"></span>';
                                    echo '<div class="pop-up-description">';
                                        echo '<h2 class="name">' .$book['book_title']. '</h2>';
                                        echo '<span class="price">RM' .$book['book_price']. '</span>';
                                        echo '<span class="description">' .$book['book_desc']. '</span>';
                                        echo '<span class="description">' .$book['book_desc']. '</span>';
                                        echo '<div class="pop-up-btn">';
                                            // echo '<div class="button cart-btn" onclick="addToCartButton(' .$counter. ')">';
                                            //     echo '<button>';
                                            //         echo '<i class="fa-solid fa-cart-plus"></i>';
                                            //     echo 'Add to Cart</button>';
                                            // echo '</div>';
                                            echo '<div class="button buy-btn" onclick="buyNowButton(' .$counter. ')">';
                                            echo '<button>Buy Now</button>';
                                            echo '</div>'; 
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                            echo '</div>';                            
                        } else {
                            echo '<div>There are currently no available books.</div>';
                        }
                    } catch (PDOException $e) {
                        error_log("Query failed: " . $e->getMessage());
                        http_response_code(500);
                        echo "Error deleting item.";
                    }
                ?>
                
            </section>      
        </main>
        <script src="/Book/js/book.js"></script>'
        <script src="/Book/js/book.server.js"></script>
    </div>
</body>