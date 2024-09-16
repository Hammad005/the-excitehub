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
    $query = "DELETE FROM `events` WHERE `id` = '$id'";
    $delete= mysqli_query($conn, $query);
    if ($delete) {
      if (isset($_GET['event']) && isset($_GET['location'])){
        $event = $_GET['event'];
        $location = $_GET['location'];
      $query = "DELETE FROM `event_order` WHERE `event` = '$event' AND `location` = '$location'";
      $delete= mysqli_query($conn, $query);
    }
  }
    header("Location: events.php?eventid=". $delete['id']);
    exit;
}
?>