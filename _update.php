<?php
include('_session.php');
include('_dbconnection.php');
    if(isset($_POST['manage'])){
      if(isset($_GET['idnew'])){
        $idnew=$_GET['idnew'];
      }
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $sql="SELECT * FROM `users` WHERE `username`='$username'";
      $result=mysqli_query($conn,$sql);
      $exist=mysqli_num_rows($result);
      if($exist>0){
        $update="UPDATE `users` SET `email`= '$email', `password`='$password' WHERE `id` = '$idnew'";
        $up=mysqli_query($conn,$update);
        if($up){
        header("location: manage_acc.php?id1=". $up['id']);
        }
      }
      else{
      $update="UPDATE `users` SET `username`='$username', `email`= '$email', `password`='$password' WHERE `id` = '$idnew'";
      $result=mysqli_query($conn, $update);
      if($result){
        session_name('user_session');
        $_SESSION['loggedin']=true;
		    $_SESSION['username'] = $username;
        header("location: manage_acc.php?id2=". $result['id']);
      }
    }
    }
    ?>