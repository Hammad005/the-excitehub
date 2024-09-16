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
          <li><a class="nav-link scrollto " href="home.php #hero">Home</a></li>
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
          <li><a class="nav-link scrollto active" href="packages.php">Packages</a></li>
          <li><a class="nav-link scrollto" href="home.php #about">About</a></li>
          <li><a class="nav-link scrollto" href="home.php #contact">Contact</a></li>
          <li class="dropdown">
            <a href="#" class="nav-link scrollto ">Hi,<span><b><?php echo $_SESSION['username'];?></b></span> <i class="bi bi-chevron-down"></i></a>
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

  
  <main id="main">
  <!-- subscribe -->
  <section id="subscribe">
    <div class="main-block">
      <div class="left-part">
        <a href="packages.php"><img src="logo/default2.png" alt="" style="padding-right: 20px;"></a>
      </div>
      
      <form action="packages.php" method="POST">
        <div class="title">
          <h2><strong>"Subscription Form"</strong></h2>
        </div>
        
            <?php
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM `users` WHERE `id` = '$id' ";
            $result = mysqli_query($conn, $sql);
            $ss = mysqli_fetch_assoc($result);
        }
        ?>
        <?php
            if(isset($_GET['id'])){
              $id = $_GET['id'];
              $sql = "SELECT * FROM `packages` WHERE `id` = '$id'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
          }
            ?>
        <div class="info">
          <label>Name :</label>
          <input class="fname" type="text" readonly name="sname" value="<?php echo $ss['username']  ?>"  placeholder="Full name" required>
          <label>Email :</label>
          <input type="email" name="email" readonly placeholder="Email" value="<?php echo $ss['email']  ?>" required>
          <label>Package :</label>
          
          <input type="text" name="package" readonly placeholder="Email" value="<?php echo $row['pname']  ?>" required>
          <label>Price :</label>
          <input type="text" name="price" readonly placeholder="Email" value="Rs. <?php echo $row['price']  ?> " required>
          <label>Card Number :</label>
          <input type="text" placeholder="xxxx-xxxx-xxxx-xxxx" maxlength="16" name="card_no" required>
          <label>Card Pin :</label>
          <input type="password" placeholder="xxxx" maxlength="4" name="card_pin" required>
        </div>
        <button type="submit" name="subscribe"><strong>Subscribe</strong></button>
      </form>
    </div>
</section>
    <!-- end subscribe -->

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

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    function submited() {
      var packageCode = "966355"; // Replace with your actual package code
      alert("Thank you for SUBSCRIBING OUR PACKAGE!\nYOUR PACKAGE CODE IS: " + packageCode);
    }
    </script>
</body>

</html>