
<?php
include '_dbconnection.php';
include('_session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `users` WHERE `id` = '$id'";
    $delete= mysqli_query($conn, $query);
    if ($delete){
        if (isset($_GET['username'])) {
          $username=$_GET['username'];
        }
        $query = "DELETE FROM `subscription` WHERE `sname` = '$username'";
        $deletesubscription= mysqli_query($conn, $query);

        $movie_query = "DELETE FROM `movie_order` WHERE `name` = '$username'";
        $deletemovie= mysqli_query($conn, $movie_query);

        $park_query = "DELETE FROM `park_order` WHERE `name` = '$username'";
        $deletepark= mysqli_query($conn, $park_query);

        $event_query = "DELETE FROM `event_order` WHERE `username` = '$username'";
        $deleteevent= mysqli_query($conn, $event_query);

        $cricket_query = "DELETE FROM `cricket_order` WHERE `username` = '$username'";
        $deletecricket= mysqli_query($conn, $cricket_query);
      }
    if($deletesubscription){
    session_name('user_session');
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
    }
}
?>