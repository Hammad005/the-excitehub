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
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
 
    <div class="wrapper">
      <?php
	    include '_dbconnection.php';
      include "_nav.php";  
         
      ?>
<!--Feedback Delete Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Delete Feedback</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to delete this feedback?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;" data-bs-dismiss="modal">Cancel</button>
        <a href="#" type="button" class="btn delete" id="deleteButton" name="deletefeedback">Delete</a>
      </div>
    </div>
  </div>
</div>
<!--Feedback Delete Modal-->

<!--User Delete Modal-->
<div class="modal fade" id="userexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Delete User</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: gray !important; border-color: gray !important;" data-bs-dismiss="modal">Cancel</button>
        <a href="#" type="button" class="btn delete" id="userdeleteButton" name="deleteuser">Delete</a>
      </div>
    </div>
  </div>
</div>
<!--User Delete Modal-->

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
              </div>
              
            </div>
            <div class="row">
              <div class="col-xl-4">
                <a href="users.php">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <?php
                      $sql="SELECT * FROM `users`";
                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_num_rows($result); 
                      ?>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Users</p>
                          <h4 class="card-title"><?php echo $row; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
              <div class="col-xl-4">
              <a href="subscribers.php">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <?php
                      $sql="SELECT * FROM `subscription`";
                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_num_rows($result); 
                      ?>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Subscribers</p>
                          <h4 class="card-title"><?php echo $row; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
              
              <div class="col-xl-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <?php
                      // Total Orders From Movie Theaters
                      $sql_movie="SELECT * FROM `movie_order`";
                      $result_movie=mysqli_query($conn,$sql_movie);
                      $total_movie_tickets = 0;
                      while ($row_movie = mysqli_fetch_assoc($result_movie)) {
                          $total_movie_tickets += $row_movie['tickets'];
                      }

                      // Total Orders From Amusement Parks
                      $sql_park="SELECT * FROM `park_order`";
                      $result_park=mysqli_query($conn,$sql_park);
                      $total_park_tickets = 0;
                      while ($row_park = mysqli_fetch_assoc($result_park)) {
                          $total_park_tickets += $row_park['tickets'];
                      }

                      // Total Orders From Events
                      $sql_event="SELECT * FROM `event_order`";
                      $result_event=mysqli_query($conn,$sql_event);
                      $total_event_tickets = 0;
                      while ($row_event = mysqli_fetch_assoc($result_event)) {
                          $total_event_tickets += $row_event['tickets'];
                      }

                      // Total Orders From Cricket Match
                      $sql_cricket="SELECT * FROM `cricket_order`";
                      $result_cricket=mysqli_query($conn,$sql_cricket);
                      $total_cricket_tickets = 0;
                      while ($row_cricket = mysqli_fetch_assoc($result_cricket)) {
                          $total_cricket_tickets += $row_cricket['tickets'];
                      }
                      // Total Orders:
                      $total= $total_event_tickets + $total_cricket_tickets + $total_park_tickets + $total_movie_tickets;
                        ?>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Orders</p>
                          <h4 class="card-title"><?php echo  $total; ?></h4>
                        </div>
                      </div>
                          
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            <?php
                    if(isset($_GET['userid'])){
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Deleted!</strong> User Account has been Deleted.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                      
                    }
                    if (isset($_GET['feedbackid'])){
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Deleted!</strong> User Feedback has been Deleted.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                    ?>
            <div class="row">
              <div class="col-md-4">
                <div class="card card-round">
                  <div class="card-body">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">New Users</div>
                      <div class="card-tools">
                        <div class="dropdown">
                        
                          <button
                            class="btn btn-icon btn-clean me-0"
                            type="button"
                            id="dropdownMenuButton"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fas fa-ellipsis-h"></i>
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton"
                          >
                            <a class="dropdown-item" href="users.php">See all Users</a>
                            
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card-list py-4">
                      <?php
                      $sqll = "SELECT * FROM `users` ORDER BY `id` DESC LIMIT 5";
                      $record = mysqli_query($conn, $sqll);  
                      while ($user = mysqli_fetch_assoc($record)) {
                      ?>
                      <div class="item-list">
                        
                        <div class="info-user ms-3">
                          <div class="username"><?php  echo $user['username']; ?>
                          |<b style="color:green; font-weight: bold;"> New</b>
                          </div>

                          <div class="status"><?php   echo $user['email']; ?></div>
                          
                        </div>
                        
                        <a href="update_user.php?id=<?php echo $user['id']; ?>" class="btn btn-icon btn-link op-8 me-1">
                            <i class="far fa-edit"></i>
                            </a>
                        <button class="btn btn-icon btn-link btn-danger op-8" data-id="<?php echo $user['id']; ?>" data-username="<?php echo $user['username']; ?>" data-bs-toggle="modal" data-bs-target="#userexampleModal">
                                <i class="fas fa-ban"></i>
                            </button>
                        
                      </div>
                      <?php
                      
                      }
                      ?>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- NEW FEEDBACK -->

              <div class="col-md-8">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">New Feedbacks
                        
                        </div>
                      
                      <div class="card-tools">
                        <div class="dropdown">
                          <button
                            class="btn btn-icon btn-clean me-0"
                            type="button"
                            id="dropdownMenuButton"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fas fa-ellipsis-h"></i>
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton"
                          >
                            <a class="dropdown-item" href="feedback.php">See all feedback</a>
                            
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                      
                      <table class="table align-items-center mb-0 ">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Username</th>
                            <th scope="col" class="text-end">Subject</th>
                            <th scope="col" class="text-end">FeedBack</th>
                            <th scope="col" class="text-end">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                       $sql = "SELECT * FROM `feedback` ORDER BY `id` DESC LIMIT 5";
                       $result = mysqli_query($conn, $sql);
                       while($row=mysqli_fetch_assoc($result)){
                       ?>
                          <tr>
                            <th scope="row">
                              <?php  echo $row['username']; ?>
                              |<b style="color:green; font-weight: bold;"> New</b>
                            </th>
                            <td class="text-end"><?php echo $row['subject']; ?></td>
                            <td class="text-end"><?php echo substr($row['feedback'], 0, 50); ?>...</td>
                            
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

              <!-- NEW FEEDBACK -->
              
              
            </div>
          </div>
        </div>

        <?php
        include '_footer.php';
        ?>
      </div>

  
      
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
        modal.find('#deleteButton').attr('href', 'delete_newfeedback.php?id=' + feedbackId);
    });

    // When the modal is shown
    $('#userexampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var feedbackId = button.data('id'); // Extract info from data-* attributes
        var username = button.data('username'); // Extract username from data-* attributes

        // Update the modal's content
        var modal = $(this);
        modal.find('#userdeleteButton').attr('href', 'delete_newusers.php?id=' + feedbackId + '&username=' + username);
    });
</script>

    
  </body>
</html>
