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

    <!-- Stylesheet -->
    <link href="\Shopping\css\sidebar.css" rel="stylesheet">
    <link href="\Shopping\css\navbar.css" rel="stylesheet"> 
    <link href="\Shopping\css\shopping.css" rel="stylesheet"> 
</head>
<body>
<!-- Sidebar Start -->
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="book-list.php">
                    <i class='bx bx-book'></i> 
                    <span class="links_name">My Account</span>
                </a>
                <span class="tooltip">Account</span>
            </li>
            <li>
                <a href="/Shopping/purchase-list.php">
                <i class='bx bx-clipboard'></i>
                    <span class="links_name">My Purchase</span>
                </a>
                <span class="tooltip">Purchase</span>
            </li>
            <li>
            <a href="/Shopping/shopping-cart.php">
                <i class='bx bx-cart-alt'></i>
                <span class="links_name">Shopping Cart</span>
            </a>
            <span class="tooltip">Shopping Cart</span>
            </li>
         </ul>
    </div>
    <!-- Sidebar End -->

<section class="content-section">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg box-shadow bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s" style="box-shadow: 0 1px 4px 0 rgba(74,74,78,.12);">
        <a href="<?php echo HOME_PAGE; ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="header-logo" src="\Homepage\img\cosa\cosa_logo_inBlue.png">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>`
        </button>

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
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="margin-right: 50px;">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0" style="right: 1rem; box-shadow: 0 1px 4px 0 rgba(74,74,78,.12);">
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
            </div>
        </div>
    </nav>

    <div class="container-0">
        <main class="content">
            <section class="content-box-0">
                <div class="content-box-header">
                    <div class="checkbox center">
                        <input type="checkbox" id="parent-checkbox">
                    </div>
                    <div class="product">
                        <span>Product</span>
                    </div>
                    <div class="size center">
                        <span>Size</span>
                    </div>
                    <div class="unit-price center">
                        <span>Unit Price</span>
                    </div>
                    <div class="quantity center">
                        <span>Quantity</span>
                    </div>
                    <div class="price center">
                        <span>Total Price</span>
                    </div>  
                    <div class="action center">
                        <span>Action</span>
                    </div>
                </div>
            
                <div class="content-box-product">
                    <div class="product-child-padding">
                        <?php
                        try {
                            require_once 'includes/dbh.inc.php';

                            $query = "SELECT cart.cart_id, cart.price, cart.quantity, merchandise.name, cart.size, merchandise.image_url FROM cart
                            INNER JOIN merchandise ON cart.product_id = merchandise.id";

                            $stmt = $pdo->prepare($query);
                            $stmt->execute();

                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $counter = count($results);

                            if (!empty($results)) {
                                foreach ($results as $product) {
                                    $totalPrice = (float)$product['price'] * (float)$product['quantity'];
                                    $formattedTotalPrice = number_format($totalPrice, 2, '.', '');
                                    echo '<div class="product-box" data-cart-id="' . $product['cart_id'] . '">';
                                        echo '<div class="checkbox">';
                                            echo '<input type="checkbox" class="product-checkbox" value="' .$product['cart_id']. '">';
                                        echo '</div>';
                                        echo '<div class="product-details">'; 
                                            echo '<img src="'. $product['image_url'] . '">';
                                            echo '<span>' .$product['name']. '</span>';
                                        echo '</div>';
                                        echo '<div class="size">';
                                                echo '<span>' .$product['size']. '</span>';
                                            echo '</div>';
                                        echo '<div class="unit-price">';
                                            echo '<span>RM' .$product['price']. '</span>';
                                        echo '</div>';
                                        echo '<div class="quantity">';
                                            echo '<span>' .$product['quantity']. '</span>';
                                        echo '</div>';
                                        echo '<div class="price">';
                                            echo '<input type="hidden" id="itemSubTotal" value="'.$formattedTotalPrice.'">';
                                            echo '<span>RM' .$formattedTotalPrice. '</span>';
                                        echo '</div>';
                                        echo '<div class="action">';
                                        echo '<form action="/Merchandise/includes/deleteCart.inc.php" method="post" onsubmit="return confirmSubmit();">'; 
                                            echo '<input type="hidden" name="itemId" value="'. $product['cart_id'] .'">';
                                            echo '<button type="submit">Delete</button>';
                                        echo '</div>';
                                        echo '</form>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<div class="center">Your shopping cart is empty.</div>';
                            }
                            $pdo = null; $stmt = null;
                        } catch (PDOException $e) {
                            die("Query failed: " . $e->getMessage());
                        }    
                        ?>  
                    </div>
                </div>
            </section>

            <?php 
                if ($counter != 0) {
                    echo '<div class="footer">';
                        echo '<div class="total">';
                                if ($counter != 1 && $counter != 0) {
                                    $text = $counter . ' items';
                                    echo '<span>Total ('. $text .'): </span>';
                                    echo '<span id="total-price"></span>';
                                } else if ($counter === 1) {
                                    $text = $counter . ' item';
                                    echo '<span>Total ('. $text .'): </span>';
                                    echo '<span id="total-price"></span>';
                                } 
                        echo '</div>';
                        echo '<button class="cancel-btn" onclick="goBack()">';
                            echo '<span>Back</span>';
                        echo '</button>';
                        echo '<button onclick="orderNow()">';
                            echo '<span>Order Now</span>';
                        echo '</button>';
                    echo '</div>;';
                }
            ?>
        </main>
    </div>
</section>

    <script src="js/sidebar.js"></script>
    <script src="js/shopping.js"></script>
</body>