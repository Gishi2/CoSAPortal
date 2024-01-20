<?php
session_start();
$matrixId = $_SESSION['matrixId']; // Assuming 'matrixId' is stored in the session
echo "<script>console.log('Session Matrix ID:', '" . $_SESSION['matrixId'] . "');</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CoSA Portal | New Programme</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <link href="/CoSAPortal/Homepage/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/CoSAPortal/Homepage/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/CoSAPortal/Homepage/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/Homepage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/Homepage/css/style.css" rel="stylesheet">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Template Table Stylesheet-->
    <link rel="stylesheet" href="/Homepage/css/tablestyle.css">

    <!-- Template Form Style-->
    <link rel="stylesheet" href="/Homepage/css/addprogrammestyle.css">
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
        <li>
          <a href="/Login-system/mainpage/mainpage_committee.php">
            <i class='bx bx-home'></i>
            <span class="links_name">Main</span>
          </a>
           <span class="tooltip">Mainpage</span>
        </li>
        <li>
         <a href="/Login-system/useraccount/details_committee.php">
           <i class='bx bx-user' ></i>
           <span class="links_name">User</span>
         </a>
         <span class="tooltip">User</span>
       </li>
        <li> 
          <a href="/Homepage/php/fetch_programme_admin.php">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Programme</span>
          </a>
           <span class="tooltip">Programme</span>
        </li>
        <li>
         <a href="/Merchandise/merchandise-list.php">
           <i class='bx bx-cart-alt' ></i>
           <span class="links_name">Merchandise</span>
         </a>
         <span class="tooltip">Merchandise</span>
       </li>
       <li>
         <a href="/Book/book.php">
           <i class='bx bx-folder' ></i>
           <span class="links_name">E-Book Shop</span>
         </a>
         <span class="tooltip">E-Book Shop</span>
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
              echo $_SESSION['userType'];
              ?>
          </div>
       </div>
           <!-- <i class='bx bx-log-out' id="log_out"></i> -->
           <i class='bx' id="log_out"></i>
       </li>
      </ul>
  </div>
      <section class="home-section">
          <!-- Top Navbar Start -->
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
                  <a href="/index.php" class="nav  -item nav-link ">Home</a>
              </div>
              <a href="/Login-system/logout.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Log Out<i class="fa fa-arrow-right ms-3"></i></a>
          </div>
      </nav>
  <!-- Navbar End -->
        <!-- Top Navbar End -->

        <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-black mb-3 animated slideInDown">Programme Management</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-black" href="#"></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Programme Cards Start -->

    <div class="add-programme-container">

    <section class="add-programme-section">
        <div class="href-target" id="input-types"></div>
        <h1>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
            <line x1="21" y1="10" x2="3" y2="10" />
            <line x1="21" y1="6" x2="3" y2="6" />
            <line x1="21" y1="14" x2="3" y2="14" />
            <line x1="21" y1="18" x2="3" y2="18" />
          </svg>
          Add a Programme
        </h1>
        <p>All details must be filled in.</p>
  
        <fieldset>
          <form name="frmProgramme" method="post" action="/Homepage/php/addprogramme.php" enctype="multipart/form-data">
        <div class="nice-form-group">
          <label>Programme Name</label>
          <input type="text" placeholder="Your name" value="" name="programmeName" id="programmeName"/>
        </div>
  
        <div class="nice-form-group">
            <label>Programme Start Date</label>
            <input type="date" value="2018-07-22" name="programmeStartDate" id="programmeStartDate"/>
        </div>

        <div class="nice-form-group">
            <label>Programme End Date</label>
            <input type="date" value="2018-07-22" name="programmeEndDate" id="programmeEndDate"/>
          </div>
  
        <div class="nice-form-group">
            <label>Programme Start Time</label>
            <input type="time" value="13:30" name="programmeTime" id="programmeTime"/>
          </div>
  
        <div class="nice-form-group">
            <label>Programme Max Attendants</label>
            <input type="number" placeholder="1234" name="capacity" id="capacity"/>
        </div>

        <div class="nice-form-group">
            <label>Programme Details</label>
            <textarea rows="5" value=""name="programmeDesc" id="programmeDesc"></textarea>
        </div>

        <div class="nice-form-group">
            <label>Programme Poster</label>
            <input type="file" name="programmePoster" id="programmePoster"/>
        </div>

        <div class="form-footer">
          <p>
            <input type="submit" name="Submit" id="Submit" value="Add a Programme"  class="btn btn-primary btn-lg btn-block">
          </p>
        </div>
      </form>
      </fieldset>
      </section>
    </div>

    <!-- Contact End -->
    
    <!-- Navbar End -->
    </section>

    <!-- Footer Start -->
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/CoSAPortal/Homepage/lib/wow/wow.min.js"></script>
    <script src="/CoSAPortal/Homepage/lib/easing/easing.min.js"></script>
    <script src="/CoSAPortal/Homepage/lib/waypoints/waypoints.min.js"></script>
    <script src="/CoSAPortal/Homepage/lib/counterup/counterup.min.js"></script>
    <script src="/CoSAPortal/Homepage/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/CoSAPortal/Homepage/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/CoSAPortal/Homepage/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/CoSAPortal/Homepage/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

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
</body>

</html>