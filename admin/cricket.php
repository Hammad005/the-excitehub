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
      <!--Cricket Match Delete Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Delete Cricket Match</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to delete this Cricket Match?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;" data-bs-dismiss="modal">Cancel</button>
        <a href="#" type="button" class="btn delete" id="deleteButton">Delete</a>
      </div>
    </div>
  </div>
</div>
<!--Cricket Match Delete Modal-->

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
            <?php
                      $sql="SELECT * FROM `cricket`";
                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_num_rows($result); 
                      ?>
              <div>
                <h3 class="fw-bold mb-3">Total Cricket Matches: <?php echo  $row; ?></h3>

              </div>
              <div class="ms-md-auto py-2 py-md-0">
                
                <a href="add_cricket.php" class="btn btn-success btn-round"><i class="fas fa-plus"></i> Add Cricket Match</a>
              </div>
            </div>
                      <?php
                      $showAlert=false;
                      $showError=false;
                      if(isset($_POST['update_cricket'])){
                          if (isset($_GET['idnew'])){
                              $idnew=$_GET['idnew'];
                          }
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
                          if (move_uploaded_file($poster_tmp, $poster_folder)){
                            $update="UPDATE `cricket` SET `poster` = '$poster',  `match_name` = '$match_name', `team_one` = '$team_one',
                                   `team_two` = '$team_two' , `location`='$location', `date`='$date', `time` = '$time', `address` = '$address', `price` = '$price'
                                    WHERE `id` = '$idnew'";
                            $result=mysqli_query($conn,$update);
                                if ($result) {
                                    $showAlert=true;
                                }else{
                                    $showError=true;
                                }
                    }
                    else{
                        $update="UPDATE `cricket` SET  `match_name` = '$match_name', `team_one` = '$team_one',
                        `team_two` = '$team_two' , `location`='$location', `date`='$date', `time` = '$time', `address` = '$address', `price` = '$price'
                         WHERE `id` = '$idnew'";
                      $result=mysqli_query($conn,$update);
                            if ($result) {
                                $showAlert=true;
                            }else{
                                $showError=true;
                            }
                    }
                    if (move_uploaded_file($logo_tmp, $logo_folder)){
                        $update="UPDATE `cricket` SET `logo` = '$logo',  `match_name` = '$match_name', `team_one` = '$team_one',
                        `team_two` = '$team_two' , `location`='$location', `date`='$date', `time` = '$time', `address` = '$address', `price` = '$price'
                         WHERE `id` = '$idnew'";
                            $result=mysqli_query($conn,$update);
                                if ($result) {
                                    $showAlert=true;
                                }else{
                                    $showError=true;
                                }
                    }
                    else{
                        $update="UPDATE `cricket` SET  `match_name` = '$match_name', `team_one` = '$team_one',
                        `team_two` = '$team_two' , `location`='$location', `date`='$date', `time` = '$time', `address` = '$address', `price` = '$price'
                         WHERE `id` = '$idnew'";
                      $result=mysqli_query($conn,$update);
                            if ($result) {
                                $showAlert=true;
                            }else{
                                $showError=true;
                            }
                    }
                        }
                        
                    if ($showAlert) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Updated!</strong> Cricket Match has been updated successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                      }
                      if ($showError) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Cricket Match has not been updated successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                      }
                    if(isset($_GET['cricketid'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Deleted!</strong> Cricket Match has been deleted successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            
                        }
                       $sql = "SELECT * FROM `cricket` ORDER BY `id` DESC";
                       $result = mysqli_query($conn, $sql);
                       $num=mysqli_num_rows($result);
                       if ($num==0) {
                        echo ' 
                <h5 class="text-center"><b>There are no Upcoming Cricket Match Available!</b></h5>
                        ';
                       }
                ?>
            <div class="row">
              <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">All Cricket Matches</div>
                      
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                       
                      <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Poster</th>
                            <th scope="col" class="text-end">Logo</th>
                            <th scope="col" class="text-end">Match</th>
                            <th scope="col" class="text-end">Teams</th>
                            <th scope="col" class="text-end">Location</th>
                            <th scope="col" class="text-end">Date</th>
                            <th scope="col" class="text-end">Time</th>
                            <th scope="col" class="text-end">Address</th>
                            <th scope="col" class="text-end">Price</th>
                            <th scope="col" class="text-end">Add Time</th>
                            <th scope="col" class="text-end">Update</th>
                            <th scope="col" class="text-end">Delete</th>

                          </tr>
                        </thead>
                        <tbody >
                        <?php
                       $sql = "SELECT * FROM `cricket` ORDER BY `id` DESC";
                       $result = mysqli_query($conn, $sql);
                       while($row=mysqli_fetch_assoc($result)){
                         ?>
                          <tr>
                            <th scope="row">
                              <img src="cricket/<?php  echo $row['poster'];?>"alt="Current Image" style="max-width: 70px; max-height: 70px;">
                            </th>
                            <td class="text-end">
                            <img src="cricket/<?php  echo $row['logo'];?>"alt="Current Image" style="max-width: 70px; max-height: 70px;">
                            </td>
                            <td class="text-end" style="font-size: 10px!important;"><?php echo $row['match_name']; ?></td>
                            <td class="text-end" style="font-size: 10px!important;"><?php echo $row['team_one']; ?><br>vs<br><?php echo $row['team_two']; ?></td>
                            <td class="text-end" style="font-size: 10px!important;"><?php echo $row['location']; ?></td>
                            <td class="text-end"style="font-size: 10px!important;"><?php echo $row['date']; ?></td>
                            <td class="text-end" style="font-size: 10px!important;"><?php echo $row['time']; ?></td>
                            <td class="text-end" style="font-size: 10px!important;"><?php echo $row['address']; ?></td>
                            <td class="text-end" style="font-size: 10px!important;">Rs. <?php echo $row['price']; ?>/-</td>
                            <td class="text-end" style="font-size: 10px!important;"><?php echo $row['add_time']; ?></td>
                            <td class="text-end">
                            <a href="update_cricket.php?id=<?php echo $row['id']; ?>" class="btn btn-icon btn-link op-8 me-1">
                            <i class="far fa-edit"></i>
                            </a>
                            </td>
                            <td class="text-end">
                            <button class="btn btn-icon btn-link btn-danger opacity-8" 
                                    data-id="<?php echo $row['id']; ?>" 
                                    data-match="<?php echo $row['match_name']; ?>" 
                                    data-teamone="<?php echo $row['team_one']; ?>" 
                                    data-teamtwo="<?php echo $row['team_two']; ?>" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal">
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
        var match = button.data('match'); // Extract info from data-* attributes
        var teamone = button.data('teamone'); // Extract info from data-* attributes
        var teamtwo = button.data('teamtwo'); // Extract info from data-* attributes

        // Update the modal's content
        var modal = $(this);
        modal.find('#deleteButton').attr('href', 'delete_cricket.php?id=' + feedbackId + '&match_name=' + match + '&team_one=' + teamone + '&team_two=' + teamtwo );
    });
</script>
    
  </body>
</html>
