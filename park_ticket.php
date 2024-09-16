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
  <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet"> -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet"> -->
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
  <!-- Park tickets -->
  <section id="park_tickets">
    <div class="main-block">
      <div class="left-part">
        <a href="amusement_park.php"><img src="logo/default4.png" alt="" style="padding-right: 20px;"></a>
      </div>
      <?php
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM parks WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $username=$_SESSION['username'];
        $email=$_SESSION['email'];
      }
      ?>
      <form action="amusement_park.php" method="post">
        <div class="title">
          <h2><strong>"Customer Detail"</strong></h2>
        </div>
        <div class="info">
          <label>Name :</label>
          <input class="fname" type="text" name="name"  placeholder="Full name" readonly value="<?php echo $username ?>" maxlength="50" required>
          <label>Email :</label>
          <input type="email" name="email" placeholder="Email" readonly value="<?php echo $email ?>"  required>
          <label>Amusment Park :</label>
          <input type="text" name="park_name" placeholder="Email" readonly value="<?php echo $row['park_name'] ?>"  required>
          <?php
          $sql="SELECT * FROM `subscription` WHERE `sname` = '$username' AND `email` = '$email'";
          $result = mysqli_query($conn, $sql);
          $pack = mysqli_fetch_assoc($result);
          $sub = mysqli_num_rows($result);
          if($sub>0){
          $package=$pack['package'];
          $query="SELECT * FROM `packages` WHERE `pname`='$package'";
          $query_result = mysqli_query($conn, $query);
          $query_fetch = mysqli_fetch_assoc($query_result);
          $dis = $query_fetch['dis_amusement'];
          }
          ?>
          <label>Ticket Price :</label>
          <input type="number" id="price" name="price" value="<?php echo $row['ticket_price'] ?>" readonly placeholder="Ticket Price" required>
          <script>
            var price = <?php echo $row['ticket_price']?>;
            var dis = price * 0.<?php echo $dis?>; 
            var final_price = price - dis;
            document.getElementById('price').value = final_price;
            </script>
          <?php
                    if($sub>0){
                        echo '<label style="text-align: right;"><small>Because you have subscribed to the '. $package .' you received a '. $dis .'% discount on the Amusement Park.</small></label>';
                      }
          ?>
          <label>Tickets:</label>
          <input type="number" id="ticket" name="tickets" min="1" placeholder="How Many Tickets"  required oninput="calculateTotal()">
          <label>Total:</label>
          <input type="number" id="total" name="total" placeholder="Total" readonly required>
          <label>Date :
            <span style="font-size: 10px; padding-left: 05px; color: #ffc551c0;">(What date do you want to come?)</span>
          </label>
          <input class="date" type="date" name="date" required>
          <label>Card Number :</label>
          <input type="text" placeholder="xxxx-xxxx-xxxx-xxxx" minlength="16" maxlength="16" name="card_number" required>
          <label>Card Pin :</label>
          <input type="password" placeholder="xxxx" name="card_pin" minlength="4" maxlength="4"required>
        </div>
        <button type="submit" name="park_order"><strong>Book Now!</strong></button>
      </form>
    </div>
</section>
  <!-- end park tickets -->
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
  <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script> -->
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!--  Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
        function calculateTotal() {
            var price = parseFloat(document.getElementById('price').value.replace('Rs. ', ''));
            var tickets = parseInt(document.getElementById('ticket').value);
            var total = price * tickets;
            document.getElementById('total').value = total;
        }
    </script>
</body>

</html>