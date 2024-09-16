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
      <!--User Delete Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="#" type="button" class="btn delete" id="deleteButton">Delete</a>
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
            <?php
                      $sql="SELECT * FROM `users`";
                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_num_rows($result); 
                      ?>
              <div>
                <h3 class="fw-bold mb-3">Total Users: <?php echo  $row; ?></h3>

              </div>
              <div class="ms-md-auto py-2 py-md-0">
                
                <a href="add_user.php" class="btn btn-success btn-round"><i class="fas fa-user-plus"></i> Add User</a>
              </div>
            </div>
            
            
            
            
                      <?php
                      if(isset($_POST['update_user'])){
                          if (isset($_GET['idnew'])){
                              $idnew=$_GET['idnew'];
                          }
                          $username=$_POST['username'];
                          $email=$_POST['email'];
                          $password=$_POST['password'];
                          $sql="SELECT * FROM `users` WHERE `username`='$username'";
		                      $result=mysqli_query($conn,$sql);
                          $exist=mysqli_num_rows($result);
                          if($exist>0){
                            $update="UPDATE `users` SET `email`= '$email', `password`='$password' WHERE `id` = '$idnew'";
                            $up=mysqli_query($conn,$update);
                                if ($up) {
                                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>Updated!</strong> User account information has been updated, but the username remains the same because it is not available..
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                                }
                          }
                          else{
                          $update="UPDATE `users` SET `username`='$username', `email`= '$email', `password`='$password' WHERE `id` = '$idnew'";
                          $result=mysqli_query($conn,$update);
                          if ($result) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Updated!</strong> User account information has been updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                          }
                      }
                    }
                      if(isset($_GET['userid'])){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Deleted!</strong> User Account has been Deleted.
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                        
                      }
                      ?>
            <div class="row">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">All Users</div>
                      
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table class="table align-items-center mb-0" >
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Username</th>
                            <th scope="col" class="text-end">Email</th>
                            <th scope="col" class="text-end">Password</th>
                            <th scope="col" class="text-end">Joining Date & Time</th>
                            <th scope="col" class="text-end">Update</th>
                            <th scope="col" class="text-end">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                       $sql = "SELECT * FROM `users` ORDER BY `id` DESC";
                       $result = mysqli_query($conn, $sql);
                       while($row=mysqli_fetch_assoc($result)){
                    
                       ?>
                          <tr>
                            <th scope="row">
                              <?php  echo $row['username']; ?>
                            </th>
                            <td class="text-end"><?php echo $row['email']; ?></td>
                            <td class="text-end"><?php echo $row['password']; ?></td>
                            <td class="text-end"><?php echo $row['joindate']; ?></td>
                            <td class="text-end">
                            <a href="update_user.php?id=<?php echo $row['id']; ?>" class="btn btn-icon btn-link op-8 me-1">
                            <i class="far fa-edit"></i>
                            </a>
                            </td>
                            <td class="text-end">
                            <button class="btn btn-icon btn-link btn-danger op-8" data-id="<?php echo $row['id'];?>" data-username="<?php echo $row['username']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
        var username = button.data('username'); // Extract username from data-* attributes

        // Update the modal's content
        var modal = $(this);
        modal.find('#deleteButton').attr('href', 'delete_users.php?id=' + feedbackId + '&username=' + username);
    });
</script>
    
  </body>
</html>
