
<?php
include '_dbconnection.php';
include('_session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `cricket_order` WHERE `id` = '$id'";
    $delete= mysqli_query($conn, $query);
}
header("Location: bookings.php?cricketid=". $delete['id']);
exit;
?>