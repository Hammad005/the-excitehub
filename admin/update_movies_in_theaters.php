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
    <style>
        input.form-control[readonly] {
            background-color: transparent !important;
        }
    </style>
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
              <h3 class="fw-bold mb-3">Update Movie in Theater:</h3>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Update Informations About Movie </div>
                  </div>
                  <div class="card-body">
                      <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `theater_movies` WHERE `id` = '$id'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                        }
                        ?>
                    <form class="row" action="movies_in_theaters.php?idnew=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                      <div class="col-md-6 col-lg-12">
                        <div class="form-group">
                            <label for="email2">Theater Name</label>
                            <input type="text" class="form-control" id="email2" name="theater_name" readonly value="<?php echo $row['theater_name'] ?>" required>
                        </div>
                        <div class="form-group" >
                        <div class="mb-3">
                            <label for="current_image" class="form-label">Current Movie Banner:</label><br>
                            <?php
                            if (!empty($row['movie_banner'])) {
                                echo '<img src="movie/' . $row['movie_banner'] . '" alt="Current Image" style="max-width: 100px; max-height: 100px;">';
                            } else {
                                echo 'No image uploaded';
                            }
                            ?>
                        </div>
                        </div>
                        <div class="form-group" >
                          <label for="email2">Upload New Movie Banner</label>
                          <input type="file" class="form-control" id="email2" name="movie_banner" >
                        </div>
                        <div class="form-group" >
                        <div class="mb-3">
                            <label for="current_image" class="form-label">Current Movie Poster:</label><br>
                            <?php
                            if (!empty($row['movie_poster'])) {
                                echo '<img src="movie/' . $row['movie_poster'] . '" alt="Current Image" style="max-width: 100px; max-height: 100px;">';
                            } else {
                                echo 'No image uploaded';
                            }
                            ?>
                        </div>
                        </div>
                        <div class="form-group" >
                          <label for="email2">Upload New Movie Poster</label>
                          <input type="file" class="form-control" id="email2" name="movie_poster" >
                        </div>
                        <div class="form-group">
                          <label for="email2">Movie Name</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter movie name" name="movie_name" value="<?php echo $row['movie_name'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Genre</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter movie genre" name="genre" value="<?php echo $row['genre'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Run TIme</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter movie run time" name="run_time" value="<?php echo $row['run_time'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Language</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter movie language" name="language" value="<?php echo $row['language'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Cast</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter movie cast" name="cast" value="<?php echo $row['cast'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Date Of Show 1</label>
                          <input type="date" class="form-control" id="email2" placeholder="Enter movie date of show 1" name="date_of_show_1" value="<?php echo $row['date_of_show_1'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">First Show time Of Show 1</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter movie First Show time Of Show 1" name="first_show_time_of_show_1" value="<?php echo $row['first_show_time_of_show_1'] ?>" required>
                        </div><div class="form-group">
                          <label for="email2">Secound Show time Of Show 1</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter movie Secound Show time Of Show 1" name="secound_show_time_of_show_1" value="<?php echo $row['secound_show_time_of_show_1'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">Date Of Show 2</label>
                          <input type="date" class="form-control" id="email2" placeholder="Enter movie date of show 2" name="date_of_show_2" value="<?php echo $row['date_of_show_2'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="email2">First Show time Of Show 2</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter movie First Show time Of Show 2" name="first_show_time_of_show_2" value="<?php echo $row['first_show_time_of_show_2'] ?>" required>
                        </div><div class="form-group">
                          <label for="email2">Secound Show time Of Show 2</label>
                          <input type="text" class="form-control" id="email2" placeholder="Enter movie Secound Show time Of Show 2" name="secound_show_time_of_show_2" value="<?php echo $row['secound_show_time_of_show_2'] ?>" required>
                        </div>
                        <div class="card-action">
                        <a href="movies_in_theaters.php">
                        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;"><b>Cancel</b></button>
                        </a>
                        <button type="submit" class="btn btn-success" name="update_movie"><b>Update</b></button>
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
