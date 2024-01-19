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
    <title>CoSA Portal | Profile</title>
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
            <a href="/Login-system/mainpage/mainpage_user.php">
              <i class='bx bx-home'></i>
              <span class="links_name">Mainpage</span>
            </a>
             <span class="tooltip">Mainpage</span>
          </li>
          <li>
           <a href="/Login-system/useraccount/details.php">
             <i class='bx bx-user' ></i>
             <span class="links_name">User</span>
           </a>
           <span class="tooltip">User</span>
         </li>
          <li> 
            <a href="/Homepage/php/fetch_programme_user.php">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Programme Registration</span>
            </a>
             <span class="tooltip">Programme</span>
          </li>
          <li>
           <a href="/Merchandise/merchandise.php">
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
            <div class="profile_name" style="color: #8D8E92"><?php 
            echo $_SESSION['username'];
            ?></div>
            <div class="job">
                <?php 
                echo $_SESSION['matrixId'];
                ?>
            </div>
        </div>
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
              <a href="/index.php" class="nav  -item nav-link">Home</a>
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
            <a class="nav-link active ms-0" href="details.php" target="__blank">Profile</a>
            <a class="nav-link" href="programme_history.php" target="__blank">Programme Registered History</a>
            <!-- <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Merchandise History</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page" target="__blank">E-Book Shop History</a> -->
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <!-- <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt>
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div> -->

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
            $stmt = $conn->prepare("SELECT studName, phoneNum, address, semester, userName, userPassword, userEmail FROM student WHERE matrixId = ?");
            $stmt -> bind_param("s", $matrixId);
            $stmt->execute();
            $stmt->bind_result($studName, $phoneNum, $address, $semester, $userName, $userPassword, $userEmail);
            if ($stmt->fetch()) {
                // Now, the variables $studName, $phoneNum, $address, $semester, $userName, $userPassword, $userEmail
                // contain the values from the student table for the logged-in user
            }
            $stmt->close();
            ?>
                <div class="col-xl-8" style="width: 100%">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form onsubmit="updateUserData(); return false;">
                                <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo $userName; ?>">
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputName">Name</label>
                                        <input class="form-control" id="inputName" type="text" placeholder="Enter your Name" value="<?php echo $studName; ?>">
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label class="small mb-1" for="inputMatrixId">Matrix ID</label>
                                        <input class="form-control" id="inputMatrixId" type="number" placeholder="Enter your Matrix Id" value="<?php echo $matrixId; ?>">
                                    </div> -->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhoneNum">Phone number</label>
                                        <input class="form-control" id="inputPhoneNum" type="tel" placeholder="Enter your phone number" value="<?php echo $phoneNum; ?>">
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputSemester">Semester</label>
                                        <!-- <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="4"> -->
                                        <select class="form-control" name="semester" id="inputSemester">
                                            <option value="" disabled <?php echo ($semester == '') ? 'selected' : ''; ?>>Semester</option>
                                            <option value="1" <?php echo ($semester == '1') ? 'selected' : ''; ?>>1</option>
                                            <option value="2" <?php echo ($semester == '2') ? 'selected' : ''; ?>>2</option>
                                            <option value="3" <?php echo ($semester == '3') ? 'selected' : ''; ?>>3</option>
                                            <option value="4" <?php echo ($semester == '4') ? 'selected' : ''; ?>>4</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputAddress">Address</label>
                                        <input class="form-control" id="inputAddress" type="text" placeholder="Enter your Address" value="<?php echo $address; ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUserEmail">Email address</label>
                                    <input class="form-control" id="inputUserEmail" type="email" placeholder="Enter your email address" value="<?php echo $userEmail; ?>">
                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhoneNum">Phone number</label>
                                        <input class="form-control" id="inputPhoneNum" type="tel" placeholder="Enter your phone number" value="<?php echo $phoneNum; ?>">
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <label class="small mb-1" for="inputBirthday">Birthday</label>
                                        <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                                    </div> -->
                                </div>
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </form>
                        </div>
                    </div>
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
                    window.location.reload(true);
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