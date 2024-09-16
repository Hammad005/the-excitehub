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
    $query = "DELETE FROM `cricket` WHERE `id` = '$id'";
    $delete= mysqli_query($conn, $query);
     if ($delete) {
          if (isset($_GET['match_name']) && isset($_GET['team_one']) && isset($_GET['team_two'])){
            $match_name = $_GET['match_name'];
            $team_one = $_GET['team_one'];
            $team_two = $_GET['team_two'];
          $query = "DELETE FROM `cricket_order` WHERE `match_name` = '$match_name' AND `team_one` = '$team_one' AND `team_two` = '$team_two'";
          $delete= mysqli_query($conn, $query);
        }
   }
    header("Location: cricket.php?cricketid=". $delete['id']);
    exit;
}
?>