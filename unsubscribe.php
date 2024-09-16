
<?php
include '_dbconnection.php';
include('_session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `subscription` WHERE `id` = '$id'";
    $delete= mysqli_query($conn, $query);
    header("Location: packages.php?unsubscribeid=" . $delete['id']);
    exit;
}
?>