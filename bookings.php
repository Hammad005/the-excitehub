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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!--cancel Movie Modal-->
<div class="modal fade" id="cancelMovieModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ffc451;">
        <h5 class="modal-title" id="exampleModalLabel"><b>Movie Booking!</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to cancel your movie booking?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;" data-bs-dismiss="modal">No</button>
        <a href="#" class="btn btn-danger" id="cancelMovieButton" style="background-color: #ffc451; border-color:#ffc451 !important;">Yes</a>
      </div>
    </div>
  </div>
</div>
<!--cancel Movie Modal Modal-->

<!--cancel amusement Modal-->
<div class="modal fade" id="cancelParkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ffc451;">
        <h5 class="modal-title" id="exampleModalLabel"><b>Amusement Park Booking!</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to cancel your amusement park booking?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;" data-bs-dismiss="modal">No</button>
        <a href="#" class="btn btn-danger" id="cancelParkButton" style="background-color: #ffc451; border-color:#ffc451 !important;">Yes</a>
      </div>
    </div>
  </div>
</div>
<!--cancel amusement Modal Modal-->

<!--cancel event Modal-->
<div class="modal fade" id="cancelEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ffc451;">
        <h5 class="modal-title" id="exampleModalLabel"><b>Event Booking!</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to cancel your event booking?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;" data-bs-dismiss="modal">No</button>
        <a href="#" class="btn btn-danger" id="cancelEventButton" style="background-color: #ffc451; border-color:#ffc451 !important;">Yes</a>
      </div>
    </div>
  </div>
</div>
<!--cancel event Modal Modal-->

<!--cancel Cricket Match Modal-->
<div class="modal fade" id="cancelCricketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ffc451;">
        <h5 class="modal-title" id="exampleModalLabel"><b>Cricket Match Booking!</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to cancel your cricket match booking?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;" data-bs-dismiss="modal">No</button>
        <a href="#" class="btn btn-danger" id="cancelCricketButton" style="background-color: #ffc451; border-color:#ffc451 !important;">Yes</a>
      </div>
    </div>
  </div>
