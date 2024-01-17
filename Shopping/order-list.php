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

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="\Homepage\css\bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="\Shopping\css\sidebar.css" rel="stylesheet">
    <link href="\Shopping\css\navbar.css" rel="stylesheet"> 
    <link href="\Shopping\css\order-list.css" rel="stylesheet">  
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
                <a href="book-list.php">
                    <i class='bx bx-book' ></i>
                    <span class="links_name">Book</span>
                </a>
                <span class="tooltip">Book</span>
            </li>
         </ul>
    </div>
    <!-- Sidebar End -->

    <section class="content-section">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
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
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="margin-right: 2rem;">PAGES</a>
            <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                <a href="<?php echo PROGRAMME_PAGE; ?>" class="dropdown-item">Programme</a>
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

                        $query = "SELECT * from orders";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();

                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        echo '<h3>'. count($results) .' Orders</h3>';

                        $stmt = null;
                    ?>
                </div>
                <div class="content-list-section">
                    <div class="content-list-container">
                        <div style="margin-bottom: 1rem;">
                        <table class="header-box">
                            <thead>
                                <tr>
                                    <th width="40%">Product(s)</th>
                                    <th width="20%">Order Total</th>
                                    <th width="20%">Status</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                        <div class="content-table">
                        <?php
                            
                                try {
                                    $queryOrder = "SELECT 
                                        orders.order_id AS id,
                                        orders.order_totalPrice AS totalPrice,
                                        orders.order_status AS status,
                                        orders.user_id AS user,
                                        orders_items.order_quantity AS quantity,
                                        merchandise.name AS name,
                                        merchandise.image_url AS image_url
                                        FROM orders
                                        JOIN orders_items ON orders.order_id = orders_items.order_id
                                        LEFT JOIN merchandise ON orders_items.product_id = merchandise.id
                                        ORDER BY orders.order_id DESC";

                                    $stmtOrder = $pdo->prepare($queryOrder);
                                    $stmtOrder->execute();

                                    $results = $stmtOrder->fetchAll(PDO::FETCH_ASSOC);

                                    if (!empty($results)) {
                                        $currentOrderId = null;
                                        foreach ($results as $order) {
                                            
                                            if ($order['id'] != $currentOrderId) {
                                                if ($currentOrderId !== null) {
                                                    echo '</tbody></table>';
                                                }

                                                echo '<table class="content-box">';
                                                echo '<thead>';
                                                    echo '<tr>';
                                                        echo '<th colspan="2"><i class="bx bxs-user-circle"></i>'. $order['user'] .'</th>';
                                                        echo '<th colspan="4" style="text-align: right;">Order ID: '. $order['id'] .'</th>';
                                                    echo '</tr>';
                                                echo '</thead>';
                                            }
                                                echo '<tbody>';
                                                    echo '<tr>';
                                                        echo '<td width="40%">';
                                                            echo '<div class="name-container">';
                                                                echo '<div class="img-container">';
                                                                    echo '<img src="' . $order['image_url']. '">';
                                                                echo '</div>';
                                                                echo '<div class="text-container">';
                                                                    echo '<span>'. $order['name'] .'</span>';
                                                                    echo '<span>x'. $order['quantity'] .'</span>';
                                                                echo '</div>';
                                                            echo '</div>';
                                                        echo '</td width="20%">';
                                                        echo '<td>';
                                                            echo '<div>RM' . $order['totalPrice'] . '</div>';
                                                        echo '</td width="20%">';
                                                        echo '<td>';
                                                            if ($order['status'] === '1') {
                                                                echo '<div>Pending</div>';
                                                            }
                                                        echo '</td>';
                                                        echo '<td width="20%">';
                                                            echo '<div class="table-btn">';
                                                                echo '<a href="">View Details</a>';
                                                            echo '</div>';
                                                        echo '</td>';
                                                    echo '</tr>';

                                                    $currentOrderId = $order['id'];
                                            }
                                                echo '</tbody>';
                                            echo '</table>';
                                    } else {
                                        echo '<div>There are currently no orders</div>';
                                    }
                                    $pdo = null; $stmtOrder = null;
                                } catch (PDOException $e) {
                                    die("Query failed: " . $e->getMessage());
                                }   
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    <script src="js/merchandise.list.js"></script>
    <script src="js/sidebar.js"></script>
</body>