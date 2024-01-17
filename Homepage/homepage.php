<?php
    session_start();
    require_once 'config/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CoSA Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Homepage/lib/animate/animate.min.css" rel="stylesheet">
    <link href="Homepage/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="Homepage/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Homepage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Homepage/css/homepage.css" rel="stylesheet">


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="<?php echo HOME_PAGE; ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="header-logo" src="Homepage/img/cosa/cosa_logo_inBlue.png">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo HOME_PAGE; ?>" class="nav  -item nav-link active">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="<?php echo PROGRAMME_PAGE; ?>" class="dropdown-item">Programme</a>
                        <a href="<?php echo MERCHANDISE_PAGE; ?>" class="dropdown-item">Merchandise</a>
                        <a href="<?php echo BOOK_PAGE; ?>" class="dropdown-item">E-Book</a>
                    </div>
                </div>
            </div>
            <a href="<?php echo SIGN_UP_PAGE; ?>" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login / Sign Up<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid header bg-primary p-0 mb-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white mb-5">Welcome to <br>CoSA Portal!</h1>
                <div class="row g-4">
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" data-toggle="counter-up">
                            <?php 
                            // Connect to your database (modify this part according to your database configuration)
                            $conn = new mysqli('localhost', 'root', '', 'cosaportal');

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Perform a query to get the number of registered students
                            $sql = "SELECT COUNT(*) as studentCount FROM student WHERE userType = '2'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $studentCount = $row['studentCount'];
                            } else {
                                $studentCount = 0; // Default value if no students are found
                                // die("Error executing the query: " . $conn->error);
                            }

                            echo $studentCount;

                            // Close the database connection
                            $conn->close();
                            ?>
                            </h2>
                            <p class="text-light mb-0">Committee Members</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" data-toggle="counter-up">
                            <?php 
                            // Connect to your database (modify this part according to your database configuration)
                            $conn = new mysqli('localhost', 'root', '', 'cosaportal');

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Perform a query to get the number of registered students
                            $sql = "SELECT COUNT(*) as studentCount FROM student WHERE userType IN ('1', '2')";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $studentCount = $row['studentCount'];
                            } else {
                                $studentCount = 0; // Default value if no students are found
                                // die("Error executing the query: " . $conn->error);
                            }

                            echo $studentCount;

                            // Close the database connection
                            $conn->close();
                            ?>
                            </h2>
                            <p class="text-light mb-0">Faculty Members</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item position-relative">
                        <div class="overlay"></div>
                        <img class="img-fluid" src="Homepage/img/cosa/robotics.jpg" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">INNOVATION</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <div class="overlay"></div>
                        <img class="img-fluid" src="Homepage\img\cosa\mentorship.jpg" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">MENTORSHIP</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <div class="overlay"></div>
                        <img class="img-fluid" src="Homepage\img\cosa\charity.jpg" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">CHARITY WORK</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-100 align-self-end" src="/Homepage\img\cosa\cosa-group.jpg" alt="">
                        <!-- <img class="img-fluid rounded w-40 bg-white pt-3 pe-3" src="/Homepage\img\cosa\CoSALogo_2480_BLACKBG.jpg" alt="" style="margin-top: -20%;"> -->
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <!-- <p class="d-inline-block border rounded-pill py-1 px-4">About Us</p> -->
                    <h1 class="mb-4">Welcome to CoSA!</h1>
                    <p>Welcome to the heart of the Computer Science Association (CoSA), a dynamic community within Universiti Teknologi MARA Sabah. At CoSA, we are driven by a passion for innovation, collaboration, and fostering a vibrant space for all computer science enthusiasts.</p>
                    <!-- <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p> -->
                    <!-- <p><i class="far fa-check-circle text-primary me-3"></i>Quality health care</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Only Qualified Doctors</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Medical Research Professionals</p> -->
                    <!-- <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="about.html">Read More</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <!-- <p class="d-inline-block border rounded-pill py-1 px-4">Services</p> -->
                <h1>CoSA Services</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5" style="background-color: #ebf5fa;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-lightbulb fs-4" style="color: #7fb3d5;"></i>
                        </div>
                        <h4 class="mb-3">INNOVATION</h4>
                        <p class="mb-4">At CoSA, we cultivate an environment that sparks innovation. We provide a hub for creative minds, providing a platform for members to explore and collaborate on projects.</p>
                        <!-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded h-100 p-5" style="background-color: #f0fdf4;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-users fs-4" style="color: #a2cfb9;"></i>
                        </div>
                        <h4 class="mb-3">MENTORSHIP</h4>
                        <p class="mb-4">Nurturing the growth of its members through mentorship. Our Mentorship connects experienced individuals with those eagers to learn.</p>
                        <!-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded h-100 p-5" style="background-color: #fdf2e3;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-hand-holding-heart fs-4" style="color: #f4b350;"></i>
                        </div>
                        <h4 class="mb-3">CHARITY WORK</h4>
                        <p class="mb-4">We channel our collective energy and resources to make a positive impact on the community.</p>
                        <!-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> -->
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-wheelchair text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Orthopedics</h4>
                        <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-tooth text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Dental Surgery</h4>
                        <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div> -->
                <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-vials text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Laboratory</h4>
                        <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="p-lg-5 ps-lg-0">
                        <!-- <p class="d-inline-block border rounded-pill text-light py-1 px-4">Features</p> -->
                        <h1 class="text-white mb-4">OUR ACTIVITIES</h1>
                        <p class="text-white mb-4 pb-2" style="text-align: justify;">Explore the diverse range of programs offered by CoSA that cater to both academic and extracurricular interests. From tech-centric workshops and seminars to engaging social events, our Programs Segment is designed to enrich your academic journey and foster a sense of belonging within the CoSA community. Dive into a world of opportunities and make the most of your university experience with CoSA Programs.
                        </p>
                        <a class="btn btn-activity rounded-pill py-3 px-5 mt-3" href="about.html">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <!-- <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s"> -->
                            <div class="owl-carousel header-carousel">
                                <div class="owl-carousel-item position-relative">
                                    <!-- <div class="overlay"></div> -->
                                    <img class="img-fluid w-100 h-100" src="/Homepage\img\cosa\memperkasa_ukhuwah.jpeg" style="object-fit: cover;" alt="">
                                    <div class="owl-carousel-text-feature">
                                        <h1 class="display-feature text-white mb-0">MEMPERKASA<br>UKHUWAH</h1>
                                    </div>
                                </div>
                                <div class="owl-carousel-item position-relative">
                                    <!-- <div class="overlay"></div> -->
                                    <img class="img-fluid" src="/Homepage\img\cosa\welcome_new_programmer.jpg" alt="">
                                    <div class="owl-carousel-text-program">
                                        <h1 class="display-program text-white mb-0">WELCOME NEW<br>FUTURE PROGRAMMER</h1>
                                    </div>
                                </div>
                                <div class="owl-carousel-item position-relative">
                                    <!-- <div class="overlay"></div> -->
                                    <img class="img-fluid" src="/Homepage\img\cosa\ind4.0.jpg" alt="">
                                    <div class="owl-carousel-text-infoday">
                                        <h1 class="display-infoday text-color mb-0">IND4.0: INFO DAY</h1>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                        <!-- <img class="position-absolute img-fluid w-100 h-100" src="img/feature.jpg" style="object-fit: cover;" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Appointment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <!-- <p class="d-inline-block border rounded-pill py-1 px-4">ENGAGEMENT</p> -->
                    <h1 class="mb-4">Make An Engagement With Us</h1>
                    <p class="mb-4">Join our vibrant community, attend meet-ups, and forge meaningful connections with fellow students, and faculty.</p>
                    <div class="bg-light rounded d-flex align-items-center p-5 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Call Us Now</p>
                            <h5 class="mb-0">+012 345 6789</h5>
                        </div>
                    </div>
                    <div class="bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-envelope-open text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Mail Us Now</p>
                            <h5 class="mb-0">Cosabatch01@gmail.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                        <form method="post" action="Homepage/engagement.inc.php" id="engagementForm">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class="form-control border-0" placeholder="Your Name" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="mobile_number" class="form-control border-0" placeholder="Your Mobile" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" name="faculty" style="height: 55px;" required>
                                        <option disabled selected>Choose Faculty</option>
                                        <option value="FACULTY OF ACCOUNTING">FACULTY OF ACCOUNTING</option>
                                        <option value="FACULTY OF MANAGEMENT AND BUSINESS">FACULTY OF MANAGEMENT AND BUSINESS</option>
                                        <option value="FACULTY OF HOTEL AND TOURISM MANAGEMENT">FACULTY OF HOTEL AND TOURISM MANAGEMENT</option>
                                        <option value="FACULTY OF APPLIED SCIENCES">FACULTY OF APPLIED SCIENCES</option>
                                        <option value="FACULTY OF PLANTATION AND AGROTECHNOLOGY">FACULTY OF PLANTATION AND AGROTECHNOLOGY</option>
                                        <option value="FACULTY OF ADMINISTRATIVE SCIENCE AND POLICY STUDIES">FACULTY OF ADMINISTRATIVE SCIENCE AND POLICY STUDIES</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control border-0 datetimepicker-input" name="date"
                                            placeholder="Choose Date" data-target="#date" data-toggle="datetimepicker" style="height: 55px;" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control border-0 datetimepicker-input" name="time"
                                            placeholder="Choose Time" data-target="#time" data-toggle="datetimepicker" style="height: 55px;" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" name="description" rows="5" placeholder="What would you like to do?" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" id="submitButton">Book Engagement</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">COMMITTEE MEMBERS</p>
                <h1>Meet Our High Council!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="/Homepage\img\cosa\cosa-members\01\Muiz.jpg" style="width: 160px; height: 160px; object-fit: cover;">
                    <div class="testimonial-text rounded text-center p-4">
                        <!-- <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p> -->
                        <h5 class="mb-1">PRESIDENT</h5>
                        <span class="fst-italic">Mohd Muizzuddin Arif Bin Moni</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="/Homepage\img\cosa\cosa-members\02\IMG_7183.jpg" style="width: 160px; height: 160px; object-fit: cover;">
                    <div class="testimonial-text rounded text-center p-4">
                        <!-- <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p> -->
                        <h5 class="mb-1">VICE-PRESIDENT</h5>
                        <span class="fst-italic">Nakhieuddin Farhan Bin Masari</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="/Homepage\img\cosa\cosa-members\01\aylne.jpg" style="width: 160px; height: 160px; object-fit: cover;">
                    <div class="testimonial-text rounded text-center p-4">
                        <!-- <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p> -->
                        <h5 class="mb-1">SECRETARY 1</h5>
                        <span class="fst-italic">Aylne Kuin</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="/Homepage\img\cosa\cosa-members\01\liana.jpg" style="width: 160px; height: 160px; object-fit: cover;">
                    <div class="testimonial-text rounded text-center p-4">
                        <!-- <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p> -->
                        <h5 class="mb-1">SECRETARY 2</h5>
                        <span class="fst-italic">Norliana Binti Idris</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="/Homepage\img\cosa\cosa-members\01\fatin.jpg" style="width: 160px; height: 160px; object-fit: cover;">
                    <div class="testimonial-text rounded text-center p-4">
                        <!-- <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p> -->
                        <h5 class="mb-1">TREASURER</h5>
                        <span class="fst-italic">Nurul Fatin Nabila Binti Irwan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Universiti Technologi MARA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>Cosabatch01@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href="https://www.instagram.com/cosa.uitmkk/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href="mailto:cosabatch01@gmail.com"><i class="fa fa-envelope"></i></a>
                        <!-- <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Links</h5>
                    <a class="btn btn-link" href="https://sabah.uitm.edu.my/">UiTM Sabah</a>
                    <a class="btn btn-link" href="https://kppim.uitm.edu.my/index.php/computing-and-mathematics">KPPIM</a>
                    <!-- <a class="btn btn-link" href="">Charity</a> -->
                    <!-- <a class="btn btn-link" href="">Orthopedics</a>
                    <a class="btn btn-link" href="">Laboratory</a> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Services</h5>
                    <a class="btn btn-link" href="">Innovation</a>
                    <a class="btn btn-link" href="">Mentorship</a>
                    <a class="btn btn-link" href="">Charity</a>
                    <!-- <a class="btn btn-link" href="">Orthopedics</a>
                    <a class="btn btn-link" href="">Laboratory</a> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="about.html">About Us</a>
                    <a class="btn btn-link" href="\potoub-html\course-registration.html">Programme</a>
                    <a class="btn btn-link" href="\potoub-html\Merchandise\merchandise.html">Merchandise</a>
                    <a class="btn btn-link" href="\potoub-html\CoSA E-Book\ebook.html">E-Book</a>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">CoSA Portal</a>, All Right Reserved.
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
    <script src="Homepage/lib/wow/wow.min.js"></script>
    <script src="Homepage/lib/easing/easing.min.js"></script>
    <script src="Homepage/lib/waypoints/waypoints.min.js"></script>
    <script src="Homepage/lib/counterup/counterup.min.js"></script>
    <script src="Homepage/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="Homepage/lib/tempusdominus/js/moment.min.js"></script>
    <script src="Homepage/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="Homepage/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="Homepage/js/main.js"></script>
    <script>
        document.querySelector('button[type="button"]').addEventListener('click', openEmailClient);
    </script>
</body>

</html>