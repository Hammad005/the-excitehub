<?php
include('_dbconnection.php');
include('_session.php');
include('_package_expired.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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

<body id="cinema_2_body">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

     
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="home.php" class="logo me-auto me-lg-0"><img src="logo/default.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="home.php #hero">Home</a></li>
          <li class="dropdown">
            <a href="#" class="nav-link scrollto active"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul >
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
  <!-- Slider -->
  <?php
  if (isset($_GET['theatername'])) {
    $theater_name = $_GET['theatername'];
    $sql="SELECT * FROM `theater_movies` WHERE  `theater_name` = '$theater_name'";
    $result = mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if ($num == 0) {
      echo '
      <section id="cinema" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">';
      
      $sql = "SELECT * FROM `theaters` WHERE `theater_name` = '$theater_name'";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<h1>' . $row['theater_name'] . '<span>!</span></h1>';
      }
      
      echo '    </div>
          </div>
          <h2><span>"</span> There are no Upcoming Movie Available <span>"</span></h2>
        </div>
      </section>
      ';
    }
  ?>
      <?php
$sql = "SELECT * FROM `theater_movies` WHERE `theater_name` = '$theater_name'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

if ($num > 0) {
?>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="margin-top: 130px;">
    <div class="carousel-inner">
      <?php
      $active = ' active';  // Variable to track the active class for the first item
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="carousel-item<?php echo $active; ?>">
          <img src="admin/movie/<?php echo $row['movie_banner'] ?>" class="d-block w-70 mx-auto" alt="...">
        </div>
      <?php
        $active = '';  // Remove the active class after the first item
      }
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<?php
}
?>

  <!-- End slider -->
  <!-- Atrium Cinema -->


    <?php
    
      $sql="SELECT * FROM `theater_movies` WHERE `theater_name` = '$theater_name'";
      $result = mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if($num>0){
      echo '
        <section id="cinema_2">
      ';
      $sql="SELECT * FROM `theaters` WHERE `theater_name` = '$theater_name'";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)){
      ?>
    <h2 class="heading"><strong>Now Showing at:</strong>
      <img src="admin/movie_theaters/<?php echo $row['logo'] ?>" alt="" style="width: 60px;">
      <div class="ticket ">
        <strong><p><span>2D/3D Ticket:</span>Rs. <?php echo $row['movie_ticket'] ?>/-</p></strong>
        <strong><p><span>3D Glasses:</span>Rs. <?php echo $row['3d_glasses'] ?>/-</p></strong>
      </div>
      </h2>
      <?php
      }
      echo '
    <div class="container d-flex align-items-center justify-content-center">
      ';
    }
      ?>
      <?php
      $sql="SELECT * FROM `theater_movies` WHERE  `theater_name` = '$theater_name'";
      $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)){
      ?>
        <div class="card">
            <img src="admin/movie/<?php echo $row['movie_poster']  ?>" alt="" class="poster">
            <div class="intro">
                <h1><strong><?php echo $row['movie_name'] ?></strong></h1>
                <p><span>Genre:</span><?php echo $row['genre'] ?></p>
                <p><span>Run Time:</span><?php echo $row['run_time'] ?></p>
                <p><span>Language:</span><?php echo $row['language'] ?></p>
                <p><span>Cast:</span><?php echo $row['cast'] ?></p>
                <span><strong>Show Times:</strong></span>
                <p><span><?php echo $row['date_of_show_1'] ?>:</span> <?php echo $row['first_show_time_of_show_1'] ?><span> &</span><?php echo $row['secound_show_time_of_show_1'] ?></p>
                <p><span><?php echo $row['date_of_show_2'] ?>:</span> <?php echo $row['first_show_time_of_show_2'] ?><span> &</span><?php echo $row['secound_show_time_of_show_2'] ?></p>
                <a href="theater_ticket.php?id=<?php echo $row['id']?>"><button class="buy-button"><strong>Buy Now!</strong></button></a>
            </div>
        </div>
        <?php
  }
}
?>
  </section>

  
  <!-- End Atrium Cinema -->
  <!-- ======= Footer ======= -->
   
  <footer id="footer" >
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