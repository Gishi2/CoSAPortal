<?php
    session_start();

    if (isset($_SESSION['matrixId'])) {
        $USER = $_SESSION['matrixId'];
    } else {
        header("Location: /Login-system/loginup.html");
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
    <link href="\Merchandise\css\merchandise-add.css" rel="stylesheet">    
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s" style="box-shadow: 0 1px 4px 0 rgba(74,74,78,.12);">
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
        require_once 'includes/dbh.inc.php';

        if (isset($_GET['id'])) {
            $merchandiseId = $_GET['id'];

            $query = "SELECT * FROM merchandise WHERE id = $merchandiseId";

            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $merchandiseName = $result['name'];
                $merchandiseStock = $result['stock'];
                $merchandisePrice = $result['price'];
                $merchandiseDesc = $result['description'];
                $merchandiseSizes = $result['size'];
                $merchandiseImageURL = $result['image_url'];
            }

            $sizeToArray = explode(",", $merchandiseSizes);
            $checkedSizes = array_fill_keys($sizeToArray, true);

            $pdo = null; $stmt = null;
        }
    ?>

    <!-- Form Start -->
    <form action="includes/updateMerchandise.inc.php?id=<?php echo $merchandiseId; ?>" method="POST" enctype="multipart/form-data">
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
                            <span>Edit Image</span>
                        </div>
                        <div class="imagePreview" id="imagePreviewContainer" onclick="previewImage()">
                           <!-- img -->
                        </div>
                        <span style="display:block;" class="previewMessage" id="previewMessage"></span>
                        <div id="overlay" class="overlay" onclick="closePreview()"></div>
                        <div id="pop-up-preview" class="pop-up-preview">
                            <!--img  -->
                        </div>
                    </div>
                </div>
                <div class="product-name">
                    <div class="edit-label">
                        <span class="mandatory-icon">*</span>
                        <span>Product Name</span>
                    </div>  
                    <input name="name" id="name" type="text" placeholder="Name" size="large" resize="none"
                        value="<?php echo isset($merchandiseName) ? $merchandiseName : ''; ?>">
                </div>
                <div class="product-stock">
                    <div class="edit-label">
                        <span class="mandatory-icon">*</span>
                        <span>Product Stock</span>
                    </div>
                    <input name="stock" id="stock" type="text" placeholder="Stock" size="large" resize="none"
                        value="<?php echo isset($merchandiseStock) ? $merchandiseStock : ''; ?>">
                </div>
                <div class="product-size">
                    <div class="edit-label">
                        <span class="mandatory-icon">*</span>
                        <span>Product Size</span>
                    </div>
                    <div class="checkbox-size">
                        <div class="checkbox">
                            <input type="checkbox" name="size_S" id="size_S" <?php echo isset($checkedSizes['S']) ? 'checked' : ''; ?>>
                            <label>S</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="size_M" id="size_M" <?php echo isset($checkedSizes['M']) ? 'checked' : ''; ?>>
                            <label>M</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="size_L" id="size_L" <?php echo isset($checkedSizes['L']) ? 'checked' : ''; ?>>
                            <label>L</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="size_XL" id="size_XL" <?php echo isset($checkedSizes['XL']) ? 'checked' : ''; ?>>
                            <label>XL</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="size_NONE" id="size_NONE" <?php echo isset($checkedSizes['None']) ? 'checked' : ''; ?>>
                            <label>None</label>
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
                            <input name="price" id="price" type="text" placeholder="Enter amount"
                                value="<?php echo isset($merchandisePrice) ? $merchandisePrice : ''; ?>">
                        </div>
                    </div>
                </div>
                <div class="product-description">
                    <div class="edit-label">
                        <span class="mandatory-icon">*</span>
                        <span>Product Description</span>
                    </div>
                    <textarea name="description" id="description" type="textarea" resize="none" rows="2" minrows="9" maxrows="26" autosize="true"
                        maxlength="Infinity" restrictiontype="input" style="resize: none; min-height: 210px; height: 210px;"
                        ><?php echo isset($merchandiseDesc) ? $merchandiseDesc : ''; ?></textarea>
                </div>
            </div>
        </div>

        <div class="button-container">
            <div class="button">
                <div class="button-div" onclick="goBack()">
                    <a id="button-link" class="button-link" href="/Merchandise/merchandise-edit.php"></a>
                    <span>Cancel</span>
                </div>
                <button class="delete-btn" type="button" onclick="submitFormWithAction(<?php $merchandiseId ?>)">
                    <span>Delete</span>
                </button>
                <button class="save-btn" type="submit" id="submit" name="submit" disabled>
                    <span>Save and Publish</span>
                </button>
            </div>
        </div>
    </form>

    <script src="/Merchandise/js/merchandise.js"></script>
    <script src="/Merchandise/js/merchandise.field.js"></script>
    <script>
        var imageUrl = "<?php echo $merchandiseImageURL; ?>";

        document.addEventListener('DOMContentLoaded', function() {
            checkField(true);

            imagePreviewContainer.innerHTML = '';
            previewMessage.textContent = '';
            popupPreview.innerHTML = '';

            var previewImage = document.createElement('img');
            imagePreviewContainer.style.display = 'flex';

            var popupImage = document.createElement('img');
            previewMessage.style.display = 'block';

            previewImage.src = imageUrl;
            popupImage.src = imageUrl;

            imagePreviewContainer.appendChild(previewImage);
            popupPreview.appendChild(popupImage);
        });
    </script>
</body>