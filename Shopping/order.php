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
    <link href="\Homepage\css\style.css" rel="stylesheet">
    <link href="\Shopping\css\order.css" rel="stylesheet">    
</head>
<body>
    <nav class="navbar navbar-expand-lg box-shadow bg-white navbar-light fixed-top p-0 wow fadeIn" data-wow-delay="0.1s" style="box-shadow: 0 1px 4px 0 rgba(74,74,78,.12);">
        <a href="<?php echo HOME_PAGE; ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="header-logo" src="\Homepage\img\cosa\cosa_logo_inBlue.png">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>`
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo HOME_PAGE; ?>" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="margin-right: 50px;">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0" style="right: 1rem; box-shadow: 0 1px 4px 0 rgba(74,74,78,.12);">
                        <a href="<?php echo PROGRAMME_PAGE; ?>" class="dropdown-item">Programme</a>
                        <a href="<?php echo MERCHANDISE_PAGE; ?>" class="dropdown-item">Merchandise</a>
                        <a href="<?php echo BOOK_PAGE; ?>" class="dropdown-item">E-Book</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-0">
        <main class="content">
            <form method="POST" action="includes/order.inc.php" onsubmit="return validateForm()">
            <section class="content-box-0">

                <div class="content-box-header">
                    <div class="product">
                        <span>Products Ordered</span>
                    </div>
                    <div class="unit-price justify-right">
                        <span>Unit Price</span>
                    </div>
                    <div class="quantity justify-right">
                        <span>Quantity</span>
                    </div>
                    <div class="price justify-right">
                        <span>Item Subtotal</span>
                    </div>  
                </div>
                <?php
                    try {
                        $cartIDsString = $_COOKIE['cartIDs'];
                        $cartIDs = json_decode(urldecode($cartIDsString), true);
                        $cartIDArray = implode(',', $cartIDs);

                        require_once 'includes/dbh.inc.php';

                        $query = "SELECT cart.cart_id, cart.quantity, cart.product_id, cart.price, cart.quantity, merchandise.name, cart.size, merchandise.image_url FROM cart
                        INNER JOIN merchandise ON cart.product_id = merchandise.id WHERE cart.cart_id IN ($cartIDArray)";

                        $stmt = $pdo->prepare($query);
                        $stmt->execute();

                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $counter = count($results);
                        $orderTotal = 0;

                        if ($counter > 0) {
                            foreach ($results as $product) {
                                $totalPrice = (float)$product['price'] * (float)$product['quantity'];
                                $formattedTotalPrice = number_format($totalPrice, 2, '.', '');
                                echo '<div class="content-box-product">';
                                    echo '<div class="product-child-padding">';
                                        echo '<div class="product-box">';
                                            echo '<div class="product-details">';
                                                echo '<img src="'. $product['image_url'] . '">';
                                                echo '<span>' .$product['name']. '</span>';
                                                echo '<span>Variation: ' .$product['size']. '</span>';
                                            echo '</div>';
                                            echo '<div class="unit-price justify-right">';
                                                echo '<span>RM' .$product['price']. '</span>';
                                            echo '</div>';
                                            echo '<div class="quantity justify-right">';
                                                echo '<span>' .$product['quantity']. '</span>';
                                            echo '</div>';
                                            echo '<div class="price justify-right">';
                                                echo '<span>RM' .$formattedTotalPrice. '</span>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                    $orderTotal += (float)$formattedTotalPrice;
                                    echo '<input type="hidden" name="productId[]" value="'.$product['product_id'].'">';
                                    echo '<input type="hidden" name="size[]" value="'.$product['size'].'">';
                                    echo '<input type="hidden" name="quantity[]" value="'.$product['quantity'].'">';
                                echo '</div>';
                            }
                        }
                        $formattedOrderPrice = number_format($orderTotal, 2, '.', '');
                        echo '<input type="hidden" name="orderTotal" value="'.$formattedOrderPrice.'">';
                    } catch (PDOException $e) {
                        die("Query failed: " . $e->getMessage());
                    }    
                ?>
                 </section> 

            <section class="content-box-1">
                <div class="content-box-product">
                    <div class="product-child-padding" style="padding-top: 15px;">
                        <div class="product-box">
                            <div class="message">
                                <span>Message for us:</span>
                                <input type="text" placeholder="Please leave a message." id="message" name="message">
                            </div>
                            <div class="order-price justify-right">
                                <span>Order Total: RM</span>
                                <span><?php echo $formattedOrderPrice ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="content-box-2">
                <div class="content-box-product">
                    <div class="product-child-padding" style="padding-top: 15px;">
                        <div class="product-box">
                            <div id="payment" class="payment">
                                <span>Payment Method</span>
                                <button onclick="toggleActive('btn-cash')" type="button" id="btn-cash" value="1">Cash on Delivery</button>
                                <button onclick="toggleActive('btn-bank')" type="button" id="btn-bank" value="2">Online Banking</button>
                                <input type="hidden" id="activeButtonValue" name="activeButtonValue" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content-box-3">
                <div class="content-box-product">
                    <div class="footer">
                        <button class="cancel-btn" type="button" onclick="goBack()">Back</button>
                        <button type="submit" name="submit" onclick="orderCheck()">Place Order</button>
                    </div>
                </div>
            </section>
            </form>
        </main>
    </div>
</body>

<script src="/Shopping/js/order.js"></script>