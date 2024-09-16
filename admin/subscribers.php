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

        <div class="container">
          <div class="page-inner">
          <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
            <?php
                      $sql="SELECT * FROM `subscription`";
                      $result=mysqli_query($conn,$sql);
                      $row=mysqli_num_rows($result); 
                      ?>
              <div>
                <h3 class="fw-bold mb-3">Total Subscribers: <?php echo  $row; ?></h3>

              </div>
            </div>
            <?php
            $sql = "SELECT DISTINCT `package` FROM `subscription` ORDER BY `id` DESC";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            
            if ($num == 0) {
            ?>
                <h5 class="text-center"><b>No one Subscribe the package!</b></h5>
            <?php
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $package_name = $row['package'];
            ?>
            <div class="row ">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title"><?php echo $package_name  ?> Subscribers</div>
                      
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <?php
                      if(isset($_POST['update_package'])){
                          if (isset($_GET['idnew'])){
                              $idnew=$_GET['idnew'];
                          }
                          $pname=$_POST['pname'];
                          $price=$_POST['price'];
                          $dis_movie=$_POST['dis_movie'];
                          $dis_amusement=$_POST['dis_amusement'];
                          $dis_cricket=$_POST['dis_cricket'];
                          $update="UPDATE `packages` SET `pname`='$pname', `price`= '$price', `dis_movie`='$dis_movie', `dis_amusement`='$dis_amusement', `dis_cricket`='$dis_cricket' WHERE `id` = '$idnew'";
                          $result=mysqli_query($conn,$update);
                      }
                      ?>
                      <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Subscriber Name</th>
                            <th scope="col" class="text-end">Subscriber Email</th>
                            <th scope="col" class="text-end">Package</th>
                            <th scope="col" class="text-end">Price</th>
                            <th scope="col" class="text-end">Subscription Time</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM `subscription` WHERE `package`='$package_name' ORDER BY `id` DESC";
                        $m_result = mysqli_query($conn, $sql);
                      
                        while ($row = mysqli_fetch_assoc($m_result)) {
                        ?>
                          <tr>
                            <th scope="row">
                              <?php  echo $row['sname']; ?>
                       </th>
                            <td class="text-end"><?php echo $row['email']; ?></td>
                            <td class="text-end"><?php echo $row['package']; ?></td>
                            <td class="text-end"><?php echo $row['price']; ?></td>
                            <td class="text-end"><?php echo $row['subscription_time']; ?></td>


                            
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
        modal.find('#deleteButton').attr('href', 'delete_package.php?id=' + feedbackId);
    });
</script>
    
  </body>
</html>
