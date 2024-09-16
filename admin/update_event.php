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
            <div class="page-header">
              <h3 class="fw-bold mb-3">Edit Event:</h3>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Informations About Event</div>
                  </div>
                        <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `events` WHERE `id` = '$id'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                        }
                        ?>
                  <div class="card-body">
                    <form class="row" action="events.php?idnew=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                      <div class="col-md-6 col-lg-12">
                      <div class="form-group" >
                      <div class="mb-3">
                            <label for="current_image" class="form-label">Current Event Poster:</label><br>
                            <?php
                            if (!empty($row['poster'])) {
                                echo '<img src="events/' . $row['poster'] . '" alt="Current Image" style="max-width: 100px; max-height: 100px;">';
                            } else {
                                echo 'No image uploaded';
                            }
                            ?>
                        </div>
                          <label for="email2">Upload New Event Poster</label>
                          <input type="file" class="form-control" id="email2" name="poster">
                        </div>
                        <div class="form-group" >
                      <div class="mb-3">
                            <label for="current_image" class="form-label">Current Event Logo:</label><br>
                            <?php
                            if (!empty($row['logo'])) {
                                echo '<img src="events/' . $row['logo'] . '" alt="Current Image" style="max-width: 70px; max-height: 70px;">';
                            } else {
                                echo 'No image uploaded';
                            }
                            ?>
                        </div>
                          <label for="email2">Upload New Event Logo</label>
                          <input type="file" class="form-control" id="email2" name="logo">
                        </div>
                        <div class="form-group">
                          <label for="email2">Event</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter Event Name" name="event" value="<?php echo $row['event']; ?>" required>

                        </div>
                        <div class="form-group">
                          <label for="email2">Location</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter Event Location" name="location" value="<?php echo $row['location']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Genre / Type</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter Event Genre / Type" name="genre" value="<?php echo $row['genre']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Date</label>
                          <input type="date" class="form-control" id="email2" placeholder="Enter Event Date" name="date" value="<?php echo $row['date']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Timing</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter Event Timing" name="timing" value="<?php echo $row['timing']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Address</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter Event Address" name="address" value="<?php echo $row['address']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Price</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter Event Ticket Price " name="price" value="<?php echo $row['price']; ?>" required>
                        </div>
                        <div class="card-action">
                        <a href="events.php">
                        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;"><b>Cancel</b></button>
                        </a>
                        <button type="submit"class="btn btn-success" name="update_event"><b>Update</b></button>
                  </div>              
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
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
