<?php
session_name('admin_session');
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: index.php");
  exit;
}
	 include '_dbconnection.php';
    if(isset($_POST['manage'])){
      if(isset($_GET['idnew'])){
        $idnew=$_GET['idnew'];
      }
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $update="UPDATE `adminuser` SET `username`='$username', `email`= '$email', `password`='$password' WHERE `id` = '$idnew'";
      $result=mysqli_query($conn, $update);
      if($result){
        session_name('admin_session');
        $_SESSION['loggedin']=true;
        $_SESSION['username'] = $username;
			  header("location: manage_admin.php?id=". $result['id']);
      }
    }
    ?>