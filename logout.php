<?php 
session_start();
if(isset($_GET['logout']))
;
unset($_SESSION['email']);
unset( $_SESSION['name']);
unset($_SESSION['userid']);
session_destroy();




header("location:index.php");
?>