</div>
<!--cancel Cricket Match Modal Modal-->

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
          <li><a class="nav-link scrollto " href="packages.php">Packages</a></li>
          <li><a class="nav-link scrollto" href="home.php #about">About</a></li>
          <li><a class="nav-link scrollto" href="home.php #contact">Contact</a></li>
          <li class="dropdown">
            <a href="#" class="nav-link scrollto">Hi,<span><b><?php echo $_SESSION['username'];?></b></span> <i class="bi bi-chevron-down"></i></a>
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
  
    <?php
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `users` WHERE `id` = '$id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
    }
    ?>
    
    <!-- ======= Booking Section ======= -->
  <section id="booking" >
      <div class="container" data-aos="fade-up">
      <?php

        // Orders From Movie Theaters
        $sql_movie="SELECT * FROM `movie_order` WHERE `name` = '$username' ORDER BY `id` DESC";
        $result_movie=mysqli_query($conn,$sql_movie);
        $num_movie=mysqli_num_rows($result_movie);

        // Orders From Amusement Parks
        $sql_park="SELECT * FROM `park_order` WHERE `name` = '$username' ORDER BY `id` DESC";
        $result_park=mysqli_query($conn,$sql_park);
        $num_park=mysqli_num_rows($result_park);

        // Orders From Events
        $sql_event="SELECT * FROM `event_order` WHERE `username` = '$username' ORDER BY `id` DESC";
        $result_event=mysqli_query($conn,$sql_event);
        $num_event=mysqli_num_rows($result_event);

        // Orders From Cricket Match
        $sql_cricket="SELECT * FROM `cricket_order` WHERE `username` = '$username' ORDER BY `id` DESC";
        $result_cricket=mysqli_query($conn,$sql_cricket);
        $num_cricket=mysqli_num_rows($result_cricket);

        $num = $num_movie + $num_park + $num_event + $num_cricket;

        if($num == 0){
            echo '
            <section id="booking_2">
            <div class="container">
            <h1>You have no bookings<span>!</span></h1>
            </div>
            </section>
            ';
        }
        else{
    ?>

          <h1>Bookings<span>!</span></h1>
          
<br>
          <!-- Orders From Movie Theaters -->
          <?php
    if ($num_movie > 0) {
    ?>
          <div class="row">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Movie Bookings</div>
                      <?php
      if(isset($_GET['movieid'])){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Booking canceled !</strong> Your movie booking canceled successfully.
            <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
            </div>';
        
    }
      ?>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">

          <table class="table">
  <thead class="thead">
    <tr>
      <th scope="col" style="font-size:12px;">Name</th>
      <th scope="col" style="font-size:12px;">Email</th>
      <th scope="col" style="font-size:12px;">Theater</th>
      <th scope="col" style="font-size:12px;">Movie</th>
      <th scope="col" style="font-size:12px;">Show Time</th>
      <th scope="col" style="font-size:12px;">Price</th>
      <th scope="col" style="font-size:12px;">Tickets</th>
      <th scope="col" style="font-size:12px;">Total</th>
      <th scope="col" style="font-size:12px;">Cancel Booking</th>
    </tr>
  </thead>
  <tbody>
    <?php
     while ($movie=mysqli_fetch_assoc($result_movie)) {
    ?>
    <tr>
      <td style="font-size:12px;"><?php echo $movie['name']; ?></td>
      <td style="font-size:12px;"><?php echo $movie['email']; ?></td>
      <td style="font-size:12px;"><?php echo $movie['theater_name']; ?></td>
      <td style="font-size:12px;"><?php echo $movie['movie_name']; ?></td>
      <td style="font-size:12px;"><?php echo $movie['selected_show_time']; ?></td>
      <td style="font-size:12px;">Rs. <?php echo $movie['price']; ?>/-</td>
      <td style="font-size:12px;"><?php echo $movie['tickets']; ?></td>
      <td style="font-size:12px;">Rs. <?php echo $movie['total']; ?>/-</td>
      <td>
      <div class="btn btn-danger " style="font-size:12px;" data-id="<?php echo $movie['id']; ?>" data-bs-toggle="modal" data-bs-target="#cancelMovieModal">
      <i class="bi bi-x"></i> Cancel Booking
             </div>  
            </td>
    </tr>
    <?php
     }
    ?>
  </tbody>
</table>
        
        </div>
      </div>
    </div>
    </div>
    <?php
    }

    ?>
    
<br>
    <!-- Orders From Movie Theaters -->

    <!-- Orders From Amusement Parks -->
    <?php
    if ($num_park > 0) {
    ?>
    <div class="row">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Amusement Park Bookings</div>
                      <?php
      if(isset($_GET['parkid'])){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Booking canceled !</strong> Your amusement park booking canceled successfully.
            <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
            </div>';
        
    }
      ?>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">

          <table class="table">
  <thead class="thead">
    <tr>
      <th scope="col" style="font-size:12px;">Name</th>
      <th scope="col" style="font-size:12px;">Email</th>
      <th scope="col" style="font-size:12px;">Park</th>
      <th scope="col" style="font-size:12px;">Date</th>
      <th scope="col" style="font-size:12px;">Price</th>
      <th scope="col" style="font-size:12px;">Tickets</th>
      <th scope="col" style="font-size:12px;">Total</th>
      <th scope="col" style="font-size:12px;">Cancel Booking</th>
    </tr>
  </thead>
  <tbody>
    <?php
     while ($park=mysqli_fetch_assoc($result_park)) {
    ?>
    <tr>
      <td style="font-size:12px;"><?php echo $park['name']; ?></td>
      <td style="font-size:12px;"><?php echo $park['email']; ?></td>
      <td style="font-size:12px;"><?php echo $park['park_name']; ?></td>
      <td style="font-size:12px;"><?php echo $park['date']; ?></td>
      <td style="font-size:12px;">Rs. <?php echo $park['price']; ?>/-</td>
      <td style="font-size:12px;"><?php echo $park['tickets']; ?></td>
      <td style="font-size:12px;">Rs. <?php echo $park['total']; ?>/-</td>
      <td>
      <div class="btn btn-danger " style="font-size:12px;" data-id="<?php echo $park['id']; ?>" data-bs-toggle="modal" data-bs-target="#cancelParkModal">
      <i class="bi bi-x"></i> Cancel Booking
             </div>  
            </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
        
        </div>
      </div>
    </div>
    </div>
    <?php
    }
    ?>
<br>
    <!-- Orders From Amusement Parks -->

    <!-- Orders From Events -->
    <?php
    if ($num_event > 0) {
    ?>
<div class="row">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Event Bookings</div>
                      <?php
      if(isset($_GET['eventid'])){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Booking canceled !</strong> Your event booking canceled successfully.
            <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
            </div>';
        
    }
    ?>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">

          <table class="table">
  <thead class="thead">
    <tr>
      <th scope="col" style="font-size:12px;">Name</th>
      <th scope="col" style="font-size:12px;">Email</th>
      <th scope="col" style="font-size:12px;">Event</th>
      <th scope="col" style="font-size:12px;">Location</th>
      <th scope="col" style="font-size:12px;">Price</th>
      <th scope="col" style="font-size:12px;">Tickets</th>
      <th scope="col" style="font-size:12px;">Total</th>
      <th scope="col" style="font-size:12px;">Cancel Booking</th>
    </tr>
  </thead>
  <tbody>
    <?php
     while ($event=mysqli_fetch_assoc($result_event)) {
    ?>
    <tr>
      <td style="font-size:12px;"><?php echo $event['username']; ?></td>
      <td style="font-size:12px;"><?php echo $event['email']; ?></td>
      <td style="font-size:12px;"><?php echo $event['event']; ?></td>
      <td style="font-size:12px;"><?php echo $event['location']; ?></td>
      <td style="font-size:12px;">Rs. <?php echo $event['ticket_price']; ?>/-</td>
      <td style="font-size:12px;"><?php echo $event['tickets']; ?></td>
      <td style="font-size:12px;">Rs. <?php echo $event['total']; ?>/-</td>
      <td>
      <div class="btn btn-danger " style="font-size:12px;" data-id="<?php echo $event['id']; ?>" data-bs-toggle="modal" data-bs-target="#cancelEventModal">
      <i class="bi bi-x"></i> Cancel Booking
             </div>  
            </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
        
        </div>
      </div>
    </div>
    </div>
    <?php
    }
    ?>
<br>
    <!-- Orders From Events -->

<!-- Orders From Cricket Match -->
<?php
    if ($num_cricket > 0) {
    ?>
<div class="row">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Cricket Match Bookings</div>
                      <?php
      if(isset($_GET['cricketid'])){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Booking canceled !</strong> Your cricket match booking canceled successfully.
            <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
            </div>';
        
    }
    ?>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">

          <table class="table">
  <thead class="thead">
    <tr>
      <th scope="col" style="font-size:12px;">Name</th>
      <th scope="col" style="font-size:12px;">Email</th>
      <th scope="col" style="font-size:12px;">Match</th>
      <th scope="col" style="font-size:12px;">Teams</th>
      <th scope="col" style="font-size:12px;">Price</th>
      <th scope="col" style="font-size:12px;">Tickets</th>
      <th scope="col" style="font-size:12px;">Total</th>
      <th scope="col" style="font-size:12px;">Cancel Booking</th>
    </tr>
  </thead>
  <tbody>
    <?php
     while ($cricket=mysqli_fetch_assoc($result_cricket)) {
    ?>
    <tr>
      <td style="font-size:12px;"><?php echo $cricket['username']; ?></td>
      <td style="font-size:12px;"><?php echo $cricket['email']; ?></td>
      <td style="font-size:12px;"><?php echo $cricket['match_name']; ?></td>
      <td style="font-size:12px;"><?php echo $cricket['team_one']; ?> vs <?php echo $cricket['team_two']; ?></td>
      <td style="font-size:12px;">Rs. <?php echo $cricket['price']; ?>/-</td>
      <td style="font-size:12px;"><?php echo $cricket['tickets']; ?></td>
      <td style="font-size:12px;">Rs. <?php echo $cricket['total']; ?>/-</td>
      <td>
      <div class="btn btn-danger " style="font-size:12px;" data-id="<?php echo $cricket['id']; ?>" data-bs-toggle="modal" data-bs-target="#cancelCricketModal">
      <i class="bi bi-x"></i> Cancel Booking
             </div>  
            </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
        
        </div>
      </div>
    </div>
    </div>
    <?php 
    }
    ?>
<br>
    <!-- Orders From Events -->





        </div>
        <?php
        
        }
        ?>

  </section><!-- End Manage -->
  
    
    
    



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
  <script>
    // Movie Booking Script
    $('#cancelMovieModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var movieOrderId = button.data('id'); // Extract info from data-* attributes

        // Update the modal's content
        var modal = $(this);
        modal.find('#cancelMovieButton').attr('href', 'cancel_movie.php?id=' + movieOrderId );
    });

    // Amusement Park Booking Script
    $('#cancelParkModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var parkOrderId = button.data('id'); // Extract info from data-* attributes

        // Update the modal's content
        var modal = $(this);
        modal.find('#cancelParkButton').attr('href', 'cancel_park.php?id=' + parkOrderId );
    });

    // Event Booking Script
    $('#cancelEventModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var eventOrderId = button.data('id'); // Extract info from data-* attributes

        // Update the modal's content
        var modal = $(this);
        modal.find('#cancelEventButton').attr('href', 'cancel_event.php?id=' + eventOrderId );
    });
    
    // Cricket Match Booking Script
    $('#cancelCricketModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var cricketOrderId = button.data('id'); // Extract info from data-* attributes

        // Update the modal's content
        var modal = $(this);
        modal.find('#cancelCricketButton').attr('href', 'cancel_cricket.php?id=' + cricketOrderId );
    });
</script>
</body>

</html>