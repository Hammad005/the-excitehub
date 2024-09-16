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
  <style>
    small{
      transition: color 0.5s ease;
      padding-top: 0px;
    }
    small:hover{
      color: #ffc451;
    }
    .subscribed{
    
    padding: 14px ;
    color: #ffc451;
    font-size: 20px;
    margin-top: 30px;
    }
  </style>
</head>

<body>
  <!--Cancel subscription Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ffc451;">
        <h5 class="modal-title" id="exampleModalLabel"><b>Cancel Subscription!</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to cancel your subscription?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;" data-bs-dismiss="modal">Cancel</button>
        <a href="#" class="btn btn-danger" id="deleteButton" style="background-color: #ffc451; border-color:#ffc451 !important;">Unsubscribe</a>
      </div>
    </div>
  </div>
</div>
<!--Cancel subscription Modal-->
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

    <!-- ======= Packages ======= -->
        <div class="con">
          <h2><strong>Choose Your Package</strong></h2>
          <?php 
      $showError=false;
      $showAlert=false;
      $alreadySubsError=false;
      if(isset($_POST['subscribe'])){
      if($_SERVER['REQUEST_METHOD']=='POST'){

        // Check if subscription already exists
        $email=$_POST['email'];
        $package=$_POST['package'];
        $sql="SELECT * FROM `subscription` WHERE `email`='$email' AND `package`='$package'";
        $result=mysqli_query($conn,$sql);
        $exist=mysqli_num_rows($result);
        if($exist>0){
          $alreadySubsError=true;
        }

        else{
          $sname=$_POST['sname'];
          $email=$_POST['email'];
          $package=$_POST['package'];
          $price=$_POST['price'];
          $card_no=$_POST['card_no'];
          $card_pin=$_POST['card_pin'];

          // Hash card details for security
          $card_no_hash= password_hash($card_no, PASSWORD_DEFAULT);
          $card_pin_hash= password_hash($card_pin, PASSWORD_DEFAULT);

        // Check if subscription needs to be updated
        $sql_update_check = "SELECT * FROM `subscription` WHERE `sname`='$sname' AND `email`='$email'";
        $result_update_check = mysqli_query($conn, $sql_update_check);
        $exist_update = mysqli_num_rows($result_update_check);

        if ($exist_update > 0) {
        // Update existing subscription
            $updatePackage = "UPDATE `subscription` SET `sname`='$sname', `email`= '$email', `package`='$package',
                              `price`='$price', `card_no`='$card_no_hash', `card_pin`='$card_pin_hash'
                              WHERE `sname`='$sname' AND `email`='$email'";
            $result_update = mysqli_query($conn, $updatePackage);

            if ($result_update) {
                $showAlert = true;
            } else {
                $showError = true;
            }
        }else{
          // Insert new subscription
          $sql="INSERT INTO `subscription` (`sname`, `email`, `package`,`price`, `card_no`, `card_pin`, `subscription_time`)
                                    VALUES ('$sname', '$email', '$package', '$price', '$card_no_hash', '$card_pin_hash', current_timestamp())";
                                    $pass=mysqli_query($conn,$sql);
          
                                    if($pass){
                                      $showAlert=true;
                                     
                                    }else{
                                      $showError=true;
                                    }
                  }
        }
      }
    }
      ?>
      <div class="container">
        <?php
      if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Something wrong! You have not subscribed to the package.
      <div type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
        </div>';
        }
      if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Done!</strong> Your package has been subscribed to.
      <div type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
      </div>';
      }
      if(isset($_GET['unsubscribeid'])){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Unsubscribe!</strong> You have unsubscribed from your package.
        <div type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
        </div>';
        }
      if($alreadySubsError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Warning!</strong> You have already subscribed the package.
      <div type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
      </div>';
      }
      ?>
  </div>
          <div class="price-row">
     <?php
     $sql="SELECT * FROM `packages`";
     $result=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result)){
     ?>
            <div class="price-col mb-4">
              <p><?php echo $row['pname'];?></p>
              <h3>Rs. <?php echo $row['price'];?> <span>/ month</span></h3>
              <ul>
                <li><?php echo $row['dis_movie'];?>% Discount on Movie Theaters</li>
                <li><?php echo $row['dis_amusement'];?>% Discount on Amusement Parks</li>
                <li><?php echo $row['dis_cricket'];?>% Discount on Cricket Matches</li>
              </ul>
              <?php
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql_user = "SELECT * FROM `users` WHERE `id` = '$id'";
    $result_user = mysqli_query($conn, $sql_user);
    $user = mysqli_fetch_assoc($result_user);


    if (isset($user['username']) && isset($user['email'])) {
        $username = $user['username'];
        $email = $user['email'];
        $package = $row['pname'];
        $sql_subscription = "SELECT * FROM `subscription` WHERE `sname`='$username' AND `email`='$email' AND `package`='$package'";
        $result_subscription = mysqli_query($conn, $sql_subscription);
        $subscription = mysqli_fetch_assoc($result_subscription);

        // Check if user is subscribed
        if (mysqli_num_rows($result_subscription) > 0) {
            echo '<div class="subscribed"><b>Subscribed</b></div>';
            echo '<small type="button" class=" mt-2" data-id="' . $subscription['id'] . '" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cancel Subscription!
                </small>';
        }
        else {
            echo '<a href="subscribe.php?id=' . $row['id'] . '"><button>Subscribe</button></a>';
        }
    }
}
?>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
   <!-- End Packages -->
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

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    // When the modal is shown
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var feedbackId = button.data('id'); // Extract info from data-* attributes

        // Update the modal's content
        var modal = $(this);
        modal.find('#deleteButton').attr('href', 'unsubscribe.php?id=' + feedbackId);
    });
</script>
</body>

</html>