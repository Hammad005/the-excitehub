<?php
session_name('admin_session');
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: index.php");
  exit;

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>The ExciteHub | Admin</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.png"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    
    <div class="wrapper">
      <?php
	include '_dbconnection.php';
    include "_nav.php";    
       
      ?>
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
            <?php
                      // Total Orders From Movie Theaters
                      $sql_movie="SELECT * FROM `movie_order`";
                      $result_movie=mysqli_query($conn,$sql_movie);
                      $total_movie_tickets = 0;
                      while ($row_movie = mysqli_fetch_assoc($result_movie)) {
                          $total_movie_tickets += $row_movie['tickets'];
                      }

                      ?>
              <div>
                <h3 class="fw-bold mb-3">Total Movie Ticket Orders: <?php echo  $total_movie_tickets; ?></h3>

              </div>
            </div>
            <?php
            $sql = "SELECT DISTINCT `theater_name` FROM `movie_order` ORDER BY `id` DESC";
                      $result = mysqli_query($conn, $sql);
                      $num = mysqli_num_rows($result);
                      
                      if ($num == 0) {
                      ?>
                          <h5 class="text-center"><b>No one bought a ticket for the movie!</b></h5>
                      <?php
                      } else {
                          while ($row = mysqli_fetch_assoc($result)) {
                              $theater_name = $row['theater_name'];
                      ?>
            <div class="row">
              <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Ticket Orders of <?php echo $theater_name  ?></div>
                      
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                       
                      <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-end">Email</th>
                            <th scope="col" class="text-end">Movie Name</th>
                            <th scope="col" class="text-end">Show Time</th>
                            <th scope="col" class="text-end">Price</th>
                            <th scope="col" class="text-end">How many tickets</th>
                            <th scope="col" class="text-end">Total Bill</th>
                            <th scope="col" class="text-end">Booking Time</th>
                          </tr>
                        </thead>
                        <tbody >
                        <?php
                        $sql = "SELECT * FROM `movie_order` WHERE `theater_name`='$theater_name' ORDER BY `id` DESC";
                        $m_result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($m_result)) {
                        ?>
                          <tr>
                            <th scope="row" style="font-size: 12px!important;">
                            <?php echo $row['name']; ?>
                            </th>
                            <td class="text-end" style="font-size: 12px!important;"><?php echo $row['email']; ?></td>
                            <td class="text-end" style="font-size: 12px!important;"><?php echo $row['movie_name']; ?></td>
                            <td class="text-end" style="font-size: 12px!important;"><?php echo $row['selected_show_time']; ?></td>
                            <td class="text-end" style="font-size: 12px!important;">Rs. <?php echo $row['price']; ?>/-</td>
                            <td class="text-end" style="font-size: 12px!important;"><?php echo $row['tickets']; ?></td>
                            <td class="text-end" style="font-size: 12px!important;">Rs. <?php echo $row['total']; ?>/-</td>
                            <td class="text-end" style="font-size: 12px!important;"><?php echo $row['booking_time']; ?></td>
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
                        }
?>
        </div>

      </div>
        <?php
        include '_footer.php';
        ?>

  
      
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

  </body>
</html>
