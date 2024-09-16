
<?php
    include('_dbconnection.php');
   $delete = "DELETE FROM `subscription` WHERE `subscription_time` < DATE_SUB(NOW(), INTERVAL 1 MONTH)";
   $expired = mysqli_query($conn, $delete);


  ?>
  
