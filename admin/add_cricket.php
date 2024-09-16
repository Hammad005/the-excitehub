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
    $showError=false;
	$showAlert=false;
	if($_SERVER['REQUEST_METHOD']=='POST' && !isset($_POST['update_cricket'])){
        $poster=$_FILES['poster']['name'];
        $poster_tmp=$_FILES['poster']['tmp_name'];
        $logo=$_FILES['logo']['name'];
        $logo_tmp=$_FILES['logo']['tmp_name'];
        $poster_folder='cricket/'. $poster;
        $logo_folder='cricket/'. $logo;
        $match_name=$_POST['match_name'];
        $team_one=$_POST['team_one'];
        $team_two=$_POST['team_two'];
        $location=$_POST['location'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $address=$_POST['address'];
        $price=$_POST['price'];
		if(move_uploaded_file($logo_tmp, $logo_folder) && move_uploaded_file($poster_tmp, $poster_folder)){
				$sql="INSERT INTO `cricket` 
                (`poster`, `logo`, `match_name`, `team_one`, `team_two`, `location`, `date`, `time`, `address`, `price`, `add_time`) 
                VALUES 
                ('$poster', '$logo', '$match_name', '$team_one', '$team_two', '$location', '$date', '$time', '$address', '$price', current_timestamp());";
				$result=mysqli_query($conn,$sql);
				if($result){
					$showAlert=true;

				}
			}
			else{
				$showError=true;
			}
	}
      ?>

<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Add Cricket Match:</h3>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Informations About Cricket Match</div>
                  </div>
                  <div class="card-body">
                    <form class="row" action="add_cricket.php" method="POST" enctype="multipart/form-data">
                      <div class="col-md-6 col-lg-12">
                      <?php
					if($showError){
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Error!</strong> Cricket Match has not been added successfully!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
					}
					if($showAlert){
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Done!</strong> Cricket Match has been added successfully.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
						}
					?>
                        <div class="form-group" >
                          <label for="email2">Cricket Match Poster</label>
                          <input type="file" class="form-control" id="email2" name="poster" required>
                        </div>
                        <div class="form-group" >
                          <label for="email2">Cricket Match Logo</label>
                          <input type="file" class="form-control" id="email2" name="logo" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Match Name</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter match name" name="match_name" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Team one</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter team one name" name="team_one" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Team Two</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter team two name" name="team_two" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Location</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter match location name" name="location" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Date</label>
                          <input type="date" class="form-control" id="email2" placeholder="Enter match date" name="date" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Time</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter match time" name="time" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Address</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter match address" name="address" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Price</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter match ticket price" name="price" required>
                        </div>
                        <div class="card-action">
                        <a href="cricket.php">
                        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;"><b>Cancel</b></button>
                        </a>
                        <button type="submit"class="btn btn-success"><b>Add</b></button>
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
