<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Klinik - Clinic Website Template</title>
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
    <link href="/Homepage/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/Homepage/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/Homepage/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

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
      <!-- <li>
         <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="fetch_programme_user.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Programme Management</span>
        </a>
         <span class="tooltip">Programme Management</span>
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
         <span class="links_name">Merchandise Management</span>
       </a>
       <span class="tooltip">Merchandise Management</span>
     </li>
     <li class="profile">
         <div class="name-job">
            <div class="profile_name">Prem Shahi</div>
            <div class="job">Web Desginer</div>
         </div>
             <i class='bx bx-log-out' id="log_out"></i>
     </li>
     <!-- <li class="profile">
         <i class='bx bx-log-out' id="log_out" ></i>
     </li> -->
    </ul>
      </div>
      <section class="home-section">
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
                <a href="/Login-system/mainpage/mainpage_committee.php" class="nav  -item nav-link ">Home</a>
                <!-- <a href="about.html" class="nav-item nav-link">About</a> -->
                <!-- <a href="service.html" class="nav-item nav-link">Service</a> -->
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="margin-right: 30px;">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                         <a href="about.html" class="dropdown-item">About Us</a> 
                        <a href="\potoub-html\course-registration.html" class="dropdown-item">Programme</a>
                        <a href="\potoub-html\Merchandise\merchandise.html" class="dropdown-item">Merchandise</a>
                        <a href="\potoub-html\CoSA E-Book\ebook.html" class="dropdown-item">E-Book</a>
                    </div>
                </div> -->
                <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
            </div>
            <a href="/index.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Log Out<i class="fa fa-arrow-right ms-3"></i></a>
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

    <div class="programme-table">
        <main class="table">
          <section class="table__header">
                <h1>List of Attendance</h1>
                <div class="input-group">
                    <!-- <input type="search" placeholder="Enter Programme ID"> -->
                    <input type="search" id="programmeIdInput" placeholder="Enter Programme ID">
                </div>
                <div class="add-button">
                <a href="/Homepage/php/fetch_programme_superadmin.php" class="button3">Back To List Of Programmes</a>
              </div>
          </section>
          <section class="table__body">
              <table>
                  <thead>
                      <tr>
                          <th> No. <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Programme Id <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Programme Name <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Matrix Id <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Student Name <span class="icon-arrow">&UpArrow;</span></th>
                          <!-- <th> Semester <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Email <span class="icon-arrow">&UpArrow;</span></th> -->
                          <!-- <th> Details <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Delete <span class="icon-arrow">&UpArrow;</span></th> -->
                      </tr>
                  </thead>
                  <tbody id="programmeTableBody">
                    
                  </tbody>
              </table>
          </section>
      </main>
    </div>

    <!-- Contact End -->
    
    <!-- Navbar End -->
    </section>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Services</h5>
                    <a class="btn btn-link" href="">Cardiology</a>
                    <a class="btn btn-link" href="">Pulmonary</a>
                    <a class="btn btn-link" href="">Neurology</a>
                    <a class="btn btn-link" href="">Orthopedics</a>
                    <a class="btn btn-link" href="">Laboratory</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


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
    <!-- <script src="programme.js"></script> -->

    <!-- Side Navigation Bar-->
    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");
      
        closeBtn.addEventListener("click", ()=>{
          sidebar.classList.toggle("open");
          menuBtnChange();//calling the function(optional)
        });
      
        // searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
        //   sidebar.classList.toggle("open");
        //   menuBtnChange(); //calling the function(optional)
        // });
      
        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
         if(sidebar.classList.contains("open")){
           closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
         }else {
           closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
         }
        }
    </script>

    <script>
            // Wait for the document to be fully loaded
        document.addEventListener("DOMContentLoaded", function() {
        var popupViews = document.querySelectorAll('.popup-view');
        var popupBtns = document.querySelectorAll('.popup-btn');
        var closeBtns = document.querySelectorAll('.close-btn');

        //javascript for quick view button
        var popup = function(popupClick){
        popupViews[popupClick].classList.add('active');
        console.log('hello');
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
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log("Script is executed!");

            // JavaScript function to handle real-time filtering
            function filterProgrammes() {
                var input = document.getElementById('programmeIdInput').value;

                console.log("Making AJAX request with input: " + input);

                // Make an AJAX request to fetch filtered data
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById('programmeTableBody').innerHTML = xhr.responseText;
                    }
                };

                // Use a different PHP script (filter.php) for filtering
                var phpScript = 'filter.php?programmeId=' + input;

                xhr.open('GET', phpScript, true);
                xhr.send();
            }

            // Attach the function to the input field's "input" event
            document.getElementById('programmeIdInput').addEventListener('input', filterProgrammes);

            // Trigger the initial load without input
            filterProgrammes();
        });
    </script>



        

</body>

</html>