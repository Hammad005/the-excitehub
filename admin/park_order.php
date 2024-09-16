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
      <!--Cancel Booking Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Cancel Booking</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to cancel the booking?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;" data-bs-dismiss="modal">No</button>
        <a href="#" type="button" class="btn delete" id="deleteButton">Yes</a>
      </div>
    </div>
  </div>
</div>
<!--Cancel Booking Modal-->
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
            <?php
                      // Total Orders From Amusement Parks
                      $sql_park="SELECT * FROM `park_order`";
                      $result_park=mysqli_query($conn,$sql_park);
                      $total_park_tickets = 0;
                      while ($row_park = mysqli_fetch_assoc($result_park)) {
                          $total_park_tickets += $row_park['tickets'];
                      }
                      ?>
              <div>
                <h3 class="fw-bold mb-3">Total Amusement Park Ticket Orders: <?php echo  $total_park_tickets; ?></h3>

              </div>
            </div>
            <?php
            if(isset($_GET['park_orderid'])){
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Booking canceled !</strong> Park booking canceled  successfully.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
              
          }
            $sql = "SELECT DISTINCT `park_name` FROM `park_order` ORDER BY `id` DESC";
                      $result = mysqli_query($conn, $sql);
                      $num = mysqli_num_rows($result);
                      
                      if ($num == 0) {
                      ?>
                          <h5 class="text-center"><b>No one bought a ticket for the Amusement Park!</b></h5>
                      <?php
                      } else {
                          while ($row = mysqli_fetch_assoc($result)) {
                              $park_name = $row['park_name'];
                      ?>
            <div class="row">
              <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Ticket Orders of <?php echo $park_name  ?></div>
                      
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
                            <th scope="col" class="text-end">Amusement Park Name</th>
                            <th scope="col" class="text-end">Price</th>
                            <th scope="col" class="text-end">How many tickets</th>
                            <th scope="col" class="text-end">Total Bill</th>
                            <th scope="col" class="text-end">Date</th>
                            <th scope="col" class="text-end">Booking Time</th>
                            <th scope="col" class="text-end">Cancel Booking</th>
                          </tr>
                        </thead>
                        <tbody >
                        <?php
                        $sql = "SELECT * FROM `park_order` WHERE `park_name`='$park_name' ORDER BY `id` DESC";
                        $m_result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($m_result)) {
                        ?>
                          <tr>
                            <th scope="row" style="font-size: 12px!important;">
                            <?php echo $row['name']; ?>
                            </th>
                            <td class="text-end" style="font-size: 12px!important;"><?php echo $row['email']; ?></td>
                            <td class="text-end" style="font-size: 12px!important;"><?php echo $row['park_name']; ?></td>
                            <td class="text-end" style="font-size: 12px!important;">Rs. <?php echo $row['price']; ?>/-</td>
                            <td class="text-end" style="font-size: 12px!important;"><?php echo $row['tickets']; ?></td>
                            <td class="text-end" style="font-size: 12px!important;">Rs. <?php echo $row['total']; ?>/-</td>
                            <td class="text-end" style="font-size: 12px!important;"><?php echo $row['date']; ?></td>
                            <td class="text-end" style="font-size: 12px!important;"><?php echo $row['booking_time']; ?></td>
                            <td class="text-end">
                                <button class="btn btn-icon btn-link btn-danger op-8" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-ban"></i>
                                </button>
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
    <script>
    // When the modal is shown
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var feedbackId = button.data('id'); // Extract info from data-* attributes

        // Update the modal's content
        var modal = $(this);
        modal.find('#deleteButton').attr('href', 'delete_park_order.php?id=' + feedbackId);
    });
</script>
  </body>
</html>
