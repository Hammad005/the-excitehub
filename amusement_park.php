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
            <a href="#" class="nav-link scrollto active"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
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
  
  <!-- Amusement PARK -->
  <section id="park" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <h1>Amusement Parks<span>!</span></h1>
        <div class="col-xl-6 col-lg-8">
          <?php
          $showAlreadyBuyAlert=false;
          $showAlert=false;
          $error=false;
          if (isset($_POST['park_order'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              $name = $_POST['name'];
              $email = $_POST['email'];
              $park_name = $_POST['park_name'];
              $price = $_POST['price'];
              $tickets = $_POST['tickets'];
              $total = $_POST['total'];
              $date = $_POST['date'];
              $card_number = $_POST['card_number'];
              $card_pin = $_POST['card_pin'];
              $card_no_hash= password_hash($card_number, PASSWORD_DEFAULT);
              $card_pin_hash= password_hash($card_pin, PASSWORD_DEFAULT);
              $check="SELECT * FROM `park_order`WHERE `name`='$name' AND `email`='$email' AND `park_name`='$park_name' AND `date`='$date'";
              $result=mysqli_query($conn,$check);
              $num=mysqli_num_rows($result);
              if($num>0){
                $sql = "UPDATE `park_order` SET
                `name`='$name',
                `email`='$email',
                `park_name`='$park_name',
                `price`='$price',
                `tickets` = `tickets` + $tickets,
                `total` = `total` + $total,
                `card_number`='$card_no_hash',
                `card_pin` = '$card_pin_hash'
                WHERE `name`='$name' AND `email`='$email' AND `park_name`='$park_name' AND `date`='$date'";
                $book=mysqli_query($conn, $sql);
                $showAlreadyBuyAlert=true;
              }
              else{
              $sql = "INSERT INTO `park_order`(`name`, `email`, `park_name`, `price`, `tickets`, `total`, `date`, `card_number`, `card_pin`, `booking_time`) 
                                        VALUES
                                        ('$name','$email','$park_name','$price','$tickets','$total','$date','$card_no_hash', '$card_pin_hash', current_timestamp())";
                                        $book=mysqli_query($conn, $sql);
                                        if($book){
                                          $showAlert=true;
                                        }else{
                                          $error=true;
                                        }
              }
            }
          }
          ?>
          
        </div>
      </div>
      <?php
    if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Done!</strong> Your tickets have been booked.
      <div type="button"  class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></div>
      </div>';
      }
      if($showAlreadyBuyAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Done!</strong> Your tickets have been booked again.
        <div type="button"  class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></div>
        </div>';
        }
      if($error){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Your tickets have not been booked!.
        <div type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
        </div>';
        }
        ?>
      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
                <?php
        $sql="SELECT * FROM `parks` ORDER BY `id` DESC";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
              ?>
        <div class="col-xl-2 col-md-4"id="p-box">
          <a href="<?php echo $row['file_name'] ?>.php?parkid= <?php echo $row['id'] ?>" class="link">
          <div class="icon-box">
            <img src="admin/parks/<?php echo $row['logo_2'] ?>" alt="" >
            <h3><?php echo $row['park_name'] ?></h3>
          </div></a>
        </div>
      <?php
        }
      ?>
      </div>
    </div>
  </section>

  <!-- End Amusement PARK -->
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

</body>

</html>