<?php
session_name('admin_session');
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: index.php");
  exit;

}
?>
<?php

include '_dbconnection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `feedback` WHERE `id` = '$id'";
    $fdelete= mysqli_query($conn, $query);
    header("Location: feedback.php?feedbackid=". $fdelete['id']);
    exit;
}
?>
