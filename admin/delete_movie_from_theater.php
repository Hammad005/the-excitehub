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
    $query = "DELETE FROM `theater_movies` WHERE `id` = '$id'";
    $delete= mysqli_query($conn, $query);
    if ($delete) {

    if (isset($_GET['theater-name']) && isset($_GET['movie-name'])){
      $theater_name = $_GET['theater-name'];
      $movie_name = $_GET['movie-name'];
    $query = "DELETE FROM `movie_order` WHERE `theater_name` = '$theater_name' AND `movie_name` = '$movie_name'";
    $delete= mysqli_query($conn, $query);
    }

    }
    header("Location: movies_in_theaters.php?movieid=". $delete['id']);
    exit;
}
?>