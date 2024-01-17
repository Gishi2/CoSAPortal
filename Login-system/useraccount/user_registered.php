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
    }

    // Now, include other necessary files or perform actions for the logged-in user
    // require_once '/../config/config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Klinik - Clinic Website Template</title>
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

    <!-- Bootstrap account details -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

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
            <a href="/Login-system/mainpage/mainpage_user.php">
              <i class='bx bx-home'></i>
              <span class="links_name">Mainpage</span>
            </a>
             <span class="tooltip">Mainpage</span>
          </li>
          <li>
            <a href="/Homepage/php/fetch_programme_user.php">
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
            <div class="profile_name" style="color: #8D8E92">User's Name</div>
            <div class="job">Matrix Id</div>
        </div>
             <i class='bx bx-log-out' id="log_out"></i>
         </li>
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
              <a href="homepage.html" class="nav  -item nav-link">Home</a>
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
    
    <!-- Page Header End -->


    <!-- Programme Cards Start -->
    <div class="container-xl px-4 mt-4">
        <nav class="nav nav-borders">
            <a class="nav-link" href="details_admin.php" target="__blank">Profile</a>
            <a class="nav-link active ms-0" href="user_registered.php" target="__blank">Programme Registered History</a>
            <!-- <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Merchandise History</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page" target="__blank">E-Book Shop History</a> -->
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="programme-table">
                <main class="table">
                    <section class="table__header">
                        <h1>List of Registered User</h1>
                    </section>
                    <section class="table__body">
                        <table>
                            <thead>
                                <tr>
                                    <th> Matrix Id <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Name <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Phone Number <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Address <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Semester <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Type <span class="icon-arrow">&UpArrow;</span></th>
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

                                // SQL query to fetch data from the "student" table
                                $sql = "SELECT * FROM student";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $row["matrixId"]; ?> </td> 
                                            <td> <?php echo $row["studName"]; ?> </td> 
                                            <td> <?php echo $row["phoneNum"]; ?> </td> 
                                            <td> <?php echo $row["address"]; ?> </td>
                                            <td> <?php echo $row["semester"]; ?> </td>
                                            <td> <?php echo $row["userEmail"]; ?> </td>
                                            <td> <?php 
                                            if($row["userType"] == 1){
                                                echo "Normal Member";
                                            } else if ($row["userType"] == 2){
                                                echo "Committee Member";
                                            } else if ($row["userType"] == 3){
                                                echo "Admin";
                                            }
                                            ?> </td>
                                            <td>
                                                <?php 
                                                    if ($row["userType"] != 3) {
                                                        echo '<a class="delete-btn" data-id="' . $row['matrixId'] . '" onclick="handleDeleteClick(' . $row['matrixId'] . ')">Delete</a>';
                                                    }
                                                ?>
                                            </td>
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
            // Function to handle the delete button click
            function handleDeleteClick(id) {
                // Ask for confirmation before deleting
                if (confirm('Are you sure you want to delete this user permanently?')) {
                    // Make an AJAX request to update the status
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '/Homepage/php/delete_user.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            // If the request is successful, update the UI or perform necessary actions
                            console.log('Deleted successfully 1');
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
        
        <script>
        function updateUserData() {
            // Gather form data
            var username = document.getElementById('inputUsername').value;
            var name = document.getElementById('inputName').value;
            var semester = document.getElementById('inputSemester').value;
            var address = document.getElementById('inputAddress').value;
            var userEmail = document.getElementById('inputUserEmail').value;
            var phoneNum = document.getElementById('inputPhoneNum').value;

            // AJAX request
            $.ajax({
                type: 'POST',
                url: 'update_user_data.php', // Create a new PHP file for handling the update logic
                data: {
                    username: username,
                    name: name,
                    semester: semester,
                    address: address,
                    userEmail: userEmail,
                    phoneNum: phoneNum
                },
                success: function(response) {
                    alert('Changes saved successfully!');
                },
                error: function(xhr, status, error) {
                    alert('Error occurred while saving changes');
                    console.error(error);
                }
            });
        }
        </script>

            <!-- Account Details Scripts -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript"></script>

</body>

</html>