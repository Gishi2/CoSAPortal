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
    <link href="\Shopping\css\navbar.css" rel="stylesheet">
    <link href="\Shopping\css\order-details.css" rel="stylesheet">    
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="<?php echo HOME_PAGE; ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="header-logo" src="/Homepage/img/cosa/cosa_logo_inBlue.png">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
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
                    // echo '<a href="'.HOME_PAGE.'" class="nav-item nav-link">Home</a>';
                ?>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color: #1B2C51; margin-right: 2rem;">PAGES</a>
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
    <?php
    // try {
        if (isset($_GET['id'])) {
            $id_Json = $_GET['id'];
            $id_value = json_decode(urldecode($id_Json), true);

            if (is_array($id_value)) {
                $id = implode(',', $id_value);
            } else {
                $id = $id_value;
            }   
        } else {
            echo "Order ID not found!";
        }

        require_once 'includes/dbh.inc.php';
        
        $query = "SELECT 
            orders.order_id AS id,
            orders.payment_method AS payment,
            orders.user_id AS user,
            orders.order_status AS status,
            orders.order_note AS note,
            COALESCE(merchandise.image_url, book.url_image) AS image_url,
            UPPER(COALESCE(merchandise.name, book.book_title)) AS name,
            COALESCE(merchandise.price, book.book_price) AS price,
            orders_items.order_quantity AS quantity,
            orders_items.order_size AS size
            FROM orders
            LEFT JOIN orders_items ON orders.order_id = orders_items.order_id
            LEFT JOIN merchandise ON orders_items.product_id = merchandise.id
            LEFT JOIN book ON orders_items.product_id = book.book_id
            WHERE orders.order_id = $id;";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // }
    ?>

    <div class="container">
        <div class="inner-container">
            <section class="left">
                <div class="flex-column">
                    <div class="product-image">
                        <img src="<?php echo $result['image_url'] ?>">
                    </div>
                </div>
            </section>
            <section class="right">
                <div class="flex-column">
                    <div class="product-details">
                        <div class="name bold">
                            <span><?php echo $result['name'] ?></span>
                                <span class="order">
                                    <?php 
                                        if ($result['status'] === '1') {
                                            echo "PENDING";
                                        } else if ($result['status'] === '2') {
                                            echo "COMPLETED";
                                        } else {
                                            echo "CANCELLED";
                                        }
                                    ?>
                                </span>
                            <span class="order">ORDER ID <?php echo $result['id'] ?></span>
                        </div>
                        <div class="price">
                            <span>RM<?php echo $result['price'] ?></span>
                        </div>
                        <div class="information">
                            <span>Order Information</span>
                        </div>
                        <div class="order-information">
                            <div class="user">
                                <span>User ID: <?php echo $result['user'] ?></span>
                            </div>
                            <div class="quantity">
                                <span>Quantity: <?php echo $result['quantity'] ?></span>
                            </div>
                            <div class="payment">
                                <span>Payment Method: 
                                    <?php 
                                        if ($result['payment'] === 1) {
                                            echo "Cash on Delivery";
                                        } else {
                                            echo "Online Banking";
                                        }
                                    ?>
                                </span>
                            </div>   
                            <div class="note">
                                <span>Order Note:</span>
                                <span class="red-text">
                                    <?php 
                                        if (empty($result['note'])) {
                                            echo "none";
                                        } 
                                    ?>
                                </span>
                            </div>
                            <div class="button">
                                <button class="cancel-btn" onclick="goBack()">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php 
        $pdo = null; $stmt = null;
    ?>

    <script src="/Shopping/js/order-details.js"></script>
</body>