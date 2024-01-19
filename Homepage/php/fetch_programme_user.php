<?php
// session_start();
// $matrixId = $_SESSION['matrixId']; // Assuming 'matrixId' is stored in the session
// echo "<script>console.log('Session Matrix ID:', '" . $_SESSION['matrixId'] . "');</script>";
// echo "Current File: " . __FILE__ . "<br>";
// echo "Current Directory: " . __DIR__ . "<br>";
session_start();

    // Check if the user is not logged in
    if (!isset($_SESSION['matrixId'])) {
        // Redirect to the login page
        header("Location: /Login-system/login.html");
        exit(); // Ensure that the script stops here
    } else {
        $matrixId = $_SESSION['matrixId'];
        echo "<script>console.log('Session Matrix ID:', '" . $_SESSION['matrixId'] . "');</script>";
    }

    // Now, include other necessary files or perform actions for the logged-in user
    // require_once '../config/config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CoSA Portal | Programme Registration</title>
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

    <div class="sidebar">
        <div class="logo-details">
            
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list" style="padding: 0;">
          <!-- <li>
             <i class='bx bx-search' ></i>
             <input type="text" placeholder="Search...">
             <span class="tooltip">Search</span>
          </li> -->
          <li>
            <a href="/Login-system/mainpage/mainpage_user.php">
              <i class='bx bx-home'></i>
              <span class="links_name">Mainpage</span>
            </a>
             <span class="tooltip">Mainpage</span>
          </li>
          <li> 
            <a href="fetch_programme_user.php">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Programme Registration</span>
            </a>
             <span class="tooltip">Programme</span>
          </li>
          <li>
           <a href="/Login-system/useraccount/details.php">
             <i class='bx bx-user' ></i>
             <span class="links_name">User</span>
           </a>
           <span class="tooltip">User</span>
         </li>
         <li>
           <a href="/Book/book.php">
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
            <div class="profile_name">
                <?php 
                echo $_SESSION['username'];
                ?>
            </div>
            <div class="job">
                <?php 
                echo $_SESSION['matrixId'];
                ?>
            </div>
         </div>
             <i class='bx bx-log-out' id="log_out"></i>
         </li>
        </ul>
      </div>
      <section class="home-section">
          <!-- Top Navbar Start -->
        <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
      <a href="/Login-system/mainpage/mainpage_user.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
          <img class="header-logo" src="/Homepage/img/cosa/cosa_logo_inBlue.png">
          <!-- <h1 class="m-0 text-primary">PORTAL</h1> -->
          <!-- <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Klinik</h1> -->
      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto p-4 p-lg-0">
              <a href="/Login-system/mainpage/mainpage_user.php" class="nav  -item nav-link">Home</a>
              <!-- <a href="about.html" class="nav-item nav-link">About</a> -->
              <!-- <a href="service.html" class="nav-item nav-link">Service</a> -->
              <!-- <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                  <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                      <a href="about.html" class="dropdown-item">About Us</a>
                      <a href="\potoub-html\course-registration.html" class="dropdown-item">Programme</a>
                      <a href="\potoub-html\Merchandise\merchandise.html" class="dropdown-item">Merchandise</a>
                      <a href="\potoub-html\CoSA E-Book\ebook.html" class="dropdown-item">E-Book</a>
                  </div>
              </div> -->
              <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
          </div>
          <a href="/Login-system/logout.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Log Out<i class="fa fa-arrow-right ms-3"></i></a>
      </div>
  </nav>
  <!-- Navbar End -->
        <!-- Top Navbar End -->

        <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-black mb-3 animated slideInDown">Programme Registration</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-black" href="#">Join a program now</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Programme Cards Start -->
    <div class="programme-container">
        <div class="container card-container" id="programmeData">
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cosaportal";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch data
            $sql = "SELECT * FROM programme WHERE programmeStatus = 0";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="product">
                        <div class="product-card">
                            <div class="product-overlay"></div>
                            <div class="product-description">
                                <h2 class="name"><?php echo $row["programmeName"]; ?></h2>
                                <span class="price">
                                    <?php 

                                    // Assuming $row["programmeStartDate"] and $row["programmeEndDate"] are in the format 'Y-m-d' like '2018-07-22'
                                    $startDate = date("d", strtotime($row["programmeStartDate"])); // Get day (e.g., '22')
                                    $endDate = date("d F Y", strtotime($row["programmeEndDate"])); // Get day, month, and year (e.g., '25 July 2018')

                                    // Now you can use $startDate and $endDate in your HTML

                                    echo $startDate; ?> - <?php echo $endDate;

                                    //echo $row["programmeStartDate"]; 
                                    ?>
                                </span>
                                <a class="popup-btn">Quick View</a>
                            </div>
                            <div class="product-image">
                                <img src="<?php 
                                // Assuming $row["posterPath"] contains the absolute path like "C:/xampp/htdocs/CoSAPortal/Homepage/php/uploads/WebDevelopmentBootCamp_Poster (12).png"
                                $posterPath = $row["posterPath"];
                                $basePath = "C:/xampp/htdocs/CoSAPortal"; // The server-specific part you want to remove

                                // Remove the server-specific part from the path
                                $relativePath = str_replace($basePath, '', $posterPath);

                                // Now $relativePath will contain something like "/Homepage/php/uploads/WebDevelopmentBootCamp_Poster (12).png"

                                echo $relativePath; 
                                ?>" class="product-img" alt="">
                            </div>
                        </div>
                        <div class="popup-view">
                            <div class="popup-card">
                                <a><i class="fas fa-times close-btn"></i></a>
                                <div class="product-img">
                                    <img src="<?php 
                                    // Assuming $row["posterPath"] contains the absolute path like "C:/xampp/htdocs/CoSAPortal/Homepage/php/uploads/WebDevelopmentBootCamp_Poster (12).png"
                                    $posterPath = $row["posterPath"];
                                    $basePath = "C:/xampp/htdocs/CoSAPortal"; // The server-specific part you want to remove

                                    // Remove the server-specific part from the path
                                    $relativePath = str_replace($basePath, '', $posterPath);

                                    // Now $relativePath will contain something like "/Homepage/php/uploads/WebDevelopmentBootCamp_Poster (12).png"

                                    echo $relativePath;

                                    //echo $row["posterPath"]; 
                                    ?>" alt="">
                                </div>
                                <div class="info"> 
                                    <h2><?php
                                     echo $row["programmeName"]; ?>
                                     <br>
                                     <span><?php 

                                    // Assuming $row["programmeStartDate"] and $row["programmeEndDate"] are in the format 'Y-m-d' like '2018-07-22'
                                    $startDate = date("d", strtotime($row["programmeStartDate"])); // Get day (e.g., '22')
                                    $endDate = date("d F Y", strtotime($row["programmeEndDate"])); // Get day, month, and year (e.g., '25 July 2018')

                                    // Now you can use $startDate and $endDate in your HTML

                                    echo $startDate; ?> - <?php echo $endDate;
                                    //echo $row["programmeStartDate"] . ' - ' . $row["programmeEndDate"]; 
                                    ?>
                                    </span>
                                    </h2>
                                    <p><?php echo $row["programmeDesc"]; ?></p>
                                    <a href="#" class="add-cart-btn" data-program-id= "<?php echo $row['programmeId']; ?>" >Register Program</a>
                                    <a href="#" class="add-wish" data-program-id= "<?php echo $row['programmeId']; ?>" >Drop Program</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div>No results found</div>";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <!-- Programme Cards End -->

    <!-- Navbar End -->
      </section>


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

</body>

</html>