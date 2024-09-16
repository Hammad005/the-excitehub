<?php
session_name('admin_session');
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: index.php");
  exit;

}
?>
<?php
session_name('admin_session');
session_start();
session_unset();
session_destroy();
header("Location: index.php");
?>