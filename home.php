<?php
include('_dbconnection.php');
include('_session.php');
include('_package_expired.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>The ExciteHub</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

     
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="home.php" class="logo me-auto me-lg-0"><img src="logo/default.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="home.php #hero">Home</a></li>
          <li class="dropdown">
            <a href="#" class="nav-link scrollto "><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown-item"><a href="movie_theater.php"><span> Movie Theaters</span> <i class="bi bi-chevron-right"></i></a></li>
              <li class="dropdown-item"><a href="amusement_park.php"><span>Amusement Parks</span> <i class="bi bi-chevron-right"></i></a></li>          
              <li class="dropdown-item"><a href="event.php"><span>Events</span> <i class="bi bi-chevron-right"></i></a></li>
              <li class="dropdown-item"><a href="cricket_match.php"><span>Cricket Matches</span> <i class="bi bi-chevron-right"></i></a></li>
              
            </ul>
          </li>
          
          <li><a class="nav-link scrollto " href="home.php #partners">Partners</a></li>
          <li><a class="nav-link scrollto " href="packages.php">Packages</a></li>
          <li><a class="nav-link scrollto" href="home.php #about">About</a></li>
          <li><a class="nav-link scrollto" href="home.php #contact">Contact</a></li>
          <li class="dropdown">
            <a href="#" class="nav-link scrollto ">Hi,<span><b><?php echo $_SESSION['username'];?></b></span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown-item"><a href="manage_acc.php"><span>Manage Account</span> </i></a></li>
              <li class="dropdown-item"><a href="logout.php"><span>Logout</span> </i></a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        
      </nav><!-- .navbar -->
      
      <a href="bookings.php" class="get-started-btn"><i class="bi bi-bag-check"></i> Bookings</a>

    </div>
  </header><!-- End Header -->
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Endless Entertainment at Unbeatable Prices<span>!</span></h1>
          
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4" id="boxes">
          <a href="movie_theater.php">
          <div class="icon-box">
            <img src="assets/img/icons/movie.png" alt="">
            <h3>Movie Theaters</h3>
          </div></a>
        </div>
        <div class="col-xl-2 col-md-4"id="boxes">
          <a href="amusement_park.php">
          <div class="icon-box">
            <img src="assets/img/icons/park.png" alt="">
            <h3>Amusement Parks</h3>
          </div></a>
        </div>
        <div class="col-xl-2 col-md-4"id="boxes">
          <a href="event.php">
          <div class="icon-box">
            <img src="assets/img/icons/event.png" alt="">
            <h3>Events Tickets</h3>
          </div></a>
        </div>
        <div class="col-xl-2 col-md-4"id="boxes">
          <a href="cricket_match.php">
          <div class="icon-box">
            <img src="assets/img/icons/cricket.png" alt="">
            <h3>Cricket Matches</h3>
          </div></a>
        </div>
        
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">
    
    <!-- ======= Partners Section ======= -->
    <section id="partners" class="partners">
      <div class="container" data-aos="zoom-in">
        <div class="section-title">
          
          <p>Our Partners</p>
        </div>
        <div class="section-title">
          <h2>Movie Theater Partners</h2>
        </div>
        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
          <?php
          $sql="SELECT * FROM `theaters`";
          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($result)){
          ?>
            <div class="swiper-slide">
              <a href="<?php echo $row['file_name'] ?>.php?theatername=<?php echo $row['theater_name'] ?>">
              <img src="admin/movie_theaters/<?php echo $row['logo']?>" class="img-fluid" alt="" >
              </a>
            </div>
            <?php
          }
          ?>
          </div>
        </div>

      </div>
    </section>
    <section id="partners" class="partners">
      <div class="container" data-aos="zoom-in">
        <div class="section-title">
          <h2>Amusement Parks Partners</h2>
        </div>
        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center" >
          <?php
          $sql="SELECT * FROM `parks`";
          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($result)){
          ?>
            <div class="swiper-slide">
            <a href="<?php echo $row['file_name'] ?>.php?parkid= <?php echo $row['id'] ?>">
            <img src="admin/parks/<?php echo $row['logo_2']?>" class="img-fluid" alt="" >
            </a>
            </div>
          <?php
          }
          ?>
          </div>
        </div>

      </div>
    </section>
    <!-- End partners Section -->

    
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>About us <span style="color: #ffc451;">:</span></h3>
            <p class="fst-italic">
              Welcome to our website! We are your ultimate destination for endless entertainment options at unbeatable prices. Whether you're looking for tickets to parks, cricket matches, movies, events, or more, we've got you covered. Our platform is dedicated to bringing you incredible deals that will make your entertainment adventures truly memorable.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Our website is your gateway to exclusive deals and savings on entertainment tickets.</li>
              <li><i class="ri-check-double-line"></i> Get discounts on movie theater tickets, amusement park tickets, and cricket match tickets  by subscribing to our <a href="packages.php" style="color: #ffc451;"><strong>Packages</strong></a>.</li>
            </ul>
            <p>
              Dive into a world of excitement and make unforgettable memories with us. Get ready to embark on thrilling experiences while saving big with our exclusive discounts. Start your entertainment journey today!
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Clifton, Karachi City, Sindh
                  Pakistan</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>TheExciteHub@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+92 3389 55488 5</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <?php
            $feedbackAlert=false;
            $feedbackError=false;
            if($_SERVER['REQUEST_METHOD']=="POST"){
              $name = $_POST['username'];
              $email = $_POST['email'];
              $subject = $_POST['subject'];
              $feedback = $_POST['feedback'];
              $sql="INSERT INTO `feedback` (`username`, `email`, `subject`, `feedback`, `time`) VALUES ('$name', '$email', '$subject', '$feedback', current_timestamp());";
              $result = mysqli_query($conn, $sql);
              if($result){
                $feedbackAlert=true;
              }
              else{
                $feedbackError=true;
              }
            }
            
            ?> 

            <form role="form" class="php-email-form" id="message" method="POST" action="home.php #contact">
              <?php
              if($feedbackAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done!</strong> Feedback send successfully.
                <button type="button" class="btn-close col-lg-0 mt-0  mt-lg-0" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
              if($feedbackError){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Feedback did not send. Please try again later.
                <button type="button" class="btn-close col-lg-0 mt-0  mt-lg-0" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
              ?>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="username" class="form-control" id="name" placeholder="Your Name" required >
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Feedback Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="feedback" rows="5" placeholder="Feedback" required></textarea>
              </div>
              <div class="text-center"><button id="submit">Send Feedback</button></div>
              
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <a href="#hero"><img src="logo/default.png" alt="" class="img-fluid" id="logo"></a>
              <p>
                Karachi, Karachi City,<br>
                Sindh Pakistan<br><br>
                <strong>Phone:</strong> +92 3389 55488 5<br>
                <strong>Email:</strong> TheExciteHub@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="https://twitter.com/" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="https://www.linkedin.com/authwall?trk=qf&original_referer=https://www.google.com/&sessionRedirect=https%3A%2F%2Fpk.linkedin.com%2F" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="home.php #hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home.php #partners">Partners</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home.php #about">About</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home.php #contact">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="movie_theater.php">Movie Theaters</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="amusement_park.php">Amusement Parks</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="event.php">Events</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="cricket_match.php">Cricket Matches</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Our Packages</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="packages.php">Gold Package</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="packages.php">Diamond Package</a></li>
            </ul>
          </div>

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span><i>The ExciteHub</i></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#hero">Hammad Khatri</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!--  Main JS File -->
  <script src="assets/js/main.js"></script>
  
</body>

</html>