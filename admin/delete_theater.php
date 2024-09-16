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
    $query = "DELETE FROM `theaters` WHERE `id` = '$id'";
    $delete= mysqli_query($conn, $query);
    if ($delete) {
      
      if (isset($_GET['file-name'])){
        $file_name = $_GET['file-name'];
        $file_path = '../'.$file_name .'.php';
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    if (isset($_GET['theater-name'])){
      $theater_name = $_GET['theater-name'];
    $query = "DELETE FROM `theater_movies` WHERE `theater_name` = '$theater_name'";
    $delete= mysqli_query($conn, $query);
    $m_query = "DELETE FROM `movie_order` WHERE `theater_name` = '$theater_name'";
    $m_delete= mysqli_query($conn, $m_query);
    }

    }
    header("Location: movie_theaters.php?theaterid=". $delete['id']);
    exit;
}
?>
