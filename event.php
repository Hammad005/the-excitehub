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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    
    #event .alert {
            margin: 20px; 
            padding: 15px 30px; 
            border: 1px solid transparent;
            border-radius: 4px;
            position: relative;
        }
        #event .btn-close {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            position: absolute;
            right: 8px;
            top: -5px;
        }
        #event .btn-close:before {
            content: '×';
            font-size: 2.5rem;
            color: #000;
        }
  </style>

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body id="event_body">

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
  <!-- Event -->
    <?php
    $showAlreadyBuyAlert=false;
    $showAlert=false;
    $error=false;
    if(isset($_POST['event_order'])){
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        $username = $_POST['username'];
          $email = $_POST['email'];
          $event = $_POST['event'];
          $location = $_POST['location'];
          $ticket_price = $_POST['ticket_price'];
          $tickets = $_POST['tickets'];
          $total = $_POST['total'];
          $card_number = $_POST['card_number'];
          $card_pin = $_POST['card_pin'];
          $card_no_hash= password_hash($card_number, PASSWORD_DEFAULT);
          $card_pin_hash= password_hash($card_pin, PASSWORD_DEFAULT);
        $check="SELECT * FROM `event_order` WHERE `username`='$username' AND `email`='$email' AND `event`='$event' AND `location` = '$location'";
        $result = mysqli_query($conn, $check);
        $num = mysqli_num_rows($result);
        if($num>0){
          $sql = "UPDATE `event_order` SET
              `username`='$username',
              `email`='$email',
              `event`='$event',
              `location`='$location',
              `ticket_price`='$ticket_price',
              `tickets` = `tickets` + $tickets,
              `total` = `total` + $total,
              `card_number`='$card_no_hash',
              `card_pin` = '$card_pin_hash'
          WHERE `username`='$username' AND `email`='$email' AND `event`='$event' AND `location` = '$location';";
                $book=mysqli_query($conn, $sql);
          $showAlreadyBuyAlert=true;
        }
        else{
          $sql = "INSERT INTO `event_order`
                (`username`, `email`, `event`, `location`, `ticket_price`, `tickets`, `total`, `card_number`, `card_pin`, `booking_time`)
                VALUES
                ('$username', '$email', '$event', '$location', '$ticket_price', '$tickets', '$total', '$card_no_hash', '$card_pin_hash', current_timestamp())";
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
    <?php
    $query="SELECT * FROM `events` ORDER BY `id` DESC";
    $result = mysqli_query($conn, $query);
    $num=mysqli_num_rows($result);
                       if ($num==0) {
                        echo ' 
                        <section id="event2" class="d-flex align-items-center justify-content-center">
    
                        <div class="container" data-aos="fade-up">

                          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                            <div class="col-xl-6 col-lg-8">
                              <h1>Events<span>!</span></h1>
                              
                            </div>
                          </div>

                          <h2><span>"</span> There are no Upcoming Events Available <span>"</span></h2>
                      </section>
                        ';
                       }
                       else{
                        echo '
                        <section id="event" >
                        <h2 class="heading"><strong>Events<span class="heading_span">!</span></strong></h2>
                        ';
                       }
    ?>
    
    
    <div class="container align-items-center justify-content-center">
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
        </div>
    <div class="container d-flex align-items-center justify-content-center" >
      
    <?php
    $query="SELECT * FROM `events` ORDER BY `id` DESC";
    $result = mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($result)){
    ?>
        <div class="card">
            <img src="admin/events/<?php echo $row['poster']?>" alt="" class="poster">
            <div class="intro" >
              <img src="admin/events/<?php echo $row['logo']?>" alt="" class="inner_poster">
              <strong><p><span>Event:</span><?php echo $row['event']?></p></strong>
                <p><span>Location:</span><?php echo $row['location']?></p>
                <p><span>Genre:</span><?php echo $row['genre']?></p>
                <p><span>Date:</span><?php echo $row['date']?></p>
                <p><span>Timing:</span><?php echo $row['timing']?></p>
                <p><span>Address:</span><?php echo $row['address']?></p>
                <strong><p><span>Price:</span>Rs. <?php echo $row['price']?> - person</p></strong>
              <a href="event_ticket.php?eventid=<?php echo $row['id']?>"><button class="buy-button"><strong>Buy Now!</strong></button></a>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
  </section>
  <!-- End Event -->
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