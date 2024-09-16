
<!DOCTYPE html>
<html lang="en">
<head>
	<title>The ExciteHub</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/img/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin-login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin-login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--===============================================================================================-->
</head>
<body>
	<?php
	include('_dbconnection.php');
	
	$showError=false;
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql="SELECT * FROM `users` WHERE`username`='$username' AND `password`='$password'";
		$result=mysqli_query($conn,$sql);
		$num=mysqli_num_rows($result);
		if ($num>0){
			$row = mysqli_fetch_assoc($result);
			session_name('user_session');
			session_start();
			$_SESSION['loggedin']=true;
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['email'] = $row['email'];
			header("location: home.php");
		}
		else{
			$showError=true;
		}
	}
	
	?>
	
	<div class="limiter">
		<div class="container-login100">

			<video autoplay muted loop top left id="myVideo">
		  <source src="assets/img/bg-video.mp4" type="video/mp4">
		  Your browser does not support HTML5 video.
		</video>

			<div class="wrap-login100">
				
				<div class="container-center">
					<span class="login100-form-title p-b-48">
						<img src="logo/logo.png" alt="Company Name" class="logo">
						
					</span>
					
					<form class="login100-form validate-form" action="/TheExciteHub/index.php" method="POST">
						<span class="login100-form-title p-b-26">
							Login <br>
						</span>
						<?php
					if($showError){
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Error!</strong> Incorrect username or password.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
					}
					?>
                    <div class="wrap-input100 validate-input" data-validate = "LaidDawid22">
						<input class="input100" type="text" name="username"  required placeholder="Username">
						<span class="focus-input100" ></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" ></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" >
								Login
							</button>
						</div>
						<a href="signup.php" class="signup-button mt-2">Create an account</a>
					</div>
				</div>
					
					</form>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="admin-login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="admin-login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="admin-login/vendor/bootstrap/js/popper.js"></script>
	<script src="admin-login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="admin-login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="admin-login/vendor/daterangepicker/moment.min.js"></script>
	<script src="admin-login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="admin-login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="admin-login/js/main.js"></script>

</body>
</html>