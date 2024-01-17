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
                <a href="/Login-system/mainpage/mainpage_admin.php" class="nav  -item nav-link ">Home</a>
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
              <h1>List of Programmes</h1>
              <!-- <div class="input-group">
                  <input type="search" placeholder="Search Data...">
                  <img src="/images/search.png" alt="">
              </div> -->
              <div class="add-button">
                <a href="/Homepage/Programme/programme-committee-addprogramme.html" class="button3">Add a Programme</a>
                <a href="/Homepage/php/attendance_superadmin.php" class="button3">Attendance Check</a>
              </div>
          </section>
          <section class="table__body">
              <table>
                  <thead>
                      <tr>
                          <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Programme Name <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Start Date <span class="icon-arrow">&UpArrow;</span></th>
                          <th> End Date <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Time <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Capacity <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Details <span class="icon-arrow">&UpArrow;</span></th>
                          <th> Delete <span class="icon-arrow">&UpArrow;</span></th>
                      </tr>
                  </thead>
                  <tbody>
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
                    $sql = "SELECT * FROM programme";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td> <?php echo $row["programmeId"]; ?> </td> 
                                <td> <img src="<?php 
                                        // Assuming $row["posterPath"] contains the absolute path like "C:/xampp/htdocs/CoSAPortal/Homepage/php/uploads/WebDevelopmentBootCamp_Poster (12).png"
                                        $posterPath = $row["posterPath"];
                                        $basePath = "C:/xampp/htdocs/CoSAPortal"; // The server-specific part you want to remove

                                        // Remove the server-specific part from the path
                                        $relativePath = str_replace($basePath, '', $posterPath);

                                        // Now $relativePath will contain something like "/Homepage/php/uploads/WebDevelopmentBootCamp_Poster (12).png"

                                        echo $relativePath; 
                                        ?>" alt=""><?php echo $row["programmeName"]; ?></td> 
                                <td> <?php echo date("d F Y", strtotime($row["programmeStartDate"])); ?> </td> 
                                <td> <?php echo date("d F Y", strtotime($row["programmeEndDate"])); ?> </td>
                                <td>
                                <?php echo $row["programmeTime"]; ?> 
                                </td>
                                <td> <strong> <?php echo $row["capacity"]; ?> </strong> </td>
                                <td> <strong> 
                                    <?php 
                                    
                                    if($row["programmeStatus"] == 1) {
                                        echo "Deactivated";
                                    } else if ($row["programmeStatus"] == 0){
                                        echo "Active";
                                    }
                                ?> </strong> </td>
                                <td> <a class="popup-btn">Details</a></td>
                                <!-- <td> <a class="delete-btn">Delete</a> </td> -->
                                <td><a class="delete-btn" data-id="<?php echo $row['programmeId']; ?>" onclick="handleDeleteClick(<?php echo $row['programmeId']; ?>)">Delete</a></td>

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
                                            <h2>Details</h2>
                                            <fieldset>
                                            <form method="post" action="update_programme_superadmin.php"> <!-- Form for updating program details -->
                                                <input type="hidden" name="programmeId" value="<?php echo $row['programmeId']; ?>">
                                                <div class="nice-form-group">
                                                    <label>Programme Name</label>
                                                    <input type="text" name="updatedName" value="<?php echo $row['programmeName']; ?>">
                                                </div>
                                
                                                <div class="nice-form-group">
                                                    <label>Programme Start Date</label>
                                                    <input type="date" name="updatedStartDate" value="<?php echo $row['programmeStartDate']; ?>">
                                                </div>

                                                <div class="nice-form-group">
                                                    <label>Programme End Date</label>
                                                    <input type="date" name="updatedEndDate" value="<?php echo $row['programmeEndDate']; ?>">
                                                </div>

                                                <div class="nice-form-group">
                                                    <!-- <label>Programme End Date</label>
                                                    <input type="date" name="updatedEndDate" value="<?php echo $row['programmeEndDate']; ?>"> -->
                                                    <input type="checkbox" name="updatedStatus" class="switch" <?php echo $row['programmeStatus'] == 0 ? 'checked' : ''; ?> />
                                                    <label for="updatedStatus">
                                                    Status
                                                    <small>Check to activate</small>
                                                    </label>
                                                </div>

                                                <div class="nice-form-group">
                                                    <label>Programme Description</label>
                                                    <textarea rows="5" name="updatedDescription"><?php echo $row['programmeDesc']; ?></textarea>
                                                </div>

                                                <input type="submit" class="add-cart-btn" value="Confirm Update"> <!-- Using the existing button class -->
                                            </form>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <?php
                                }
                            } else {
                                echo "<div>No results found</div>";
                            }
                            $conn->close();
                        ?>
                  </tbody>
              </table>
          </section>
      </main>
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
    <script src="Homepage/lib/wow/wow.min.js"></script>
    <script src="Homepage/lib/easing/easing.min.js"></script>
    <script src="Homepage/lib/waypoints/waypoints.min.js"></script>
    <script src="Homepage/lib/counterup/counterup.min.js"></script>
    <script src="Homepage/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="Homepage/lib/tempusdominus/js/moment.min.js"></script>
    <script src="Homepage/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="Homepage/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

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
            // Function to handle the delete button click
            function handleDeleteClick(id) {
                // Ask for confirmation before deleting
                if (confirm('Are you sure you want to delete this programme permanently?')) {
                    // Make an AJAX request to update the status
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '/Homepage/php/delete_programme.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            // If the request is successful, update the UI or perform necessary actions
                            console.log('Status updated successfully 1');
                            // You can perform UI updates here if needed
                            // For example, reload the page: 
                            window.location.reload();
                        } else {
                            console.error('Error updating status');
                        }
                    };
                    xhr.onerror = function() {
                        console.error('Request failed');
                    };
                    // Send the ID of the item to update and the new status (1 for 'deleted')
                    xhr.send('id=' + id + '&status=1');
                }
            }
        </script>

</body>

</html>