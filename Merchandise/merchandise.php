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
    <link href="\Merchandise\css\merchandise.css" rel="stylesheet">    
</head>
<body>
    <nav class="navbar navbar-expand-lg box-shadow bg-white navbar-light fixed-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="<?php echo HOME_PAGE; ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="header-logo" src="\Homepage\img\cosa\cosa_logo_inBlue.png">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>`
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo HOME_PAGE; ?>" class="nav-item nav-link">Home</a>
                <!-- <a href="" class="nav-item nav-link">About</a> -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="<?php echo PROGRAMME_PAGE; ?>" class="dropdown-item">Programme</a>
                        <a href="<?php echo BOOK_PAGE; ?>" class="dropdown-item">E-Book</a>
                    </div>
                </div>
                <?php
                    if ($_SESSION['userType'] != 'normalUser') {
                        echo '<a class="add-merchandise-btn" href="/Merchandise/merchandise-add.php"><div>Merchandise Overview</div></a>';
                    }
                ?>
                <div class="nav-cart">
                    <i id="nav-cart-icon" class="fa-solid fa-cart-shopping" onclick="redirectToShopping()"></i>
                </div>
                <div class="box-cart" id="cart-container">
                    <?php
                        require_once 'includes/updateCart.inc.php';
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-1">
    <section class="main">

<?php
try {
    require_once "includes/merchandisedb.inc.php";

    $query = "SELECT * FROM merchandise";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($results) > 0) {
        $counter = 0;
        foreach ($results as $merchandise) {
            $counter++;
            echo '<a class="section-a" onclick="openPopUp(' .$counter. ')">';
            echo '<div class="section-link">';
                echo '<img src="' . $merchandise['image_url']. '">';
                echo '<span class="text-color section-text">';
                    echo '<p class="shirt-name">' .$merchandise['name']. '</p>';
                    echo '<p class="shirt-price">RM' .$merchandise['price']. '</p>';
                echo '</span>';
            echo '</div>';
            echo '</a>';
        }

        echo '<div id="overlay" class="pop-up-overlay">';
        $counter = 0;

        foreach ($results as $merchandise) {
            $counter++;
            echo '<div id="pop-up-' .$counter. '" class="pop-up" data-merchandise-id="' . $merchandise['id'] . '">';
                echo '<div class="pop-up-image">';
                    echo '<img src="' . $merchandise['image_url']. '">';
                echo '</div>';
                echo '<span class="fa-solid fa-xmark" onclick="closePopUp(' .$counter. ')"></span>';
                echo '<div class="pop-up-description">';
                    echo '<h2 class="name">' .$merchandise['name']. '</h2>';
                    echo '<span class="price">RM' .$merchandise['price']. '</span>';
                    echo '<span class="description">' .$merchandise['description']. '</span>';
                    echo '<span class="quantity">QUANTITY:</span>';
                    echo '<div class="pop-up-quantity">';
                        echo '<button class="quantity-btn" onclick="decreaseQuantity(\'pop-up-' .$counter. '\')">-</button>';
                        echo '<input type="text" name="quantity" class="quantity-input" value="1" readonly>';
                        echo '<button class="quantity-btn" onclick="increaseQuantity(\'pop-up-' .$counter. '\')">+</button>';
                    echo '</div>';
                    echo '<span class="size">SIZE:</span>';
                    echo '<div id="sizeButtons" class="pop-up-size">';
                        echo '<button class="size-btn"' .(strpos($merchandise['size'], 'S') !== false ? '' : 'disabled'). '>S</button>';
                        echo '<button class="size-btn"' .(strpos($merchandise['size'], 'M') !== false ? '' : 'disabled'). '>M</button>';
                        echo '<button class="size-btn"' .(strpos($merchandise['size'], 'L') !== false ? '' : 'disabled'). '>L</button>';
                        echo '<button class="size-btn"' .(strpos($merchandise['size'], 'XL') !== false ? '' : 'disabled'). '>XL</button>';
                    echo '</div>';
                    echo '<div class="pop-up-btn">';
                        echo '<div class="button cart-btn" onclick="addToCartButton(' .$counter. ')">';
                            echo '<button>';
                                echo '<i class="fa-solid fa-cart-plus"></i>';
                            echo 'Add to Cart</button>';
                        echo '</div>';
                        echo '<div class="button buy-btn" onclick="buyNowButton(' .$counter. ')">';
                        echo '<button>Buy Now</button>';
                        echo '</div>'; 
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<div class="no-merchandise-message">';
        echo 'There are currently no available merchandise.</div>';
    }
    $pdo = null; $stmt = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}    
?>
        <div class="success-cart-container"  id="successPopup">
            <div class="success-cart">
                <div class="circle-cart">
                    <i class="fa-regular fa-circle-check"></i>
                </div>
                <span>Item has been added to your shopping cart</span>
            </div>
        </div>
    </section>
</main>

<script src="/Merchandise/js/merchandise.js"></script>'
<script src="/Merchandise/js/merchandise.server.js"></script>
</body>
</html>
