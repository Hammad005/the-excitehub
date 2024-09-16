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
      <!--Movie Theater Delete Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Delete Movie From Theater</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to delete this Movie From Theater?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;" data-bs-dismiss="modal">Cancel</button>
        <a href="#" type="button" class="btn delete" id="deleteButton">Delete</a>
      </div>
    </div>
  </div>
</div>
<!--Movie Theater Delete Modal-->

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
            <?php
                      $sql="SELECT * FROM `theater_movies`";
                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_num_rows($result); 
                      ?>
              <div>
                <h3 class="fw-bold mb-3">Total Movies in Theaters: <?php echo  $row; ?></h3>

              </div>
            </div>
            
            
            <?php 
    $movieShowError=false;
	$movieShowAlert=false;
	$showmovieNameError=false;
  if(isset($_POST['add_movie'])){

	if($_SERVER['REQUEST_METHOD']=='POST' && !isset($_POST['update_movie'])){
        $theater_name = $_POST['theater_name'];
        $movie_banner=$_FILES['movie_banner']['name'];
        $movie_banner_tmp=$_FILES['movie_banner']['tmp_name'];
        $movie_poster=$_FILES['movie_poster']['name'];
        $movie_poster_tmp=$_FILES['movie_poster']['tmp_name'];
        $movie_banner_folder='movie/'. $movie_banner;
        $movie_poster_folder='movie/'. $movie_poster;
        $movie_name=$_POST['movie_name'];
        $genre=$_POST['genre'];
        $run_time=$_POST['run_time'];
        $language=$_POST['language'];
        $cast=$_POST['cast'];
        $date_of_show_1=$_POST['date_of_show_1'];
        $first_show_time_of_show_1=$_POST['first_show_time_of_show_1'];
        $secound_show_time_of_show_1=$_POST['secound_show_time_of_show_1'];
        $date_of_show_2=$_POST['date_of_show_2'];
        $first_show_time_of_show_2=$_POST['first_show_time_of_show_2'];
        $secound_show_time_of_show_2=$_POST['secound_show_time_of_show_2'];

        $sql="SELECT * FROM `theater_movies` WHERE `theater_name`='$theater_name' AND `movie_name`='$movie_name'";
		$result=mysqli_query($conn,$sql);
		$exist=mysqli_num_rows($result);
		if($exist>0){
			$showmovieNameError=true;
		}else{
            if(move_uploaded_file($movie_banner_tmp, $movie_banner_folder) && move_uploaded_file($movie_poster_tmp, $movie_poster_folder)){
				$sql="INSERT INTO `theater_movies` 
                (`theater_name`, `movie_banner`, `movie_poster`, `movie_name`, `genre`, `run_time`, `language`, `cast`, `date_of_show_1`, `first_show_time_of_show_1`, `secound_show_time_of_show_1`,`date_of_show_2`, `first_show_time_of_show_2`, `secound_show_time_of_show_2`,`add_time`) 
                VALUES 
                ('$theater_name', '$movie_banner', '$movie_poster', '$movie_name', '$genre', '$run_time', '$language', '$cast', '$date_of_show_1', '$first_show_time_of_show_1', '$secound_show_time_of_show_1','$date_of_show_2', '$first_show_time_of_show_2', '$secound_show_time_of_show_2', current_timestamp());";
				$result=mysqli_query($conn,$sql);
				if($result){
					$movieShowAlert=true;
				}
        else{
				$movieShowError=true;
			}
    }
        }
	}
}
if($movieShowError){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Movie has not been added successfully!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  if($movieShowAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Done!</strong> Movie has been added successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
            if($showmovieNameError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Movie name is unavailable!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      if(isset($_GET['movieid'])){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Deleted!</strong> Movie has been deleted successfully from theater .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        
    }

                      
                      $showAlert=false;
                      $showError=false;
                      if(isset($_POST['update_movie'])){
                          if (isset($_GET['idnew'])){
                              $idnew=$_GET['idnew'];
                          }
                          $theater_name = $_POST['theater_name'];
                          $movie_banner=$_FILES['movie_banner']['name'];
                          $movie_banner_tmp=$_FILES['movie_banner']['tmp_name'];
                          $movie_poster=$_FILES['movie_poster']['name'];
                          $movie_poster_tmp=$_FILES['movie_poster']['tmp_name'];
                          $movie_banner_folder='movie/'. $movie_banner;
                          $movie_poster_folder='movie/'. $movie_poster;
                          $movie_name=$_POST['movie_name'];
                          $genre=$_POST['genre'];
                          $run_time=$_POST['run_time'];
                          $language=$_POST['language'];
                          $cast=$_POST['cast'];
                          $date_of_show_1=$_POST['date_of_show_1'];
                          $first_show_time_of_show_1=$_POST['first_show_time_of_show_1'];
                          $secound_show_time_of_show_1=$_POST['secound_show_time_of_show_1'];
                          $date_of_show_2=$_POST['date_of_show_2'];
                          $first_show_time_of_show_2=$_POST['first_show_time_of_show_2'];
                          $secound_show_time_of_show_2=$_POST['secound_show_time_of_show_2'];
                          $sql="SELECT * FROM `theater_movies` WHERE `theater_name`='$theater_name' AND `movie_name`='$movie_name'";
                          $result=mysqli_query($conn,$sql);
                          $exist=mysqli_num_rows($result);
                          if($exist>0){
                            if (move_uploaded_file($movie_banner_tmp, $movie_banner_folder)){
                              $update="UPDATE `theater_movies` SET `theater_name` = '$theater_name',  `movie_banner` = '$movie_banner', `genre` = '$genre',
                                     `run_time` = '$run_time' , `language`='$language', `cast`='$cast', `date_of_show_1` = '$date_of_show_1', `first_show_time_of_show_1` = '$first_show_time_of_show_1',
                                      `secound_show_time_of_show_1` = '$secound_show_time_of_show_1', `date_of_show_2` = '$date_of_show_2', `first_show_time_of_show_2` = '$first_show_time_of_show_2',
                                      `secound_show_time_of_show_2` = '$secound_show_time_of_show_2'
                                      WHERE `id` = '$idnew'";
                              $result=mysqli_query($conn,$update);
                                  if ($result) {
                                    $showAlert=true;
                                  }else{
                                      $showError=true;
                                  }
                      }
                      else{
                        $update="UPDATE `theater_movies` SET `theater_name` = '$theater_name', `genre` = '$genre',
                        `run_time` = '$run_time' , `language`='$language', `cast`='$cast', `date_of_show_1` = '$date_of_show_1', `first_show_time_of_show_1` = '$first_show_time_of_show_1',
                         `secound_show_time_of_show_1` = '$secound_show_time_of_show_1', `date_of_show_2` = '$date_of_show_2', `first_show_time_of_show_2` = '$first_show_time_of_show_2',
                         `secound_show_time_of_show_2` = '$secound_show_time_of_show_2'
                         WHERE `id` = '$idnew'";
                        $result=mysqli_query($conn,$update);
                              if ($result) {
                                $showAlert=true;
                              }else{
                                  $showError=true;
                              }
                      }
                          }
                      else{
                            if (move_uploaded_file($movie_banner_tmp, $movie_banner_folder)){
                              $update="UPDATE `theater_movies` SET `theater_name` = '$theater_name',  `movie_banner` = '$movie_banner', `movie_name` = '$movie_name', `genre` = '$genre',
                                     `run_time` = '$run_time' , `language`='$language', `cast`='$cast', `date_of_show_1` = '$date_of_show_1', `first_show_time_of_show_1` = '$first_show_time_of_show_1',
                                      `secound_show_time_of_show_1` = '$secound_show_time_of_show_1', `date_of_show_2` = '$date_of_show_2', `first_show_time_of_show_2` = '$first_show_time_of_show_2',
                                      `secound_show_time_of_show_2` = '$secound_show_time_of_show_2'
                                      WHERE `id` = '$idnew'";
                              $result=mysqli_query($conn,$update);
                                  if ($result) {
                                      $showAlert=true;
                                  }else{
                                      $showError=true;
                                  }
                      }
                      else{
                        $update="UPDATE `theater_movies` SET `theater_name` = '$theater_name', `movie_name` = '$movie_name', `genre` = '$genre',
                        `run_time` = '$run_time' , `language`='$language', `cast`='$cast', `date_of_show_1` = '$date_of_show_1', `first_show_time_of_show_1` = '$first_show_time_of_show_1',
                         `secound_show_time_of_show_1` = '$secound_show_time_of_show_1', `date_of_show_2` = '$date_of_show_2', `first_show_time_of_show_2` = '$first_show_time_of_show_2',
                         `secound_show_time_of_show_2` = '$secound_show_time_of_show_2'
                         WHERE `id` = '$idnew'";
                        $result=mysqli_query($conn,$update);
                              if ($result) {
                                $showAlert=true;
                              }else{
                                  $showError=true;
                              }
                      }
                      }

                      $sql="SELECT * FROM `theater_movies` WHERE `theater_name`='$theater_name' AND `movie_name`='$movie_name'";
                      $result=mysqli_query($conn,$sql);
                      $exist=mysqli_num_rows($result);
                      if($exist>0){
                        if (move_uploaded_file($movie_poster_tmp, $movie_poster_folder)){
                          $update="UPDATE `theater_movies` SET `theater_name` = '$theater_name',  `movie_poster` = '$movie_poster', `genre` = '$genre',
                                 `run_time` = '$run_time' , `language`='$language', `cast`='$cast', `date_of_show_1` = '$date_of_show_1', `first_show_time_of_show_1` = '$first_show_time_of_show_1',
                                  `secound_show_time_of_show_1` = '$secound_show_time_of_show_1', `date_of_show_2` = '$date_of_show_2', `first_show_time_of_show_2` = '$first_show_time_of_show_2',
                                  `secound_show_time_of_show_2` = '$secound_show_time_of_show_2'
                                  WHERE `id` = '$idnew'";
                          $result=mysqli_query($conn,$update);
                              if ($result) {
                                $showAlert=true;
                              }else{
                                  $showError=true;
                              }
                  }
                  else{
                    $update="UPDATE `theater_movies` SET `theater_name` = '$theater_name', `genre` = '$genre',
                    `run_time` = '$run_time' , `language`='$language', `cast`='$cast', `date_of_show_1` = '$date_of_show_1', `first_show_time_of_show_1` = '$first_show_time_of_show_1',
                     `secound_show_time_of_show_1` = '$secound_show_time_of_show_1', `date_of_show_2` = '$date_of_show_2', `first_show_time_of_show_2` = '$first_show_time_of_show_2',
                     `secound_show_time_of_show_2` = '$secound_show_time_of_show_2'
                     WHERE `id` = '$idnew'";
                    $result=mysqli_query($conn,$update);
                          if ($result) {
                            $showAlert=true;
                          }else{
                              $showError=true;
                          }
                  }
                      }
                  else{
                        if (move_uploaded_file($movie_poster_tmp, $movie_poster_folder)){
                          $update="UPDATE `theater_movies` SET `theater_name` = '$theater_name',  `movie_poster` = '$movie_poster', `movie_name` = '$movie_name', `genre` = '$genre',
                                 `run_time` = '$run_time' , `language`='$language', `cast`='$cast', `date_of_show_1` = '$date_of_show_1', `first_show_time_of_show_1` = '$first_show_time_of_show_1',
                                  `secound_show_time_of_show_1` = '$secound_show_time_of_show_1', `date_of_show_2` = '$date_of_show_2', `first_show_time_of_show_2` = '$first_show_time_of_show_2',
                                  `secound_show_time_of_show_2` = '$secound_show_time_of_show_2'
                                  WHERE `id` = '$idnew'";
                          $result=mysqli_query($conn,$update);
                              if ($result) {
                                  $showAlert=true;
                              }else{
                                  $showError=true;
                              }
                  }
                  else{
                    $update="UPDATE `theater_movies` SET `theater_name` = '$theater_name', `movie_name` = '$movie_name', `genre` = '$genre',
                    `run_time` = '$run_time' , `language`='$language', `cast`='$cast', `date_of_show_1` = '$date_of_show_1', `first_show_time_of_show_1` = '$first_show_time_of_show_1',
                     `secound_show_time_of_show_1` = '$secound_show_time_of_show_1', `date_of_show_2` = '$date_of_show_2', `first_show_time_of_show_2` = '$first_show_time_of_show_2',
                     `secound_show_time_of_show_2` = '$secound_show_time_of_show_2'
                     WHERE `id` = '$idnew'";
                    $result=mysqli_query($conn,$update);
                          if ($result) {
                            $showAlert=true;
                          }else{
                              $showError=true;
                          }
                  }
                  }
                        }
                        
                    if ($showAlert) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Updated!</strong> Movie has been updated successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                      }
                      if ($showError) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Movie has not been updated successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                      }
                      $sql = "SELECT DISTINCT `theater_name` FROM `theater_movies` ORDER BY `id` DESC";
                      $result = mysqli_query($conn, $sql);
                      $num = mysqli_num_rows($result);
                      
                      if ($num == 0) {
                      ?>
                          <h5 class="text-center"><b>There Are No Upcoming Movies in Theaters!</b></h5>
                      <?php
                      } else {
                          while ($row = mysqli_fetch_assoc($result)) {
                              $theater_name = $row['theater_name'];
                      ?>
                              <div class="row">
                                  <div class="card card-round">
                                      <div class="card-header">
                                          <div class="card-head-row card-tools-still-right">
                                              <div class="card-title">Movies in <?php echo $theater_name; ?></div>
                                          </div>
                                      </div>
                                      <div class="card-body p-0">
                                          <div class="table-responsive">
                                              <table class="table align-items-center mb-0">
                                                  <thead class="thead-light">
                                                      <tr>
                                                          <th scope="col">Theater Name</th>
                                                          <th scope="col">Banner</th>
                                                          <th scope="col">Poster</th>
                                                          <th scope="col" class="text-end">Movie Name</th>
                                                          <th scope="col" class="text-end">Genre</th>
                                                          <th scope="col" class="text-end">Run Time</th>
                                                          <th scope="col" class="text-end">Language</th>
                                                          <th scope="col" class="text-end">Cast</th>
                                                          <th scope="col" class="text-end">Show Date 1</th>
                                                          <th scope="col" class="text-end">Show Times</th>
                                                          <th scope="col" class="text-end">Show Date 2</th>
                                                          <th scope="col" class="text-end">Show Times</th>
                                                          <th scope="col" class="text-end">Add Time</th>
                                                          <th scope="col" class="text-end">Update</th>
                                                          <th scope="col" class="text-end">Delete</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php
                                                      $sql = "SELECT * FROM `theater_movies` WHERE `theater_name`='$theater_name' ORDER BY `id` DESC";
                                                      $m_result = mysqli_query($conn, $sql);
                      
                                                      while ($row = mysqli_fetch_assoc($m_result)) {
                                                      ?>
                                                          <tr>
                                                              <th scope="row" style="font-size:10px;"><?php echo $row['theater_name']; ?></th>
                                                              <th scope="row"><img src="movie/<?php echo $row['movie_banner']; ?>" alt="Current Image" style="max-width: 70px; max-height: 70px;"></th>
                                                              <th scope="row"><img src="movie/<?php echo $row['movie_poster']; ?>" alt="Current Image" style="max-width: 70px; max-height: 70px;"></th>
                                                              <td class="text-end" style="font-size:9px;"><?php echo $row['movie_name']; ?></td>
                                                              <td class="text-end" style="font-size:9px;"><?php echo $row['genre']; ?></td>
                                                              <td class="text-end" style="font-size:9px;"><?php echo $row['run_time']; ?></td>
                                                              <td class="text-end" style="font-size:9px;"><?php echo $row['language']; ?></td>
                                                              <td class="text-end" style="font-size:7px;"><?php echo $row['cast']; ?></td>
                                                              <td class="text-end" style="font-size:7px;"><?php echo $row['date_of_show_1']; ?></td>
                                                              <td class="text-end" style="font-size:9px;"><?php echo $row['first_show_time_of_show_1']; ?> & <?php echo $row['secound_show_time_of_show_1']; ?></td>
                                                              <td class="text-end" style="font-size:7px;"><?php echo $row['date_of_show_2']; ?></td>
                                                              <td class="text-end" style="font-size:9px;"><?php echo $row['first_show_time_of_show_2']; ?> & <?php echo $row['secound_show_time_of_show_2']; ?></td>
                                                              <td class="text-end" style="font-size:7px;"><?php echo $row['add_time']; ?></td>
                                                              <td class="text-end">
                                                                  <a href="update_movies_in_theaters.php?id=<?php echo $row['id']; ?>" class="btn btn-icon btn-link op-8 me-1"><i class="far fa-edit"></i></a>
                                                              </td>
                                                              <td class="text-end">
                                                                  <button class="btn btn-icon btn-link btn-danger op-8" data-id="<?php echo $row['id']; ?>" data-theater-name="<?php echo $row['theater_name']; ?>" data-movie-name="<?php echo $row['movie_name']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
        var theater = button.data('theater-name'); // Extract info from data-* attributes
        var movie = button.data('movie-name'); // Extract info from data-* attributes

        // Update the modal's content
        var modal = $(this);
        modal.find('#deleteButton').attr('href', 'delete_movie_from_theater.php?id=' + feedbackId + '&theater-name=' + theater + '&movie-name=' + movie );
    });
</script>
  </body>
</html>
