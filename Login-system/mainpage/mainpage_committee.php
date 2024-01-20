<?php
session_start();
$matrixId = $_SESSION['matrixId']; // Assuming 'matrixId' is stored in the session
echo "<script>console.log('Session Matrix ID:', '" . $_SESSION['matrixId'] . "');</script>";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CoSAPortal | Committee Mainpage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/Homepage/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/Homepage/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/Homepage/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/Homepage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/Homepage/css/style.css" rel="stylesheet">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Mainpage Css Link -->
    <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">

      <!-- Mainpage2 Css Link  -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>   
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Side Bar Test Start-->

    <!-- <div class="sidebar"> -->
        <!-- <div class="logo-details">
            
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list" style="padding: 0;">
          <li>
             <i class='bx bx-search' ></i>
             <input type="text" placeholder="Search...">
             <span class="tooltip">Search</span>
          </li>
          <li>
            <li>
                <a href="#">
                    <i class='bx bx-home' ></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
            <a href="fetch_programme_user.php">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Programme Registration</span>
            </a>
             <span class="tooltip">Programme</span>
          </li>
          <li>
           <a href="#">
             <i class='bx bx-user' ></i>
             <span class="links_name">User</span>
           </a>
           <span class="tooltip">User</span>
         </li>
         <li>
           <a href="#">
             <i class='bx bx-folder' ></i>
             <span class="links_name">E-Book Shop</span>
           </a>
           <span class="tooltip">E-Book Shop</span>
         </li>
         <li>
           <a href="/Merchandise/merchandise.php">
             <i class='bx bx-cart-alt' ></i>
             <span class="links_name">Merchandise</span>
           </a>
           <span class="tooltip">Merchandise</span>
         </li>

         <li class="profile">
         <div class="name-job">
            <div class="profile_name"><?php 
            echo $_SESSION['username']; 
            ?></div>
            <div class="job"><?php 
            echo $_SESSION['matrixId'];
            ?></div>
        </div>
             <i class='bx bx-log-out' id="log_out" ></i>
         </li>
        </ul>
      </div> -->
      <!-- <section class="home-section"> -->
          <!-- Top Navbar Start -->
        <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
      <a href="/index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
          <img class="header-logo" src="/Homepage/img/cosa/cosa_logo_inBlue.png">
          <!-- <h1 class="m-0 text-primary">PORTAL</h1> -->
          <!-- <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Klinik</h1> -->
      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto p-4 p-lg-0">
              <a href="/index.php" class="nav  -item nav-link">Home</a>
          </div>
          <a href="/Login-system/logout.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Log Out<i class="fa fa-arrow-right ms-3"></i></a>
      </div>
  </nav>
  <!-- Navbar End -->
        <!-- Top Navbar End -->

    <!-- Page Header Start -->
    <!-- TOP SECTION -->
    <section class="grid">
          <!-- Main Carousel -->
          <div class="s-12 margin-bottom carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-hide-arrows background-dark">
          <div class="item background-image" style="background-image:url(img/img-07.jpg); background-position-y: -400px;">
              <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-blue">We are Future System Developers</p><br>
              <p class="text-padding text-size-20 text-dark text-uppercase background-white">Welcome back! <?php echo $_SESSION['username'];?></p>
            </div>
            <div class="item background-image" style="background-image:url(img/img-07.jpg); background-position-y: -400px;">
              <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-blue">Promoveo Ut Tech</p><br>
              <p class="text-padding text-size-20 text-dark text-uppercase background-white">What would you like to do today?</p>
            </div>
            <div class="item background-image" style="background-image:url(img/img-07.jpg); background-position-y: -400px;">
              <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-blue">For the Future, CoSA Forever</p><br>
              <p class="text-padding text-size-20 text-dark text-uppercase background-white">Manage CoSA through CoSAPortal to ease ur day!</p>
            </div>
          </div>  
    </section>
    <!-- Page Header End -->


    <!-- Programme Cards Start -->
    <section class="grid margin text-center">
          <a href="/Merchandise/merchandise-list.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-red">
            <i class="bx bx-cart-alt text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">Merchandise Management</h3>
          </a>
          <a href="/Book/book-list.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-blue">
            <i class="bx bx-grid-alt text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">E-Book Shop</h3>
          </a>
          
          
          <a href="/Homepage/php/fetch_programme_admin.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-orange">
            <i class="icon-sli-diamond text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">Programme Management</h3>
          </a>
          <a href="/Login-system/useraccount/details_committee.php" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-aqua">
            <i class="icon-sli-share text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">Account Details</h3>
          </a>
        </section>
    <!-- Programme Cards End -->

    <!-- Navbar End -->
      <!-- </section> -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Homepage/lib/wow/wow.min.js"></script>
    <script src="/Homepage/lib/easing/easing.min.js"></script>
    <script src="/Homepage/lib/waypoints/waypoints.min.js"></script>
    <script src="/Homepage/lib/counterup/counterup.min.js"></script>
    <script src="/Homepage/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/Homepage/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/Homepage/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/Homepage/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="/Homepage/js/main.js"></script>

    <!-- Side Navigation Bar-->
    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");
      
        closeBtn.addEventListener("click", ()=>{
          sidebar.classList.toggle("open");
          menuBtnChange();//calling the function(optional)
        });
      
        searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
          sidebar.classList.toggle("open");
          menuBtnChange(); //calling the function(optional)
        });
      
        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
         if(sidebar.classList.contains("open")){
           closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
         }else {
           closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
         }
        }
        </script>

        <script type="text/javascript">
            var popupViews = document.querySelectorAll('.popup-view');
            var popupBtns = document.querySelectorAll('.popup-btn');
            var closeBtns = document.querySelectorAll('.close-btn');

            //javascript for quick view button
            var popup = function(popupClick){
            popupViews[popupClick].classList.add('active');
            }

            popupBtns.forEach((popupBtn, i) => {
            popupBtn.addEventListener("click", () => {
                popup(i);
            });
            });

            //javascript for close button
            closeBtns.forEach((closeBtn) => {
            closeBtn.addEventListener("click", () => {
                popupViews.forEach((popupView) => {
                popupView.classList.remove('active');
                });
            });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('.add-cart-btn').click(function(event) {
                    event.preventDefault(); // Prevent the default form submission behavior

                    // Retrieve the program ID associated with the clicked button
                    var programId = $(this).data('program-id'); // Assuming 'data-program-id' attribute holds the program ID
                    console.log("Program ID:", programId);

                    // AJAX request to the PHP endpoint
                    $.ajax({
                        type: 'POST',
                        url: 'register_programme.php', // Replace with your PHP endpoint URL
                        data: { programId: programId },
                        success: function(response) {
                            // Handle the response from the server after registration
                            if (response === "Registration successful") {
                                alert('Successfully registered to the program!');
                                // You might want to refresh the page or update UI accordingly
                            } else if (response === "Successfully registered back to the program!") {
                                alert('Successfully registered back to the program!');
                            } else if (response === "You are already registered for this programme!") {
                                alert('You are already registered to this programme!');
                            } else {
                                alert('Unexpected response from the server' + response);
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle error cases here
                            alert('Error occurred while registering to the program');
                            console.error(error);
                        }
                    });
                });
            });
        </script>
        
        <script>
            $(document).ready(function() {
                // Click event for "Drop Program" button
                $('.add-wish').click(function(event) {
                    event.preventDefault(); // Prevent the default link behavior

                    // Retrieve the program ID associated with the clicked button
                    var programId = $(this).data('program-id'); // Assuming 'data-program-id' attribute holds the program ID
                    console.log("Program ID:", programId);

                    // AJAX request to the PHP endpoint for dropping a program
                    $.ajax({
                        type: 'POST',
                        url: 'drop_programme.php', // Create a new PHP file for handling drop program logic
                        data: { programId: programId },
                        success: function(response) {
                            // Handle the response from the server after dropping the program
                            if (response === "Program dropped successfully") {
                                alert('Program dropped successfully!');
                                // You might want to refresh the page or update UI accordingly
                            } else if (response === "You are not registered for this programme") {
                                alert('You are not registered for this programme');
                            } else if (response === "You have already dropped from this programme") {
                                alert('You have already dropped from this programme');
                            } else {
                                alert('Unexpected response from the server' + programId);
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle error cases here
                            alert('Error occurred while dropping the program');
                            console.error(error);
                        }
                    });
                });
            });
        </script>

        <!-- Script for mainpage only -->
        <script type="text/javascript" src="js/responsee.js"></script>
        <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
        <script type="text/javascript" src="js/template-scripts.js"></script>

</body>

</html>