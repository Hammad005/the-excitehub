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
    $query = "DELETE FROM `parks` WHERE `id` = '$id'";
    $delete= mysqli_query($conn, $query);
     if ($delete) {
        if (isset($_GET['file-name'])){
            $file_name = $_GET['file-name'];
            $file_path = '../'.$file_name .'.php';
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
          if (isset($_GET['park'])){
            $park_name = $_GET['park'];
          $query = "DELETE FROM `park_order` WHERE `park_name` = '$park_name'";
          $delete= mysqli_query($conn, $query);
        }
   }
    header("Location: parks.php?parkid=". $delete['id']);
    exit;
}
?>
