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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
    <style>
    .container {
      position: relative;
      padding-top: 50px;
      text-align: center;
      justify-content: center;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    h1 {
      margin: 0;
      font-size: 35px;
      font-weight: 700;
      line-height: 64px;
      font-family: "Poppins", sans-serif;
    }
    .account-info {
      background: #1a2035!important;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px #b9babf!important;
      max-width: 100%;
      width: 100%;
      text-align: center;
    }
    label {
      color: #b9babf!important;
    }
    .info-item {
      margin-bottom: 15px;
      text-align: left;
    }
    .info-item label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }
    .info-item span {
      color: gray;
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
                
                    <h1>Edit Admin Account Information!</h1>
                    <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `adminuser` WHERE `id` = '$id'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                        }
                        ?>
          <form action="_update.php?idnew= <?php echo $id; ?>" method="POST">
          <div class="account-info col-md-6 ms-auto me-auto">
                <div class="info-item">
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" id="username" placeholder="Username" required>
                </div>
                <div class="info-item">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" id="email" placeholder="Email" required>

                </div>
                <div class="info-item">
                    <label for="member-since">Password:</label>
                    <input type="text" name="password" value="<?php echo $row['password']; ?>" class="form-control" id="password" placeholder="Password" required>

                </div>
                <a href="manage_admin.php" class="btn btn-secondary" style="background-color: gray!important; border-color: gray!important;">Cancel</a>
                <button type="submit" class="btn btn-secondary" name="manage">
                <i class="far fa-edit"></i>    
                Update!</button>
        </div>
        </form>
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
