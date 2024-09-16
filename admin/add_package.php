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
	$showPackagenameError=false;

	if($_SERVER['REQUEST_METHOD']=='POST' && !isset($_POST['update_package'])){
		$pname=$_POST['pname'];
		$price=$_POST['price'];
		$dis_movie=$_POST['dis_movie'];
		$dis_amusement=$_POST['dis_amusement'];
		$dis_cricket=$_POST['dis_cricket'];

		$sql="SELECT * FROM `packages` WHERE `pname`='$pname'";
		$result=mysqli_query($conn,$sql);
		$exist=mysqli_num_rows($result);
		if($exist>0){
			$showPackagenameError=true;
		}
		else{
			$sql="INSERT INTO `packages` (`pname`, `price`, `dis_movie`, `dis_amusement`, `dis_cricket`, `plaunch_time`)
                                  VALUES ('$pname', '$price', '$dis_movie', '$dis_amusement', '$dis_cricket', current_timestamp());";
			$result=mysqli_query($conn,$sql);
		if($result){
			$showAlert=true;
		}
        else{
            $showError=true;
        }
	}
}
      ?>

<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Add Package:</h3>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Informations About Package</div>
                  </div>
                  <div class="card-body">
                    <form class="row" action="add_package.php" method="POST">
                      <div class="col-md-6 col-lg-12">
                      <?php
                      if($showError){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> The Package has not been Added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
					if($showAlert){
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Done!</strong> The Package has been Added.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
						}
					if($showPackagenameError){
							echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> The package name is unavailable!
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>';
							}
					?>
                        <div class="form-group">
                          <label for="email2">Package Name</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter Package Name" name="pname" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Price /month</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter Price" name="price" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Discount On Movies</label>
                          <input type="text"  class="form-control" maxlength="3"  id="email2" placeholder="Enter Discount On Movies - give tha evalue in %" name="dis_movie" required >
                        </div>
                        <div class="form-group">
                            <label for="email2">Discount On Amusement Parks</label>
                          <input type="text"  class="form-control" maxlength="3"  id="email2" placeholder="Enter Discount On Amusement Parks - give tha evalue in %" name="dis_amusement" required>
                        </div>
                        <div class="form-group">
                            <label for="email2">Discount On Cricket Matches</label>
                          <input type="text"  class="form-control " maxlength="3"  id="email2" placeholder="Enter Discount On Cricket Matches - give tha evalue in %" name="dis_cricket" required>
                        </div>
                        <div class="card-action">
                        <a href="allpackages.php">
                        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;"><b>Cancel</b></button>
                        </a>
                        <button type="submit"class="btn btn-success"><b>Add Package!</b></button>
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
