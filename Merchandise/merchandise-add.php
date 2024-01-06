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
    <link href="\Merchandise\css\merchandise-add.css" rel="stylesheet">    
</head>

<body>
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
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color: #1B2C51;">PAGES</a>
            <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                <a href="<?php echo PROGRAMME_PAGE; ?>" class="dropdown-item">Programme</a>
                <a href="<?php echo MERCHANDISE_PAGE; ?>" class="dropdown-item">Merchandise</a>
                <a href="<?php echo BOOK_PAGE; ?>" class="dropdown-item">E-Book</a>
            </div>
        </div>
        <a href="<?php echo SIGN_UP_PAGE; ?>" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login / Sign Up<i class="fa fa-arrow-right ms-3"></i></a>
    </nav>
    <!-- Navbar End -->

    <form action="includes/merchandise.inc.php" method="POST" enctype="multipart/form-data">
        <div class="main-page">
            <div class="product-edit-container">
                <h3>Basic Information</h3>
                <div class="product-image">
                    <div class="edit-label">
                        <span>Product Image</span>
                    </div> 
                    <div class="edit-image">
                        <div class="text">
                            <span class="mandatory-icon">*</span>
                            <span>1 : 1 Image</span>
                        </div>
                        <div class="insert-image" onclick="triggerFileInput()">
                            <input type="file" name="file" accept="image/*" multiple="false" aspect="1" id="fileInput"> 
                            <i class="fa-regular fa-image"></i>
                            <span>Add Image</span>
                        </div>
                        <div class="imagePreview" id="imagePreviewContainer" onclick="previewImage()">
                            <!-- <img src="\Merchandise\images\cosa-bomber.png"> -->
                        </div>
                        <span class="previewMessage" id="previewMessage"></span>
                        <div id="overlay" class="overlay" onclick="closePreview()"></div>
                        <div id="pop-up-preview" class="pop-up-preview">
                            <!-- <img src="\Merchandise\images\cosa-bomber.png"> -->
                        </div>
                    </div>
                </div>
                <div class="product-name">
                    <div class="edit-label">
                        <span class="mandatory-icon">*</span>
                        <span>Product Name</span>
                    </div>  
                    <input name="name" id="name" type="text" placeholder="Name" size="large" resize="none">
                </div>
                <div class="product-stock">
                    <div class="edit-label">
                        <span class="mandatory-icon">*</span>
                        <span>Product Stock</span>
                    </div>
                    <input name="stock" id="stock" type="text" placeholder="Stock" size="large" resize="none">
                </div>
                <div class="product-size">
                    <div class="edit-label">
                        <span class="mandatory-icon">*</span>
                        <span>Product Size</span>
                    </div>
                    <!-- <input name="size" type="text" placeholder="Size" size="large" resize="none"> -->
                    <div class="checkbox-size">
                        <div class="checkbox">
                            <input type="checkbox" name="size_S">
                            <label>S</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="size_M">
                            <label>M</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="size_L">
                            <label>L</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="size_XL">
                            <label>XL</label>
                        </div>
                    </div>
                </div>
                <div class="product-price">
                    <div class="edit-label">
                        <span class="mandatory-icon">*</span>
                        <span>Product Price</span>
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <span class="prefix" style="padding-left: 12px;">RM</span>
                            <span class="prefix" style="padding-left: 12px;">|</span>
                            <input name="price" id="price" type="text" placeholder="Enter amount">
                        </div>
                    </div>
                </div>
                <div class="product-description">
                    <div class="edit-label">
                        <span class="mandatory-icon">*</span>
                        <span>Product Description</span>
                    </div>
                    <textarea name="description" id="description" type="textarea" resize="none" rows="2" minrows="9" maxrows="26" autosize="true"
                    maxlength="Infinity" restrictiontype="input" style="resize: none; min-height: 210px; height: 210px;"></textarea>
                </div>
            </div>
        </div>

        <div class="button-container">
            <div class="button">
                <div class="button-div" onclick="triggerLink()">
                    <a id="button-link" class="button-link" href="includes/merchandise.get.inc.php"></a>
                    <span>Cancel</span>
                </div>
                <button class="save-btn" type="submit" id="submit" name="submit" disabled>
                    <span>Save and Publish</span>
                </button>
            </div>
        </div>
    </form>

    <script src="/Merchandise/js/merchandise.js"></script>
    <script src="/Merchandise/js/merchandise.add.field.js"></script>
</body>